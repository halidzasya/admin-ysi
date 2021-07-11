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

        if(Auth::user()->level == 'admin') {

            $datas = AbsensiRelawan::all();

        }
        elseif(Auth::user()->level == 'user') {
            $user_id = Auth::user()->id;
            $datas = AbsensiRelawan::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
            // $datas = Auth::user()->absensi_relawan()->paginate(10);

        }

        return view('absensi.index', compact('datas'));

        // $absensirelawan = where('id', User::user()->id)->get();
        // $datas = AbsensiRelawan::get();

        // $absensirelawan = AbsensiRelawan::with('users')->paginate(10);
        // $datas = Auth::user()->id;
        // return view('absensi.index');
    }
    public function create()
    {
        return view('absensi.create');
    }
    public function store(Request $request)
    {

        $datas = new AbsensiRelawan;
        $datas->tanggal = $request->tanggal;
        $datas->kehadiran = $request->kehadiran;
        $datas->jam_masuk = $request->jam_masuk;
        $datas->jam_keluar = $request->jam_keluar;
        $datas->aktivitas = $request->aktivitas;
        Auth::user()->absensi_relawan()->save($datas);

        //  AbsensiRelawan::create(
        //     [
        //         'user_id' => $request->user_id,

        //         'tanggal' => $request->tanggal,
        //         'kehadiran' => $request->kehadiran,
        //         // 'jam_masuk' => Carbon::createFromFormat('h i',  $jam_masuk),
        //         // 'jam_keluar' => Carbon::createFromFormat('h i',  $jam_keluar),
        //         'jam_masuk' => $request->jam_masuk,
        //         'jam_keluar' => $request->jam_keluar,
        //         'aktivitas' => $request->aktivitas
        //     ]
        //     );
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
    public function update(Request $request, $id)
    {
        $aktvitas = $request->input('aktivitas');
        AbsensiRelawan::find($id)->update($request->all());
        // $simpan = AbsensiRelawan::table('absensi_relawan')->where('user_id','=',$request->datas('id'))->update($data);
        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->route('absensi.index');

    }


}
