@extends('adminlte::page')

@section('title', 'Tambah Aset')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">                      
            <h1 class="m-0 text-dark">Manajemen Aset</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Aset</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Aset</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('aset.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Aset</label>
                                    <input type="text" name="nama" id="nama" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" placeholder="Masukkan Deskripsi Tim" class="form-control"></textarea>
                                    @if($errors->has('deskripsi'))
                                        <div class="text-danger">
                                            {{ $errors->first('deskripsi')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Merek</label>
                                        <select name="merek_id" id="merek_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($merek as $row)
                                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                        <select name="kategori_id" id="kategori_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($kategori as $row)
                                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis</label>
                                        <select name="jenis_id" id="jenis_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($jenis as $row)
                                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('jenis_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Aset</label>
                                    <input type="text" name="status" id="status" class="form-control" >
                                </div>
                                <div class="card-footer">
                                    <a href="{{ URL::to('aset') }}" class="btn btn-outline-info">Kembali</a>
                                    <input type="submit" value="Proses" class="btn btn-primary pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
