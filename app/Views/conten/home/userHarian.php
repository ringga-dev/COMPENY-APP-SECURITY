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
                        <div class="row">
                            <!-- <form method="post" action="<?= base_url() ?>/Admin/simpanExcel" enctype="multipart/form-data" class="col-md-3 text-right">
                                <div class="row text-right ml-2 mr-2">
                                    <input type="file" class="form-control-file col" name="fileexcel" id="fileexcel">
                                    <button class="btn btn-primary " type="submit">Upload</button>
                                    <a href="<?= base_url('exp_file/data.xlsx') ?>" class="btn btn-info mr-2 ml-2 center"><i class="fas fa-download fa-2x"></i></a>

                                </div>
                            </form> -->

                            <form action="<?= base_url('AdminControl/produc') ?>" method="POST" class="col-md-12  text-right">


                                <a href="" class="btn btn-info mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-square fa-2x"></i></a>

                            </form>
                        </div>
                    </div>
                    <div class="m-3">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Badge</th>
                                    <th>Email</th>
                                    <!-- <th>Phone</th> -->
                                    <th>Devisi</th>
                                    <th>BPJS</th>
                                    <th>Created</th>
                                    <th>Created_by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($user as $u) :
                                    $i++ ?>
                                    <tr>
                                        <td class="text-center"><?= $u['name']; ?></td>
                                        <td class="text-center"><?= $u['id_bet']; ?></td>
                                        <td class="text-center"><?= $u['email']; ?></td>
                                        <!-- <td class="text-center"><?= $u['no_phone']; ?></td> -->
                                        <td class="text-center"><?= $u['devisi']; ?></td>
                                        <td class="text-center"> <a href="" class="badge badge m-1" data-toggle="modal" data-target="#modal-bpjs<?= $u['id'] ?>"><img width="30" height="30" class="m-0 p-0" src="<?= base_url() ?>/assest/logo/bpjs.png" alt="bpjs logo"></a> <?= rupiah(getBPJS($u['id_bet'])); ?></td>
                                        <td class="text-center"><?= $u['created']; ?></td>
                                        <td class="text-center"><?= $u['created_by']; ?></td>


                                        <td class="text-center">

                                            <a href="" class=" badge badge-warning m-1" data-toggle="modal" data-target="#modal-gaji<?= $u['id'] ?>"><i class="fas fa-file-pdf fa-2x"></i></a>
                                            <a href="" class=" badge badge-warning m-1" data-toggle="modal" data-target="#modal-xl<?= $u['id'] ?>"><i class="fas fa-edit fa-2x"></i></a>
                                            <a target="_blank" href="<?= base_url('admin/generate_badge_harian?name=' . $u['name'] . "&badge=" . $u['id_bet'] . "&action=userApp"); ?>" class="badge badge-success mr-2 center"><i class="fas fa-file-pdf fa-2x"></i></a>
                                            <?php
                                            if (session()->get('role') == "admin") :
                                            ?>
                                                <a href="<?= base_url() ?>/admin/deleteUserApp/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <!-- modal barang edit -->
                                    <div class="modal fade" id="modal-xl<?= $u['id'] ?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">UPDATE USER</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="<?= base_url() ?>/admin/edit_userAppHarian/<?= $u['id'] ?>" method="POST" enctype="multipart/form-data">
                                                    <?= csrf_field() ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label for="nama_barang">Name</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $u['name']; ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="harga">Badge</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" id="id_bet" name="id_bet" value="<?= $u['id_bet']; ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="id_finger">Id Finger</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" id="id_finger" name="id_finger" required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="jumlah">Email</label>
                                                                                    <div class="input-group">
                                                                                        <input type="email" class="form-control" id="email" name="email" value="<?= $u['email']; ?>" required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="jumlah">Number Phone</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control" id="no_phone" name="no_phone" value="<?= $u['no_phone']; ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="jumlah">Devisi</label>
                                                                                    <select type="text" class="custom-select rounded-0 devisi" id="devisi" name="devisi">
                                                                                        <option class="bg-blue" value="<?= $u['devisi']; ?>"><?= $u['devisi']; ?></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <!-- /.col (RIGHT) -->
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
                                    <div class="modal fade" id="modal-gaji<?= $u['id'] ?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Create Bulan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="<?= base_url('/home/export_user_harian?badge=' . $u['id_bet']) ?>" method="POST" enctype="multipart/form-data">
                                                    <?= csrf_field() ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label for="nama_barang">waktu</label>
                                                                                    <div class="input-group">
                                                                                        <input type="month" class="form-control" id="waktu" name="waktu" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col (RIGHT) -->
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
                                    <div class="modal fade" id="modal-bpjs<?= $u['id'] ?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Create BPJS</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="<?= base_url() ?>/admin/bpjs_user/<?= $u['id_bet'] ?>" method="POST" enctype="multipart/form-data">
                                                    <?= csrf_field() ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label for="nama_barang">Nominal</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control" id="nominal" name="nominal" value="<?= getBPJS($u['id_bet']) ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col (RIGHT) -->
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
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- ./card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<!-- modal userapp add -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ADD USER</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class="was-validated" -->
            <form action="<?= base_url() ?>/admin/action_user_harian" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_barang">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Badge</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="id_bet" name="id_bet" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Number Phone</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="no_phone" name="no_phone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Devisi</label>
                                    <select type="text" class="custom-select rounded-0 devisi" id="devisi" name="devisi">
                                        <option value="">No Join to List</option>
                                    </select>
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
</div>

<script>
    function userHodApp(id) {
        $.ajax({
            type: "post",
            url: "http://localhost/mobile/public/admin/blok_akses_userapp_hod",
            data: {
                'id': id,
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
                        text: `${response.msg}, Have a nice day...!`
                    })
                }
            },
            error: function(xhr, opsi, errors) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + errors);
            }
        });
    }

    function userApp(id) {

        // console.log(nik)
        $.ajax({
            type: "post",
            url: "http://localhost/mobile/public/admin/blok_akses_userapp",
            data: {
                'id': id,
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
                        text: `${response.msg}, Have a nice day...!`
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
    $.ajax({
        type: "post",
        url: "<?= base_url('globalview/devisi') ?>",
        dataType: "json",
        success: function(response) {
            console.log(response)
            response.forEach(function(data) {
                $('.devisi').append(`<option value="${data.privilege_name}">
                                   ${data.privilege_name}
                                  </option>`);
            })

        }
    });
</script>

<?= $this->endSection(); ?>