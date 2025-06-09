<?php include 'layouts/header.php'; ?>
<!-- Slider -->
<div class="tf-slideshow slider-effect-fade position-relative">
    <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false"
        data-space="0" data-loop="true" data-auto-play="false" data-delay="0" data-speed="1000">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="wrap-slider">
                    <img src="images/slider/fashion-slideshow-01.jpg" alt="fashion-slideshow">
                    <div class="box-content">
                        <div class="container">
                            <h1 class="fade-item fade-item-1">Bold <br>Style</h1>
                            <p class="fade-item fade-item-2">Discover sharp, confident looks for every modern man.</p>
                            <a href="shop.php?category=men"
                                class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop
                                    collection</span><i class="icon icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="wrap-slider">
                    <img src="images/slider/fashion-slideshow-02.jpg" alt="fashion-slideshow">
                    <div class="box-content">
                        <div class="container">
                            <h1 class="fade-item fade-item-1">Chic <br class="md-hidden">Trends</h1>
                            <p class="fade-item fade-item-2">Elevate your wardrobe with fresh, stylish pieces daily.</p>
                            <a href="shop.php?category=women"
                                class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop
                                    collection</span><i class="icon icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="wrap-slider">
                    <img src="images/slider/fashion-slideshow-03.jpg" alt="fashion-slideshow">
                    <div class="box-content">
                        <div class="container">
                            <h1 class="fade-item fade-item-1">Little <br>Looks</h1>
                            <p class="fade-item fade-item-2">Fun, comfy fashion perfect for playful growing adventures.</p>
                            <a href="shop.php?category=kids"
                                class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop
                                    collection</span><i class="icon icon-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="wrap-pagination">
        <div class="container">
            <div class="sw-dots sw-pagination-slider justify-content-center"></div>
        </div>
    </div>
</div>
<!-- /Slider -->
<!-- Categories -->
<section class="flat-spacing-4 flat-categorie">
    <div class="container-full">
        <div class="flat-title-v2">
            <div class="box-sw-navigation">
                <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-right"></span>
                </div>
            </div>
            <span class="text-3 fw-7 text-uppercase title wow fadeInUp" data-wow-delay="0s">SHOP BY
                CATEGORIES</span>
        </div>
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-8">
                <div dir="ltr" class="swiper tf-sw-collection" data-preview="3" data-tablet="2" data-mobile="2"
                    data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                    <div class="swiper-wrapper" id="collection-swiper-wrapper">

                    </div>
                    <script>
                        fetch('collection.json') // Adjust the path accordingly
                            .then(response => {
                                if (!response.ok) throw new Error('Network response was not ok');
                                return response.json();
                            })
                            .then(collections => {
                                const container = document.getElementById('collection-swiper-wrapper');

                                // Build all slides HTML as one string
                                const slidesHTML = collections.map(collection => `
                                <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-left hover-img">
                                    <div class="collection-inner">
                                    <a href="shop.php?category=${encodeURIComponent(collection.category)}" class="collection-image img-style">
                                        <img class="lazyload" src="${collection.image}" alt="${collection.title} collection">
                                    </a>
                                    <div class="collection-content">
                                        <a href="shop.php?category=${encodeURIComponent(collection.category)}" class="tf-btn collection-title hover-icon fs-15">
                                        <span>${collection.title}</span><i class="icon icon-arrow1-top-left"></i>
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            `).join('');

                                // Inject all slides at once
                                container.innerHTML = slidesHTML;

                                // Optional: Initialize or update swiper slider if using Swiper.js
                                // swiper.update();
                            })
                            .catch(error => console.error('Failed to load collections:', error));
                    </script>


                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4">
                <div class="discovery-new-item">
                    <h5>Discovery all new items</h5>
                    <a href="collection.php"><i class="icon-arrow1-top-left"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /Categories -->
<!-- Seller -->
<section class="flat-spacing-5 pt_0 flat-seller">
    <div class="container">
        <div class="flat-title">
            <span class="title wow fadeInUp" data-wow-delay="0s">Top Picks</span>
            <p class="sub-title wow fadeInUp" data-wow-delay="0s">Discover the Hottest Trends: Keep your style fresh
                with our latest arrivals</p>

        </div>
        <!-- Bestseller Products Container -->
        <div class="grid-layout loadmore-item wow fadeInUp" data-wow-delay="0s" data-grid="grid-4"
            id="bestseller-products"></div>

        <script>
            fetch('products.json')
                .then(response => response.json())
                .then(products => {
                    // Filter only bestseller products
                    const bestsellerProducts = products.filter(product => product.bestseller);
                    const container = document.getElementById('bestseller-products');

                    bestsellerProducts.forEach(product => {

                        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
                        // Use first image as main, second as hover image fallback to main if no second
                        const isWishlisted = wishlist.includes(product.id);
                        const mainImg = product.images?.[0] || 'images/placeholder.jpg';
                        const hoverImg = product.images?.[1] || mainImg;

                        // HTML template for each product card
                        const html = `
                <div class="card-product fl-item">
                <div class="card-product-wrapper">
                    <a href="product-detail.php?id=${product.id}" class="product-img">
                    <img class="lazyload img-product" data-src="${mainImg}" src="${mainImg}" alt="${product.title}">
                    <img class="lazyload img-hover" data-src="${hoverImg}" src="${hoverImg}" alt="${product.title}">
                    </a>
                    <div class="list-product-btn">
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
                    <span class="price">$${product.price.toFixed(2)}</span>
                </div>
                </div>
            `;

                        // Append product card HTML to container
                        container.insertAdjacentHTML('beforeend', html);
                    });
                })
                .catch(error => {
                    console.error('Error loading products.json:', error);
                });
        </script>

        <div class="tf-pagination-wrap view-more-button text-center">
            <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Load
                    more</span></button>
        </div>
    </div>
</section>
<!-- /Seller -->
<!-- Lookbook -->
<section class="flat-spacing-6">
    <div class="flat-title wow fadeInUp" data-wow-delay="0s">
        <span class="title">Style the Look</span>
        <p class="sub-title">Find inspiration and share your own — from one distinctive fashion to the next.</p>

    </div>
    <div dir="ltr" class="swiper tf-sw-lookbook" data-preview="2" data-tablet="2" data-mobile="1" data-space-lg="0"
        data-space-md="0">
        <div class="swiper-wrapper">
            <div class="swiper-slide" lazy="true">
                <div class="wrap-lookbook lookbook-1">
                    <div class="image">
                        <img class="lazyload" src="images/products/men/m001_2.jpg" alt="image-lookbook">
                    </div>
                    <div class="lookbook-item item-2">
                        <div class="inner">
                            <div class="btn-group dropdown dropup dropdown-center">
                                <button class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu p-0 border-0">
                                    <li>
                                        <div class="lookbook-product">
                                            <a href="product-detail.php?id=m001" class="image">
                                                <img class="lazyload" src="images/products/men/m001_2.jpg"
                                                    alt="lookbook-item">
                                            </a>
                                            <div class="content-wrap">
                                                <div class="product-title">
                                                    <a href="product-detail.php?id=m001">Men's 100% Cotton 220 GSM
                                                        Graphic Print Oversized Fit Round Neck T-Shirt</a>
                                                </div>
                                                <div class="price">$25.99</div>
                                            </div>
                                            <a href="product-detail.php?id=m001" class=""><i
                                                    class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" lazy="true">
                <div class="wrap-lookbook lookbook-2">
                    <div class="image">
                        <img class="lazyload" src="images/products/women/w003_2.jpg" alt="image-lookbook">
                    </div>
                    <div class="lookbook-item item-1">
                        <div class="inner">
                            <div class="btn-group dropdown dropup dropdown-center">
                                <button class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu p-0 border-0">
                                    <li>
                                        <div class="lookbook-product">
                                            <a href="product-detail.php?id=w003" class="image">
                                                <img class="lazyload" src="images/products/women/w003_2.jpg" alt="">
                                            </a>
                                            <div class="content-wrap">
                                                <div class="product-title">
                                                    <a href="product-detail.php?id=w003">Women's Rayon Viscose Anarkali
                                                        Printed Kurta with Palazzo & Dupatta</a>
                                                </div>
                                                <div class="price">$69.99</div>
                                            </div>
                                            <a href="product-detail.php?id=w003" class=""><i
                                                    class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-pagination">
            <div class="container-full">
                <div class="sw-dots sw-pagination-lookbook justify-content-center"></div>
            </div>
        </div>
    </div>
</section>
<!-- /Lookbook -->
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
<!-- Shop Gram -->
<section class="flat-spacing-7">
    <div class="container">
        <div class="flat-title wow fadeInUp" data-wow-delay="0s">
            <span class="title">Shop Gram</span>
            <p class="sub-title">Inspire and let yourself be inspired, from one unique fashion to another.</p>
        </div>
        <div class="wrap-carousel wrap-shop-gram">
            <div dir="ltr" class="swiper tf-sw-shop-gallery" data-preview="5" data-tablet="3" data-mobile="2"
                data-space-lg="7" data-space-md="7">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".2s">
                            <div class="img-style">
                                <img class="lazyload img-hover" src="images/products/men/m003_2.jpg"
                                    alt="image-gallery">
                            </div>
                            <a href="#quick_add" data-product-id="m003" data-bs-toggle="modal"
                                class="quick-add box-icon"><span class="icon icon-bag"></span> <span
                                    class="tooltip">Quick Add</span></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".3s">
                            <div class="img-style">
                                <img class="lazyload img-hover" src="images/products/women/w002_2.jpg"
                                    alt="image-gallery">
                            </div>
                            <a href="#quick_add" data-product-id="w002" data-bs-toggle="modal"
                                class="quick-add box-icon"><span class="icon icon-bag"></span> <span
                                    class="tooltip">Quick Add</span></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".4s">
                            <div class="img-style">
                                <img class="lazyload img-hover" src="images/products/kids/k001_2.jpg"
                                    alt="image-gallery">
                            </div>
                            <a href="#quick_add" data-product-id="k001" data-bs-toggle="modal"
                                class="quick-add box-icon"><span class="icon icon-bag"></span> <span
                                    class="tooltip">Quick Add</span></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".5s">
                            <div class="img-style">
                                <img class="lazyload img-hover" src="images/products/sunglasses/s002_2.jpg"
                                    alt="image-gallery">
                            </div>
                            <a href="product-detail.php?id=s002" class="box-icon"><span class="icon icon-bag"></span>
                                <span class="tooltip">View product</span></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".6s">
                            <div class="img-style">
                                <img class="lazyload img-hover" src="images/products/bag/b001_1.jpg"
                                    alt="image-gallery">
                            </div>
                            <a href="product-detail.php?id=b001" class="box-icon"><span class="icon icon-bag"></span>
                                <span class="tooltip">View product</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-dots sw-pagination-gallery justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Shop Gram -->
<!-- Icon box -->
<section class="flat-spacing-7 flat-iconbox wow fadeInUp" data-wow-delay="0s">
    <div class="container">
        <div class="wrap-carousel wrap-mobile">
            <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                <div class="swiper-wrapper wrap-iconbox">
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-border-line text-center">
                            <div class="icon">
                                <i class="icon-shipping"></i>
                            </div>
                            <div class="content">
                                <div class="title">Free Shipping</div>
                                <p>Free shipping over order $120</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-border-line text-center">
                            <div class="icon">
                                <i class="icon-payment fs-22"></i>
                            </div>
                            <div class="content">
                                <div class="title">Flexible Payment</div>
                                <p>Pay with Multiple Credit Cards</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-border-line text-center">
                            <div class="icon">
                                <i class="icon-return fs-22"></i>
                            </div>
                            <div class="content">
                                <div class="title">14 Day Returns</div>
                                <p>Within 30 days for an exchange</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box style-border-line text-center">
                            <div class="icon">
                                <i class="icon-suport"></i>
                            </div>
                            <div class="content">
                                <div class="title">Premium Support</div>
                                <p>Outstanding premium support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
        </div>
    </div>
</section>
<!-- /Icon box -->


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