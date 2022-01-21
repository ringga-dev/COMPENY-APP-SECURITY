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
                        <form action="<?= base_url('admin/failed_for_finger') ?>" method="POST" class="col-md-12  text-right m-2">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select col mr-2" id="kategori" name="kategori">
                                    <option value="">Filter</option>


                                </select>
                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                                <a href="" class="btn btn-info mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-square fa-2x"></i></a>
                                <a href="<?= base_url('home/save_pdf'); ?>" class="btn btn-success mr-2 center"><i class="fas fa-file-pdf fa-2x"></i></a>
                                <a href="<?= base_url('home/qrcode'); ?>" class="btn btn-info mr-2 center"><i class="fas fa-print fa-2x"></i></a>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>QR</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Lot</th>
                                    <th>Dec</th>
                                    <th>Create</th>
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($qr_location as $u) :
                                    $i++ ?>
                                    <tr>
                                        <td class="text-center"><?= $u['qr']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            $nama = $u['qr'];
                                            //quick and simple:
                                            $lokasi = base_url("assets/image/qr/$nama.png");
                                            ?>
                                            <img class="ok-download" src="<?= $lokasi ?>" />

                                        </td>
                                        <td class="text-center"><?= $u['stts']; ?></td>
                                        <td class="text-center"><?= $u['lot']; ?></td>
                                        <td class="text-center"><?= $u['dec']; ?></td>
                                        <td class="text-center"><?= $u['create']; ?></td>
                                        <td class="text-center"><?= $u['update']; ?></td>
                                        <td class="text-center">
                                            <a href="" class="badge badge-warning m-1" data-toggle="modal" data-target="#modal-xl<?= $u['id'] ?>"><i class="fas fa-edit fa-2x"></i></a>
                                            <?php
                                            if (session()->get('role') == "admin") :
                                            ?>
                                                <a href="<?= base_url() ?>/admin/deleteQR/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <!-- modal barang edit -->
                                        <div class="modal fade" id="modal-xl<?= $u['id'] ?>">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Form</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- class="was-validated" -->
                                                    <form action="<?= base_url() ?>/admin/edit_qr/<?= $u['id'] ?>" method="POST" enctype="multipart/form-data">
                                                        <?= csrf_field() ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="harga">Title</label>
                                                                            <div class="input-group">
                                                                                <textarea class="summernote" name="stts" id="stts" cols="30" style="width: 100%;"><?= $u['stts'] ?></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="jumlah">lot</label>
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control" id="lokasi" name="lokasi" value="<?= $u['lot'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="dec">Keterangan</label>
                                                                            <div class="input-group">
                                                                                <textarea class="summernote" id="dec" name="dec" cols="30" style="width: 100%;"><?= $u['dec'] ?></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <!-- <div class="form-group">
                                                                                <label for="jumlah">LOKASI</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control col-lg-6" id="lat" name="lat" placeholder="Latitude" required>
                                                                                    <input type="text" class="form-control col-lg-6" id="long" name="long" placeholder="Longitude" required>
                                                                                </div>
                                                                            </div> -->

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
                                        </div>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>QR</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Lot</th>
                                    <th>Dec</th>
                                    <th>Create</th>
                                    <th>Update</th>
                                    <th>Action</th>
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
            <form action="<?= base_url() ?>/admin/add_qr_loc" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_barang">QR-Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="gr_code" name="gr_code" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Title</label>
                                    <div class="input-group">
                                        <textarea class="summernote" name="stts" id="stts" cols="30" style="width: 100%;"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">lot</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="lokasi" name="lokasi" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dec">Keterangan</label>
                                    <div class="input-group">
                                        <!-- <textarea class="mytextarea" id="area1" name="dec" cols="30" style="width: 100%;"></textarea> -->
                                        <textarea class="summernote" id="dec" name="dec" cols="30" style="width: 100%;"></textarea>
                                    </div>
                                </div>



                                <!-- <div class="form-group">
                                    <label for="jumlah">LOKASI</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control col-lg-6" id="lat" name="lat" placeholder="Latitude" required>
                                        <input type="text" class="form-control col-lg-6" id="long" name="long" placeholder="Longitude" required>
                                    </div>
                                </div> -->

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
</div>
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
<!-- /.modal-content -->
<?= $this->endSection(); ?>