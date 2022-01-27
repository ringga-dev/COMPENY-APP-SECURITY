<?= $this->extend('base_ui/ui_auth'); ?>
<?= $this->section('auth'); ?>

<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="" class="h1"><b>PT Etowa </b>: Login</a>
    </div>
    <div class="card-body">

        <form action="<?= base_url('auth/user_auth?stts=login') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                <div class="invalid-feedback">
                    Please choose a password.
                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button id="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- <p class="mb-0">
            <a href="<?= base_url('auth/register'); ?>" class="text-center">REGISTER</a><br />

        </p> -->
    </div>
    <!-- /.card-body -->
</div>
<!-- <script>

</script> -->
<script src="<?= base_url('assest/js/myjs.js') ?>"></script>

<?= $this->endSection(); ?>