<?php

namespace App\Http\Controllers;

use App\Models\Letak;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class LetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $letak = Letak::with('kategori')->orderBy('created_at', 'DESC')->paginate(10);
        return view('letak.index', compact('letak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        return view('letak/create', compact('kategori'));
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
            'kategori_id' => 'required',
            'nama' => 'required',
    		'deskripsi' => 'required'
    	]);
 
        DB::table('letaks')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);
 
    	return redirect('/letak')
            ->with('success_message', 'Berhasil menambah Letak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $letak = Letak::findOrFail($id);
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        return view('letak.show', compact('letak','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $letak = Letak::findOrFail($id);
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        return view('letak.edit', compact('letak','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $this->validate($request,[
            'nama' => 'required',
    		'deskripsi' => 'required',
            'kategori_id' => 'required'
    	]);
 
        $letak = Letak::findOrFail($id);
        $letak->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);
 
    	return redirect('/letak')
            ->with('success_message', 'Berhasil mengganti Letak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $letak = Letak::findOrFail($id);
        $letak->delete();

	    return redirect('/letak');
    }
}
