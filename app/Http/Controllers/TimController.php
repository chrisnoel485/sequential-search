<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tim = Tim::orderBy('created_at', 'DESC')->paginate(10);
        return view('tim.index', compact('tim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tim/create');
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
            'kode_tim' => 'required',
    		'nama' => 'required',
    		'deskripsi' => 'required'
    	]);
 
        DB::table('tims')->insert([
            'kode_tim' => $request->kode_tim,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
 
    	return redirect('/tim')
            ->with('success_message', 'Berhasil menambah Tim baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tim = Tim::findOrFail($id);
        return view('tim.show', compact('tim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function edit(Tim $tim)
    {
        //
        $tim = Tim::findOrFail($id);
        return view('tim.edit', compact('tim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'kode_tim' => 'required',
    		'nama' => 'required',
    		'deskripsi' => 'required'
    	]);
 
        $tim = Tim::findOrFail($id);
        $tim->update([
            'kode_tim' => $request->kode_tim,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);
 
    	return redirect('/tim')
            ->with('success_message', 'Berhasil mengganti Tim ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tim = Tim::findOrFail($id);
        $tim->delete();

	    return redirect('/tim');
    }
}
