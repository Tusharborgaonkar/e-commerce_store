<?php require_once 'includes/header.php'; ?>

<!-- ===== HERO SLIDESHOW ===== -->
<section class="relative overflow-hidden bg-gray-100">
  <div id="hero-slider" class="relative">

    <!-- Slide 1 -->
    <div class="hero-slide active relative">
      <img src="assets/hero-bg.jpg" alt="Home Decor Collection"
        class="w-full h-[55vw] max-h-[600px] min-h-[280px] object-cover" />
      <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
      <div class="absolute bottom-8 right-6 md:bottom-14 md:right-14">
        <a href="catalog.php"
          class="inline-block bg-white text-[#552c1c] font-semibold text-sm px-6 py-3 rounded-xl shadow-lg hover:bg-[#552c1c] hover:text-white transition-all duration-300">
          Shop Now
        </a>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide relative">
      <img src="assets/product1.jpg" alt="Kitchen Storage"
        class="w-full h-[55vw] max-h-[600px] min-h-[280px] object-cover" />
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
      <div class="absolute bottom-8 left-6 md:bottom-14 md:left-14 text-white">
        <p class="text-xs font-semibold uppercase tracking-widest mb-2 opacity-80">New Arrival</p>
        <h2 class="text-2xl md:text-4xl font-bold mb-4 leading-tight">Air-Tight Kitchen<br/>Storage Containers</h2>
        <a href="catalog.php"
          class="inline-block bg-[#552c1c] text-white font-semibold text-sm px-6 py-3 rounded-xl shadow-lg hover:bg-[#753f2a] transition-all duration-300">
          Shop Now
        </a>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide relative">
      <img src="assets/product2.jpg" alt="Home Essentials"
        class="w-full h-[55vw] max-h-[600px] min-h-[280px] object-cover" />
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
      <div class="absolute bottom-8 left-6 md:bottom-14 md:left-14 text-white">
        <p class="text-xs font-semibold uppercase tracking-widest mb-2 opacity-80">Best Seller</p>
        <h2 class="text-2xl md:text-4xl font-bold mb-4 leading-tight">Premium Home<br/>Essentials</h2>
        <a href="catalog.php"
          class="inline-block bg-[#552c1c] text-white font-semibold text-sm px-6 py-3 rounded-xl shadow-lg hover:bg-[#753f2a] transition-all duration-300">
          Shop Now
        </a>
      </div>
    </div>

    <!-- Dots -->
    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
      <button onclick="goToSlide(0)" class="hero-dot w-2 h-2 rounded-full bg-white opacity-60 transition-all duration-300"></button>
      <button onclick="goToSlide(1)" class="hero-dot w-2 h-2 rounded-full bg-white opacity-60 transition-all duration-300"></button>
      <button onclick="goToSlide(2)" class="hero-dot w-2 h-2 rounded-full bg-white opacity-60 transition-all duration-300"></button>
    </div>

    <!-- Prev / Next -->
    <button onclick="changeSlide(-1)"
      class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/70 hover:bg-white rounded-full flex items-center justify-center text-gray-700 shadow transition-all duration-200">
      <i class="fas fa-chevron-left text-sm"></i>
    </button>
    <button onclick="changeSlide(1)"
      class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/70 hover:bg-white rounded-full flex items-center justify-center text-gray-700 shadow transition-all duration-200">
      <i class="fas fa-chevron-right text-sm"></i>
    </button>
  </div>
</section>

<!-- ===== TRUST / ASSURANCE BAR ===== -->
<section class="bg-white border-y border-gray-100 py-8">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">
    <h2 class="text-center text-xl md:text-2xl font-bold text-gray-800 mb-8">
      The <span class="text-[#6d388b]">HOME'WERA</span> Assurance
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">

      <?php
      $assurances = [
        ['icon' => 'fas fa-users', 'title' => 'Trusted by 10M+ Customers', 'desc' => 'Loved and trusted by over 10 million happy customers nationwide'],
        ['icon' => 'fas fa-motorcycle', 'title' => 'Cash On Delivery', 'desc' => 'Pay safely after delivery with our Cash on Delivery option'],
        ['icon' => 'fas fa-undo-alt', 'title' => '7-Days Returnable', 'desc' => 'Easy 7-day returns if the product doesn\'t meet your expectations'],
        ['icon' => 'fas fa-truck', 'title' => 'Free Shipping', 'desc' => 'Enjoy free delivery on every order. No hidden charges'],
      ];
      foreach ($assurances as $item):
      ?>
      <div class="flex flex-col items-center gap-3 p-4 rounded-2xl hover:bg-gray-50 transition-colors">
        <div class="w-14 h-14 bg-[#552c1c]/10 rounded-full flex items-center justify-center">
          <i class="<?php echo $item['icon']; ?> text-xl text-[#552c1c]"></i>
        </div>
        <h4 class="font-semibold text-gray-800 text-sm leading-tight"><?php echo $item['title']; ?></h4>
        <p class="text-gray-500 text-xs leading-relaxed"><?php echo $item['desc']; ?></p>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- ===== TOP CATEGORIES / PRODUCT CARDS ===== -->
<section class="bg-gray-50 py-14">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">

    <!-- Section Title -->
    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
        Our Top <span class="text-[#6d388b]">Categories</span>
      </h2>
      <p class="text-gray-500 mt-2 text-sm italic">Transform Your Home with Home'wera</p>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 md:gap-7">

      <?php
      $products = [
        [
          'name'     => 'Air-Tight Kitchen Storage Containers',
          'price'    => '₹1,149',
          'compare'  => '₹1,749',
          'discount' => '34',
          'img'      => 'product1.jpg',
        ],
        [
          'name'     => 'Sprouts Maker Glass Jar 720ml 🌱',
          'price'    => '₹699',
          'compare'  => '₹999',
          'discount' => '30',
          'img'      => 'product2.jpg',
        ],
        [
          'name'     => 'Borosilicate Glass Spice Jar 270ml 🫙',
          'price'    => '₹1,299',
          'compare'  => '₹1,699',
          'discount' => '23',
          'img'      => 'product3.jpg',
        ],
        [
          'name'     => 'Silicone Idli Liners Eco-Friendly ☘️',
          'price'    => '₹599',
          'compare'  => '₹999',
          'discount' => '40',
          'img'      => 'product4.jpg',
        ],
        [
          'name'     => 'Stainless Steel Matka Stand with Tray',
          'price'    => '₹899',
          'compare'  => '₹1,999',
          'discount' => '55',
          'img'      => 'product5.jpg',
        ],
        [
          'name'     => 'Sun Protection Mask ☀️',
          'price'    => '₹399',
          'compare'  => '₹799',
          'discount' => '50',
          'img'      => 'product6.jpg',
        ],
        [
          'name'     => 'Wooden Serving Board',
          'price'    => '₹849',
          'compare'  => '₹1,299',
          'discount' => '35',
          'img'      => 'product2.jpg',
        ],
        [
          'name'     => 'Copper Water Bottle Premium',
          'price'    => '₹1,199',
          'compare'  => '₹1,799',
          'discount' => '33',
          'img'      => 'product3.jpg',
        ],
      ];
      foreach ($products as $p):
      ?>
      <div class="bg-white rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.08)] hover:shadow-[0_6px_24px_rgba(0,0,0,0.14)] hover:-translate-y-1 transition-all duration-300 group">
        <!-- Image -->
        <div class="relative overflow-hidden">
          <img src="assets/<?php echo $p['img']; ?>" alt="<?php echo $p['name']; ?>"
            class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500" />
          <!-- Discount Badge -->
          <span class="absolute top-2 left-2 bg-[#48682b] text-white text-[10px] font-bold px-2 py-1 rounded-md flex items-center gap-1">
            <i class="fas fa-tag text-[8px]"></i> SAVE <?php echo $p['discount']; ?>%
          </span>
        </div>
        <!-- Info -->
        <div class="p-3 md:p-4 text-center">
          <h3 class="text-xs md:text-sm font-semibold text-gray-800 leading-snug mb-2 line-clamp-2"><?php echo $p['name']; ?></h3>
          <div class="flex items-center justify-center gap-2 mb-3">
            <span class="text-[#552c1c] font-bold text-sm md:text-base"><?php echo $p['price']; ?></span>
            <span class="text-gray-400 line-through text-xs"><?php echo $p['compare']; ?></span>
          </div>
          <button
            onclick="addToCart('<?php echo addslashes($p['name']); ?>', '<?php echo $p['price']; ?>', 'assets/<?php echo $p['img']; ?>')"
            class="w-full bg-[#552c1c] text-white text-xs font-semibold py-2 rounded-xl hover:bg-[#753f2a] transition-colors duration-200">
            Add to Cart
          </button>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

    <!-- View All CTA -->
    <div class="text-center mt-10">
      <a href="catalog.php"
        class="inline-flex items-center gap-2 bg-[#552c1c] text-white font-semibold px-8 py-3 rounded-xl hover:bg-[#753f2a] transition-colors duration-200 shadow-md">
        View All Products <i class="fas fa-arrow-right text-sm"></i>
      </a>
    </div>

  </div>
</section>

<!-- ===== FEATURED ON / LOGO BAR ===== -->
<section class="bg-white py-10 border-y border-gray-100">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">
    <h2 class="text-center text-xl md:text-2xl font-bold text-gray-800 mb-8">Featured On</h2>
    <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
      <span class="text-2xl font-black text-gray-800 tracking-tight">JustDial</span>
      <span class="text-2xl font-black text-blue-600 tracking-tight">EKART</span>
      <span class="text-2xl font-black text-red-600 tracking-tight">Shiprocket</span>
      <span class="text-2xl font-black text-orange-500 tracking-tight">Delhivery</span>
      <span class="text-2xl font-black text-blue-800 tracking-tight">BlueDart</span>
      <span class="text-2xl font-black text-green-700 tracking-tight">DTDC</span>
    </div>
  </div>
</section>

<!-- ===== COLLECTIONS GRID ===== -->
<section class="bg-gray-50 py-14">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">

    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Collections</h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-5 md:gap-7">

      <?php
      $collections = [
        ['title' => 'Home & Kitchen Essentials', 'img' => 'product1.jpg', 'href' => 'catalog.php?cat=kitchen'],
        ['title' => 'Home Decor',                'img' => 'product3.jpg', 'href' => 'catalog.php?cat=decor'],
        ['title' => 'Women Essentials',          'img' => 'product6.jpg', 'href' => 'catalog.php?cat=women'],
      ];
      foreach ($collections as $c):
      ?>
      <a href="<?php echo $c['href']; ?>"
        class="relative group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 block">
        <img src="assets/<?php echo $c['img']; ?>" alt="<?php echo $c['title']; ?>"
          class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
          <h3 class="font-semibold text-sm md:text-base leading-tight"><?php echo $c['title']; ?></h3>
          <span class="inline-flex items-center gap-1 text-xs text-white/80 mt-1 group-hover:gap-2 transition-all">
            Shop Now <i class="fas fa-arrow-right text-[10px]"></i>
          </span>
        </div>
      </a>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- ===== MILESTONES / STATS ===== -->
<section class="bg-[#552c1c] py-14 text-white relative overflow-hidden">
  <!-- subtle pattern overlay -->
  <div class="absolute inset-0 opacity-5"
    style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 24px 24px;"></div>

  <div class="max-w-7xl mx-auto px-4 lg:px-8 relative">
    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold">
        HOME'WERA – Our <span class="underline decoration-[#6d388b] decoration-4 underline-offset-4">Milestones</span> ❤️
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <?php
      $milestones = [
        ['num' => '95%', 'title' => '10 Lakh+ Orders', 'desc' => 'Our team has successfully delivered over 10L+ orders across 224+ cities'],
        ['num' => '99%', 'title' => 'Zero-Risk Shopping', 'desc' => 'Buy with complete confidence. Try it for 7 days — if it doesn\'t feel right, we\'ll resolve it quickly.'],
        ['num' => '96%', 'title' => 'Positive Reviews', 'desc' => '9 out of 10 customers have zero complaint about our products'],
      ];
      foreach ($milestones as $m):
      ?>
      <div class="flex items-start gap-5 bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
        <!-- Circle Progress (CSS only) -->
        <div class="relative shrink-0">
          <svg class="w-16 h-16 -rotate-90" viewBox="0 0 64 64">
            <circle cx="32" cy="32" r="28" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="6"/>
            <circle cx="32" cy="32" r="28" fill="none" stroke="#facc15" stroke-width="6"
              stroke-dasharray="176"
              stroke-dashoffset="<?php echo round(176 * (1 - intval($m['num']) / 100)); ?>"
              stroke-linecap="round"/>
          </svg>
          <span class="absolute inset-0 flex items-center justify-center text-xs font-bold text-yellow-300"><?php echo $m['num']; ?></span>
        </div>
        <div>
          <h3 class="font-bold text-base mb-1"><?php echo $m['title']; ?></h3>
          <p class="text-white/70 text-sm leading-relaxed"><?php echo $m['desc']; ?></p>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

    <p class="text-center text-white/50 text-sm mt-8 italic">Trusted by 200,000+ Homes</p>
  </div>
</section>

<!-- ===== FEATURED PRODUCT ===== -->
<section class="bg-white py-14">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

      <!-- Image Gallery -->
      <div>
        <div class="rounded-2xl overflow-hidden shadow-lg aspect-square">
          <img id="featured-main-img" src="assets/product5.jpg" alt="Stainless Steel Matka Stand"
            class="w-full h-full object-cover transition-opacity duration-300" />
        </div>
        <!-- Thumbnails -->
        <div class="flex gap-3 mt-4">
          <?php
          $thumbs = ['product5.jpg','product1.jpg','product2.jpg','product3.jpg'];
          foreach ($thumbs as $t):
          ?>
          <button onclick="document.getElementById('featured-main-img').src='assets/<?php echo $t; ?>'"
            class="w-16 h-16 rounded-xl overflow-hidden border-2 border-gray-200 hover:border-[#552c1c] transition-colors">
            <img src="assets/<?php echo $t; ?>" alt="thumb" class="w-full h-full object-cover" />
          </button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Product Info -->
      <div>
        <p class="text-xs uppercase tracking-widest text-[#6d388b] font-semibold mb-2">Featured Product</p>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 leading-tight">
          Stainless Steel Matka Stand<br/>With Dispenser Tray
        </h2>
        <div class="flex items-center gap-3 mb-4">
          <span class="text-3xl font-bold text-[#552c1c]">₹899</span>
          <span class="text-gray-400 line-through text-lg">₹1,999</span>
          <span class="bg-[#48682b] text-white text-xs font-bold px-2 py-1 rounded-md">SAVE 55%</span>
        </div>
        <!-- Stars -->
        <div class="flex items-center gap-2 mb-5">
          <div class="flex text-yellow-400 text-sm">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
          </div>
          <span class="text-xs text-gray-500">(4.5 • 2,400+ reviews)</span>
        </div>

        <!-- Features -->
        <ul class="space-y-2 text-sm text-gray-600 mb-6">
          <li class="flex items-start gap-2"><i class="fas fa-check-circle text-[#48682b] mt-0.5"></i> 100% Stainless Steel – Rust-resistant & durable</li>
          <li class="flex items-start gap-2"><i class="fas fa-check-circle text-[#48682b] mt-0.5"></i> Bottom tray collects drip water – zero wastage</li>
          <li class="flex items-start gap-2"><i class="fas fa-check-circle text-[#48682b] mt-0.5"></i> Keeps water cool naturally in clay matka</li>
          <li class="flex items-start gap-2"><i class="fas fa-check-circle text-[#48682b] mt-0.5"></i> Traditional decor touch for home & office</li>
        </ul>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-3">
          <button onclick="addToCart('Stainless Steel Matka Stand','₹899','assets/product5.jpg')"
            class="flex-1 bg-[#552c1c] text-white font-semibold py-3 rounded-xl hover:bg-[#753f2a] transition-colors text-sm">
            Add to Cart
          </button>
          <a href="catalog.php"
            class="flex-1 border-2 border-[#552c1c] text-[#552c1c] font-semibold py-3 rounded-xl hover:bg-[#552c1c] hover:text-white transition-colors text-sm text-center">
            View Full Details →
          </a>
        </div>

        <!-- Trust badges -->
        <div class="flex flex-wrap gap-4 mt-5 text-xs text-gray-500">
          <span class="flex items-center gap-1"><i class="fas fa-truck text-[#552c1c]"></i> Free Shipping</span>
          <span class="flex items-center gap-1"><i class="fas fa-undo text-[#552c1c]"></i> 7-Day Returns</span>
          <span class="flex items-center gap-1"><i class="fas fa-shield-alt text-[#552c1c]"></i> Secure Payment</span>
          <span class="flex items-center gap-1"><i class="fas fa-motorcycle text-[#552c1c]"></i> Cash on Delivery</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== VIDEO / REELS SECTION ===== -->
<section class="bg-gray-50 py-14">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">

    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
        See It In <span class="text-[#6d388b]">Action</span>
      </h2>
      <p class="text-gray-500 text-sm mt-2">Watch how our products transform everyday living</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
      <?php
      $vids = [
        ['img' => 'product1.jpg', 'title' => 'Storage Containers Demo'],
        ['img' => 'product2.jpg', 'title' => 'Sprouts Maker in Use'],
        ['img' => 'product3.jpg', 'title' => 'Spice Jar Unboxing'],
        ['img' => 'product4.jpg', 'title' => 'Silicone Idli Maker'],
        ['img' => 'product5.jpg', 'title' => 'Matka Stand Setup'],
        ['img' => 'product6.jpg', 'title' => 'Sun Protection Review'],
      ];
      foreach ($vids as $v):
      ?>
      <div class="relative rounded-2xl overflow-hidden group cursor-pointer shadow-md hover:shadow-xl transition-shadow">
        <img src="assets/<?php echo $v['img']; ?>" alt="<?php echo $v['title']; ?>"
          class="w-full aspect-[9/16] object-cover group-hover:scale-105 transition-transform duration-500" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        <!-- Play Button -->
        <div class="absolute inset-0 flex items-center justify-center">
          <div class="w-14 h-14 bg-[#552c1c]/80 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
            <i class="fas fa-play text-white text-lg ml-1"></i>
          </div>
        </div>
        <p class="absolute bottom-3 left-3 right-3 text-white text-xs font-semibold leading-tight"><?php echo $v['title']; ?></p>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ===== TOAST NOTIFICATION ===== -->
<div id="toast"
  class="fixed bottom-6 left-1/2 -translate-x-1/2 z-[100] bg-[#552c1c] text-white text-sm font-medium px-6 py-3 rounded-xl shadow-xl opacity-0 pointer-events-none transition-all duration-300 flex items-center gap-2">
  <i class="fas fa-check-circle text-green-300"></i>
  <span id="toast-msg">Added to cart!</span>
</div>

<?php require_once 'includes/footer.php'; ?>
