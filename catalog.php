<?php require_once 'includes/header.php'; ?>

<!-- ===== PAGE HEADER ===== -->
<section class="page-header">
    <div class="container">
        <h1>Our Catalog</h1>
        <p>Explore our curated collection of home decor and kitchen products</p>
    </div>
</section>

<!-- ===== CATALOG FILTERS (optional) ===== -->
<section class="catalog-filters">
    <div class="container">
        <div class="filter-bar">
            <div class="filter-group">
                <label>Category</label>
                <select>
                    <option>All</option>
                    <option>Kitchen</option>
                    <option>Decor</option>
                    <option>Eco-Friendly</option>
                </select>
            </div>
            <div class="filter-group">
                <label>Sort By</label>
                <select>
                    <option>Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- ===== PRODUCT GRID ===== -->
<section class="product-section">
    <div class="container">
        <div class="product-grid">
            <?php
            // More product items (for demo)
            $allProducts = [
                ['name' => 'Ceramic Vase Set', 'price' => '₹1,299', 'img' => 'product1.jpg'],
                ['name' => 'Wooden Serving Board', 'price' => '₹899', 'img' => 'product2.jpg'],
                ['name' => 'Copper Water Bottle', 'price' => '₹1,599', 'img' => 'product3.jpg'],
                ['name' => 'Cotton Table Runner', 'price' => '₹699', 'img' => 'product4.jpg'],
                ['name' => 'Glass Candle Holder', 'price' => '₹499', 'img' => 'product5.jpg'],
                ['name' => 'Bamboo Cutlery Set', 'price' => '₹799', 'img' => 'product6.jpg'],
                ['name' => 'Terracotta Pot', 'price' => '₹399', 'img' => 'product1.jpg'],
                ['name' => 'Linen Cushion Cover', 'price' => '₹599', 'img' => 'product2.jpg'],
            ];
            foreach ($allProducts as $product) :
            ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="assets/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>" />
                </div>
                <div class="product-info">
                    <h3><?php echo $product['name']; ?></h3>
                    <p class="price"><?php echo $product['price']; ?></p>
                    <a href="#" class="btn-add-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Pagination (dummy) -->
        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>