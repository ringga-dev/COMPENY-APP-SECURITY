<?= $this->extend('base_ui/ui_tamplate'); ?>
<?= $this->extend('base_ui/base_menu'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Menuju</th>
                                    <th>Dari</th>
                                    <th>Keluar</th>
                                    <th>Masuk</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($visitor as $u) :
                                    $i++ ?>
                                    <tr>
                                        <td class="text-center"><?= $u['name']; ?></td>
                                        <td class="text-center"><?= $u['menuju']; ?></td>
                                        <td class="text-center"><?= $u['dari']; ?></td>
                                        <td class="text-center"><?= $u['w_keluar'] ? date('d-M-Y H:i:s', $u['w_keluar']) : "" ?></td>
                                        <td class="text-center"><?= $u['w_masuk'] ? date('d-M-Y H:i:s', $u['w_masuk']) : "" ?></td>
                                        <td class="text-center"><?= $u['date']; ?></td>
                                        <!-- <td class="text-center"> <a href="<?= base_url() ?>/admin/deleteVisitor/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a></td> -->

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Menuju</th>
                                    <th>Dari</th>
                                    <th>Keluar</th>
                                    <th>Masuk</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- ./card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<!-- modal barang add -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ADD Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class="was-validated" -->
            <form action="<?= base_url() ?>/admin/add_visitor" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_barang">name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">jadwal</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control col-lg-6" id="date" name="date" required>
                                        <input type="time" class="form-control col-lg-6" id="time" name="time" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">QR Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="qr_code" name="qr_code" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Keperluan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">description</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>


    </div>
    <!-- /.modal-content -->

</div>
<script>
    function image(imageSrc) {
        window.open(imageSrc)
    }
</script>
<?= $this->endSection(); ?>