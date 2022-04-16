<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use App\Models\Aset;
use App\Models\Letak;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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
        //$aset = Aset::with('merek','kategori','jenis')->orderBy('created_at', 'DESC')->paginate(10);
        $aset = Aset::get()->orderBy('created_at', 'DESC')->paginate(10);
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
