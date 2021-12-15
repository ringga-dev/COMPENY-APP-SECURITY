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
                                    <th>NIK</th>
                                    <th>username</th>
                                    <th>Full Name</th>
                                    <th>Position</th>
                                    <th>Login STATUS</th>
                                    <th>Create</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($user as $u) :
                                    $i++ ?>
                                    <tr>
                                        <td><?= $u['nik']; ?></td>
                                        <td><?= $u['username']; ?></td>
                                        <td><?= $u['fullname']; ?></td>
                                        <td><?= $u['position']; ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" <?= cek_blok($u['nik']); ?> onclick="ubah('<?= $u['nik'] ?>')">
                                                </label>
                                            </div>
                                        </td>
                                        <td><?= $u['create']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>/admin/deleteUser/<?= $u['nik']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NIK</th>
                                    <th>username</th>
                                    <th>Full Name</th>
                                    <th>Position</th>
                                    <th>Login STATUS</th>
                                    <th>Create</th>
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
<script>
    function ubah(nik) {

        // console.log(nik)
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

<?= $this->endSection(); ?>