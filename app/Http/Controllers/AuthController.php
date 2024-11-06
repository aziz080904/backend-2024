<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        # Menangkap inputan 
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        # Menginsert data ke tabel user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully'
        ];

        # mengirim response ke json
        return response()->json($data, 200);
    }

    public function login(Request $request){
        # Menangkap input user
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        # Melakukan autentikasi
        if(Auth::attempt($input)) {
            # Membuat token
            $token = Auth::user()->createToken('auth_token');

            $data = [
                'massege' => 'Login Succesfully', 
                'token'  => $token->plainTextToken
            ];

            # mengembalikan response ke JSON
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Username or password is wrong'
            ];

            return response()->json($data, 401);
        }
    }
}