    @extends('admin.layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Pesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Tiket</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($dataPesanan) > 0) : ?>
                                        <?php foreach ($dataPesanan as $list) : ?>
                                            
                                            <?php $date = date('d/m/Y H:i A', strtotime($list->tanggal_pesanan));?>
                                            <tr>
                                                <td><?= $list->tiket_id ?></td>
                                                <td><?= $list->nama_pemesan ?></td>
                                                <td><?= $list->email ?></td>
                                                <td><?= $date ?></td>
                                                <td>
                                                    <form action="{{ route('validasiTiket') }}" method="POST">
                                                        @csrf
                                                        <select name="validasi" class="custom-select form-control-border border-width-2" onchange="this.form.submit()">
                                                            <?php if ($list->status_pesanan == 'registrasi'): ?>
                                                                <option value="<?= $list->status_pesanan ?>" selected>registrasi</option>
                                                                <option value="tervalidasi">tervalidasi</option>
                                                            <?php else : ?>
                                                                <option value="registrasi">registrasi</option>
                                                                <option value="<?= $list->status_pesanan ?>" selected>tervalidasi</option>
                                                            <?php endif ?>
                                                        </select>
                                                        <input type="hidden" name="tiket_id" value="<?= $list->tiket_id ?>">
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default-<?= $list->tiket_id ?>">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="deleteId" value="<?= $list->tiket_id ?>">
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-default-<?= $list->tiket_id ?>">
                                                <form action="{{ route('updateData') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="idUpdate" value="<?= $list->tiket_id ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Detail Tiket</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="namaLengkap">Tiket ID</label>
                                                                    <input type="number" class="form-control" name="tiketId" placeholder="Tiket ID" value="<?= $list->tiket_id ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="namaLengkap">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap" value="<?= $list->nama_pemesan ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email address</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="<?= $list->email ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Pilih Tanggal Dan Jam:</label>
                                                                    <div class="input-group date" id="reservationdatetime<?= $list->tiket_id ?>" data-target-input="nearest">
                                                                        <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime<?= $list->tiket_id ?>" value="<?= $date ?>" />
                                                                        <div class="input-group-append" data-target="#reservationdatetime<?= $list->tiket_id ?>" data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Status:</label>
                                                                    <select name="validasi" class="custom-select form-control-border border-width-2">
                                                                        <?php if ($list->status_pesanan == 'registrasi'): ?>
                                                                            <option value="<?= $list->status_pesanan ?>" selected>registrasi</option>
                                                                            <option value="tervalidasi">tervalidasi</option>
                                                                        <?php else : ?>
                                                                            <option value="registrasi">registrasi</option>
                                                                            <option value="<?= $list->status_pesanan ?>" selected>tervalidasi</option>
                                                                        <?php endif ?>
                                                                    </select>
                                                                </div>

                                                                @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                @endif
                                                                @if (Session()->has('fail'))
                                                                <script>                                                                    
                                                                    var pesan = '<?= Session()->get('fail'); ?>';
                                                                    alert(pesan);
                                                                </script>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update Data</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                </form>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td class="text-center" colspan="6">
                                                Masih Belum Ada Pesanan
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if(session('update'))
    <script>
        var pesan = '<?= session('update'); ?>';
        alert(pesan);
    </script>
    @endif

    @if(session('fail'))
    <script>
        var pesan = '<?= session('fail'); ?>';
        alert(pesan);
    </script>
    @endif
    @endsection