<?= $this->extend('templates/admin'); ?>
<?= $this->section('page-content'); ?>
<?php $validation = \Config\Services::validation() ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last mb-5">
            <h3>Add Products <?= $validation->getError('product_name') ?></h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/products') ?>">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Products</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content">
    <section>
        <div class="card p-5">

            <form action="<?= base_url('admin/products/addProcess') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <label class="form-label">Product Name</label>
                            <div class="input-group">
                                <span class="input-group-text">Name</span>
                                <input type="text" class="form-control <?= (session('errors.product_name')) ? 'is-invalid' : ''; ?>" aria-label="Product Name" aria-describedby="Product Name" name="product_name" value="<?= old('product_name') ?>">
                                <div class="invalid-feedback">
                                    <?php if ($fieldErrors = session('errors.product_name')) : ?>
                                        <?= esc($fieldErrors) ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control <?= (session('errors.product_price')) ? 'is-invalid' : ''; ?>" aria-describedby="Example = 1000000" name="product_price" value="<?= old('product_price') ?>">
                                <div class="invalid-feedback">
                                    <?php if ($fieldErrors = session('errors.product_price')) : ?>
                                        <?= esc($fieldErrors) ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Stock</label>
                            <div class="input-group">
                                <span class="input-group-text">Units</span>
                                <input type="number" class="form-control <?= (session('errors.product_stock')) ? 'is-invalid' : ''; ?>" aria-describedby="Example = 100" name="product_stock" value="<?= old('product_stock') ?>">
                                <div class="invalid-feedback">
                                    <?php if ($fieldErrors = session('errors.product_stock')) : ?>
                                        <?= esc($fieldErrors) ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <label class="form-label">Product Image</label>
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="file" class="form-control <?= (session('errors.product_image')) ? 'is-invalid' : ''; ?>" id="imgInput" aria-describedby="Product Image" aria-label="Product Image" name="product_image">
                                    <div class="invalid-feedback">
                                        <?php if ($fieldErrors = session('errors.product_image')) : ?>
                                            <?= esc($fieldErrors) ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <label class="form-label">Product Categories</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text">Category</label>
                                    <select class="form-select <?= (session('errors.category')) ? 'is-invalid' : ''; ?>" name="categories_id">
                                        <option selected disabled value="">Choose...</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['categories_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php if ($fieldErrors = session('errors.category')) : ?>
                                            <?= esc($fieldErrors) ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <label class="form-label">Product Brands</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text">Brands</label>
                                    <select class="form-select <?= (session('errors.brand')) ? 'is-invalid' : ''; ?>" name="brands_id">
                                        <option selected disabled value="">Choose...</option>
                                        <?php foreach ($brands as $brand) : ?>
                                            <option value="<?= $brand['id'] ?>"><?= $brand['brands_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php if ($fieldErrors = session('errors.brand')) : ?>
                                            <?= esc($fieldErrors) ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <img src="<?= base_url() ?>/assets/images/img-preview.png" id="product_image" width="180" height="180" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Description</label>
                        <textarea name="product_description" id="default" class="form-select "></textarea>
                    </div>
                    <button class="btn btn-primary" type="Submit">Save</button>
                </div>
            </form>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    ClassicEditor
        .create(document.querySelector('#default'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#product_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInput").change(function() {
        readURL(this);
    });
</script>
<?= $this->endSection(); ?>