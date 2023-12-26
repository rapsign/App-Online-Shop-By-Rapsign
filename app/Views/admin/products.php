<?= $this->extend('templates/admin'); ?>
<?= $this->section('page-content'); ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last mb-5">
            <h3>Products</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content">
    <section>
        <div class="card p-5">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="<?= base_url('/admin/products/add') ?>" type="button" class="btn btn-primary btn-sm mb-3"><i class="bi bi-clipboard-plus"></i> Add Products</a>
            </div>
            <div class="axil-product-cart-area axil-section-gap">
                <div class="axil-product-cart-wrap">
                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40  table table-borderless" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="product-remove">No</th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Price</th>
                                    <th scope="col" class="product-quantity">Stock</th>
                                    <th scope="col" class="product-subtotal">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($product as $products) : ?>
                                    <tr>
                                        <td class="product-remove"><?= $i++ ?></td>
                                        <td class="product-thumbnail"><img src="<?= base_url('assets/images/product/') . $products['product_image']; ?>" width="100"></td>
                                        <td class="product-title"><?= $products['product_name']; ?></td>
                                        <td class="product-price" data-title="Price">IDR <?= number_format($products['product_price'], 0, ".", "."); ?></td>
                                        <td class="product-quantity"><?= $products['product_stock']; ?></td>
                                        <td class="product-subtotal">
                                            <a href="<?= base_url('admin/products/view/') . $products['slug']  ?>" type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" id="deleteButton" data-custom="<?= $products['id']; ?>" onclick="return confirmDeleteProduct();"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    function confirmDeleteProduct() {
        var button = document.getElementById('deleteButton');
        var id = button.getAttribute('data-custom');
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#485cbc',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('admin/products/delete/') ?>' + id;
            }
        });
        return false;
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
<script>
    $(function() {
        <?php if (session()->has("danger")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '<?= session("danger") ?>'
            })
        <?php } ?>
    });
</script>
<?= $this->endSection(); ?>