<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;


class LoginController extends Controller
{
    
    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Recupera o usuário com base no e-mail
        $user = Usuario::where('email', $email)->first();
    
        // Verifica se o usuário existe e a senha está correta
        if ($user && Hash::check($password, $user->senha)) {
            return redirect('/home')->withCookie(cookie('userType', 'admin'));
        }
    
        // Se o login falhar, redirecione de volta com uma mensagem de erro
        return redirect()->back()->withErrors(['error' => 'Credenciais inválidas']);
    }
    

    

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
