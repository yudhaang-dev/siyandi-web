<?php

namespace App\Http\Controllers\Portal\Auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth(config('siyandi.apps.portal.guard_name'))->user();
        return view('portal.pages.auth.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citizen $citizen)
    {
        //
    }
}
