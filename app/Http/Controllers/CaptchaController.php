<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;

class CaptchaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response(Captcha::create());
    }
}
