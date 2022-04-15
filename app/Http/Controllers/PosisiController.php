<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use App\Models\Aset;
use App\Models\Letak;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aset = Aset::get();
    	return view('posisi.index', ['aset' => $aset]);
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
        $this->validate($request,[
            'aset_id' => 'required',
            'posisi_id' => 'required'
    	]);
 
        DB::table('posisis')->insert([
            'aset_id' => $request->aset_id,
            'posisi_id' => $request->posisi_id,
        ]);
 
    	return redirect('/aset')
            ->with('success_message', 'Berhasil menambah Posisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $posisi = posisi::findOrFail($id);
        $aset = Aset::orderBy('nama', 'ASC')->get();
        return view('letak.show', compact('letak','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Posisi $posisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posisi $posisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posisi $posisi)
    {
        //
    }
}
