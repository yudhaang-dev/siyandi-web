<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(){
        return view('panel.pages.auth.login');
    }
    
    public function authenticate(LoginRequest $request){
        $input      = $request->validated();
        $user       = User::where('name', ($input['user'] ?? null))
                        ->orWhere('email', ($input['user'] ?? null))
                        ->first();

        $password   = $input['password'] ?? null;

        if(empty($user)){
            return back()->withInput()->withErrors([
                'user' => ['User not found']
            ]);
        }

        if (Hash::check($password, $user->password)) {
            Auth::guard('web')->login($user);
            return redirect()->intended('/');
        }

        return back()->withInput()->withErrors([
            'password' => ['Wrong Password']
        ]);
        
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
