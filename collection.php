<?php include 'layouts/header.php'; ?>

<!-- page-title -->
<div class="tf-page-title mt-md-5">
    <div class="container-full">
        <div class="heading text-center">Collections</div>
    </div>
</div>
<!-- /page-title -->
<section class="flat-spacing-1">
    <div class="container">
        <div class="tf-grid-layout xl-col-3 tf-col-2" id="collection">
            
        </div>
        <script>
            fetch('collection.json') // Adjust the path accordingly
                .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
                })
                .then(collections => {
                const container = document.getElementById('collection');

                // Build all slides HTML as one string
                const slidesHTML = collections.map(collection => `
                    <div class="collection-item hover-img">
                        <div class="collection-inner">
                            <a href="shop.php?category=${encodeURIComponent(collection.category)}" class="collection-image img-style">
                                <img class="lazyload" src="${collection.image}" alt="${collection.title} collection">
                            </a>
                            <div class="collection-content">
                                <a href="shop.php?category=${encodeURIComponent(collection.category)}" class="tf-btn collection-title hover-icon"><span>${collection.title}</span><i
                                        class="icon icon-arrow1-top-left"></i></a>
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
</section>

<?php include 'layouts/footer.php'; ?>