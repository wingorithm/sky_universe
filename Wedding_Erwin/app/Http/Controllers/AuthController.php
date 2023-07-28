<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function create_register(){
        return view('register');
    }

    public function store_register(Request $request){
        $gendercode = $request->gender == 'Male' ? '1' : '2';
        $id = 'SKY' . $request->DT . $gendercode;
        $request->merge(['id' => $id]);

         // ----------------------------
        //  $img = $request->image;
        //  $folderPath = "public/profiles";

        //  $image = $request->file('image');
        //  $image_parts = explode(";base64,", $img);
        //  $image_type_aux = explode("image/", $image_parts[0]);
        //  $image_type = $image_type_aux[1];
         
        //  $image_base64 = base64_decode($image_parts[1]);
        //  $fileName =  $id . '.png';
         
        //  Storage::put($fileName, $image_base64);
         // ----------------------------
        //  $image_path = "public/".$fileName
        //  dd('Image uploaded successfully: '.$image_path);
        
        $data = $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'DT' => 'required|regex:/^[0-9]{3}$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|string|',
            'birthday' => 'required|date',
            'phone' => 'required|regex:/^[0-9]{10,14}$/',
            'genderState' => 'required|in:Male,Female',
            // 'image' => 'required|image',
        ], [
            'id' => "ID DT sudah terpakai" 
        ]);
        // $img = $request->image;
        $uploaded_image = $request->image;
        Storage::putFileAs('public/profiles', $uploaded_image, $id . ".jpeg");
        $image_path = 'public/profiles' . $id . ".jpeg";

        $user = User::create([
            'id' => $id,
            'name' => $data['name'],
            'DT' => 'DT' . $data['DT'],
            'email' => $data['email'], 
            'password' => Hash::make( $data['password']),
            'birthday' => $data['birthday'],
            'phone' => '+62' . $data['phone'], 
            'genderState' => $data['genderState'], 
            'image' => $image_path, 
            'status' => 'offline', 
        ]);

        return redirect()->back()->with('success', 'Selamat akun anda berhasil dibuat ' . $data['email'] . ' atau ' . $id);
    }

    public function create_login(){
        return view('login');
    }

    public function store_login(Request $request){
        $isEmail = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'id';
        $request->merge([$isEmail => $request->login]);
        
        $data = $request->validate([
            'email' => 'required_without:id|email|exists:users',
            'id' => 'required_without:email|string|exists:users',
            'password' => 'required|string',
        ]);
        
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->status == "banned") {
                return redirect()->back()->with('status', "You're banned");
            }else{
                return redirect()->route('home');
            }
        }
        
        // dd($request->session());
        return redirect()->back()->with('status', 'email / password anda salah');
        // dd($request);
        // return null;
    }
}
