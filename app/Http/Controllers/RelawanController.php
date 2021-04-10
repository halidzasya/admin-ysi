<?php

namespace App\Http\Controllers;

use App\Relawan;
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Relawan::latest()->paginate(5);
        return view('relawan.index',compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Relawan  $relawan
     * @return \Illuminate\Http\Response
     */
    public function show(Relawan $relawans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Relawan  $relawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Relawan $relawans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Relawan  $relawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relawan $relawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relawan  $relawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relawan $relawan)
    {
        //
    }
}