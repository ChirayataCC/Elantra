<?php include 'layouts/header.php'; ?>
<!-- page-title -->
<div class="tf-page-title my-md-5">
    <div class="container-full">
        <div class="heading text-center">Latest Arrivals</div>
        <p class="text-center text-2 text_black-2 mt_5">Explore our newest collection of stylish fashion</p>
    </div>
</div>
<!-- /page-title -->

<!-- Section Product -->
<section class="flat-spacing-2">
    <div class="container">
        <div class="wrapper-control-shop">
            <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
            </div>
        </div>
    </div>
</section>
<!-- /Section Product -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetch('products.json')
            .then(response => {
                if (!response.ok) throw new Error('Failed to fetch products');
                return response.json();
            })
            .then(products => {
                // Filter only products with newarrivals: true
                const newArrivals = products.filter(p => p.newarrivals === true);
                const container = document.getElementById('gridLayout');

                if (!container) return;

                if (newArrivals.length === 0) {
                    container.innerHTML = '<p class="no-products">No new arrivals currently available.</p>';
                    return;
                }

                const html = newArrivals.map(product => {
                    // Calculate discount percentage if compare_price exists
                    const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
                    const isWishlisted = wishlist.includes(product.id);
                    const discount = product.compare_price
                        ? Math.round(((product.compare_price - product.price) / product.compare_price) * 100)
                        : 0;

                    return `
                    <div class="card-product grid">
                        <div class="card-product-wrapper">
                            <a href="product-detail.php?id=${product.id}" class="product-img">
                                <img class="lazyload img-product" src="${product.images[0] || ''}" alt="${product.title}">
                                <img class="lazyload img-hover" src="${product.images[1] || product.images[0] || ''}" alt="${product.title}">
                                ${discount > 0 ? `<div class="badges-on-sale"><span>${discount}</span>% OFF</div>` : ''}
                                <div class="badges new-arrival-badge">New Arrival</div>
                            </a>
                            <div class="list-product-btn absolute-2">
                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add" data-product-id="${product.id}">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action wishlist-btn ${isWishlisted ? 'active' : ''}" data-product-id="${product.id}">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">${isWishlisted ? 'Remove from Wishlist' : 'Add to Wishlist'}</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.php?id=${product.id}" class="title link">${product.title}</a>
                            <div class="price-wrapper">
                                <span class="price current-price">$${product.price.toFixed(2)}</span>
                                
                            </div>
                        </div>
                    </div>
                `;
                }).join('');

                container.innerHTML = html;
            })
            .catch(error => {
                console.error('Error loading products:', error);
                const container = document.getElementById('gridLayout');
                if (container) {
                    container.innerHTML = '<p class="error-message">Failed to load new arrivals. Please try again later.</p>';
                }
            });
    });
</script>


<?php include 'layouts/footer.php'; ?>