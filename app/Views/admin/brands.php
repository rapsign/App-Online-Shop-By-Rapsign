<?= $this->extend('templates/admin'); ?>
<?= $this->section('page-content'); ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last mb-5">
            <h3>Brands</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Brands</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content">
    <section>
        <div class="card p-5">

            <div class="row">
                <div class="col">
                    <div class="axil-product-cart-area axil-section-gap">
                        <div class="axil-product-cart-wrap">
                            <div class="table-responsive">
                                <table class="table axil-product-table axil-cart-table mb--40  table table-borderless" id="categoryTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="product-remove">No</th>
                                            <th scope="col" class="product-thumbnail">Brands</th>
                                            <th scope="col" class="product-subtotal">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($brands as $brand) : ?>
                                            <tr>
                                                <td class="product-remove"><?= $i++ ?></td>
                                                <td class="product-thumbnail"><?= $brand['brands_name']; ?></td>
                                                <td class="product-subtotal">
                                                    <button onclick="showForm(this)" type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                                    <button type=" button" class="btn btn-danger btn-sm" id="deleteButton" data-custom="<?= $brand['id']; ?>" onclick="return confirmDeleteBrand();"><i class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <form action="<?= base_url('admin/brands/add') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Add Brand</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="brand_name">Brand Name</span>
                                    <input type="text" class="form-control <?= (session('errors')) ? 'is-invalid' : ''; ?>" id="brand_name" aria-describedby="Brand Name" name="brands_name">
                                    <div id="brand_name" class="invalid-feedback">
                                        <?php if (session('errors')) : ?>
                                            <?php foreach (session('errors') as $error) : ?>
                                                <?= esc($error) ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-block" type="Submit">Save</button>
                            </div>
                        </form>
                        <form action="#" style="display: none;" method="post" id="brandForm">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Edit Brand</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="brand_name">Brand Name</span>
                                    <input type="text" class="form-control <?= (session('errors')) ? 'is-invalid' : ''; ?>" id="inputField" aria-describedby="Brands Name" name="brands_name">
                                    <div id="brand_name" class="invalid-feedback">
                                        <?php if (session('errors')) : ?>
                                            <?php foreach (session('errors') as $error) : ?>
                                                <?= esc($error) ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 text-end">
                                <button class="btn btn-primary btn-block" type="Submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
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
<script>
    const myForm = document.getElementById('brandForm');

    function showForm(button) {
        // Get the data from the corresponding table cell
        var rowData = button.parentNode.parentNode.cells[1].innerText;
        var id = button.parentNode.parentNode.cells[0].innerText;

        // Dynamically construct the new action URL
        var newAction = "<?= base_url('admin/brands/edit/') ?>" + id;

        // Toggle the display property of the form
        if (myForm.style.display === 'none' || myForm.style.display === '') {
            document.getElementById('inputField').value = rowData;
            myForm.action = newAction;
            myForm.style.display = 'block';
        } else {
            myForm.style.display = 'none';
        }
    }
</script>
<script>
    function confirmDeleteBrand() {
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
                window.location.href = '<?= base_url('admin/brands/delete/') ?>' + id;
            }
        });
        return false;
    }
</script>
<?= $this->endSection(); ?>