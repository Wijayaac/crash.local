<?= $this->extend('layout/seller_template'); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-8 mx-auto">
        <h2 class="my3">Add Your Product</h2>
        <form action="/productseller/save" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="productName" class="form-control" required placeholder="eg. T-shirt Blue" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" required placeholder="eg. 10000" />
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" required placeholder="eg. This t-shirt blablabla.." />
            </div>
            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" class="form-control-file" name="image" id="" placeholder="">
            </div>
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                        Resset
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>