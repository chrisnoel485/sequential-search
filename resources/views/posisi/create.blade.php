@extends('layouts.master')
@section('title', 'Tambah Posisi')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">                      
            <h1 class="m-0 text-dark">Manajemen Posisi</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Posisi</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Posisi</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('posisi.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Aset</label>
                                        <select name="aset_id" id="aset_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($aset as $row)
                                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Posisi</label>
                                        <select name="posisi_id" id="posisi_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($posisi as $row)
                                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('posisi_id') }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ URL::to('posisi') }}" class="btn btn-outline-info">Kembali</a>
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
