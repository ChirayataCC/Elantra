<?php include 'layouts/header.php'; ?>

<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">Check Out</div>
    </div>
</div>
<!-- /page-title -->

<!-- page-cart -->
<section class="flat-spacing-11">
    <div class="container">
        <div class="tf-page-cart-wrap layout-2">
            <div class="tf-page-cart-item">
                <h5 class="fw-5 mb_20">Billing details</h5>
                <form class="form-checkout">
                    <div class="box grid-2">
                        <fieldset class="fieldset">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" placeholder="First Name">
                        </fieldset>
                        <fieldset class="fieldset">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" placeholder="Last Name">
                        </fieldset>
                    </div>
                    <fieldset class="box fieldset">
                        <label for="country">Country/Region</label>
                        <div class="select-custom">
                            <select class="tf-select w-100" id="country" name="address[country]" data-default="">
                                <option value="Select Country">Select Country</option>
                                <option value="Australia">
                                    Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Canada">
                                    Canada</option>
                                <option value="Czech Republic">Czechia</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Hong Kong">
                                    Hong Kong SAR</option>
                                <option value="Ireland">
                                    Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">
                                    Italy</option>
                                <option value="Japan">
                                    Japan</option>
                                <option value="Malaysia">
                                    Malaysia</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Zealand">
                                    New Zealand</option>
                                <option value="Norway">Norway</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">
                                    Portugal</option>
                                <option value="Singapore">Singapore</option>
                                <option value="South Korea">
                                    South Korea</option>
                                <option value="Spain">
                                    Spain</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="United Arab Emirates">
                                    United Arab Emirates</option>
                                <option value="United Kingdom">
                                    United Kingdom</option>
                                <option value="United States">
                                    United States</option>
                                <option value="Vietnam">Vietnam</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="box fieldset">
                        <label for="city">Town/City</label>
                        <input type="text" id="city" placeholder="Town / City">
                    </fieldset>
                    <fieldset class="box fieldset">
                        <label for="address">Address</label>
                        <input type="text" id="address" placeholder="Address">
                    </fieldset>
                    <fieldset class="box fieldset">
                        <label for="phone">Phone Number</label>
                        <input type="number" id="phone" placeholder="Phone Number">
                    </fieldset>
                    <fieldset class="box fieldset">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Email">
                    </fieldset>
                    <fieldset class="box fieldset">
                        <label for="note">Order notes (optional)</label>
                        <textarea name="note" id="note" placeholder="Notes"></textarea>
                    </fieldset>
                </form>
            </div>
            <div class="tf-page-cart-footer">
                <div class="tf-cart-footer-inner">
                    <h5 class="fw-5 mb_20">Your order</h5>
                    <form class="tf-page-cart-checkout widget-wrap-checkout">
                        <ul class="wrap-checkout-product" id="checkoutProductList"></ul>
                        <div class="d-flex justify-content-between line pb_20">
                            <h6 class="fw-5">Total</h6>
                            <h6 class="total fw-5" id="checkoutTotal">$0.00</h6>
                        </div>

                        <div class="wd-check-payment">
                            <div class="fieldset-radio mb_20">
                                <input type="radio" name="payment" id="cc" class="tf-check" disabled>
                                <label for="bank">Credit Card</label>

                            </div>
                            <div class="fieldset-radio mb_20">
                                <input type="radio" name="payment" id="delivery" class="tf-check" checked>
                                <label for="delivery">Cash on delivery</label>
                            </div>
                            <p class="text_black-2 mb_20">Your personal data will be used to process your order,
                                support your experience throughout this website, and for other purposes
                                described in our <a href="javascript:void(0);" class="text-decoration-underline">privacy
                                    policy</a>.</p>
                            <div class="box-checkbox fieldset-radio mb_20">
                                <input type="checkbox" id="check-agree" class="tf-check">
                                <label for="check-agree" class="text_black-2">I have read and agree to the
                                    website <a href="javascript:void(0);" class="text-decoration-underline">terms and
                                        conditions</a>.</label>
                            </div>
                        </div>
                        <a href="thank-you.php"
                            class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center">Place
                            order</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-cart -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productListContainer = document.getElementById('checkoutProductList');
        const totalContainer = document.getElementById('checkoutTotal');
        const cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        if (cartItems.length === 0) {
            productListContainer.innerHTML = '<li>Your cart is empty</li>';
            totalContainer.textContent = '$0.00';
            return;
        }

        fetch('products.json')
            .then(response => response.json())
            .then(products => {
                let total = 0;
                productListContainer.innerHTML = ''; // clear existing items

                cartItems.forEach(cartItem => {
                    const product = products.find(p => p.id === cartItem.id);
                    if (!product) return;

                    const productImage = product.images?.[0] || 'images/placeholder.jpg';
                    const itemTotal = product.price * cartItem.quantity;
                    total += itemTotal;

                    const li = document.createElement('li');
                    li.className = 'checkout-product-item';
                    li.innerHTML = `
          <figure class="img-product">
            <img src="${productImage}" alt="${product.title}">
            <span class="quantity">${cartItem.quantity}</span>
          </figure>
          <div class="content">
            <div class="info">
              <p class="name">${product.title}</p>
              ${cartItem.color || cartItem.size ? `
              <span class="variant">${cartItem.color || ''} ${cartItem.color && cartItem.size ? '/' : ''} ${cartItem.size || ''}</span>` : ''
                        }
            </div>
            <span class="price">$${itemTotal.toFixed(2)}</span>
          </div>
        `;
                    productListContainer.appendChild(li);
                });

                totalContainer.textContent = `$${total.toFixed(2)}`;
            })
            .catch(error => {
                console.error('Error loading products:', error);
                productListContainer.innerHTML = '<li>Error loading cart details.</li>';
            });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', async function () {
        const placeOrderBtn = document.querySelector('.tf-btn.btn-fill');

        placeOrderBtn.addEventListener('click', async function (e) {
            e.preventDefault();

            // Get form values
            const firstName = document.getElementById('first-name').value.trim();
            const lastName = document.getElementById('last-name').value.trim();
            const country = document.getElementById('country').value;
            const city = document.getElementById('city').value.trim();
            const address = document.getElementById('address').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const email = document.getElementById('email').value.trim();
            const termsChecked = document.getElementById('check-agree').checked;

            const errors = [];

            if (!firstName) errors.push("First name is required.");
            if (!lastName) errors.push("Last name is required.");
            if (!country || country === "Select Country") errors.push("Country is required.");
            if (!city) errors.push("City is required.");
            if (!address) errors.push("Address is required.");
            if (!phone) errors.push("Phone number is required.");
            if (!email) {
                errors.push("Email is required.");
            } else if (!validateEmail(email)) {
                errors.push("Enter a valid email address.");
            }
            if (!termsChecked) errors.push("You must agree to the terms and conditions.");

            if (errors.length > 0) {
                alert(errors.join('\n'));
                return;
            }

            const rawCart = JSON.parse(localStorage.getItem('cart')) || [];
            if (!rawCart.length) {
                alert("Your cart is empty.");
                return;
            }

            // Load products.json to enrich cart items
            let productData = [];
            try {
                const res = await fetch('products.json');
                productData = await res.json();
            } catch (err) {
                alert("Failed to load product data.");
                return;
            }

            let totalAmount = 0;
            const enrichedCart = rawCart.map(item => {
                const product = productData.find(p => p.id === item.id);
                if (!product) return null;
                const subtotal = product.price * item.quantity;
                totalAmount += subtotal;

                return {
                    id: item.id,
                    title: product.title,
                    price: product.price,
                    quantity: item.quantity,
                    color: item.color || null,
                    size: item.size || null,
                    image: product.images?.[0] || '',
                    subtotal
                };
            }).filter(Boolean);

            const orderId = 'ORD-' + Date.now();
            const orderDate = new Date().toLocaleString();
            const fullName = `${firstName} ${lastName}`;
            const paymentMethod = 'Cash on Delivery';
            const fullAddress = `${address}, ${city}, ${country}`;

            const orderData = {
                orderId,
                orderDate,
                fullName,
                email,
                phone,
                address: fullAddress,
                paymentMethod,
                products: enrichedCart,
                totalAmount
            };

            sessionStorage.setItem('orderData', JSON.stringify(orderData));
            window.location.href = 'thank-you.php';
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email.toLowerCase());
        }
    });
</script>




<?php include 'layouts/footer.php'; ?>