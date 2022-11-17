<?php

namespace App\Http\Controllers;

class FallbackController extends Controller
{
    public function fallback1()
    {
        return redirect()->route('login');
    }

    public function fallback2()
    {
        return redirect()->route('dashboard');
    }
}
