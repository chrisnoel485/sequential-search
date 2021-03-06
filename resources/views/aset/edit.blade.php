@extends('layouts.master')
@section('title')
    <title>Edit Aset</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
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
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Aset</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('aset.update', $aset->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="nama">Nama Aset</label>
                                    <input type="text" name="nama" value="{{ $aset->nama }}" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}">{{ $aset->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Merek </label>
                                        <select name="merek_id" id="merek_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($merek as $row)
                                                <option value="{{ $row->id }}" {{ $row->id == $aset->merek_id ? 'selected':'' }}>
                                                    {{ ucfirst($row->nama) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('merek_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori </label>
                                        <select name="kategori_id" id="kategori_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($kategori as $row)
                                                <option value="{{ $row->id }}" {{ $row->id == $aset->kategori_id ? 'selected':'' }}>
                                                    {{ ucfirst($row->nama) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis </label>
                                        <select name="jenis_id" id="jenis_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($jenis as $row)
                                                <option value="{{ $row->id }}" {{ $row->id == $aset->jenis_id ? 'selected':'' }}>
                                                    {{ ucfirst($row->nama) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('jenis_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Status </label>
                                        <select name="status_id" id="status_id" 
                                            required class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                            <option value="">Pilih</option>
                                            @foreach ($status as $row)
                                                <option value="{{ $row->id }}" {{ $row->id == $aset->status_id ? 'selected':'' }}>
                                                    {{ ucfirst($row->nama) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('status_id') }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ URL::to('aset') }}" class="btn btn-outline-info">Kembali</a>
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
