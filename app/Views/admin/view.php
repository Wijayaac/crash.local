<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content') ?>
<div class="row mt-5">
    <div class="col-lg-4">
        <!-- Simple card -->
        <div class="card m-b-30">
            <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title font-20 mt-0">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make
                    up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>