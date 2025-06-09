<?php include 'layouts/header.php'; ?>

<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">Shopping Cart</div>
    </div>
</div>
<!-- /page-title -->

<!-- page-cart -->
<section class="flat-spacing-11">
    <div class="container">
        <div class="tf-page-cart-wrap">
            <div class="tf-page-cart-item">
                <form>
                    <table class="tf-table-page-cart">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tf-cart-item file-delete">
                                <td class="tf-cart-item_product">
                                    <a href="product-detail.php" class="img-box">
                                        <img src="images/products/sunglasses/s002_2.jpg" alt="img-product">
                                    </a>
                                    <div class="cart-info">
                                        <a href="product-detail.php" class="cart-title link">Oversized Printed
                                            T-shirt</a>
                                        <div class="cart-meta-variant">White / M</div>
                                        <span class="remove-cart link remove">Remove</span>
                                    </div>
                                </td>
                                <td class="tf-cart-item_price tf-variant-item-price" cart-data-title="Price">
                                    <div class="cart-price price">$18.00</div>
                                </td>
                                <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                    <div class="cart-quantity">
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btndecrease">
                                                <svg class="d-inline-block" width="9" height="1" viewBox="0 0 9 1"
                                                    fill="currentColor">
                                                    <path
                                                        d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <input type="text" name="number" value="1">
                                            <span class="btn-quantity btnincrease">
                                                <svg class="d-inline-block" width="9" height="9" viewBox="0 0 9 9"
                                                    fill="currentColor">
                                                    <path
                                                        d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="tf-cart-item_total tf-variant-item-total" cart-data-title="Total">
                                    <div class="cart-total price">$18.00</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="tf-page-cart-footer">
                <div class="tf-cart-footer-inner">
                    <div class="tf-page-cart-checkout">
                        <div class="tf-cart-totals-discounts">
                            <h3>Subtotal</h3>
                            <span class="total-value">$18.00 USD</span>
                        </div>
                        <p class="tf-cart-tax">
                            Taxes and <a href="javascript:void(0);">shipping</a> calculated at checkout
                        </p>
                        <div class="cart-checkout-btn">
                            <a href="checkout.php"
                                class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                <span>Check out</span>
                            </a>
                        </div>
                        <div class="tf-page-cart_imgtrust">
                            <p class="text-center fw-6">Guarantee Safe Checkout</p>
                            <div class="cart-list-social">
                                <div class="payment-item">
                                    <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38"
                                        height="24" aria-labelledby="pi-visa">
                                        <title id="pi-visa">Visa</title>
                                        <path opacity=".07"
                                            d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                        </path>
                                        <path fill="#fff"
                                            d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                        </path>
                                        <path
                                            d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z"
                                            fill="#142688"></path>
                                    </svg>
                                </div>
                                <div class="payment-item">
                                    <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" width="38" height="24"
                                        role="img" aria-labelledby="pi-paypal">
                                        <title id="pi-paypal">PayPal</title>
                                        <path opacity=".07"
                                            d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                        </path>
                                        <path fill="#fff"
                                            d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                        </path>
                                        <path fill="#003087"
                                            d="M23.9 8.3c.2-1 0-1.7-.6-2.3-.6-.7-1.7-1-3.1-1h-4.1c-.3 0-.5.2-.6.5L14 15.6c0 .2.1.4.3.4H17l.4-3.4 1.8-2.2 4.7-2.1z">
                                        </path>
                                        <path fill="#3086C8"
                                            d="M23.9 8.3l-.2.2c-.5 2.8-2.2 3.8-4.6 3.8H18c-.3 0-.5.2-.6.5l-.6 3.9-.2 1c0 .2.1.4.3.4H19c.3 0 .5-.2.5-.4v-.1l.4-2.4v-.1c0-.2.3-.4.5-.4h.3c2.1 0 3.7-.8 4.1-3.2.2-1 .1-1.8-.4-2.4-.1-.5-.3-.7-.5-.8z">
                                        </path>
                                        <path fill="#012169"
                                            d="M23.3 8.1c-.1-.1-.2-.1-.3-.1-.1 0-.2 0-.3-.1-.3-.1-.7-.1-1.1-.1h-3c-.1 0-.2 0-.2.1-.2.1-.3.2-.3.4l-.7 4.4v.1c0-.3.3-.5.6-.5h1.3c2.5 0 4.1-1 4.6-3.8v-.2c-.1-.1-.3-.2-.5-.2h-.1z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="payment-item">
                                    <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38"
                                        height="24" aria-labelledby="pi-master">
                                        <title id="pi-master">Mastercard</title>
                                        <path opacity=".07"
                                            d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                        </path>
                                        <path fill="#fff"
                                            d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                        </path>
                                        <circle fill="#EB001B" cx="15" cy="12" r="7"></circle>
                                        <circle fill="#F79E1B" cx="23" cy="12" r="7"></circle>
                                        <path fill="#FF5F00"
                                            d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="payment-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" role="img"
                                        aria-labelledby="pi-american_express" viewBox="0 0 38 24" width="38"
                                        height="24">
                                        <title id="pi-american_express">American Express</title>
                                        <path fill="#000"
                                            d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3Z"
                                            opacity=".07"></path>
                                        <path fill="#006FCF"
                                            d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32Z">
                                        </path>
                                        <path fill="#FFF"
                                            d="M22.012 19.936v-8.421L37 11.528v2.326l-1.732 1.852L37 17.573v2.375h-2.766l-1.47-1.622-1.46 1.628-9.292-.02Z">
                                        </path>
                                        <path fill="#006FCF"
                                            d="M23.013 19.012v-6.57h5.572v1.513h-3.768v1.028h3.678v1.488h-3.678v1.01h3.768v1.531h-5.572Z">
                                        </path>
                                        <path fill="#006FCF"
                                            d="m28.557 19.012 3.083-3.289-3.083-3.282h2.386l1.884 2.083 1.89-2.082H37v.051l-3.017 3.23L37 18.92v.093h-2.307l-1.917-2.103-1.898 2.104h-2.321Z">
                                        </path>
                                        <path fill="#FFF"
                                            d="M22.71 4.04h3.614l1.269 2.881V4.04h4.46l.77 2.159.771-2.159H37v8.421H19l3.71-8.421Z">
                                        </path>
                                        <path fill="#006FCF"
                                            d="m23.395 4.955-2.916 6.566h2l.55-1.315h2.98l.55 1.315h2.05l-2.904-6.566h-2.31Zm.25 3.777.875-2.09.873 2.09h-1.748Z">
                                        </path>
                                        <path fill="#006FCF"
                                            d="M28.581 11.52V4.953l2.811.01L32.84 9l1.456-4.046H37v6.565l-1.74.016v-4.51l-1.644 4.494h-1.59L30.35 7.01v4.51h-1.768Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="payment-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 38 24" width="38"
                                        height="24" aria-labelledby="pi-amazon">
                                        <title id="pi-amazon">Amazon</title>
                                        <path
                                            d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                                            fill="#000" fill-rule="nonzero" opacity=".07"></path>
                                        <path
                                            d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                                            fill="#FFF" fill-rule="nonzero"></path>
                                        <path
                                            d="M25.26 16.23c-1.697 1.48-4.157 2.27-6.275 2.27-2.97 0-5.644-1.3-7.666-3.463-.16-.17-.018-.402.173-.27 2.183 1.504 4.882 2.408 7.67 2.408 1.88 0 3.95-.46 5.85-1.416.288-.145.53.222.248.47v.001zm.706-.957c-.216-.328-1.434-.155-1.98-.078-.167.024-.193-.148-.043-.27.97-.81 2.562-.576 2.748-.305.187.272-.047 2.16-.96 3.063-.14.138-.272.064-.21-.12.205-.604.664-1.96.446-2.29h-.001z"
                                            fill="#F90" fill-rule="nonzero"></path>
                                        <path
                                            d="M21.814 15.291c-.574-.498-.676-.73-.993-1.205-.947 1.012-1.618 1.315-2.85 1.315-1.453 0-2.587-.938-2.587-2.818 0-1.467.762-2.467 1.844-2.955.94-.433 2.25-.51 3.25-.628v-.235c0-.43.033-.94-.208-1.31-.212-.333-.616-.47-.97-.47-.66 0-1.25.353-1.392 1.085-.03.163-.144.323-.3.33l-1.677-.187c-.14-.033-.296-.153-.257-.38.386-2.125 2.223-2.766 3.867-2.766.84 0 1.94.234 2.604.9.842.82.762 1.918.762 3.11v2.818c0 .847.335 1.22.65 1.676.113.164.138.36-.003.482-.353.308-.98.88-1.326 1.2a.367.367 0 0 1-.414.038zm-1.659-2.533c.34-.626.323-1.214.323-1.918v-.392c-1.25 0-2.57.28-2.57 1.82 0 .782.386 1.31 1.05 1.31.487 0 .922-.312 1.197-.82z"
                                            fill="#221F1F"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-cart -->

<!-- Testimonial -->
<section class="flat-spacing-5 pt_0 flat-testimonial">
    <div class="container">
        <div class="flat-title wow fadeInUp" data-wow-delay="0s">
            <span class="title">Happy Clients</span>
            <p class="sub-title">Hear what they say about us</p>
        </div>
        <div class="wrap-carousel">
            <div dir="ltr" class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1"
                data-space-lg="30" data-space-md="15">
                <div class="swiper-wrapper" id="testimonial-wrapper"></div>
            </div>

            <div class="nav-sw nav-next-slider nav-next-testimonial lg"><span class="icon icon-arrow-left"></span></div>
            <div class="nav-sw nav-prev-slider nav-prev-testimonial lg"><span class="icon icon-arrow-right"></span>
            </div>
            <div class="sw-dots style-2 sw-pagination-testimonial justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Testimonial -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartTableBody = document.querySelector('.tf-table-page-cart tbody');
        const cartPageItem = document.querySelector('.tf-page-cart-item');
        const totalValueEl = document.querySelector('.total-value');

        let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        cartItems.length === 0 ? document.querySelector(".cart-checkout-btn a").classList.add("pe-none") : document.querySelector(".cart-checkout-btn a").classList.add("pe-auto;");

        function renderCart(products) {
            if (cartItems.length === 0) {
                cartPageItem.innerHTML = `
        <tr>
          <td colspan="4" style="text-align: center; padding: 40px 0;">
            <h4 class="mb-4">Your cart is empty</h4>
            <a href="collection.php" class="tf-btn btn-fill">Continue Shopping</a>
          </td>
        </tr>
      `;
                totalValueEl.textContent = '$0.00 USD';
                return;
            }

            cartTableBody.innerHTML = '';
            let subtotal = 0;

            cartItems.forEach(cartItem => {
                const product = products.find(p => p.id === cartItem.id);
                if (!product) return;

                const itemTotal = product.price * cartItem.quantity;
                subtotal += itemTotal;

                const productImage = product.images?.[0] || 'images/placeholder.jpg';

                const row = document.createElement('tr');
                row.className = 'tf-cart-item file-delete';
                row.innerHTML = `
        <td class="tf-cart-item_product">
          <a href="product-detail.php?id=${product.id}" class="img-box">
            <img src="${productImage}" alt="${product.title}">
          </a>
          <div class="cart-info">
            <a href="product-detail.php?id=${product.id}" class="cart-title link">${product.title}</a>
            <div class="cart-meta-variant">
              ${cartItem.color ? cartItem.color + ' / ' : ''}
              ${cartItem.size || ''}
            </div>
            <span class="remove-cart link remove" data-id="${product.id}">Remove</span>
          </div>
        </td>
        <td class="tf-cart-item_price tf-variant-item-price" cart-data-title="Price">
          <div class="cart-price price">$${product.price.toFixed(2)}</div>
        </td>
        <td class="tf-cart-item_quantity" cart-data-title="Quantity">
          <div class="cart-quantity">
            <div class="wg-quantity">
              <span class="btn-quantity btndecrease" data-id="${product.id}">
                <svg class="d-inline-block" width="9" height="1" viewBox="0 0 9 1" fill="currentColor">
                  <path d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z"></path>
                </svg>
              </span>
              <input type="text" name="number" value="${cartItem.quantity}" data-id="${product.id}" readonly>
              <span class="btn-quantity btnincrease" data-id="${product.id}">
                <svg class="d-inline-block" width="9" height="9" viewBox="0 0 9 9" fill="currentColor">
                  <path d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z"></path>
                </svg>
              </span>
            </div>
          </div>
        </td>
        <td class="tf-cart-item_total tf-variant-item-total" cart-data-title="Total">
          <div class="cart-total price">$${itemTotal.toFixed(2)}</div>
        </td>
      `;

                // Add event listeners directly
                row.querySelector('.btndecrease').addEventListener('click', () => updateQuantity(product.id, -1, products));
                row.querySelector('.btnincrease').addEventListener('click', () => updateQuantity(product.id, 1, products));
                row.querySelector('.remove-cart').addEventListener('click', () => removeFromCart(product.id, products));

                cartTableBody.appendChild(row);
            });

            totalValueEl.textContent = `$${subtotal.toFixed(2)} USD`;
        }

        function updateQuantity(productId, change, products) {
            const itemIndex = cartItems.findIndex(item => item.id === productId);

            if (itemIndex !== -1) {
                cartItems[itemIndex].quantity += change;
                if (cartItems[itemIndex].quantity <= 0) {
                    cartItems.splice(itemIndex, 1);
                }
                localStorage.setItem('cart', JSON.stringify(cartItems));
                renderCart(products);
            }
        }

        function removeFromCart(productId, products) {
            cartItems = cartItems.filter(item => item.id !== productId);
            localStorage.setItem('cart', JSON.stringify(cartItems));
            renderCart(products);
        }

        // Initial fetch and render
        fetch('products.json')
            .then(response => response.json())
            .then(products => renderCart(products))
            .catch(error => {
                console.error('Error loading products:', error);
                cartTableBody.innerHTML = `
        <tr>
          <td colspan="4" style="text-align: center; padding: 40px 0; color: #f00;">
            Error loading cart items. Please try again.
          </td>
        </tr>
      `;
            });
    });
</script>

<!-- testimonial -->
<script>
    const testimonialURL = 'testimonials.json'; // Update these paths
    const productURL = 'products.json';
    const maxSlides = 10;

    async function fetchData() {
        const [testimonialRes, productRes] = await Promise.all([
            fetch(testimonialURL),
            fetch(productURL)
        ]);

        const testimonialsData = await testimonialRes.json();
        const productsData = await productRes.json();
        return { testimonialsData, productsData };
    }

    function getRandomTestimonials(testimonialsData, limit) {
        const all = testimonialsData.flatMap(product =>
            product.testimonials.map(t => ({ ...t, productId: product.id }))
        );
        for (let i = all.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [all[i], all[j]] = [all[j], all[i]];
        }
        return all.slice(0, limit);
    }

    function getProductById(productsData, productId) {
        return productsData.find(p => p.id === productId);
    }

    function createTestimonialSlide(t, product) {
        const imageUrl = product?.images?.[0] || 'images/default.jpg';
        const starsHTML = '<i class="icon-star"></i>'.repeat(t.stars || 5);
        const price = product?.price?.toFixed(2) || "N/A";
        const productTitle = product?.title || "Product Name";

        return `
      <div class="swiper-slide">
        <div class="testimonial-item style-column wow fadeInUp">
          <div class="rating">${starsHTML}</div>
          <div class="heading">${t.heading}</div>
          <div class="text">“ ${t.text} ”</div>
          <div class="author">
            <div class="name">${t.fullname}</div>
            <div class="metas">Verified Buyer</div>
          </div>
          <div class="product">
            <div class="image">
              <a href="product-detail.php?id=${t.productId}">
                <img class="lazyload" data-src="${imageUrl}" src="${imageUrl}" alt="${productTitle}">
              </a>
            </div>
            <div class="content-wrap">
              <div class="product-title">
                <a href="product-detail.php?id=${t.productId}">${productTitle}</a>
              </div>
              <div class="price">$${price}</div>
            </div>
            <a href="product-detail.php?id=${t.productId}" class=""><i class="icon-arrow1-top-left"></i></a>
          </div>
        </div>
      </div>
    `;
    }

    fetchData().then(({ testimonialsData, productsData }) => {
        const wrapper = document.getElementById('testimonial-wrapper');
        const selectedTestimonials = getRandomTestimonials(testimonialsData, maxSlides);

        selectedTestimonials.forEach(t => {
            const product = getProductById(productsData, t.productId);
            const slideHTML = createTestimonialSlide(t, product);
            wrapper.insertAdjacentHTML('beforeend', slideHTML);
        });

        new Swiper('.tf-sw-testimonial', {
            slidesPerView: 3,
            spaceBetween: 30,
            breakpoints: {
                1024: { slidesPerView: 3 },
                768: { slidesPerView: 2 },
                320: { slidesPerView: 1 }
            },
            loop: true,
            autoplay: {
                delay: 5000
            }
        });
    });
</script>
<!-- /testimonial -->

<?php include 'layouts/footer.php'; ?>