<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main-wrapper">
    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="axil-checkout-billing">
                        <h4 class="title mb--40">Billing details</h4>
                        <form class="singin-form" action="<?= base_url('payment') ?>" method="post" onsubmit="return validateForm()">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Full Name <span>*</span></label>
                                <input type="text" id="first-name" value="<?= user()->fullname; ?>" name="fullname" required>
                            </div>
                            <div class="form-group">
                                <label>Address <span>*</span></label>
                                <textarea class="mb--15" rows="3" name="address" required><?= user()->address; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Province <span>*</span></label>
                                <select id="province" name="province" required>
                                    <option>Select Province</option>
                                    <?php foreach ($provinsi as $province) : ?>
                                        <option value="<?= $province->province ?>" att="<?= $province->province_id ?>"><?= $province->province ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Town/ City <span>*</span></label>
                                <select id="city" name="city" required>
                                    <option>Select Town/City</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="tel" id="phone" value="<?= user()->phone_number; ?>" name="phone_number" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <input type="email" id="email" value="<?= user()->email; ?>" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Other Notes (optional)</label>
                                <textarea id="notes" rows="2" name="notes" placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">Your Order</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="order-product">
                                        <td><?= session('orderData.item.product_name') ?> <span class="quantity">x<?= session('orderData.quantity') ?></span></td>
                                        <td>Rp <?= number_format(session('orderData.subTotal'), 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr class="order-subtotal">
                                        <td>Subtotal</td>
                                        <td>Rp <?= number_format(session('orderData.subTotal'), 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr class="order-shipping">

                                    </tr>
                                    <tr class="order-shipping">
                                        <td colspan="2">
                                            <div class="shipping-amount">
                                                <span class="title">Shipping Method <span style="color:red;">*</span></span>
                                                <span class="amount" id="shipping-price">Rp 0</span>
                                            </div>
                                            <div class="input-group">
                                                <select id="method" name="shipPrice">
                                                    <option>Select Shipping Method</option>
                                                </select>
                                            </div>
                                            <p id="days"></p>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount" id="total">Rp <?= number_format(session('orderData.subTotal'), 2, ',', '.'); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" id="hiddenService" name="service" required>
                        <input type="hidden" id="hidden" name="total" required>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn" id="payment">Process to Checkout</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->

</main>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        var price = <?= session('orderData.subTotal') ?>;
        var ongkir = 0;
        $("#province").on('change', function() {
            $("#city").empty();
            var id_province = $('option:selected', this).attr('att');
            $.ajax({
                url: "<?= base_url('checkout/getCity') ?>",
                type: 'GET',
                data: {
                    'id_province': id_province,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"];
                    for (var i = 0; i < results.length; i++) {
                        $("#city").append($('<option>', {
                            value: results[i]["city_name"],
                            text: results[i]["city_name"],
                            att: results[i]["city_id"]
                        }));
                    }
                },
            });
        });
        $("#city").on('change', function() {
            $("#method").empty();
            var id_city = $('option:selected', this).attr('att');
            $.ajax({
                url: "<?= base_url('checkout/getCost') ?>",
                type: 'GET',
                data: {
                    'origin': 154,
                    'destination': id_city,
                    'weight': <?= session('orderData.item.product_weight') ?> * <?= session('orderData.quantity') ?>,
                    'courier': 'jne'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"][0]["costs"];
                    for (var i = 0; i < results.length; i++) {
                        $("#method").append($('<option>', {
                            value: results[i]["cost"][0]["value"],
                            text: results[i]["description"] + " (" + results[i]["service"] + ")",
                            etd: results[i]["cost"][0]["etd"],
                            att: results[i]["description"] + " (" + results[i]["service"] + ")"
                        }));
                    }
                },
            });
        });
        $("#method").on('change', function() {

            var estimation = $('option:selected', this).attr('etd');
            var service = $('option:selected', this).attr('att');
            console.log(service)
            ongkir = parseInt($(this).val());

            function formatRupiah(amount) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(amount);
            }
            $("#shipping-price").html(formatRupiah(ongkir));
            $("#days").html("Estimated " + estimation + " Days");
            var total = price + ongkir;
            $("#total").html(formatRupiah(total));
            $("#hidden").val(total);
            $("#hiddenService").val(service);
        });
    });
</script>
<script>
    function validateForm() {
        var total = document.getElementById("hidden").value.trim();

        if (total === '') {
            Swal.fire({
                title: 'OOopps!',
                text: 'PLEASE CHOOSE SHIPPING METHOD',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }

        return true;
    }
</script>

<?= $this->endSection(); ?>