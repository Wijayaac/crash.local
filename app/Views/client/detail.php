<?= $this->extend('layout/client_template'); ?>

<?= $this->section('content') ?>
<?php foreach ($product->getResult('array') as $product) : ?>
    <div class="card mt-4 py-5">
        <div class="row my-3 my-3">
            <div class="col-sm-12 my-3">
                <h4 class="card-title text-center mb-5">
                    <?= $product['productName']; ?>
                </h4>
            </div>
            <div class="col-sm-6 text-center">
                <img src="<?= base_url('uploads/'); ?>/<?= $product['image']; ?>" alt="" class="w-75">
            </div>
            <div class="col-sm-6 text-left">
                <p class="card-text h4">Price : <?= number_to_currency($product['price'], 'IDR'); ?></p>
                <p class="card-text">Full Description : <?= $product['description']; ?></p>
                <p class="card-text text-capitalize">By. : <?= $product['sellerName']; ?></p>
                <p class="card-text text-capitalize">Store Location : <?= $product['sellerAddress']; ?></p>
                <div class="d-inline">
                    <a href="/seller/view" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace"> Back</i></a>
                    <a href="<?= site_url(); ?>home/checkout/<?= $product['slug']; ?>" class="btn btn-success"><i class="mdi mdi-currency-usd"> Proceed to Checkout</i></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>