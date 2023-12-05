<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\MyAccount\UpdateRequest;
use App\Http\Requests\Panel\MyAccount\Password\UpdateRequest AS UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function edit(){
        $user = auth()->user();
        return view('panel.pages.my-account.form', compact('user'));
    }

    public function update(UpdateRequest $request){
        $input = $request->validated();
        $user = User::find(auth()->user()->id);
        foreach($input AS $field => $value){
            $user->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah akun'
        ];
        if($user->save()){
            $alert->type = 'success';
            $alert->message = 'Akun telah diubah';
        }
        return back()->with([ 'alert' => $alert ]);
    }

    public function change_password(UpdatePasswordRequest $request){
        $input = $request->validated();
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($input['password']);
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah password'
        ];
        if($user->save()){
            $alert->type = 'success';
            $alert->message = 'Password telah diubah';
        }
        return back()->with([ 'alert' => $alert ]);
    }
}
