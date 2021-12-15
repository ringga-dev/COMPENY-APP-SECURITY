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
                        <form action="<?= base_url('admin/history_patrol') ?>" method="POST" class="col-md-12  text-right">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select col mr-2" id="id" name="id">
                                    <option value="">Filter</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id']; ?>"><?= "nama : " . $u['name'] . "  BET : " . $u['id_bet'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="month" class="form-control col-lg-6 mr-2" id="filter" name="filter">
                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                                <a href="" class="btn btn-info mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-square fa-2x"></i></a>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID QR Code</th>
                                    <th>TGL</th>
                                    <th>Name</th>
                                    <th>BET ID</th>
                                    <th>No Phone</th>
                                    <th>Create</th>
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($datascan as $u) :
                                    $i++ ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $u['qr_code']; ?></td>
                                        <td class="text-center"><?= $u['tgl']; ?></td>
                                        <td class="text-center"><?= $u['name']; ?></td>
                                        <td class="text-center"><?= $u['id_bet']; ?></td>
                                        <td class="text-center"><?= $u['no_phone']; ?></td>
                                        <td class="text-center"><?= $u['create']; ?></td>
                                        <td class="text-center"><?= $u['update']; ?></td>
                                        <td class="text-center">
                                            <!-- <a href="<?= base_url() ?>/admin/deleteQR/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>ID QR Code</th>
                                    <th>TGL</th>
                                    <th>Name</th>
                                    <th>BET ID</th>
                                    <th>No Phone</th>
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
<?= $this->endSection(); ?>