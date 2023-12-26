<?= $this->extend('templates/admin'); ?>
<?= $this->section('page-content'); ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last mb-5">
            <h3><?= session('products.product_name');  ?></h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/products') ?>">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= session('products.product_name'); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content">
    <section>
        <div class="card">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-center mx-auto mt-4">
                        <img src="<?= base_url('assets/images/product/') . session('products.product_image'); ?>" class="img-thumbnail img-fluid" alt="Products Image" width="200" height="200">
                    </div>
                    <div class="col-md m-3">
                        <h4><?= session('products.product_name'); ?></h4>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width:100px;">Price</td>
                                    <td style="width:10px;">:</td>
                                    <td>IDR <?= number_format(session('products.product_price'), 0, ".", "."); ?></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><?= session('products.product_stock'); ?></td>
                                </tr>
                                <tr>
                                    <td>Categories</td>
                                    <td>:</td>
                                    <td><?= session('products.categories_name'); ?></td>
                                </tr>
                                <tr>
                                    <td>Brands</td>
                                    <td>:</td>
                                    <td><?= session('products.brands_name'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="description mb-3">
                    <p>Description</p>
                    <?= session('products.product_description'); ?>
                </div>

            </div>
            <div class="card-footer">
                <div class="d-grid d-md-flex justify-content-md-end">
                    <button class="btn btn-primary btn-md mt-3" type="button" onclick="showForm()">Edit</button>
                </div>
            </div>
        </div>
        <div class="card p-5" style="display: none;" id="card">
            <form action="<?= base_url('admin/products/edit/') . session('products.slug'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <label class="form-label">Product Name</label>
                            <div class="input-group">
                                <span class="input-group-text">Name</span>
                                <input type="text" class="form-control <?= (session('errors.product_name')) ? 'is-invalid' : ''; ?>" aria-label="Product Name" aria-describedby="Product Name" name="product_name" value="<?= session('products.product_name'); ?>">
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
                                <input type="number" class="form-control <?= (session('errors.product_price')) ? 'is-invalid' : ''; ?>" aria-describedby="Example = 1000000" name="product_price" value="<?= session('products.product_price'); ?>">
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
                                <input type="number" class="form-control <?= (session('errors.product_stock')) ? 'is-invalid' : ''; ?>" aria-describedby="Example = 100" name="product_stock" value="<?= session('products.product_stock'); ?>">
                                <div class="invalid-feedback">
                                    <?php if ($fieldErrors = session('errors.product_stock')) : ?>
                                        <?= esc($fieldErrors) ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <label class="form-label">Product Categories</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Category</label>
                            <select class="form-select <?= (session('errors.category')) ? 'is-invalid' : ''; ?>" name="categories_id">
                                <option selected value="<?= session('products.categories_id'); ?>"><?= session('products.categories_name'); ?></option>
                                <?php foreach (session('categories') as $category) : ?>
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
                                <option selected value="<?= session('products.brands_id'); ?>"><?= session('products.brands_name'); ?></option>
                                <?php foreach (session('brands') as $brand) : ?>
                                    <option value="<?= $brand['id'] ?>"><?= $brand['brands_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php if ($fieldErrors = session('errors.brand')) : ?>
                                    <?= esc($fieldErrors) ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Weight</label>
                            <div class="input-group">
                                <span class="input-group-text">Grams</span>
                                <input type="number" class="form-control <?= (session('errors.product_weight')) ? 'is-invalid' : ''; ?>" aria-describedby="Example = 100" name="product_weight" value="<?= session('products.product_weight'); ?>">
                                <div class="invalid-feedback">
                                    <?php if ($fieldErrors = session('errors.product_weight')) : ?>
                                        <?= esc($fieldErrors) ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
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
                        <div class="mb-3">
                            <img src="<?= base_url('assets/images/product/') . session('products.product_image'); ?>" id="product_image" width="350" height="350" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Description</label>
                        <textarea name="product_description" id="default" class="form-select"><?= session('products.product_description'); ?></textarea>
                    </div>
                    <button class="btn btn-primary" type="Submit">Edit</button>
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

<script>
    const myForm = document.getElementById('card');

    function showForm() {
        // Toggle the display property of the form
        if (myForm.style.display === 'none' || myForm.style.display === '') {
            myForm.style.display = 'block';
        } else {
            myForm.style.display = 'none';
        }
    }
</script>
<script>
    $(function() {
        <?php if (session()->has("success")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '<?= session("success") ?>'
            })
        <?php } ?>
    });
</script>
<?= $this->endSection(); ?>