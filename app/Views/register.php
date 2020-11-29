<?= $this->extend('layout/auth_template'); ?>
<?= $this->section('auth') ?>
<div class="card">
    <div class="card-body">

        <h3 class="text-center mt-0 m-b-15">
            Register
            <i class="mdi mdi-apple-airplay"></i>
        </h3>

        <div class="p-3">
            <form class="form-horizontal" action="register/save" method="POST">
                <?= csrf_field(); ?>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="text" required placeholder="Username" name="sellerName">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="email" required placeholder="Email" name="sellerEmail">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="text" required placeholder="Address" name="sellerAddress">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="password" required placeholder="Password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="password" required placeholder="Re-type Password" name="confirmPassword">
                    </div>
                </div>

                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                        <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Register</button>
                    </div>
                </div>

                <div class="form-group m-t-10 mb-0 row">
                    <div class="col-12 m-t-20 text-center">
                        <a href="login" class="text-muted">Already have account? login here</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<?= $this->endSection() ?>