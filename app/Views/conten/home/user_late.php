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
                        <form action="<?= base_url('admin/late_user') ?>" method="POST" class="col-md-12  text-right">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select col mr-2" id="user" name="user">
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
                                    <th>Kedatangan</th>
                                    <th>Masuk</th>
                                    <th>Shift</th>
                                    <th>Keterlambatan</th>
                                    <th>Alasan</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($visitor as $u) :
                                    $datang = date("H:i", strtotime($u['date']));
                                    $masuk = date("H:i", strtotime($u['stts'] == 1 ? $u['masuk'] : $u['s_rest']));
                                    $datang_split = explode(":", $datang);
                                    $masuk_split = explode(":", $masuk);

                                    $jam = $datang_split[0] - $masuk_split[0];
                                    $menit = $datang_split[1] - $masuk_split[1];
                                    $i++;
                                    if ($u['stts'] == 2) {
                                        $color = "style='background-color: #FFB700;'";
                                    } else {
                                        $color = "";
                                    }
                                ?>

                                    <tr <?= $color ?>>
                                        <td class="text-center"><?= $u['name']; ?></td>
                                        <td class="text-center"><?= $u['id_bet']; ?></td>
                                        <td class="text-center"><?= $u['date'] ?></td>
                                        <td class="text-center"><?= $u['stts'] == 1 ? $u['masuk'] : $u['s_rest'] ?></td>
                                        <td class="text-center"><?= $u['shift']; ?></td>
                                        <td class="text-center terlambat"> <?= $jam ?> jam <?= $menit ?> menit </td>
                                        <td class="text-center"><?= $u['alasan'] ?></td>
                                        <!-- <td class="text-center"> <a href="<?= base_url() ?>/admin/deleteVisitor/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a></td> -->

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>BET</th>
                                    <th>Kedatangan</th>
                                    <th>Masuk</th>
                                    <th>Shift</th>
                                    <th>Keterlambatan</th>
                                    <th>Alasan</th>
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

<?= $this->endSection(); ?>