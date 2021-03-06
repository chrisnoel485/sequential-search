<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Merek;
use App\Models\Kategori;
use App\Models\Jenis;
use App\Models\Letak;
use App\Models\Posisi;
use App\Models\Status;
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
        $aset = Aset::with('merek','kategori','jenis','status')->orderBy('created_at', 'DESC')->paginate(10);
        return view('aset.index', compact('aset'));
        #$aset = Aset::get();
    	#return view('posisi.index', ['aset' => $aset]);
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
        $jenis = Jenis::orderBy('nama', 'ASC')->get();
        $status = Status::orderBy('nama', 'ASC')->get();
        return view('aset/create', compact('kategori','merek','jenis','status'));
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
            'jenis_id' => 'required',
            'status_id' => 'required'
    	]);
 
        DB::table('asets')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'merek_id' => $request->merek_id,
            'kategori_id' => $request->kategori_id,
            'jenis_id' => $request->jenis_id,
            'status_id' => $request->status_id,
        ]);
 
    	return redirect('/posisi')
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
        $jenis = Jenis::orderBy('nama', 'ASC')->get();
        $letak = Letak::orderBy('nama', 'ASC')->get();
        $status = Status::orderBy('nama', 'ASC')->get();
        return view('aset.show', compact('aset','merek','kategori','jenis','letak','status'));
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
        $jenis = Jenis::orderBy('nama', 'ASC')->get();
        $letak = Letak::orderBy('nama', 'ASC')->get();
        $status = Status::orderBy('nama', 'ASC')->get();
        return view('aset.edit', compact('aset','kategori','merek','jenis','letak','status'));
    }

    public function edita($id)
    {
        //
        $aset = Aset::findOrFail($id);
        $merek = Merek::orderBy('nama', 'ASC')->get();
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $jenis = Jenis::orderBy('nama', 'ASC')->get();
        $letak = Letak::orderBy('nama', 'ASC')->get();
        $status = Status::orderBy('nama', 'ASC')->get();
        return view('aset.edita', compact('aset','kategori','merek','jenis','letak','status'));
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
            //'id' => 'required',
            'nama' => 'required',
    		'deskripsi' => 'required',
            'merek_id' => 'required',
            'kategori_id' => 'required',
            'jenis_id' => 'required',
            'letak_id' => 'required',
            'status_id' => 'required'
    	]);
 
        $aset = Aset::findOrFail($id);
        $aset->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'merek_id' => $request->merek_id,
            'kategori_id' => $request->kategori_id,
            'jenis_id' => $request->jenis_id,
            //'letak_id' => $request->letak_id,
            'status_id' => $request->status_id,
        ]);

        DB::table('aset_letak')->insert([
            'aset_id' => $id,
            'letak_id' => $request->letak_id,
        ]);
 
    	return redirect('/posisi')
            ->with('success_message', 'Berhasil mengganti aset');
    }

    public function updatea(Request $request,$id)
    {
        //
        
        $this->validate($request,[
            //'id' => 'required',
            'nama' => 'required',
    		'deskripsi' => 'required',
            'merek_id' => 'required',
            'kategori_id' => 'required',
            'jenis_id' => 'required',
            'letak_id' => 'required',
            'status_id' => 'required'
    	]);
 
        $aset = Aset::findOrFail($id);
        //$aset->update([
        //    'nama' => $request->nama,
        //    'deskripsi' => $request->deskripsi,
        //    'merek_id' => $request->merek_id,
        //    'kategori_id' => $request->kategori_id,
        //    'jenis_id' => $request->jenis_id,
        //    'status_id' => $request->status_id,
        //]);

        DB::table('aset_letak')->insert([
            'aset_id' => $id,
            'letak_id' => $request->letak_id,
        ]);
 
    	return redirect('/posisi')
            ->with('success_message', 'Berhasil Menambhakan Lokasi aset');
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
