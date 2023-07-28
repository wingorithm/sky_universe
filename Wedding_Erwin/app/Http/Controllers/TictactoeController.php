<?php

namespace App\Http\Controllers;

use App\Events\TictactoeTurn;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TictactoeController extends Controller
{
    public function index(room $room){
        $user = Auth::user();
        if ($room->user1_id == $user->id || $room->user2_id == $user->id) {
            $status = ($room->user1_id != null && $room->user2_id != null) ? 'Game Start' : 'Waiting for another player';
            $symbol = $room->user1_id == $user->id ? 'x' : 'o';
            return view("tictactoe", ['symbol' => $symbol, "dating_code" => $user->dating_code, 'room' => $room->id, 'status'=> $status]);
        } else {
            return redirect()->route('home');
        }
    }

    public function turn(Request $request){
        event(new TictactoeTurn($request->room, $request->cell, $request->symbol));
        return response()->json(["success" => $request->all()]);
    }
}
