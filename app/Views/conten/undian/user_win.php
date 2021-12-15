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

                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Bet</th>
                                    <th>creat</th>
                                    <th>Mendapat</th>
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
                                        <td><?= $u['barang']; ?></td>


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