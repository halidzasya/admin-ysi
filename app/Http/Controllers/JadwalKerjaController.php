<?php

namespace App\Http\Controllers;

use App\JadwalKerja;
use App\Jadwal;
use App\Relawan;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class JadwalKerjaController extends Controller
{
    public function index()
    {
        // $datas = Relawan::latest()->paginate(5);
        $relawan = Relawan::all();
        $list_jadwal = Jadwal::pluck('nama_jadwal', 'id');
        return view('jadwal_kerja.index', compact('relawan', 'list_jadwal'));


    }
    // public function create()
    // {

    //     $jadwal = Jadwal::all();
    //     $relawan = Relawan::all();

    //     $list_relawan = Relawan::pluck('nama', 'id');
    //     $list_jadwal = Jadwal::pluck('nama_jadwal', 'id');
    //     return view('jadwal_kerja.create',compact('list_relawan', 'list_jadwal', 'jadwal', 'relawan'));
    // }

    public function store(Request $request)
    {
        $relawan = Relawan::findOrFail($request->relawan);
        $relawan->nama = $request->nama;

        $list_relawan = Relawan::pluck('nama', 'id');
        $list_jadwal = Jadwal::pluck('nama_jadwal', 'id');

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');

        return redirect()->route('jadwal_kerja.index');
    }


    public function edit($id)
    {
        $relawan = Relawan::findOrFail($id);
        $data = JadwalKerja::findOrFail($id);

        // $list_jadwal = Jadwal::all();
        return view('jadwal_kerja.edit', compact('relawan', 'data'));
    }

    public function update(Request $request, $id)
    {
        $data = JadwalKerja::find($id);
        JadwalKerja::find($id)->update($request->all());


        // Session::flash('message', 'Berhasil diubah!');
        // Session::flash('message_type', 'success');
        return redirect()->route('jadwal_kerja.index');

    }



}
