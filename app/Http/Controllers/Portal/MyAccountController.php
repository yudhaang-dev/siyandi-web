<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portal\Auth\ChangePasswordRequest;
use App\Http\Requests\Portal\Auth\UpdateAccountRequest;
use App\Models\Citizen;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MyAccountController extends Controller
{
    public function index()
    {
        $user  = auth(config('siyandi.apps.portal.guard_name'))->user();
        return view('portal.pages.my-account.profile.show', compact('user'));
    }

    public function profile_edit()
    {
        $citizen  = Citizen::with('village.district.city.province')->find(auth(config('siyandi.apps.portal.guard_name'))->user()->id);
        return view('portal.pages.my-account.profile.form', compact('citizen'));
    }

    public function profile_update(UpdateAccountRequest $request)
    {
        $citizen_data   = $request->safe()->except(['skills']);
        $skills_data    = $request->safe()->only(['skills']);
        $skills         = [];
        if(isset($skills_data['skills']) && !empty($skills_data['skills'])){
            $skills_data    = $skills_data['skills'];
            foreach($skills_data AS $name){
                array_push($skills, (Skill::firstOrCreate(['name'=>$name]))->id);
            }
        }
        $citizen    = Citizen::find(auth('portal')->user()->id);
        $citizen->skills()->sync($skills);

        $uploading = $request->hasFile('photo');
        $uploading = $uploading && $request->file('photo')->isValid();
        if($uploading){
            $path   = $request->file('photo')->storePublicly('citizens/photo', 'public');
            Image::make(storage_path('app/public/' . $path))->fit(150)->save();
            if(!empty($path)){
                $citizen_data['photo'] = $path;
                Storage::disk('public')->delete($citizen->photo);
            }
        }
        $citizen->update($citizen_data);
        return back();
    }

    public function password_edit()
    {
        return view('portal.pages.my-account.password.form');
    }

    public function password_update(ChangePasswordRequest $request)
    {
        $password = $request->safe()->only('password')['password'];
        $citizen    = Citizen::find(auth('portal')->user()->id);
        $citizen->password = Hash::make($password);
        $citizen->save();
        return back();
    }
}
