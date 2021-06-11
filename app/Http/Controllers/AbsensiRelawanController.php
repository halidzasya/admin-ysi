<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AbsensiRelawan;
use Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class AbsensiRelawanController extends Controller
{
    public function index()
    {
        $absens = AbsensiRelawan::all();
        return view('absensi.index', compact('absens'));
    }
    public function create()
    {
        return view('absensi.create');
    }
    public function store(Request $request)
    {
        AbsensiRelawan::create($request->all());
        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('absensi.index');
    }
    public function show($id)
    {
        $absens = AbsensiRelawan::findOrFail($id);
        // return view('absensi.show', compact('absens'));
    }
    public function destroy($id)
    {
        $absens = AbsensiRelawan::destroy($id);

        Session::flash('message', 'Berhasil dihapus!');
        Session::flash('message_type', 'success');
        return redirect(route('absensi.index'));
        // return redirect()->route('absensi.index');
    }


}
