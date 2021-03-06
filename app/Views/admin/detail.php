<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content') ?>
<?php foreach ($details->getResult('array') as $details) : ?>
    <div class="card mt-4 py-5">
        <div class="row my-3 my-3">
            <div class="col-sm-12 my-3">
                <h4 class="card-title text-center mb-5">
                    <?= $products['productName']; ?>
                </h4>
            </div>
            <div class="col-sm-6 text-center">
                <img src="<?= base_url('uploads/'); ?>/<?= $products['image']; ?>" alt="" class="w-75">
            </div>
            <div class="col-sm-6 text-left">
                <p class="card-text">Price : <?= number_to_currency($products['price'], 'IDR'); ?></p>
                <p class="card-text">Description : <?= $products['description']; ?></p>
                <p class="card-text">Seller Name : <?= $details['sellerName']; ?></p>
                <p class="card-text text-capitalize">Status : <?= $details['statusName']; ?></p>
                <div class="d-inline">
                    <a href="/admin/view" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace"> Back</i></a>
                    <a href="/admin/approve/<?= $products['id']; ?>" class="btn btn-success <?= $products['statusId'] == 1 ? 'd-none' : ''; ?>"><i class="mdi mdi-check"> Approve</i></a>
                    <form action="/admin/view/<?= $products['id']; ?>" class="d-inline" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"> Delete </i> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>