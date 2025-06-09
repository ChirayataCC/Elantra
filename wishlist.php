<?php include 'layouts/header.php'; ?>

<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">Your wishlist</div>
    </div>
</div>
<!-- /page-title -->

<!-- Section Product -->
<section class="flat-spacing-2">
    <div class="container">
        <div class="grid-layout wrapper-shop" data-grid="grid-4" id="wishlist-container">
            <!-- Wishlist products will be injected here -->
        </div>

    </div>
</section>
<!-- /Section Product -->


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

        if (wishlist.length === 0) {
            document.getElementById('wishlist-container').innerHTML = '<p>Your wishlist is empty.</p>';
            return;
        }

        fetch('products.json')
            .then(res => res.json())
            .then(products => {
                const wishlistProducts = products.filter(p => wishlist.includes(p.id));
                const container = document.getElementById('wishlist-container');

                container.innerHTML = wishlistProducts.map(product => {
                    const mainImg = product.images?.[0] || 'images/products/placeholder.jpg';
                    const hoverImg = product.images?.[1] || mainImg;
                    const link = `product-detail.php?id=${product.id}`;
                    const colors = Array.isArray(product.color) ? product.color : [];

                    return `
                <div class="card-product">
                    <div class="card-product-wrapper">
                        <a href="${link}" class="product-img">
                            <img class="lazyload img-product" src="${mainImg}" alt="image-product">
                            <img class="lazyload img-hover" src="${hoverImg}" alt="image-product">
                        </a>
                        <div class="list-product-btn type-wishlist">
                            <a href="javascript:void(0);" class="box-icon bg_white wishlist-remove-btn" data-product-id="${product.id}">
                                <span class="tooltip">Remove Wishlist</span>
                                <span class="icon icon-delete"></span>
                            </a>
                        </div>
                        <div class="list-product-btn">
                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add" data-product-id="${product.id}">
                                <span class="icon icon-bag"></span>
                                <span class="tooltip">Quick Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-product-info">
                        <a href="${link}" class="title link">${product.title}</a>
                        <span class="price">$${product.price.toFixed(2)}</span>
                    </div>
                </div>`;
                }).join('');

                // Handle wishlist removal
                document.querySelectorAll('.wishlist-remove-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.productId;

                        // Remove from localStorage
                        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
                        wishlist = wishlist.filter(pid => pid !== id);
                        localStorage.setItem('wishlist', JSON.stringify(wishlist));

                        // Remove the product card from DOM
                        const card = btn.closest('.card-product');
                        if (card) card.remove();

                        // Update wishlist count in navbar (if applicable)
                        const countBox = document.querySelector('.nav-icon-item .count-box');
                        if (countBox) countBox.textContent = wishlist.length;

                        // Show "empty" message if nothing left
                        if (wishlist.length === 0) {
                            document.getElementById('wishlist-container').innerHTML = '<p>Your wishlist is empty.</p>';
                        }
                    });
                });

            })
            .catch(err => {
                console.error('Error loading wishlist:', err);
                document.getElementById('wishlist-container').innerHTML = '<p>Failed to load wishlist.</p>';
            });
    });

</script>


<?php include 'layouts/footer.php'; ?>