<?php require_once 'includes/header.php'; ?>

<!-- ═══════════════════════════════════════
     HERO SLIDESHOW
═══════════════════════════════════════ -->
<section class="relative overflow-hidden bg-gray-100 select-none">
  <div id="hero-slider" class="relative">

    <!-- Slide 1 -->
    <div class="hero-slide active">
      <img src="assets/hero-bg.jpg" alt="Home Decor Collection"
        class="w-full h-[55vw] max-h-[580px] min-h-[260px] object-cover" />
      <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
      <div class="absolute bottom-8 right-6 md:bottom-14 md:right-14">
        <a href="catalog.php"
          class="inline-block bg-white text-[#552c1c] font-semibold text-sm px-7 py-3 rounded-xl shadow-lg hover:bg-[#552c1c] hover:text-white transition-all duration-300">
          Shop Now
        </a>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide">
      <img src="assets/product1.jpg" alt="Kitchen Storage"
        class="w-full h-[55vw] max-h-[580px] min-h-[260px] object-cover" />
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
      <div class="absolute bottom-8 left-6 md:bottom-14 md:left-14 text-white">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] mb-2 opacity-80">New Arrival</p>
        <h2 class="text-xl md:text-4xl font-bold mb-4 leading-tight drop-shadow">Air-Tight Kitchen<br/>Storage Containers</h2>
        <a href="catalog.php"
          class="inline-block bg-[#552c1c] text-white font-semibold text-sm px-7 py-3 rounded-xl shadow-lg hover:bg-[#6b3622] transition-all duration-300">
          Shop Now
        </a>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide">
      <img src="assets/product2.jpg" alt="Home Essentials"
        class="w-full h-[55vw] max-h-[580px] min-h-[260px] object-cover" />
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
      <div class="absolute bottom-8 left-6 md:bottom-14 md:left-14 text-white">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] mb-2 opacity-80">Best Seller</p>
        <h2 class="text-xl md:text-4xl font-bold mb-4 leading-tight drop-shadow">Premium Home<br/>Essentials</h2>
        <a href="catalog.php"
          class="inline-block bg-[#552c1c] text-white font-semibold text-sm px-7 py-3 rounded-xl shadow-lg hover:bg-[#6b3622] transition-all duration-300">
          Shop Now
        </a>
      </div>
    </div>

    <!-- Prev / Next Arrows -->
    <button onclick="changeSlide(-1)"
      class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/70 hover:bg-white rounded-full flex items-center justify-center text-gray-700 shadow transition-all duration-200 z-10">
      <i class="fas fa-chevron-left text-sm"></i>
    </button>
    <button onclick="changeSlide(1)"
      class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-white/70 hover:bg-white rounded-full flex items-center justify-center text-gray-700 shadow transition-all duration-200 z-10">
      <i class="fas fa-chevron-right text-sm"></i>
    </button>

    <!-- Dots -->
    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2 z-10">
      <button onclick="goToSlide(0)" class="hero-dot w-2 h-2 rounded-full bg-white transition-all duration-300"></button>
      <button onclick="goToSlide(1)" class="hero-dot w-2 h-2 rounded-full bg-white transition-all duration-300"></button>
      <button onclick="goToSlide(2)" class="hero-dot w-2 h-2 rounded-full bg-white transition-all duration-300"></button>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════
     TOP CATEGORIES – PRODUCT CARDS
═══════════════════════════════════════ -->
<section class="bg-white py-10 md:py-14">
  <div class="max-w-[1200px] mx-auto px-4 lg:px-8">

    <!-- Section Title -->
    <div class="text-center mb-8">
      <h2 class="text-2xl md:text-[1.85rem] font-bold text-gray-900 tracking-tight">Our Top Categories</h2>
      <p class="text-gray-500 text-sm italic mt-1">Transform Your Home with Home'wera</p>
    </div>

    <!-- 3-column grid matching screenshot -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
      <?php
      $products = [
        [
          'name'     => 'Air-Tight Kitchen Storage Containers',
          'price'    => 'Rs. 1,149.00',
          'compare'  => 'Rs. 1,749.00',
          'discount' => '34',
          'img'      => 'product1.jpg',
          'href'     => 'catalog.php',
        ],
        [
          'name'     => 'Sprouts Maker Glass Jar | Hygienic Glass – 720mls 🌱',
          'price'    => 'Rs. 699.00',
          'compare'  => 'Rs. 999.00',
          'discount' => '30',
          'img'      => 'product2.jpg',
          'href'     => 'catalog.php',
        ],
        [
          'name'     => 'Premium Borosilicate Glass Spice Jar with Bamboo Lid - 270 ml 🫙',
          'price'    => 'Rs. 1,299.00',
          'compare'  => 'Rs. 1,699.00',
          'discount' => '23',
          'img'      => 'product3.jpg',
          'href'     => 'catalog.php',
        ],
        [
          'name'     => 'Food Grade Silicone Idli Liners (Eco-Friendly) ☘️',
          'price'    => 'Rs. 599.00',
          'compare'  => 'Rs. 999.00',
          'discount' => '40',
          'img'      => 'product4.jpg',
          'href'     => 'catalog.php',
        ],
        [
          'name'     => 'Stainless Steel Matka Stand With Dispenser Tray',
          'price'    => 'Rs. 899.00',
          'compare'  => 'Rs. 1,999.00',
          'discount' => '55',
          'img'      => 'product5.jpg',
          'href'     => 'catalog.php',
        ],
        [
          'name'     => 'Sun Protection Mask ☀️',
          'price'    => 'Rs. 399.00',
          'compare'  => 'Rs. 799.00',
          'discount' => '50',
          'img'      => 'product6.jpg',
          'href'     => 'catalog.php',
        ],
      ];
      foreach ($products as $p):
      ?>
      <!-- Card: white bg, rounded-2xl, subtle shadow, no hover scale -->
      <div class="bg-white rounded-2xl overflow-hidden"
           style="box-shadow: 0.2rem 0.6rem 1.5rem rgba(0,0,0,0.1);">

        <!-- Image wrapper with bottom-left badge -->
        <a href="<?php echo $p['href']; ?>" class="block relative">
          <img
            src="assets/<?php echo $p['img']; ?>"
            alt="<?php echo htmlspecialchars($p['name']); ?>"
            class="w-full aspect-square object-cover"
          />
          <!-- Green discount badge – bottom-left, tag icon -->
          <span class="absolute bottom-3 left-3 inline-flex items-center gap-1
                       bg-[#48682b] text-white text-[11px] font-bold
                       px-2.5 py-1 rounded-md leading-none">
            <svg class="w-3 h-3 fill-white shrink-0" viewBox="0 0 12 12">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M7 0h3a2 2 0 012 2v3a1 1 0 01-.3.7l-6 6a1 1 0 01-1.4
                   0l-4-4a1 1 0 010-1.4l6-6A1 1 0 017 0zm2 2a1 1 0 102
                   0 1 1 0 00-2 0z"/>
            </svg>
            SAVE <?php echo $p['discount']; ?>%
          </span>
        </a>

        <!-- Text block -->
        <div class="px-4 pt-4 pb-5 text-center">
          <!-- Name – bold, centered, wraps naturally like screenshot -->
          <a href="<?php echo $p['href']; ?>"
             class="block text-[15px] font-semibold text-gray-900 leading-snug mb-2
                    hover:underline">
            <?php echo htmlspecialchars($p['name']); ?>
          </a>

          <!-- Price row: brown sale price + gray strikethrough -->
          <p class="text-[14px] font-semibold">
            <span class="text-[#552c1c]">From <?php echo $p['price']; ?></span>
            <span class="text-gray-400 line-through font-normal ml-2 text-[13px]">
              <?php echo $p['compare']; ?>
            </span>
          </p>
        </div>

      </div>
      <?php endforeach; ?>
    </div>

    <!-- View all button -->
    <div class="text-center mt-10">
      <a href="catalog.php"
        class="inline-block bg-[#552c1c] text-white font-semibold text-sm
               px-8 py-3 rounded-xl hover:bg-[#6b3622] transition-colors">
        View all
      </a>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════
     ASSURANCE BAR
═══════════════════════════════════════ -->
<section class="bg-white py-12 border-y border-gray-100">
  <div class="max-w-7xl mx-auto px-4 lg:px-10">
    <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-10">
      The HOME<span class="text-[#6d388b]">'</span>WERA Assurance
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
      <?php
      $assurances = [
        ['icon' => 'fas fa-users',      'title' => 'Trusted by 10M+ Customers', 'desc' => 'Loved and trusted by over 10 million happy customers nationwide'],
        ['icon' => 'fas fa-motorcycle', 'title' => 'Cash On Delivery',           'desc' => 'Pay safely after delivery with our Cash on Delivery option'],
        ['icon' => 'fas fa-undo-alt',   'title' => '07-Days Returnable',         'desc' => 'Easy 7-day returns if the product doesn\'t meet your expectations'],
        ['icon' => 'fas fa-truck',      'title' => 'Free Shipping on all orders','desc' => 'Enjoy free delivery on every order. No hidden charges'],
      ];
      foreach ($assurances as $a):
      ?>
      <div class="flex flex-col items-center gap-3 p-4">
        <div class="w-14 h-14 bg-[#552c1c]/10 rounded-full flex items-center justify-center">
          <i class="<?php echo $a['icon']; ?> text-xl text-[#552c1c]"></i>
        </div>
        <h4 class="font-semibold text-gray-800 text-sm leading-tight"><?php echo $a['title']; ?></h4>
        <p class="text-gray-400 text-xs leading-relaxed"><?php echo $a['desc']; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     FEATURED ON
═══════════════════════════════════════ -->
<section class="bg-white py-6">
  <div class="max-w-[1200px] mx-auto px-4 lg:px-8">
    <div class="flex flex-wrap items-center justify-center gap-8 md:gap-10">

      <!-- Label -->
      <span class="text-[1.15rem] font-black text-gray-900 shrink-0 tracking-tight">Featured on</span>

      <!-- Justdial -->
      <span class="text-[2rem] font-black shrink-0 leading-none" style="font-family:'Arial Black',sans-serif;">
        <span style="color:#0062cc;">Just</span><span style="color:#ff6600;">dial</span>
      </span>

      <!-- Josh Talks -->
      <span class="shrink-0 inline-flex items-center justify-center w-[72px] h-[72px] rounded-full border-2 border-gray-300 relative">
        <span class="text-center leading-none">
          <span class="block text-[9px] font-black text-gray-700 tracking-tight">JOSH</span>
          <span class="inline-flex items-center gap-0.5">
            <span class="w-2 h-2 rounded-full bg-orange-500 flex items-center justify-center">
              <span class="w-1 h-1 rounded-full bg-white"></span>
            </span>
            <span class="text-[8px] font-black text-gray-700 tracking-tight">TALKS</span>
          </span>
        </span>
      </span>

      <!-- YourStory -->
      <span class="text-[1.35rem] font-black shrink-0 tracking-tight" style="color:#e8000d;font-family:'Arial Black',sans-serif;">YOURSTORY</span>

      <!-- India Today -->
      <span class="shrink-0 inline-flex items-center justify-center px-3 py-2 rounded" style="background:#cc0000;">
        <span class="text-white text-center leading-tight">
          <span class="block text-[11px] font-black tracking-widest">INDIA</span>
          <span class="block text-[11px] font-black tracking-widest">TODAY</span>
        </span>
      </span>

      <!-- Shark Tank India -->
      <span class="shrink-0 text-center leading-tight">
        <span class="block text-[11px] font-black tracking-widest" style="color:#0066cc;">SHARK</span>
        <span class="block text-[11px] font-black tracking-widest" style="color:#0066cc;">TANK</span>
        <span class="block text-[11px] font-black tracking-widest" style="color:#ff6600;">INDIA</span>
      </span>

      <!-- Walmart -->
      <span class="shrink-0 inline-flex items-center gap-1.5">
        <span class="text-[1.5rem] font-black" style="color:#0071ce;font-family:'Arial Black',sans-serif;">Walmart</span>
        <!-- Walmart spark icon -->
        <svg width="22" height="22" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <path d="M50 5 L54 42 L50 46 L46 42 Z" fill="#ffc220"/>
          <path d="M95 50 L58 54 L54 50 L58 46 Z" fill="#ffc220"/>
          <path d="M50 95 L46 58 L50 54 L54 58 Z" fill="#ffc220"/>
          <path d="M5 50 L42 46 L46 50 L42 54 Z" fill="#ffc220"/>
          <path d="M82 18 L60 50 L54 50 L60 44 Z" fill="#ffc220"/>
          <path d="M82 82 L50 60 L50 54 L56 60 Z" fill="#ffc220"/>
          <path d="M18 82 L40 50 L46 50 L40 56 Z" fill="#ffc220"/>
          <path d="M18 18 L50 40 L50 46 L44 40 Z" fill="#ffc220"/>
        </svg>
      </span>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     FEATURED PRODUCT — sticky right panel
═══════════════════════════════════════ -->
<style>
  /*
   * KEY TRICK for sticky-scroll:
   * The SECTION itself is the scroll container boundary.
   * Left col is naturally tall (many images stacked).
   * Right col uses position:sticky + top = header height.
   * Sticky releases automatically when the section bottom
   * scrolls past the viewport — browser handles it natively.
   */
  #fp-wrapper {
    display: flex;
    align-items: flex-start;
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 2rem 80px;
    gap: 64px;
  }

  /* LEFT: tall image gallery column */
  #fp-left {
    flex: 1.1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  #fp-left img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 16px;
    object-fit: cover;
  }

  /* RIGHT: sticky info panel */
  #fp-right {
    flex: 0.9;
    min-width: 0;
    position: sticky;
    top: 96px;          /* sticks 96px below top = just below sticky header */
    align-self: flex-start;
  }

  @media (max-width: 768px) {
    #fp-wrapper   { flex-direction: column; padding: 24px 1rem 48px; gap: 20px; }
    #fp-right     { position: static; }
  }
</style>

<section class="bg-white">
  <div id="fp-wrapper">

    <!-- ── LEFT: product image ── -->
    <div id="fp-left">
      <img src="assets/images/Stainless_Steel_Matka1.jpg" alt="Stainless Steel Matka Stand With Dispenser Tray" />
    </div>

    <!-- ── RIGHT: sticky — stays fixed until left col fully scrolled ── -->
    <div id="fp-right">

      <!-- Brand line exactly as in screenshot -->
      <p class="text-[11px] font-semibold tracking-[0.18em] text-gray-400 uppercase mb-4 flex items-center gap-2">
        <span>HOME'WERA</span>
        <span class="text-[9px] font-normal normal-case">THE TRUSTED HUB</span>
      </p>

      <!-- Product title -->
      <h2 class="text-[1.7rem] font-bold text-gray-900 leading-tight mb-5">
        Stainless Steel Matka Stand With Dispenser Tray
      </h2>

      <!-- Price row -->
      <div class="flex flex-wrap items-center gap-3 mb-7">
        <span class="text-[1.5rem] font-bold text-gray-900">Rs. 899.00</span>
        <span class="text-gray-400 line-through text-base font-normal">Rs. 1,999.00</span>
        <!-- Green tag badge -->
        <span class="inline-flex items-center gap-1 bg-[#48682b] text-white
                     text-[11px] font-bold px-2.5 py-1 rounded-md leading-none">
          <svg class="w-3 h-3 fill-white shrink-0" viewBox="0 0 12 12">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7 0h3a2 2 0 012 2v3a1 1 0 01-.3.7l-6 6a1
                 1 0 01-1.4 0l-4-4a1 1 0 010-1.4l6-6A1 1 0 017
                 0zm2 2a1 1 0 102 0 1 1 0 00-2 0z"/>
          </svg>
          SAVE 55%
        </span>
      </div>

      <!-- ADD TO CART — full width dark brown rounded -->
      <button
        onclick="addToCart('Stainless Steel Matka Stand With Dispenser Tray','Rs. 899.00','assets/product5.jpg')"
        class="w-full bg-[#552c1c] text-white font-bold tracking-[0.12em]
               text-sm py-[1.1rem] rounded-xl hover:bg-[#6b3622]
               active:scale-[0.985] transition-all duration-200 mb-5">
        ADD TO CART
      </button>

      <!-- View full details arrow link -->
      <a href="catalog.php"
         class="inline-flex items-center gap-1.5 text-gray-700 text-sm
                hover:text-[#552c1c] transition-colors duration-200">
        View full details
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
      </a>

    </div><!-- /#fp-right -->
  </div><!-- /#fp-wrapper -->
</section>

<!-- ═══════════════════════════════════════
     COLLECTIONS GRID
═══════════════════════════════════════ -->
<section class="bg-gray-50 py-12 md:py-16">
  <div class="max-w-7xl mx-auto px-4 lg:px-10">
    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Collections</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
      <?php
      $collections = [
        ['title' => 'Home & Kitchen Essentials', 'img' => 'product1.jpg', 'href' => 'catalog.php?cat=kitchen'],
        ['title' => 'Home Decor',                'img' => 'product3.jpg', 'href' => 'catalog.php?cat=decor'],
        ['title' => 'Women Essentials',          'img' => 'product6.jpg', 'href' => 'catalog.php?cat=women'],
      ];
      foreach ($collections as $c):
      ?>
      <a href="<?php echo $c['href']; ?>"
        class="relative group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 block aspect-square">
        <img src="assets/<?php echo $c['img']; ?>" alt="<?php echo htmlspecialchars($c['title']); ?>"
          class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/5 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
          <h3 class="font-semibold text-sm md:text-base leading-tight"><?php echo htmlspecialchars($c['title']); ?></h3>
          <span class="inline-flex items-center gap-1 text-xs text-white/70 mt-1">
            Shop Now <i class="fas fa-arrow-right text-[9px]"></i>
          </span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     MILESTONES
═══════════════════════════════════════ -->
<section class="bg-[#552c1c] py-12 md:py-16 text-white relative overflow-hidden">
  <div class="absolute inset-0 opacity-[0.06]"
    style="background-image:radial-gradient(circle,#fff 1px,transparent 1px);background-size:22px 22px;"></div>
  <div class="max-w-7xl mx-auto px-4 lg:px-10 relative">
    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold">
        HOME'WERA – Our <span class="underline decoration-white/40 decoration-2 underline-offset-4">Milestones</span> ❤️
      </h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php
      $milestones = [
        ['pct' => 95, 'title' => '10 Lakh+ Orders',    'desc' => 'Our team has successfully delivered over 10L+ orders across 224+ cities'],
        ['pct' => 99, 'title' => 'Zero-Risk Shopping', 'desc' => "Buy with complete confidence. Try it for 7 days — if it doesn't feel right, we'll resolve it quickly."],
        ['pct' => 96, 'title' => 'Positive Reviews',   'desc' => '9 out of 10 customers have zero complaint about our products'],
      ];
      foreach ($milestones as $m):
        $offset = round(176 * (1 - $m['pct'] / 100));
      ?>
      <div class="flex items-start gap-5 bg-white/10 rounded-2xl p-6">
        <div class="relative shrink-0 w-16 h-16">
          <svg class="w-16 h-16 -rotate-90" viewBox="0 0 64 64">
            <circle cx="32" cy="32" r="28" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="6"/>
            <circle cx="32" cy="32" r="28" fill="none" stroke="#facc15" stroke-width="6"
              stroke-dasharray="176" stroke-dashoffset="<?php echo $offset; ?>"
              stroke-linecap="round"/>
          </svg>
          <span class="absolute inset-0 flex items-center justify-center text-[11px] font-bold text-yellow-300">
            <?php echo $m['pct']; ?>%
          </span>
        </div>
        <div>
          <h3 class="font-bold text-base mb-1"><?php echo $m['title']; ?></h3>
          <p class="text-white/65 text-sm leading-relaxed"><?php echo $m['desc']; ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="text-center text-white/40 text-xs mt-8 italic">Trusted by 200,000+ Homes</p>
  </div>
</section>

<!-- ═══════════════════════════════════════
     VIDEO / REELS SECTION
═══════════════════════════════════════ -->
<section class="bg-white py-12 md:py-16">
  <div class="max-w-7xl mx-auto px-4 lg:px-10">
    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900">See It In Action</h2>
      <p class="text-gray-400 text-sm mt-1">Watch how our products transform everyday living</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
      <?php
      $reels = [
        ['img' => 'product1.jpg', 'title' => 'Storage Containers Demo'],
        ['img' => 'product2.jpg', 'title' => 'Sprouts Maker in Use'],
        ['img' => 'product3.jpg', 'title' => 'Spice Jar Unboxing'],
        ['img' => 'product4.jpg', 'title' => 'Silicone Idli Maker'],
        ['img' => 'product5.jpg', 'title' => 'Matka Stand Setup'],
        ['img' => 'product6.jpg', 'title' => 'Sun Protection Review'],
      ];
      foreach ($reels as $r):
      ?>
      <div class="relative rounded-2xl overflow-hidden group cursor-pointer shadow-md hover:shadow-xl transition-shadow">
        <img src="assets/<?php echo $r['img']; ?>" alt="<?php echo htmlspecialchars($r['title']); ?>"
          class="w-full aspect-[9/16] object-cover group-hover:scale-105 transition-transform duration-500" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        <div class="absolute inset-0 flex items-center justify-center">
          <div class="w-12 h-12 bg-[#552c1c]/80 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
            <i class="fas fa-play text-white text-base ml-1"></i>
          </div>
        </div>
        <p class="absolute bottom-3 left-3 right-3 text-white text-xs font-semibold leading-tight">
          <?php echo htmlspecialchars($r['title']); ?>
        </p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     TOAST
═══════════════════════════════════════ -->
<div id="toast"
  class="fixed bottom-6 left-1/2 -translate-x-1/2 z-[100] bg-[#552c1c] text-white text-sm font-medium
         px-6 py-3 rounded-xl shadow-xl opacity-0 pointer-events-none transition-opacity duration-300
         flex items-center gap-2 whitespace-nowrap">
  <i class="fas fa-check-circle text-green-300"></i>
  <span id="toast-msg">Added to cart!</span>
</div>

<?php require_once 'includes/footer.php'; ?>
