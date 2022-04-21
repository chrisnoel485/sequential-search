@extends('layouts.master')

@section('title', 'Tambah Jenis')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">                      
            <h1 class="m-0 text-dark">Manajemen Jenis</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Jenis</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Jenis</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('jenis.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Jenis</label>
                                    <input type="text" name="nama" placeholder="Masukkan Nama Jenis" class="form-control" >
                                    @if($errors->has('nama'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" placeholder="Masukkan Deskripsi jenis" class="form-control"></textarea>
                                    @if($errors->has('deskripsi'))
                                        <div class="text-danger">
                                            {{ $errors->first('deskripsi')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <a href="{{ URL::to('jenis') }}" class="btn btn-outline-info">Kembali</a>
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
