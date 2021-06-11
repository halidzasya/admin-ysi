<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternatif;
use App\Crip;
use App\Kriteria;
use DB;

class NilaiController extends Controller
{
    public function index(Request $req)
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        return view('nilai.index',[
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif
        ]);
    }
    public function create($id)
    {
        $kriteria = Kriteria::all();
        return view('nilai.tambah',['master_kriteria' => $kriteria]);
    }
    public function store(Request $request,$id)
    {
        $data = array_values($request->except('_token'));
//        $data = Crip::find($data);
        $alternatif = Alternatif::find($id);
        $alternatif->crip()->sync($data);
        return redirect(route('alternatif'));
    }

    public function edit($id)
    {
        $selectedCrip = DB::table('nilai_alternatif')
                            ->select('crip_id')
                            ->where('alternatif_id',$id)
                            ->get();
        $kriteria = Kriteria::all();
        $arrayCrip = [];
        foreach ($selectedCrip as $a) {
                $arrayCrip[] = $a->crip_id;
        }
        return view('nilai.edit',[
            'master_kriteria'   => $kriteria,
            'selected_crip'     => $arrayCrip
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = array_values($request->except('_token'));
//        $data = Crip::find($data);
        $alternatif = Alternatif::find($id);
        $alternatif->crip()->sync($data);
        return redirect(route('nilai'));
    }


    public function destroy($id)
    {
        //
    }
}
