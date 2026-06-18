<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HOME'WERA – Modern Home Decor Store | Stylish & Affordable</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#552c1c',
          },
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
          keyframes: {
            ticker: {
              '0%':   { transform: 'translateX(0)' },
              '100%': { transform: 'translateX(-50%)' },
            },
          },
          animation: {
            ticker: 'ticker 35s linear infinite',
          },
        },
      },
    }
  </script>

  <!-- Poppins Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    * { box-sizing: border-box; }
    body { font-family: 'Poppins', sans-serif; }

    /* ── Announcement ticker ── */
    .ticker-wrap  { overflow: hidden; white-space: nowrap; }
    .ticker-track {
      display: inline-flex;
      gap: 3rem;
      animation: ticker 35s linear infinite;
    }
    @keyframes ticker {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }

    /* ── Cart drawer ── */
    .cart-drawer { transform: translateX(100%); transition: transform 0.35s ease; }
    .cart-drawer.open { transform: translateX(0); }

    /* ── Mobile menu ── */
    #mobile-menu { display: none; }
    #mobile-menu.open { display: block; }

    /* ── Hero slider ── */
    .hero-slide { display: none; }
    .hero-slide.active { display: block; }

    /* ── Scroll progress ── */
    #scroll-progress {
      position: fixed; top: 0; left: 0;
      height: 3px; width: 0%;
      background: #552c1c;
      z-index: 9999;
      transition: width 0.1s linear;
    }
  </style>
</head>
<body class="bg-white text-gray-800 overflow-x-hidden">

<!-- Scroll Progress Bar -->
<div id="scroll-progress"></div>

<!-- ════════════════════════════════════════
     ANNOUNCEMENT TICKER
════════════════════════════════════════ -->
<div class="bg-[#552c1c] text-white py-2 text-xs font-medium tracking-wide ticker-wrap">
  <div class="ticker-track">
    <span>✦ WhatsApp | 9227130063</span>
    <span class="opacity-40">|</span>
    <span>INSTANT 10% OFF ON ALL PREPAID ORDERS</span>
    <span class="opacity-40">|</span>
    <span>Trusted by 10M+ customers ❤️</span>
    <span class="opacity-40">|</span>
    <span>FREE SHIPPING on all orders</span>
    <span class="opacity-40">|</span>
    <span>Cash on Delivery Available</span>
    <span class="opacity-40">|</span>
    <span>7-Day Easy Returns</span>
    <span class="opacity-40">|</span>
    <!-- duplicate for seamless loop -->
    <span>✦ WhatsApp | 9227130063</span>
    <span class="opacity-40">|</span>
    <span>INSTANT 10% OFF ON ALL PREPAID ORDERS</span>
    <span class="opacity-40">|</span>
    <span>Trusted by 10M+ customers ❤️</span>
    <span class="opacity-40">|</span>
    <span>FREE SHIPPING on all orders</span>
    <span class="opacity-40">|</span>
    <span>Cash on Delivery Available</span>
    <span class="opacity-40">|</span>
    <span>7-Day Easy Returns</span>
    <span class="opacity-40">|</span>
  </div>
</div>

<!-- ════════════════════════════════════════
     STICKY HEADER
════════════════════════════════════════ -->
<header class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm">

  <!-- ── Top Row: Search | Logo | Icons ── -->
  <div class="max-w-7xl mx-auto px-4 lg:px-10">
    <div class="flex items-center justify-between h-[72px]">

      <!-- LEFT: Search Icon (desktop) + Hamburger (mobile) -->
      <div class="flex items-center gap-3">
        <!-- Hamburger – mobile only -->
        <button id="menu-toggle"
          class="lg:hidden text-gray-600 hover:text-[#552c1c] text-xl focus:outline-none transition-colors">
          <i class="fas fa-bars"></i>
        </button>
        <!-- Search – always visible -->
        <button id="search-toggle"
          class="text-gray-600 hover:text-[#552c1c] text-xl focus:outline-none transition-colors"
          aria-label="Search">
          <i class="fas fa-search"></i>
        </button>
      </div>

      <!-- CENTER: Logo -->
      <a href="index.php" class="flex flex-col items-center leading-none select-none">
        <span class="text-[1.55rem] font-bold tracking-[0.08em] text-gray-900"
              style="font-family:'Poppins',sans-serif;">
          HOME<span class="text-gray-900">'</span>WERA
          <sup class="text-[10px] font-normal align-super">™</sup>
        </span>
        <span class="text-[9px] tracking-[0.22em] text-gray-400 font-medium uppercase mt-0.5">
          The Trusted Hub
        </span>
      </a>

      <!-- RIGHT: Account + Cart -->
      <div class="flex items-center gap-4">
        <!-- Account icon (KwikPass-style person with lightning bolt, simplified) -->
        <a href="#" class="relative text-gray-600 hover:text-[#552c1c] transition-colors" aria-label="Account">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
            <circle cx="12" cy="8"  r="4"/>
            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
          </svg>
          <!-- yellow lightning bolt accent like HomeWera -->
          <span class="absolute -top-0.5 -right-1 text-[#f5a623] text-[10px] font-black leading-none">⚡</span>
        </a>

        <!-- Cart icon -->
        <button id="cart-toggle"
          class="relative text-gray-600 hover:text-[#552c1c] transition-colors focus:outline-none"
          aria-label="Cart">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
            <path d="M6 2 3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
            <path d="M16 10a4 4 0 01-8 0"/>
          </svg>
          <span id="cart-count"
            class="absolute -top-2 -right-2 bg-[#552c1c] text-white text-[9px] font-bold
                   min-w-[16px] h-4 px-0.5 rounded-full flex items-center justify-center leading-none">
            0
          </span>
        </button>
      </div>

    </div>
  </div>

  <!-- ── Bottom Row: Desktop Nav (centered, below logo) ── -->
  <div class="hidden lg:block border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 lg:px-10">
      <nav class="flex items-center justify-center gap-1 h-11">

        <?php
        $current = basename($_SERVER['PHP_SELF']);
        $navItems = [
          'index.php'       => 'Home',
          'catalog.php'     => 'Catalog',
          'contact.php'     => 'Contact',
          'track-order.php' => 'Track order',
        ];
        foreach ($navItems as $file => $label):
          $isActive = ($current === $file);
        ?>
          <a href="<?php echo $file; ?>"
             class="<?php echo $isActive
               ? 'bg-[#552c1c] text-white'
               : 'text-gray-700 hover:text-[#552c1c]'; ?>
                    px-5 py-1.5 rounded-md text-sm font-medium transition-colors duration-200">
            <?php echo $label; ?>
          </a>
        <?php endforeach; ?>

      </nav>
    </div>
  </div>

  <!-- ── Mobile Menu (slides down) ── -->
  <div id="mobile-menu" class="lg:hidden bg-white border-t border-gray-100 px-4 pb-4">
    <nav class="flex flex-col pt-3 text-sm font-medium text-gray-700">
      <?php foreach ($navItems as $file => $label):
        $isActive = ($current === $file);
      ?>
        <a href="<?php echo $file; ?>"
           class="<?php echo $isActive ? 'text-[#552c1c] font-semibold' : 'hover:text-[#552c1c]'; ?>
                  py-3 border-b border-gray-100 transition-colors">
          <?php echo $label; ?>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>

</header>

<!-- ════════════════════════════════════════
     SEARCH MODAL
════════════════════════════════════════ -->
<div id="search-modal"
  class="fixed inset-0 z-[60] bg-black/40 hidden items-start justify-center pt-20 px-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl p-6 relative">
    <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
      <input id="search-input" type="text" placeholder="Search for products…"
        class="flex-1 px-4 py-3 text-sm outline-none" />
      <button class="px-5 py-3 bg-[#552c1c] text-white hover:bg-[#6b3622] transition-colors text-sm">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <p class="mt-2 text-[11px] text-gray-400 text-center">
      Popular: Storage Containers, Spice Jars, Idli Maker
    </p>
    <button id="search-close"
      class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-xl focus:outline-none">
      <i class="fas fa-times"></i>
    </button>
  </div>
</div>

<!-- ════════════════════════════════════════
     CART DRAWER
════════════════════════════════════════ -->
<div id="cart-overlay" class="fixed inset-0 z-[70] bg-black/40 hidden"></div>

<div id="cart-drawer"
  class="cart-drawer fixed top-0 right-0 z-[80] w-full max-w-sm h-full bg-white shadow-2xl flex flex-col">

  <!-- Header -->
  <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
    <h2 class="text-base font-semibold text-gray-800">
      Cart &nbsp;<span id="cart-item-count" class="text-sm text-gray-400 font-normal">• 0 items</span>
    </h2>
    <button id="cart-close" class="text-gray-400 hover:text-gray-700 text-xl focus:outline-none">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <!-- Items -->
  <div id="cart-items" class="flex-1 overflow-y-auto px-6 py-4">
    <div id="cart-empty" class="flex flex-col items-center justify-center h-full text-center gap-4 text-gray-400">
      <i class="fas fa-shopping-bag text-5xl"></i>
      <p class="font-medium text-sm">Your cart is empty</p>
      <a href="catalog.php"
        class="text-sm bg-[#552c1c] text-white px-6 py-2 rounded-xl hover:bg-[#6b3622] transition-colors">
        Continue Shopping
      </a>
    </div>
    <div id="cart-list" class="hidden space-y-4"></div>
  </div>

  <!-- Footer -->
  <div class="px-6 py-4 border-t border-gray-100">
    <div class="flex justify-between text-sm font-semibold mb-3">
      <span>Subtotal</span>
      <span id="cart-total">₹0.00</span>
    </div>
    <button
      class="w-full bg-[#552c1c] text-white py-3 rounded-xl font-semibold hover:bg-[#6b3622] transition-colors text-sm">
      Check out
    </button>
  </div>

</div>

<!-- ════════ MAIN CONTENT STARTS ════════ -->
<main>
