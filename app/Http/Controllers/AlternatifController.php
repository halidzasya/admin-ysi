<?php

namespace App\Http\Controllers;
use App\Alternatif;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        return view('alternatif.index', ['alternatif' => $alternatifs]);
    }

    public function create()
    {
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $saveAlternatif = Alternatif::create($request->all())->id;
        if (!$saveAlternatif) {
            return back();
        }
        return redirect(route('alternatif',['id' => $saveAlternatif]));
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        return view('alternatif.edit',['alternatif' => $alternatif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateAlternatif = Alternatif::where('id',$id)
                ->update($request->except(['_token']));
        if (!$updateAlternatif) {
            return back();
        }
        return redirect(route('alternatif'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::destroy($id);
        return redirect(route('alternatif'));
    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required',
        ]);
    }


}
