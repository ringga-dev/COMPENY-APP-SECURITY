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
                        <form action="<?= base_url('admin/failed_for_finger') ?>" method="POST" class="col-md-12  text-right">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select col mr-2" id="users" name="users">
                                    <option value="">Filter</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_bet']; ?>"><?= "nama : " . $u['name'] . "  BET : " . $u['id_bet'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="month" class="form-control col-lg-6 mr-2" id="filter" name="filter">
                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>BET</th>
                                    <th>STATUS</th>
                                    <th>Keterangan</th>
                                    <th>Waktu</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($visitor as $u) :
                                    $i++;
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $u['name']; ?></td>
                                        <td class="text-center"><?= $u['id_bet']; ?></td>
                                        <td class="text-center"><?= $u['stts'] ?></td>
                                        <td class="text-center"><?= $u['keterangan']; ?></td>
                                        <td class="text-center"><?= $u['date'] ?></td>
                                        <!-- <td class="text-center"> <a href="<?= base_url() ?>/admin/deleteVisitor/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a></td> -->

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>BET</th>
                                    <th>STATUS</th>
                                    <th>Keterangan</th>
                                    <th>Waktu</th>
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

<!-- modal barang add -->

<?= $this->endSection(); ?>