<?= $this->extend('layout/client_template'); ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12">
        <div class="container bg-white">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-end" style="height: 500px;">
                    <img src="<?= base_url(); ?>/assets/images/hero.png" class="img-fluid" alt="Ini gambar">
                </div>
                <div class="col-lg-6 d-flex justify-content-end py-5" style="height: 500px;">
                    <div class="row">
                        <div class="col-lg-12 mt-5 py-5 m-t-20">
                            <h2>Enjoy shopping from your finger.</h2>
                            <p>All traditional Bali arts and craft available here, made to order and always ready for shiping to your country.</p>
                            <a name="" id="" class="btn btn-success btn-lg mt-3" href="#" role="button">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 card py-4 bg-light">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-3 text-center">
                    <i class="mdi mdi-clock-fast text-primary" style="font-size: 4rem;"></i>
                    <div class="h5 mt-3">Fast Shipping Time</div>
                    <h6>Because we use JET Cargo for our customer around the word</h6>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="mdi mdi-security text-danger" style="font-size: 4rem;"></i>
                    <div class="h5 mt-3">More Secure</div>
                    <h6>Your data its your own, so we keep it more secure with just ask needed data</h6>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="mdi mdi-home text-success" style="font-size: 4rem;"></i>
                    <div class="h5 mt-3">Home Made</div>
                    <h6>All our products crafted in small workshopm, so it can reduce the polution </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 py-5 mx-5">
        <div class="col-lg-12 text-center">
            <h2><i class="mdi mdi-fire text-danger font-weight-900"></i> On Sale Today !!! </h2>
        </div>
        <?php foreach ($products->getResult('array') as $products) : ?>
            <div class="col-lg-3">
                <div class="card m-b-30">
                    <img class="card-img-top d-flex align-self-center img-fluid my-3" width="300px" src="<?= base_url(); ?>/uploads/<?= $products['image']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0 text-capitalize"><?= $products['productName']; ?></h4>

                        <p class="card-text" style="font-size: 0.9rem;"><del> <?= number_to_currency($products['price'] * 1.5, 'IDR'); ?></del></p>
                        <p class="card-text h4"><strong><?= number_to_currency($products['price'], 'IDR'); ?></strong></p>
                        <p class="card-text"><small>By. <?= $products['sellerName']; ?></small></p>

                        <a href="<?= site_url(); ?>/home/detail/<?= $products['slug']; ?>" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-currency-usd"></i> Buy</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>