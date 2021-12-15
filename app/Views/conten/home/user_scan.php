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
                    <div class="card-body md-2">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>DEVISI</th>
                                    <th>ID BET</th>
                                    <th>KELUAR</th>
                                    <th>MASUK KEMBALI</th>
                                    <th>LAMA</th>
                                    <th>DARI</th>
                                    <th>MENUJU</th>
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($scan as $u) :
                                    $i++ ?>
                                    <tr>
                                        <td><?= $u['name']; ?></td>
                                        <td><?= $u['devisi']; ?></td>
                                        <td><?= $u['id_bet']; ?></td>
                                        <td><?= $u['w_keluar'] ? date('d-M-Y h:i:s A', $u['w_keluar']) : ""; ?></td>
                                        <td><?= $u['w_masuk'] ? date('d-M-Y h:i:s A', $u['w_masuk']) : ""; ?></td>
                                        <td><?= ($u['w_masuk'] - $u['w_keluar']) / 60 < 0 ? "sedang berjalan" : round(($u['w_masuk'] - $u['w_keluar']) / 60, 2) . " menit" ?> </td>
                                        <td><?= $u['dari']; ?></td>
                                        <td><?= $u['menuju']; ?></td>
                                        <td><?= $u['date']; ?></td>


                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NAME</th>
                                    <th>DEVISI</th>
                                    <th>ID BET</th>
                                    <th>KELUAR</th>
                                    <th>MASUK KEMBALI</th>
                                    <th>LAMA</th>
                                    <th>DARI</th>
                                    <th>MENUJU</th>
                                    <th>DATE</th>
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
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/blok_akses') ?>",
            data: {
                'bet': nik,
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