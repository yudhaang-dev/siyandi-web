<?php

namespace App\Http\Controllers\Portal\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portal\Auth\LoginRequest;
use App\Models\Citizen;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function login() {
        return view('portal.pages.auth.login');
    }

    public function authenticate(LoginRequest $request) {
        $input   = $request->validated();
        $user    = Citizen::where('nik', $input['user'])
            ->orWhere('username', $input['user'])
            ->orWhere('email',  $input['user'])->first();

        if(empty($user)){
            return back()->withErrors(
                ['user' => ['Akun tidak terdaftar']]
            )->withInput();
        }

        if(isset($user) && $user->status == false){
            return back()->withErrors(
                ['user' => ['Akun anda dinonaktifkan']]
            )->withInput();
        }

        if(!Auth::guard('portal')->attempt(['id'=>$user->id, 'password'=>$input['password']])){
            return back()->withErrors(
                ['password' => ['Password anda salah']]
            )->withInput();
        }
        return redirect()->intended('/home');
    }

    public function logout(Request $request) {
        Auth::guard(config('siyandi.apps.panel.guard_name'))->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/home');
    }
}
