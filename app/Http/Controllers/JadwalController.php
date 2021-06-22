<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $datas = Relawan::latest()->paginate(5);
        //return view('relawan.index',compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);
        $datas = Jadwal::get();
        return view('jadwal.index', compact('datas'));
    }
    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        Jadwal::create($request->all());
        $count = Jadwal::where('jadwal',$request->input('jadwal'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('jadwal');
        }
        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('jadwal.index');
    }


    public function edit($id)
    {
        $data = Jadwal::findOrFail($id);
        return view('jadwal.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Jadwal::find($id)->update($request->all());
        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->route('jadwal.index');

    }



}
