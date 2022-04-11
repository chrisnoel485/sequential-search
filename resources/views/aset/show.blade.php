@extends('adminlte::page')

@section('title', 'Detail Letak')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">                      
            <h1 class="m-0 text-dark">Manajemen Letak</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Letak</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Letak</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Letak</label>
                                <input type="text" name="nama" value="{{ $letak['nama'] }}" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control" disabled>{{ $letak->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                    <select disabled name="kategori_id" id="kategori_id" 
                                        required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                        <option value="" >Pilih</option>
                                        @foreach ($kategori as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $letak->kategori_id ? 'selected':'' }}>
                                                {{ ucfirst($row->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ URL::to('letak') }}" class="btn btn-outline-info">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
