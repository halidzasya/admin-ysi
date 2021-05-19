<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relawan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relawan = Relawan::get();
    
        return view('home', compact('relawan'));        
    }
}
