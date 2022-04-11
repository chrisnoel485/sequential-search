@extends('adminlte::page')

@section('title', 'Daftar Aset')

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
                    <div>
                        <h3 class="card-title">Data Aset</h3>
                    </div>
                    <div class="card-tools">
                        <a href="/aset/create" class="btn btn-primary">Input Aset Baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Aset</th>
                                        <th class="text-center">Letak</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
						            @foreach($aset as $a)
						                <tr>
							                <td>{{ $a->nama }}</td>
							                <td>
								                <ul>
									                @foreach($a->letak as $h)
									                    <li> {{ $h->nama}} </li>
									                @endforeach
								                </ul>
							                </td>
						                </tr>
						            @endforeach
					            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
