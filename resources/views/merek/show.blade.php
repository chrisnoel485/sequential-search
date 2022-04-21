@extends('layouts.master')

@section('title', 'Detail Merek')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">                      
            <h1 class="m-0 text-dark">Manajemen Merek</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Merek</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Merek</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                                <div class="form-group">
                                    <label for="nama">Nama Merek</label>
                                    <input type="text" name="nama" value="{{ $merek['nama'] }}" class="form-control" disabled />
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control" disabled>{{ $merek->deskripsi }}</textarea>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ URL::to('merek') }}" class="btn btn-outline-info">Kembali</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
