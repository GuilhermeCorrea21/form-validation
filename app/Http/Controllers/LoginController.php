<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function auth(Request $request){

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect('/workspace');
        }else{
            return redirect()->back();
        }
    }

    public function destroy(){
        Auth::logout();
        return redirect('/enter');
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/enter')->with('msg', 'Usuario criado com sucesso');

    }

}
