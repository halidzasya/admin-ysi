<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AbsensiRelawan;
use App\User;
use Carbon\Carbon;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class AbsensiRelawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $absensirelawan = User::where('id', 1)->first(); // or whatever, just get one log
        // $absens = $absensirelawan->users->name;
        // $absensirelawan = where('user_id', User::users()->id)->get();
        $datas = AbsensiRelawan::get();
        // $absensirelawan = AbsensiRelawan::with('users')->paginate(10);
        return view('absensi.index', compact('datas'));
    }
    public function create()
    {
        return view('absensi.create');
    }
    public function store(Request $request)
    {
        // $tanggal = $request->get('tanggal');
        // $user_id = Auth::user()->id;
         AbsensiRelawan::create(
            [
                // 'user_id' => $request->user_id,

                'tanggal' => $request->tanggal,
                'kehadiran' => $request->kehadiran,
                // 'jam_masuk' => Carbon::createFromFormat('h i',  $jam_masuk),
                // 'jam_keluar' => Carbon::createFromFormat('h i',  $jam_keluar),
                'jam_masuk' => $request->jam_masuk,
                'jam_keluar' => $request->jam_keluar,
                'aktivitas' => $request->aktivitas
            ]
            );
        // AbsensiRelawan::create($request->all());
        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('absensi.index');
    }
    public function edit($id)
    {
        $data = AbsensiRelawan::findOrFail($id);

        return back();    }

    public function hapus($id)
    {
        $absens = AbsensiRelawan::find($id);
        $absens->delete();
        return back();
        Session::flash('message', 'Berhasil dihapus!');
        Session::flash('message_type', 'success');
        // return redirect(route('absensi.index'));
        // return redirect()->route('absensi.index');
    }



}
