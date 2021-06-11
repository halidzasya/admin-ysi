<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relawan;
use App\Perawat;
use App\Jadwal;
use App\Rating;
use App\User;


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
        $user = User::get();
        $perawat = Perawat::get();
        $jadwal = Jadwal::get();
        $dtRating = Rating::with('relawan')->paginate(10);;

        return view('home', compact('relawan', 'user', 'perawat', 'jadwal', 'dtRating'));
    }
}
