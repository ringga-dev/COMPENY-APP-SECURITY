<?= $this->extend('base_ui/ui_tamplate'); ?>
<?= $this->extend('base_ui/base_menu'); ?>
<?= $this->section('content'); ?>
<script>
    $(document).ready(function() {
        $('.select2bs5').select2({
            theme: 'bootstrap4'
        })
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
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
                        <form action="<?= base_url('admin/cek_out') ?>" method="POST" class="col-md-12  text-right m-2">
                            <div class="row text-right ml-2 mr-2">
                                <select type="text" class="custom-select select2bs5 col-lg-6 mr-2" id="id_badge" name="id_badge">
                                    <option value="">Select User</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_bet']; ?>"><?= "nama : " . $u['name'] . "  BET : " . $u['id_bet'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="month" class="form-control col-lg-5 mr-2" id="filter" name="filter">
                                <button type="submit" class="btn btn-warning mr-2 center"><i class="fas fa-search fa-2x"></i></button>
                                <a href="" class="btn btn-info mr-2 center" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-square fa-2x"></i></a>
                            </div>

                        </form>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Badge</th>
                                    <th>Plan</th>
                                    <th>Destination</th>
                                    <th>Remarks</th>
                                    <th>Form</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Approved By</th>
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>LAMA</th>
                                    <th>STTS</th>
                                    <th>Is Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($visitor as $u) :

                                    if (!$u['date_out']) {
                                        $color = "style='background-color: #03d3fc;'";
                                    } elseif (!$u['date_in'] && $u['date_out']) {
                                        $color = "style='background-color: #fcd303;'";
                                    } else {
                                        if (($u['date_in'] - $u['date_out']) / 60 <= 0) {
                                            $color = "style='background-color: #fcd303;'";
                                        } else {
                                            $color = "style='background-color: #03fc30;'";
                                        }
                                    }
                                    $i++ ?>
                                    <tr>
                                        <td class="text-center" <?= $color ?>><?= $u['name']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['badge']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['plan']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['destination']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['remarks']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['stts_form']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['from']; ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['to']; ?></td>
                                        <td class="text-center" <?= $color ?>>
                                            <?= $u['approved_by']; ?>
                                        </td>
                                        <td class="text-center" <?= $color ?>><?= $u['date_in'] ? date('d-M-Y H:i:s', $u['date_in']) : "" ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['date_out'] ? date('d-M-Y H:i:s', $u['date_out']) : "" ?></td>
                                        <td class="text-center" <?= $color ?>><?= $u['date_out'] ? date('d-M-Y H:i:s', $u['date_out']) : "" ?></td>
                                        <td class="text-center" <?= $color ?>><?php
                                                                                if (!$u['date_out']) {
                                                                                    echo "Persiapan";
                                                                                } elseif (!$u['date_in'] && $u['date_out']) {
                                                                                    echo "sedang berjalan";
                                                                                } else {
                                                                                    if (($u['date_in'] - $u['date_out']) / 60 <= 0) {
                                                                                        echo "sedang berjalan";
                                                                                    } else {
                                                                                        echo round(($u['date_in'] - $u['date_out']) / 60 / 60, 2) . " Jam";
                                                                                    }
                                                                                }
                                                                                ?> </td>
                                        <td class="text-center" <?= $color ?>>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" <?= $u['is_active'] == "true" ? "checked" : "" ?> onclick="ganti_status(<?= $u['id'] ?>)">

                                            </div>
                                        </td>
                                        <td class="text-center" <?= $color ?>>
                                            <a href="" class="badge badge-warning mr-2 center" data-toggle="modal" data-target="#modal-xl<?= $u['id'] ?>"><i class="fas fa-edit fa-2x"></i></a>
                                            <?php if (session()->get('role') == 'admin') : ?>
                                                <a href="<?= base_url() ?>/admin/delete_form_cekout?id=<?= $u['id']; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                            <?php endif; ?>

                                            <?php
                                            $url = base_url("admin/approve?id=" . $u['id']);


                                            if (session()->get('role') == "hod") {
                                                if ($u['approved_by'] == null) {
                                                    echo "<a href='$url' class='btn btn-success m-1 approve'>approve</a>";
                                                } else {
                                                    echo "<a href='$url' class='btn btn-danger m-1 approve'>disapprove</a>";
                                                }
                                            }
                                            ?>
                                        </td>
                                        <!-- edit -->
                                        <div class="modal fade" id="modal-xl<?= $u['id'] ?>">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">ADD Form</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- class="was-validated" -->
                                                    <form action="<?= base_url() ?>/admin/edit_form_cekout?id=<?= $u['id'] ?>" method="POST" enctype="multipart/form-data">
                                                        <?= csrf_field() ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card-body">

                                                                        <div class="form-group">
                                                                            <label for="plan">Plan Time - End Time</label>
                                                                            <div class="input-group">

                                                                                <input type="date" style="margin-left: 3px; margin-right: 3px;" max='3000-06-16' class="form-control col-lg" id="planDate" name="planDate" required>
                                                                                Start time :
                                                                                <input type="time" style="margin-left: 3px; margin-right: 3px;" class="form-control col-lg" id="planTime" name="planTime" value="Out" required>
                                                                                End Time :
                                                                                <input type="time" style="margin-left: 3px; margin-right: 3px;" class="form-control col-lg" id="end_time" name="end_time" value="End" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="destination">Destination</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" id="destination" name="destination" value="<?= $u['destination'] ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Remarks">Remarks</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" maxlength="50" id="remarks" name="remarks" value="<?= $u['remarks'] ?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="stts_form">Status Form</label>
                                                                            <select type="text" class="custom-select mr-2" id="stts_form" name="stts_form" required>
                                                                                <option value="<?= $u['stts_form'] ?>"><?= $u['stts_form'] ?></option>
                                                                                <option value="official">OFFICIAL</option>
                                                                                <option value="personal">PERSONAL</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="from">From</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" id="from" name="from" value="<?= $u['from'] ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="to">To</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" id="to" name="to" value="<?= $u['to'] ?>" required>
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
                                            <!-- /.modal-content -->

                                        </div>
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
            <form action="<?= base_url() ?>/admin/add_form_cekout" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="stts_form">Status Form</label>
                                    <select type="text" class="custom-select mr-2" id="stts_form" name="stts_form" required>
                                        <option selected>Open this select</option>
                                        <option value="official">OFFICIAL</option>
                                        <option value="personal">PERSONAL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="plan">Plan Time - End Time</label>
                                    <div class="input-group">

                                        <input type="date" style="margin-left: 3px; margin-right: 3px;" max='3000-06-16' class="form-control col-lg" id="planDate" name="planDate" required>
                                        Start time :
                                        <input type="time" style="margin-left: 3px; margin-right: 3px;" class="form-control col-lg" id="planTime" name="planTime" value="Out" required>
                                        End Time :
                                        <input type="time" style="margin-left: 3px; margin-right: 3px;" class="form-control col-lg" id="end_time" name="end_time" value="End" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_barang">name</label>
                                    <div class="input-group">
                                        <select type="text" class="custom-select select2bs4 col-lg-5 mr-2" id="badge" name="badge" required>
                                            <option value="">Select User</option>
                                            <?php foreach ($user as $u) : ?>
                                                <option value="<?= $u['id_bet']; ?>"><?= "nama : " . $u['name'] . "  BET : " . $u['id_bet'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" hidden>
                                    <label for="from">From</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="from" name="from" value="PT. ETOWA PACKAGING INDONESIA" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="to" name="to" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="destination">Destination</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="destination" name="destination" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Remarks">Remarks</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" maxlength="50" id="remarks" name="remarks" required>
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
    <!-- /.modal-content -->

</div>
<script>
    function ganti_status(id) {
        $.ajax({
            type: "post",
            url: "<?= base_url('UserApi/ajax_is_active_form') ?>",
            data: {
                'id': id
            },
            dataType: "json",
            success: function(response) {
                if (response.stts == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: `${response.msg}`,
                        showConfirmButton: false,
                        timer: 2000
                    })
                    textToAudio(response.txt)
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: `${response.msg}`,
                        showConfirmButton: false,
                        timer: 2000
                    })
                    textToAudio(response.txt)
                }
            }
        });
    }

    function image(imageSrc) {
        window.open(imageSrc)
    }
</script>

<script>
    /* JS comes here */
    function textToAudio(msg) {
        let speech = new SpeechSynthesisUtterance();
        speech.lang = "id-ID";

        speech.text = msg;
        speech.volume = 10;
        speech.rate = 0.8;
        speech.pitch = 1;

        window.speechSynthesis.speak(speech);
    }
</script>


<?= $this->endSection(); ?>