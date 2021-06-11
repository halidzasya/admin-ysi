<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\JadwalShift;
use App\Perawat;
use App\Jadwal;
use Session;

class JadwalShiftController extends Controller
{
    public function index()
    {
    $dtPerawat = Perawat::with('jadwal')->paginate(10);
    return view('jadwal_shift.index', compact('dtPerawat'));
    }

    public function create(){
        $jad = Jadwal::all();
        return view('jadwal_shift.create', compact('jad'));

    }

    public function store(Request $request)
    {
        // Perawat::create($request->all());
        Perawat::create(
            [
                'nama_perawat' => $request->nama_perawat,
                'jadwal_id' => $request->jadwal_id,


            ]
            );
        return redirect('jadwal_shift.index')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function show($id){
        //

    }
    public function edit($id){
        $jad = Jadwal::all();
        $per = Perawat::with('jadwal')->findorfail($id);
        return view('jadwal_shift.edit', compact('per', 'jad'));

    }

    public function update(Request $request, $id)
    {
        Perawat::find($id)->update($request->all());
        $per = Perawat::with('jadwal')->findorfail($id);

        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->route('jadwal_shift.index');
    }


}
