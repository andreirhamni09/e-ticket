@extends('dashboard.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Berhasil Pesan Tiket</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ID Tiket</h3>
                    </div>
                    <div class="card-body text-center">
                        <h3>{{ session('idTiket') }}</h3>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i>&ensp;Kembali</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection