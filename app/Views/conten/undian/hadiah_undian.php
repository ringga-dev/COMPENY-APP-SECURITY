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
                        <form action="<?= base_url('AdminControl/produc') ?>" method="POST" class="col-md-12  text-right m-2">
                            <div class=" text-right">
                                <a href="" class="btn btn-info mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-square fa-2x"></i></a>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barang</th>
                                    <th>creat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1;
                                foreach ($user as $u) :
                                ?>
                                    <tr>

                                        <td><?= $i++ ?></td>
                                        <td><?= $u['barang']; ?></td>
                                        <td><?= $u['create']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>/home/delete_hadia/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Barang</th>
                                    <th>creat</th>
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
            <form action="<?= base_url() ?>/home/add_hadiah" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="harga">Barang</label>
                                    <div class="input-group">
                                        <textarea name="barang" id="barang" cols="30" style="width: 100%;"></textarea>
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
</div>
<!-- /.modal-content -->
<?= $this->endSection(); ?>