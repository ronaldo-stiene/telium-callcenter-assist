<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View as View;

class CallcenterController extends Controller
{
    public function index(): View
    {
        return view('callcenter.index');
    }
}
