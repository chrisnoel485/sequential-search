@extends('layouts.master')
@section('title')
    <title>Edit Jenis</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
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
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Jenis</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="nama">Nama Jenis</label>
                                    <input type="text" name="nama" value="{{ $jenis->nama }}" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}">{{ $jenis->deskripsi }}</textarea>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ URL::to('jenis') }}" class="btn btn-outline-info">Kembali</a>
                                    <input type="submit" value="Update" class="btn btn-primary pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        </section>
    </div>
@stop
