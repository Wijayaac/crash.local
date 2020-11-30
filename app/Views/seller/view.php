<?= $this->extend('layout/seller_template'); ?>

<?= $this->section('content') ?>
<div class="row mt-5">
    <?php foreach ($products as $product) : ?>
        <div class="col-lg-3">
            <!-- Simple card -->
            <div class="card m-b-30">
                <img class="card-img-top d-flex align-self-center img-fluid" style="max-width:50%" src="<?= base_url(); ?>/uploads/<?= $product['image']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title font-20 mt-0"><?= $product['productName']; ?></h4>
                    <p class="card-text"><?= $product['description']; ?></p>
                    <a href="/seller/detail/<?= $product['slug']; ?>" class="btn btn-primary waves-effect waves-light">Details</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>