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
                        <form action="<?= base_url('admin/absen_user_etowa') ?>" method="POST" class="col-md-12  text-right">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select select2bs4 col mr-2" id="users" name="users">
                                    <option value="">Filter</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_finger']; ?>"><?= "nama : " . $u['name'] . "  BET : " . $u['id_finger'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="month" class="form-control col mr-2" id="filter" name="filter">
                                <a href="" class="btn btn-danger mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-file-download fa-2x"></i></a>
                                <!-- <a href="" class="btn btn-danger mr-2 center" data-toggle="modal" data-target="#modal-xldateRekap"><i class="fas fa-file-download fa-2x"></i></a> -->

                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Badge</th>
                                    <th>date</th>
                                    <th>time</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($absen as $u) :
                                    $i++;
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $u['name']; ?></td>
                                        <td class="text-center"><?= $u['id_bet']; ?></td>
                                        <td class="text-center"><?= $u['date'] ?></td>
                                        <td class="text-center"><?= $u['time']; ?></td>
                                        <!-- <td class="text-center"> <a href="<?= base_url() ?>/admin/deleteVisitor/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a></td> -->

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>BET</th>
                                    <th>date</th>
                                    <th>time</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

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
                <h4 class="modal-title">Download File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class="was-validated" -->
            <form action="<?= base_url() ?>/admin/report_absen" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="jumlah">Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control rageDate" id="date" name="date" value="<?= date("m/d/Y") ?> - <?= date("m/d/Y") ?>" required />
                                    </div>
                                </div>

                                <script>
                                    $(function() {
                                        $('input[name="date"]').daterangepicker({
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
            <form action="<?= base_url() ?>/admin/report_absen" method="POST" enctype="multipart/form-data">
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
<script>
    function ubah(nik) {
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/blok_akses') ?>",
            data: {
                'nik': nik,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.stts == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Proses Berhasil...!',
                        text: `${response.msg}, Have a nice day...!`
                    })
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Proses Berhasil...!',
                        text: `${response.msg}, Ulang Kembali...!`

                    })
                }
            },
            error: function(xhr, opsi, errors) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + errors);
            }
        });
    }
</script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<!-- modal barang add -->

<?= $this->endSection(); ?>