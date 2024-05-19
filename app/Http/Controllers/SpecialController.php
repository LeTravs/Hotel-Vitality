<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function index()
    {
        return view('specials');
    }
}
