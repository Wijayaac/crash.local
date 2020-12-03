<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content') ?>

<div class="row my-3">
    <div class="col-sm-12">
        <div class="card text-center mx-auto py-5">
            <div class="card-body">
                <h4 class="card-title text-center">
                    <?= $products['productName']; ?>
                </h4>
                <img src="<?= base_url('uploads/'); ?>/<?= $products['image']; ?>" alt="" class="w-25">
                <p class="card-text"><?= number_to_currency($products['price'], 'IDR'); ?></p>
                <p class="card-text"><?= $products['description']; ?></p>
                <p class="card-text"><?= $products['sellerId']; ?></p>
                <p class="card-text"><?= $products['statusId']; ?></p>
            </div>
            <div class="d-inline">
                <a href="/admin/view" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace"> Back</i></a>

                <a href="/admin/approve/<?= $products['id']; ?>" class="btn btn-success"><i class="mdi mdi-pencil"> Approve</i></a>
                <form action="/admin/view/<?= $products['id']; ?>" class="d-inline" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>