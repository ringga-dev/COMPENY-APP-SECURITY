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
                        <div class="card m-3" style="width: 98%;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                    <h2>NIK : <?= $data['nik']; ?></h2>
                                </li>
                                <li class="list-group-item text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                    <h3> USERNAME : <?= $data['username']; ?></h3>
                                </li>
                                <li class="list-group-item text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                    <h3>FULLNAME : <?= $data['fullname']; ?></h3>
                                </li>
                                <li class="list-group-item text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                    <h3>POSISI : <?= $data['position']; ?></h3>
                                </li>
                                <li class="list-group-item text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                    <h3>create : <?= $data['create']; ?></h3>
                                </li>
                            </ul>
                        </div>
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