@extends('layouts.master')
@section('title')
    <title>Daftar Letak</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
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
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Data Letak</h3>
                    </div>
                    <div class="card-tools">
                        <a href="/letak/create" class="btn btn-primary">Input Letak Baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Letak</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse($letak as $p)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $p->nama }}</td>
                                        <td class="text-center">{{ $p->deskripsi }}</td>
                                        <td class="text-center">{{ $p->kategori->nama }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('letak.destroy', $p->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                    <div class="btn-group">
                                                        <a class="btn btn-info" href="{{ route('letak.show', $p->id) }}"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-success" href="{{ route('letak.edit', $p->id) }}"><i class="fa fa-edit"></i></a>
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
    </div>
        </section>
    </div>
@stop
