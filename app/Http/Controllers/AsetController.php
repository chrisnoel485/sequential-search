<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Merek;
use App\Models\Kategori;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aset = Aset::with('merek','kategori','posisi')->orderBy('created_at', 'DESC')->paginate(10);
        return view('aset.index', compact('aset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $merek = Merek::orderBy('nama', 'ASC')->get();
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $posisi = Posisi::orderBy('nama', 'ASC')->get();
        return view('aset/create', compact('kategori','merek','posisi'));
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
            
            'nama' => 'required',
    		'deskripsi' => 'required',
            'merek_id' => 'required',
            'kategori_id' => 'required',
            'posisi_id' => 'required',
            'status' => 'required'
    	]);
 
        DB::table('asets')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'merek_id' => $request->merek_id,
            'kategori_id' => $request->kategori_id,
            'posisi_id' => $request->posisi_id,
            'status' => $request->status,
        ]);
 
    	return redirect('/aset')
            ->with('success_message', 'Berhasil menambah Aset');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $aset = Aset::findOrFail($id);
        $merek = Merek::orderBy('nama', 'ASC')->get();
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $posisi = Posis::orderBy('nama', 'ASC')->get();
        return view('aset.show', compact('aset','merek','kategori','posisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $aset = Aset::findOrFail($id);
        $merek = Merek::orderBy('nama', 'ASC')->get();
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $posisi = Posisi::orderBy('nama', 'ASC')->get();
        return view('aset.edit', compact('aset','kategori','merek','posisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $this->validate($request,[
            'nama' => 'required',
    		'deskripsi' => 'required',
            'merek_id' => 'required',
            'kategori_id' => 'required',
            'posisi_id' => 'required',
            'status' => 'required'
    	]);
 
        $aset = Aset::findOrFail($id);
        $aset->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'merek_id' => $request->merek_id,
            'kategori_id' => $request->kategori_id,
            'posisi_id' => $request->posisi_id,
            'status' => $request->status,
        ]);
 
    	return redirect('/aset')
            ->with('success_message', 'Berhasil mengganti aset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $aset = Aset::findOrFail($id);
        $aset->delete();

	    return redirect('/aset');
    }
}
