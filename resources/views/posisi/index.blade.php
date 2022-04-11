@extends('adminlte::page')

@section('title', 'Daftar posisi')

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
                    <div>
                        <h3 class="card-title">Data Posisi</h3>
                    </div>
                    <div class="card-tools">
                        <a href="/posisi/create" class="btn btn-primary">Input Posisi Baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama posisi</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse($posisi as $p)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $p->nama }}</td>
                                        <td class="text-center">{{ $p->deskripsi }}</td>
                                        <td class="text-center">{{ $p->kategori->nama }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('posisi.destroy', $p->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                    <div class="btn-group">
                                                        <a class="btn btn-info" href="{{ route('posisi.show', $p->id) }}"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-success" href="{{ route('posisi.edit', $p->id) }}"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </div>
                                            </form>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop