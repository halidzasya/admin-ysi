<?php

namespace App\Http\Controllers;

use App\Relawan;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class RelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datas = Relawan::latest()->paginate(5);
        //return view('relawan.index',compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);
        $datas = Relawan::get();
        return view('relawan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Relawan::create($request->all());
        $count = Relawan::where('nama',$request->input('nama'))->count();

        // if($count>0){
        //     Session::flash('message', 'Already exist!');
        //     Session::flash('message_type', 'danger');
        //     return redirect()->to('relawan');
        // }

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('relawan.index');
    }


    public function show($id)
    {
        $datas = Relawan::findOrFail($id);
        return view('relawan.show', compact('datas'));


    }



    public function edit($id)
    {
        $data = Relawan::findOrFail($id);
        return view('relawan.edit', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Relawan  $relawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Relawan::find($id)->update($request->all());
        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->route('relawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relawan  $relawan
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        Relawan::findOrFail($id)->delete();


        Session::flash('message', 'Berhasil dihapus!');
        Session::flash('message_type', 'success');
        return redirect()->route('relawan.index');
        // return redirect()->route('relawan.index');

    }

}
