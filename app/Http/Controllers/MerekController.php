<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $merek = Merek::orderBy('created_at', 'DESC')->paginate(10);
        return view('merek.index', compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('merek/create');
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
 
        DB::table('mereks')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
 
    	return redirect('/merek')
            ->with('success_message', 'Berhasil menambah Merek baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $merek = Merek::findOrFail($id);
        return view('merek.show', compact('merek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $merek = Merek::findOrFail($id);
        return view('merek.edit', compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
    		'nama' => 'required',
    		'deskripsi' => 'required'
    	]);
 
        $merek = Merek::findOrFail($id);
        $merek->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);
 
    	return redirect('/merek')
            ->with('success_message', 'Berhasil mengganti Merek ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $merek = Merek::findOrFail($id);
        $merek->delete();

	    return redirect('/merek');
    }
}
