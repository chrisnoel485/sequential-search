@extends('layouts.master')
@section('title')
    <title>Daftar Kategori</title>
@endsection

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">                      
                        <h1 class="m-0 text-dark">Manajemen Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
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
                        <h3 class="card-title">Data Kategori</h3>
                    </div>
                    <div class="card-tools">
                        <a href="/kategori/create" class="btn btn-primary">Input Kategori Baru</a>
                        <!--<a href="/kategori/import" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">Import Data</a> -->
                    </div>
                    <!-- Import Excel -->
		            <!--<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			            <div class="modal-dialog" role="document">
				            <form method="post" action="/kategori/import" enctype="multipart/form-data">
					            <div class="modal-content">
						            <div class="modal-header">
							            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						            </div>
						            <div class="modal-body">    
                                        @csrf
							            <label>Pilih file excel</label>
							                <div class="form-group">
								                <input type="file" name="file" required="required">
							                </div>
						            </div>
						            <div class="modal-footer">
							            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							            <button type="submit" class="btn btn-primary">Import</button>
						            </div>
					            </div>
				            </form>
			            </div>
        		    </div> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse($kategori as $p)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $p->nama }}</td>
                                        <td class="text-center">{{ $p->deskripsi }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('kategori.destroy', $p->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                    <div class="btn-group">
                                                        <a class="btn btn-info btn-sm" href="{{ route('kategori.show', $p->id) }}"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-success btn-sm" href="{{ route('kategori.edit', $p->id) }}"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </div>
                                            </form>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
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
