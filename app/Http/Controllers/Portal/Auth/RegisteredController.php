<?php

namespace App\Http\Controllers\Portal\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portal\Auth\RegisterRequest;
use App\Models\Citizen;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade AS Avatar;

class RegisteredController extends Controller
{

    public function create() 
    {
        return view('portal.pages.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $input      = $request->validated();
        $avatar     = Avatar::create($input['name']);
        $path       = 'citizens/photo/' . str($input['nik'])->slug() . '_' . time() .'.png';
        Storage::disk('public')->put($path, $avatar->getImageObject()->stream('png'));
        $input['photo']     = $path;
        $input['password']  = Hash::make($input['password']);
        $data = collect($input)->only([
            'nik', 'name', 'username', 'email', 'password', 'photo'
        ])->toArray();
        Auth::guard('portal')->login(Citizen::create($data));
        return redirect()->route('portal.my-account.profile.edit');
        // event(new Registered($user));
        // return redirect(RouteServiceProvider::HOME);
    }
}
