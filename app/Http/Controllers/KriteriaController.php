<?php

namespace App\Http\Controllers;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KriteriaController extends Controller
{
    public function index(Request $req)
    {
        $data = Kriteria::all();
//        return response()->json($data);
        return view('kriteria.index',['kriteria' => $data]);
    }
    public function create()
    {
        return view('kriteria.create');
    }
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $saveKriteria = Kriteria::create($request->all());
        if (!$saveKriteria) {
            return back();
        }
        return redirect(route('kriteria'));
    }
    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit',['data' => $kriteria]);
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
        $updateData = Kriteria::where('id',$id)
                        ->update($request->except('_token'));
        if (!$updateData) {
            return back();
        }
        return redirect(route('kriteria'));
    }
    public function destroy($id)
    {
        $find = Kriteria::destroy($id);
        return redirect(route('kriteria'));
    }
    private function validator(array $data)
    {
        return Validator::make($data,[
            'kode'      => 'required|unique:kriteria',
            'nama'      => 'required',
            'atribut'   => 'required',
            'bobot'     => 'required'
        ]);
    }
}
