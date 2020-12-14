<?= $this->extend('layout/seller_template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-8 mx-auto">
        <h2 class="my-3">Updating your Product</h2>
        <form action="/productseller/update/<?= $products['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?= $products['slug']; ?>">
            <input type="hidden" name="oldImage" value="<?= $products['image']; ?>">
            <div class="form-group">
                <label for="namaProduk">
                    Product Name
                </label>
                <input type="text" class="form-control <?= ($validation->hasError('productName')) ? 'is-invalid' : ''; ?>" name="productName" autofocus value="<?= (old('productName')) ? old('productName') : $products['productName']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('productName'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="deksripsi">
                    Product Price
                </label>
                <input type="number" class="form-control" name="price" value="<?= (old('price')) ? old('price') : $products['price']; ?>">
            </div>
            <div class="form-group">
                <label for="deksripsi">
                    Description
                </label>
                <input type="text" class="form-control" name="description" value="<?= (old('description')) ? old('description') : $products['description']; ?>">
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" name="image">
                <div class="invalid-feedback">
                    <?= $validation->getError('image'); ?>
                </div>
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