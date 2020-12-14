<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content') ?>

<div class="card mt-4 py-5">
    <div class="row my-3 my-3">
        <div class="col-sm-12 my-3">
            <h4 class="card-title text-center">
                <?= $products['productName']; ?>
            </h4>
        </div>
        <div class="col-sm-6 text-center">
            <img src="<?= base_url('uploads/'); ?>/<?= $products['image']; ?>" alt="" class="w-25">
        </div>
        <div class="col-sm-6 text-left">
            <p class="card-text">Price : <?= number_to_currency($products['price'], 'IDR'); ?></p>
            <p class="card-text">Description : <?= $products['description']; ?></p>
            <p class="card-text">Seller Email : <?= $products['sellerId']; ?></p>
            <p class="card-text">Status : <?= $products['statusId']; ?></p>
            <div class="d-inline">
                <a href="/seller/view" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace"> Back</i></a>
                <a href="/admin/approve/<?= $products['id']; ?>" class="btn btn-success"><i class="mdi mdi-check"> Approve</i></a>
                <form action="/seller/view/<?= $products['id']; ?>" class="d-inline" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"> Delete </i> </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>