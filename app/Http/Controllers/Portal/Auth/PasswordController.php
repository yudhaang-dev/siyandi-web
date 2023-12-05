<?php

namespace App\Http\Controllers\Portal\Auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('portal.pages.auth.profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citizen $citizen)
    {
        //
    }
}
