<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class roomController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }

    public function home(){
        $user = Auth::user();

        if($user->role == 'admin'){
            return redirect()->route("admin");
        }

        $partner_id = $user->gender == 'male' ? substr_replace($user->id, '2', -1) : substr_replace($user->id, '1', -1);
        $partner = User::find($partner_id);

        if ($partner) {
            // dd($partner);
            return redirect()->route("marketplace", ['partner' => $partner]);
        }else{
            $room = Room::whereNull('user2_id')
                ->join('users', 'users.id', '=','rooms.user1_id' )
                ->where('users.gender', '<>', $user->gender)
                ->select('rooms.id')
                ->inRandomOrder()
                ->first();

            if(!$room){
                $room = Room::create([
                    'user1_id' => $user->id
                ]);
            } else {
                $room->user2_id = $user->id;
                $room->save();
            }
        }
        return redirect()->route('tictactoe', ['room' => $room->id]);
    }
}
