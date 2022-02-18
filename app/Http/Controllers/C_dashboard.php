<?php

namespace App\Http\Controllers;

class C_dashboard extends Controller
{
    public function index()
    {
        $title = 'dashboard Admin';

        return view('dash.index', compact('title'));
    }
}
