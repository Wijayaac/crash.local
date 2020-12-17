<?= $this->extend('layout/client_template'); ?>
<?= $this->section('content') ?>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-block">

            <div class="ex-page-content text-center">
                <h1 class=""> Thank You !</h1>
                <h3 class="">Thanks for shopping Here, We now proceed your Order.</h3><br>

                <a class="btn btn-danger mb-3 waves-effect waves-light" href="<?= site_url(); ?>">Back to Home</a>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>