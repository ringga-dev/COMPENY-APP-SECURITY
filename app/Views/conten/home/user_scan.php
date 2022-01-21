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
                        <style>
                            th {
                                width: auto;
                                height: auto;
                            }
                        </style>

                        <form action="<?= base_url('admin/all_users') ?>" method="POST" class="col-md-12  text-right">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select col-lg-6 mr-2 select2bs4" id="id" name="id">
                                    <option value="">Filter</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id']; ?>"><?= "nama : " . $u['name'] . "  BET : " . $u['id_bet'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="date" class="form-control col-lg-5 mr-2" id="filter" name="filter">
                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                            </div>

                        </form>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>DEVISI</th>
                                    <th>BADGE</th>
                                    <th>KELUAR</th>
                                    <th>MASUK KEMBALI</th>
                                    <th>LAMA</th>
                                    <th>DARI</th>
                                    <th>MENUJU</th>
                                    <th>REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($scan as $s) :
                                    $i++ ?>
                                    <tr>
                                        <td><?= $s['name']; ?></td>
                                        <td><?= $s['devisi']; ?></td>
                                        <td><?= $s['id_bet']; ?></td>
                                        <td><?= $s['w_keluar'] ? date('d-M-Y h:i:s A', $s['w_keluar']) : ""; ?></td>
                                        <td><?= $s['w_masuk'] ? date('d-M-Y h:i:s A', $s['w_masuk']) : ""; ?></td>
                                        <td><?= ($s['w_masuk'] - $s['w_keluar']) / 60 <= 0 ? "sedang berjalan" : round(($s['w_masuk'] - $s['w_keluar']) / 60 / 60, 2) . " Jam" ?> </td>
                                        <td><?= $s['dari']; ?></td>
                                        <td><?= $s['menuju']; ?></td>
                                        <td><?= $s['remarks']; ?></td>

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
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<!-- modal barang add -->

<?= $this->endSection(); ?>