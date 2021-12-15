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
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select col mr-2" id="kategori" name="kategori">
                                    <option value="">Filter</option>


                                </select>
                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                                <a href="" class="btn btn-info mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-square fa-2x"></i></a>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Shift</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>
                                    <th>Start Istirahat</th>
                                    <th>Stop Istirahat</th>
                                    <th>Create</th>
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($visitor as $u) :
                                    $i++ ?>
                                    <tr>
                                        <td class="text-center"><?= $u['shift']; ?></td>
                                        <td class="text-center">Pukul <?= $u['masuk']; ?> WIB</td>
                                        <td class="text-center">Pukul <?= $u['keluar'] ?> WIB</td>
                                        <td class="text-center">Pukul <?= $u['m_rest'] ?> WIB</td>
                                        <td class="text-center">Pukul <?= $u['s_rest']; ?> WIB</td>
                                        <td class="text-center"><?= $u['create'] ?></td>
                                        <td class="text-center"><?= $u['update']; ?></td>

                                        <td class="text-center">
                                            <a href="" class="badge badge-warning m-1" data-toggle="modal" data-target="#modal-xl<?= $u['id'] ?>"><i class="fas fa-edit fa-2x"></i></a>
                                            <a href="<?= base_url() ?>/admin/delete_shift/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                        </td>
                                    </tr>
                                    <!-- modal barang edit -->
                                    <div class="modal fade" id="modal-xl<?= $u['id'] ?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Form</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="<?= base_url() ?>/admin/edit_shift/<?= $u['id'] ?>" method="POST" enctype="multipart/form-data">
                                                    <?= csrf_field() ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="shift">Shift</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="shift" name="shift" value="<?= $u['shift']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="in">IN</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control timepicker" type="text" id="in" name="in" value="<?= $u['masuk']; ?>" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="out">OUT</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control timepicker" type="text" id="out" name="out" value="<?= $u['keluar']; ?>" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="m_rest">Mulai istirahat</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control timepicker" type="text" id="m_rest" name="m_rest" value="<?= $u['m_rest']; ?>" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="s_rest">Selesai Istirahat</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control timepicker" type="text" id="s_rest" name="s_rest" value="<?= $u['s_rest']; ?>" required />
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
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Shift</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>
                                    <th>Start Istirahat</th>
                                    <th>Stop Istirahat</th>
                                    <th>Create</th>
                                    <th>Update</th>
                                    <th>Action</th>
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
                <h4 class="modal-title">ADD Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class="was-validated" -->
            <form action="<?= base_url() ?>/admin/add_shift" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="shift">Shift</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="shift" name="shift" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="in">IN</label>
                                    <div class="input-group">
                                        <input class="form-control timepicker" type="text" id="in" name="in" value="00:00" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="out">OUT</label>
                                    <div class="input-group">
                                        <input class="form-control timepicker" type="text" id="out" name="out" value="00:00" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="m_rest">Mulai istirahat</label>
                                    <div class="input-group">
                                        <input class="form-control timepicker" type="text" id="m_rest" name="m_rest" value="00:00" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="s_rest">Selesai Istirahat</label>
                                    <div class="input-group">
                                        <input class="form-control timepicker" type="text" id="s_rest" name="s_rest" value="00:00" required />
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
<?= $this->endSection(); ?>