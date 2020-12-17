<?= $this->extend('layout/client_template'); ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6">
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
                        <div class="d-inline">
                            <a href="<?= site_url(); ?>" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace"> Back</i></a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-lg-6">
        <form action="<?= site_url(); ?>home/payment" method="post">
            <input type="hidden" name="slug" value="<?= $product['slug']; ?>">
            <input type="hidden" name="price" value="<?= $product['price']; ?>">
            <input type="hidden" name="product" value="<?= $product['productName']; ?>">
            <h4 class="text-center">Order Form</h4>
            <p class="text-muted text-center"><small> Please fill with your real data *we are not selling your data </small></p>

            <div class="form-group">
                <label for="">Your Name</label>
                <input type="text" class="form-control" name="name" id="clientName" placeholder="eg. John Wick">
            </div>
            <div class="form-group">
                <label for="">Email Address </label>
                <input type="email" class="form-control" name="email" id="clientEmail" placeholder="please input a valid email address ...">
            </div>

            <div class="form-group">
                <label for="">Your Address</label>
                <input type="text" class="form-control" name="address" id="clientAddress" placeholder="Where is your home address ?">
            </div>

            <button class="btn btn-block btn-success btn-lg" id="pay-button"><i class="mdi mdi-cart-plus"></i> Submit Data</button>
        </form>
    </div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>