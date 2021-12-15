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
                            <div class="text-right">
                                <a href="<?= base_url('globalView/absen_user') ?>" class="btn btn-info mr-2 center"><i class="fas fa-qrcode fa-2x"></i></a>
                                <a href="<?= base_url() ?>/home/deleteScanAll/" class="btn btn-danger mr-2 center remove-mata"><i class="fas fa-trash-alt fa-2x"></i></a>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover mt-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Bet</th>
                                    <th>creat</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($user as $u) :
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $u['name']; ?></td>
                                        <td><?= $u['bet_id']; ?></td>
                                        <td><?= $u['create']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>/home/deleteScan/<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Bet</th>
                                    <th>creat</th>
                                    <th>Mendapat</th>
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


<!-- /.modal-content -->
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<?= $this->endSection(); ?>