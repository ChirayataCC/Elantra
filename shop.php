<?php include 'layouts/header.php'; ?>
<!-- page-title -->
<div class="tf-page-title my-md-5">
  <div class="container-full">
    <div class="heading text-center">Our Products</div>
    <p class="text-center text-2 text_black-2 mt_5">Explore the newest trends in fashion</p>
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
  function getCategoryFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get('category'); // e.g., ?category=men
  }

  document.addEventListener('DOMContentLoaded', () => {
    const selectedCategory = getCategoryFromURL();
    if (!selectedCategory) return;

    fetch('products.json')
      .then(response => {
        if (!response.ok) throw new Error('Failed to fetch products');
        return response.json();
      })
      .then(products => {
        const filtered = products.filter(p => p.category === selectedCategory);
        const container = document.getElementById('gridLayout');
        if (!container) return;

        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

        const html = filtered.map(product => {
          const isWishlisted = wishlist.includes(product.id);
          const mainImg = product.images?.[0] || 'images/products/placeholder.jpg';
          const hoverImg = product.images?.[1] || mainImg;

          return `
            <div class="card-product grid">
              <div class="card-product-wrapper">
                <a href="product-detail.php?id=${product.id}" class="product-img">
                  <img class="lazyload img-product" src="${mainImg}" alt="${product.title}">
                  <img class="lazyload img-hover" src="${hoverImg}" alt="${product.title}">
                </a>
                <div class="list-product-btn absolute-2">
                  <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add" data-product-id="${product.id}">
                    <span class="icon icon-bag"></span>
                    <span class="tooltip">Quick Add</span>
                  </a>
                  <a href="javascript:void(0);" 
                     class="box-icon bg_white wishlist btn-icon-action wishlist-btn ${isWishlisted ? 'active' : ''}" 
                     data-product-id="${product.id}">
                    <span class="icon icon-heart"></span>
                    <span class="tooltip">${isWishlisted ? 'Remove from Wishlist' : 'Add to Wishlist'}</span>
                    <span class="icon icon-delete"></span>
                  </a>
                </div>
              </div>
              <div class="card-product-info">
                <a href="product-detail.php?id=${product.id}" class="title link">${product.title}</a>
                <span class="price current-price">$${product.price.toFixed(2)}</span>
              </div>
            </div>
          `;
        }).join('');

        container.innerHTML = html;
      })
      .catch(error => console.error('Error loading products:', error));
  });
</script>



<?php include 'layouts/footer.php'; ?>