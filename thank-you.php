<?php include 'layouts/header.php' ?>
<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">Thank You For Your Order</div>
    </div>
</div>
<!-- /page-title -->

<!-- page-cart -->
<section class="flat-spacing-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h5 class="fw-5 mb_20">Payment Confirmation</h5>
                <div class="tf-page-cart-checkout">

                    <div class="d-flex align-items-center justify-content-between mb_15 fw-bold">
                        <div class="fs-18">Order ID</div>
                        <p id="order-id">-</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb_15">
                        <div class="fs-18">Date</div>
                        <p id="order-date">-</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb_15">
                        <div class="fs-18">Payment Method</div>
                        <p id="payment-method">-</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb_15">
                        <div class="fs-18">Full Name</div>
                        <p id="full-name">-</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb_15">
                        <div class="fs-18">Email</div>
                        <p id="email">-</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb_15">
                        <div class="fs-18">Phone</div>
                        <p id="phone">-</p>
                    </div>
                    <div class="d-flex align-items-start justify-content-between mb_15">
                        <div class="fs-18">Address</div>
                        <p id="address" class="text-end text-break">-</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb_24">
                        <div class="fs-22 fw-6">Total</div>
                        <span class="total-value" id="order-total">-</span>
                    </div>
                    <div class="d-flex">
                        <a href="invoice.php"
                            class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                            <span>Download Invoice</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-cart -->

<script>
    document.addEventListener('DOMContentLoaded', async function () {
        const order = JSON.parse(sessionStorage.getItem('orderData'));
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        if (!order || cart.length === 0) {
            document.body.innerHTML = `
        <div class="container text-center pt-5">
          <h2>Session Expired</h2>
          <p>Please return to the home page and place your order again.</p>
        </div>`;
            return;
        }

        // Fetch full product details to calculate total price
        const res = await fetch('products.json');
        const productsData = await res.json();

        // Calculate total order amount
        let total = 0;
        cart.forEach(item => {
            const product = productsData.find(p => p.id === item.id);
            if (!product) return;
            total += product.price * item.quantity;
        });

        // Insert order details into the page
        document.getElementById('order-id').textContent = order.orderId;
        document.getElementById('order-date').textContent = order.orderDate;
        document.getElementById('payment-method').textContent = order.paymentMethod;
        document.getElementById('full-name').textContent = order.fullName;
        document.getElementById('email').textContent = order.email;
        document.getElementById('phone').textContent = order.phone;
        document.getElementById('address').textContent = order.address;
        document.getElementById('order-total').textContent = `$${total.toFixed(2)} USD`;
    });
</script>


<?php include 'layouts/footer.php' ?>