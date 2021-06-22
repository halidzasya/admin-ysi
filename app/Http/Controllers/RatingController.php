<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relawan;
use App\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $dtRating = Rating::with('relawan')->paginate(10);;
        return view('rating.index', compact('dtRating'));

    }

    public function create(){
        $rel = Relawan::all();
        return view('rating.create', compact('rel'));

    }

    public function store(Request $request)
    {
        Rating::create(
            [
                'relawan_id' => $request->relawan_id,
                'rating' => $request->rating

            ]
            );
        return redirect('rating')->with('toast_success', 'Data Berhasil Tersimpan');
    }
    public function show($id){
        //

    }

    public function destroy($id)
    {
        $dtRating = Rating::find($id);
        $dtRating->delete();
        return back();
        Session::flash('message', 'Berhasil dihapus!');
        Session::flash('message_type', 'success');
        // return redirect()->route('relawan.index');

    }

}
