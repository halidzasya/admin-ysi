<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Perawat;
use App\Jadwal;
use Session;


class PerawatController extends Controller
{
    public function index()
    {
        $datas = Perawat::all();
        return view('perawat.index', compact('datas'));
    }

    public function create()
    {
        $jad = Jadwal::all();
        return view('perawat.create', compact('jad'));
    }

    public function store(Request $request)
    {
        Perawat::create($request->all());
        // Perawat::create(
        //     [
        //         'nama_perawat' => $request->nama_perawat,
        //         'jadwal_id' => $request->jadwal_id,
        //         'jenis_kelamin' => $request->jenis_kelamin,
        //         'nohp' => $request->nohp,
        //         'tempatlahir' => $request->tempatlahir,
        //         'ttl' => $request->ttl,
        //         'alamat' => $request->alamat,
        //         'domisili' => $request->domisili,
        //         'email' => $request->email,
        //         'status' => $request->status,
        //         'statuskerja' => $request->statuskerja,
        //         'pengalaman' => $request->pengalaman,
        //         'fotoktp' => $request->fotoktp,
        //         'sks' => $request->sks
        //     ]
        //     );

        if($request->file('fotoktp')) {
            $file = $request->file('fotoktp');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('fotoktp')->move("images/perawat", $fileName);
            $fotoktp = $fileName;
        }

        if($request->file('sks')) {
            $file = $request->file('sks');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('sks')->move("images/perawat", $fileName);
            $sks = $fileName;
        }
        $count = Perawat::where('nama_perawat',$request->input('nama_perawat'))->count();

        // if($count>0){
        //     Session::flash('message', 'Already exist!');
        //     Session::flash('message_type', 'danger');
        //     return redirect()->to('perawat');
        // }

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('perawat.index');
    }

    public function show($id)
    {
        $datas = Perawat::findOrFail($id);
        return view('perawat.show', compact('datas'));


    }

    public function edit($id)
    {
        $data = Perawat::findOrFail($id);
        return view('perawat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Perawat::find($id)->update($request->all());
        // $perawat = Perawat::find($id);

        if($request->file('fotoktp')) {
            $file = $request->file('fotoktp');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('fotoktp')->move("images/perawat", $fileName);
            $fotoktp = $fileName;
        }

        if($request->file('sks')) {
            $file = $request->file('sks');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('sks')->move("images/perawat", $fileName);
            $sks = $fileName;
        }

        // $perawat->update([
        //     'statuskerja' => 'aktif',
        //     'statuskerja' => 'nonaktif',

        //     ]);

        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->route('perawat.index');
    }

    public function hapus($id)
    {
        $datas = Perawat::find($id);
        $datas->delete();
        return back();
        Session::flash('message', 'Berhasil dihapus!');
        Session::flash('message_type', 'success');
        // return redirect()->route('relawan.index');

    }


}
