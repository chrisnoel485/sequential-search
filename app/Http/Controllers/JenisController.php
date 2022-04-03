<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenis = Jenis::orderBy('created_at', 'DESC')->paginate(10);
        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jenis/create');
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
    		'deskripsi' => 'required'
    	]);
 
        DB::table('jeniss')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
 
    	return redirect('/jenis')
            ->with('success_message', 'Berhasil menambah jenis baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jenis = Jenis::findOrFail($id);
        return view('jenis.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jenis = Jenis::findOrFail($id);
        return view('jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $this->validate($request,[
    		'nama' => 'required',
    		'deskripsi' => 'required'
    	]);
 
        $jenis = Jenis::findOrFail($id);
        $jenis->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);
 
    	return redirect('/jenis')
            ->with('success_message', 'Berhasil mengganti jenis ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

	    return redirect('/jenis');
    }
}
