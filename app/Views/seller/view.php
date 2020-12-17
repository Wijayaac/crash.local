<?= $this->extend('layout/seller_template'); ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('message') == true) : ?>
    <div class='alert alert-success alert-dismissible fade show text-white mt-1' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' class="text-black">'&times;'</span>
            <span class='sr-only'>Close</span>
        </button>
        <strong>Success</strong> <?= session()->getFlashdata('message'); ?>
    </div>
<?php else : ?>

<?php endif; ?>
<div class="row mt-5">
    <?php foreach ($products as $product) : ?>
        <?php if ($product['sellerId'] == $id) : ?>
            <div class="col-lg-3">
                <!-- Simple card -->
                <div class="card m-b-30">
                    <img class="card-img-top" width="300px" src="<?= base_url(); ?>/uploads/<?= $product['image']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0 text-capitalize"><?= $product['productName']; ?></h4>
                        <p class="card-text"><?= $product['description']; ?></p>
                        <a href="/seller/detail/<?= $product['slug']; ?>" class="btn btn-primary waves-effect waves-light">Details</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>


</div>
<?= $this->endSection() ?>