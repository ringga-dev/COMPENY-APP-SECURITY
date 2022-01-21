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
                        <form action="<?= base_url('admin/visitor') ?>" method="POST" class="col-md-12  text-right m-2">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select col mr-2" id="filter" name="filter">
                                    <option value="">Filter</option>
                                    <option value="plan">plan</option>
                                    <option value="berjalan">berjalan</option>
                                    <option value="selesai">selesai</option>
                                </select>
                                <a href="" class="btn btn-danger mr-2 center" data-toggle="modal" data-target="#modal-xldateRekap"><i class="fas fa-file-download fa-2x"></i></a>
                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                                <a href="" class="btn btn-info mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-square fa-2x"></i></a>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Timetable</th>
                                    <th>STTS</th>
                                    <th>IMAGE QR</th>
                                    <th>Necessities</th>
                                    <th>Meet</th>
                                    <th>Description</th>
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>LAMA</th>
                                    <th>Create</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($visitor as $u) :
                                    if ($u['id_user'] == 'plan') {
                                        $color = "style='background-color: #03d3fc;'";
                                    } elseif ($u['id_user'] == 'berjalan') {
                                        $color = "style='background-color: #fcd303;'";
                                    } else {
                                        $color = "style='background-color: #03fc30;'";
                                    }
                                    $i++ ?>
                                    <tr>
                                        <td class="text-center" <?= $color ?>><?= $u['nama']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['jadwal']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['id_user']; ?></td>
                                        <td class="text-center" <?= $color ?>>
                                            <?php
                                            $nama = $u['qr_code'];
                                            //quick and simple:
                                            $lokasi = base_url("assets/image/qr_visitor/$nama.png");
                                            ?>
                                            <img class="ok-download" src="<?= $lokasi ?>" />

                                        </td>
                                        <td class="text-center" <?= $color ?>><?= $u['keperluan']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['bertemu']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['description']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['masuk'] ? date('d-M-Y H:i:s', $u['masuk']) : "" ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['keluar'] ? date('d-M-Y H:i:s', $u['keluar']) : "" ?></td>
                                        <td class="text-center" <?= $color ?>><?php
                                                                                if (!$u['masuk']) {
                                                                                    echo "Menunggu visitor";
                                                                                } elseif (!$u['keluar']) {
                                                                                    echo "Berada di lokasi";
                                                                                } else {
                                                                                    if (($u['keluar'] - $u['masuk']) / 60 <= 0) {
                                                                                        echo "sedang berjalan";
                                                                                    } else {
                                                                                        echo round(($u['keluar'] - $u['masuk']) / 60 / 60, 2) . " Jam";
                                                                                    }
                                                                                }
                                                                                ?> </td>
                                        <td class="text-center" <?= $color ?>><?= $u['create']; ?></td>
                                        <td class="text-center" <?= $color ?>>
                                            <?php
                                            if (session()->get('role') == "admin") :
                                            ?>
                                                <a href="<?= base_url() ?>/admin/deleteVisitor/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

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

<!-- Rekap data absen -->
<div class="modal fade" id="modal-xldateRekap">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Beck Up Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class="was-validated" -->
            <form action="<?= base_url() ?>/home/save_visitor_pdf" target="_blank" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="jumlah">Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control rageDate" id="dateRekap" name="dateRekap" value="<?= date("m/d/Y") ?> - <?= date("m/d/Y") ?>" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="stts">Status Visitor</label>
                                        <select class="form-control" id="stts" name="stts">
                                            <option value="all">ALL</option>
                                            <option value="plan">PLAN</option>
                                            <option value="berjalan">WALK</option>
                                            <option value="selesai">FINISHED</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                    </div>

                                </div>

                                <script>
                                    $(function() {
                                        $('input[name="dateRekap"]').daterangepicker({
                                            opens: 'left'
                                        }, function(start, end, label) {
                                            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                                        });
                                    });
                                </script>
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
                                    <label for="harga">Timetable</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control col-lg-6" id="date" name="date" required>
                                        <input type="time" class="form-control col-lg-6" id="time" name="time" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Necessities</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bertemu">Meet</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="bertemu" name="bertemu" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Description</label>
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