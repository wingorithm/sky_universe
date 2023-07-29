<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MarketplaceController extends Controller{
    public function index($partner = null){
      $data = DB::table('dresses')->where('suitName', 'like', '%vintage%')->get();
      $data2 = DB::table('dresses')->where('suitName', 'like', '%Romantic%')->get();
      $data3 = DB::table('dresses')->where('suitName', 'like', '%Fantasy%')->get();
      $user = Auth::user();
      $partner = User::find($partner);
      // dd($partner->image);
      return view("marketplace", ["user" => $user, 
                                "data" => $data, 
                                "data2" => $data2,
                                "data3" => $data3,
                                'partner' => $partner]);
    }

    // public function Vintage(){
    //   $user = Auth::user();
    //   $data = DB::table('dresses')->where('suitName', 'Romantic')->get();
    //   dd($data->suitName);
    //   return view("marketplace", ["user" => $user, 
    //                             "data" => $data]);
    // }
    // public function Romantic(){
    //   $user = Auth::user();
    //   $data = DB::table('dresses')->where('suitName', 'Romantic')->get();
    //   return view("marketplace", ["user" => $user, 
    //                             "data" => $data]);
    // }
    public function checkout($id = 1){
      $user = Auth::user();
      $data = DB::table('dresses')->where('suitName',  'like', '%Vintage%')->get();

      if($id == 2){
        $data = DB::table('dresses')->where('suitName', 'like', '%Romantic%')->get();
        return redirect()->back();
      }elseif ($id == 3) {
        $data = DB::table('dresses')->where('suitName', 'like', '%Fantasy%')->get();
        return redirect()->back();
      }
      
      // dd($data[1]);
      return view("checkout", ["user" => $user, 
                                "data" => $data[1]]);
    }
}
