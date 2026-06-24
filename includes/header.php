<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PRISMICA – Modern Home Decor Store | Stylish & Affordable</title>

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
      background: #f5a623;
      z-index: 9999;
      transition: width 0.1s linear;
      pointer-events: none;
    }
  </style>
</head>
<body class="bg-white text-gray-800 overflow-x-hidden">

<!-- Scroll Progress Bar -->
<div id="scroll-progress"></div>

<!-- ════════════════════════════════════════
     COMPLETE HEADER CONTAINER
════════════════════════════════════════ -->
<div id="header-container" class="fixed top-0 left-0 right-0 z-50 transition-transform duration-300 bg-white flex flex-col">
  
  <!-- Marquee Bar -->
  <div id="marquee-bar" class="bg-[#552c1c] text-white py-3 text-sm font-medium">
    <marquee behavior="scroll" direction="left" scrollamount="8" class="whitespace-nowrap">
      INSTANT 10% OFF ON ALL PREPAID ORDERS &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; Trusted by 10M+ customers 💖 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; ✨ WhatsApp | 9227130063 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; FREE SHIPPING on all orders &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; Cash on Delivery Available &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; 7-Day Easy Returns &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; INSTANT 10% OFF ON ALL PREPAID ORDERS &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; Trusted by 10M+ customers 💖 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; ✨ WhatsApp | 9227130063 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; FREE SHIPPING on all orders &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; Cash on Delivery Available &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; 7-Day Easy Returns &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; INSTANT 10% OFF ON ALL PREPAID ORDERS &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; Trusted by 10M+ customers 💖 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; ✨ WhatsApp | 9227130063 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; FREE SHIPPING on all orders &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; Cash on Delivery Available &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; 7-Day Easy Returns &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;
    </marquee>
  </div>

  <!-- Main Header -->
  <div class="bg-white border-b border-gray-100 shadow-sm">

    <!-- ── Top Row: Search | Logo | Icons ── -->
    <div class="max-w-7xl mx-auto px-4 lg:px-10">
      <div class="flex items-center justify-between h-[90px]">

        <!-- LEFT: Search Icon (desktop) + Hamburger (mobile) -->
        <div class="flex items-center gap-3">
          <button id="menu-toggle"
            class="lg:hidden text-gray-600 hover:text-[#552c1c] text-2xl focus:outline-none transition-colors">
            <i class="fas fa-bars"></i>
          </button>
          <button id="search-toggle"
            class="text-gray-600 hover:text-[#552c1c] text-2xl focus:outline-none transition-colors"
            aria-label="Search">
            <i class="fas fa-search"></i>
          </button>
        </div>

        <!-- CENTER: Logo -->
        <a href="index.php" class="flex flex-col items-center leading-none select-none">
          <span class="text-[2rem] md:text-[2.2rem] font-bold tracking-[0.08em] text-gray-900"
                style="font-family:'Poppins',sans-serif;">
            PRISMICA
            <sup class="text-[12px] font-normal align-super">™</sup>
          </span>
          <span class="text-[10px] md:text-[11px] tracking-[0.22em] text-gray-400 font-medium uppercase mt-0.5">
            The Trusted Hub
          </span>
        </a>

        <!-- RIGHT: Account + Cart -->
        <div class="flex items-center gap-5">
          <a href="#" class="relative text-gray-600 hover:text-[#552c1c] transition-colors" aria-label="Account">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
              <circle cx="12" cy="8"  r="4"/>
              <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
            </svg>
            <span class="absolute -top-0.5 -right-1 text-[#f5a623] text-[12px] font-black leading-none">⚡</span>
          </a>
          <button id="cart-toggle"
            class="relative text-gray-600 hover:text-[#552c1c] transition-colors focus:outline-none"
            aria-label="Cart">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
              <path d="M6 2 3 6v14a2 2 0 002 2h14a2 0 002-2V6l-3-4z"/>
              <line x1="3" y1="6" x2="21" y2="6"/>
              <path d="M16 10a4 4 0 01-8 0"/>
            </svg>
            <span id="cart-count"
              class="absolute -top-2 -right-2 bg-[#552c1c] text-white text-[10px] font-bold
                     min-w-[18px] h-5 px-1 rounded-full flex items-center justify-center leading-none">
              0
            </span>
          </button>
        </div>
      </div>
    </div>

    <!-- ── Navigation Row ── -->
    <div class="hidden lg:block border-t border-gray-100">
      <div class="max-w-7xl mx-auto px-4 lg:px-10">
        <nav class="flex items-center justify-center gap-2 h-14">
          <?php
          $current = basename($_SERVER['PHP_SELF']);
          $navItems = [
            'index.php'       => ['label' => 'Home',        'href' => 'index.php'],
            'catalog.php'     => ['label' => 'Catalog',     'href' => 'catalog.php'],
            'contact.php'     => ['label' => 'Contact',     'href' => 'contact.php'],
            'track-order.php' => ['label' => 'Track order', 'href' => 'https://www.shiprocket.in/shipment-tracking/', 'external' => true],
          ];
          foreach ($navItems as $file => $item):
            $isActive = ($current === $file);
          ?>
            <a href="<?php echo $item['href']; ?>"
               <?php if (!empty($item['external'])) echo 'target="_blank" rel="noopener"'; ?>
               class="<?php echo $isActive
                 ? 'bg-[#552c1c] text-white'
                 : 'text-gray-700 hover:text-[#552c1c]'; ?>
                      px-6 py-2.5 rounded-lg text-[15px] font-medium transition-colors duration-200">
              <?php echo $item['label']; ?>
            </a>
          <?php endforeach; ?>
        </nav>
      </div>
    </div>

    <!-- ── Mobile Menu ── -->
    <div id="mobile-menu" class="lg:hidden bg-white border-t border-gray-100 px-4 pb-4">
      <nav class="flex flex-col pt-3 text-sm font-medium text-gray-700">
        <?php foreach ($navItems as $file => $item):
          $isActive = ($current === $file);
        ?>
          <a href="<?php echo $item['href']; ?>"
             <?php if (!empty($item['external'])) echo 'target="_blank" rel="noopener"'; ?>
             class="<?php echo $isActive ? 'text-[#552c1c] font-semibold' : 'hover:text-[#552c1c]'; ?>
                    py-3 border-b border-gray-100 transition-colors">
            <?php echo $item['label']; ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>
  </div>

</div>

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

<!-- ═════ MAIN CONTENT STARTS ═════ -->
<div id="header-spacer"></div>
<main>