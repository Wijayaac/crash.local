<?= $this->extend('layout/auth_template'); ?>
<?= $this->section('auth') ?>
<div class="card">
    <div class="card-body">

        <h3 class="text-center mt-0 m-b-15">
            Login
            <i class="mdi mdi-lock ml-3"></i>
        </h3>
        <div class="p-3">
            <form class="form-horizontal m-t-20" action="<?= site_url('login/sellerAuth'); ?>" method="POST">
                <?= csrf_field(); ?>
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('message') ?></div>
                <?php endif; ?>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="email" required="" placeholder="Login using email" name="sellerEmail">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="password" required="" placeholder="Password" name="password">
                    </div>
                </div>

                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                        <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-10 mb-0 row text-center">
                    <div class="col-sm-5 m-t-20 mx-auto">
                        <a href="register" class="text-muted my-3"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                        <a href="/login/admin" class="text-muted"><i class="mdi mdi-apple-airplay"></i> <small>Login Admin</small></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>