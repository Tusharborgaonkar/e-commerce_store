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
            brown:   { DEFAULT: '#552c1c', light: '#753f2a', dark: '#3d1f13' },
            purple:  { DEFAULT: '#6d388b', light: '#8b4aaa' },
            accent:  '#48682b',
          },
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
          keyframes: {
            ticker: { '0%': { transform: 'translateX(0)' }, '100%': { transform: 'translateX(-50%)' } },
            fadeIn: { '0%': { opacity: '0', transform: 'translateY(10px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
          },
          animation: {
            ticker: 'ticker 30s linear infinite',
            fadeIn: 'fadeIn 0.4s ease forwards',
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
    body { font-family: 'Poppins', sans-serif; }
    .ticker-wrap { overflow: hidden; white-space: nowrap; }
    .ticker-track { display: inline-flex; gap: 3rem; animation: ticker 30s linear infinite; }
    @keyframes ticker { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    .hero-slide { display: none; }
    .hero-slide.active { display: block; }
    .nav-link { position: relative; }
    .nav-link::after { content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px; background: #552c1c; transition: width 0.3s; }
    .nav-link:hover::after, .nav-link.active::after { width: 100%; }
    .search-modal { display: none; }
    .search-modal.open { display: flex; }
    .cart-drawer { transform: translateX(100%); transition: transform 0.35s ease; }
    .cart-drawer.open { transform: translateX(0); }
    .mobile-menu { display: none; }
    .mobile-menu.open { display: block; }
    /* Progress bar */
    #scroll-progress { position: fixed; top: 0; left: 0; height: 4px; background: #6d388b; width: 0%; z-index: 9999; border-radius: 0 2px 2px 0; transition: width 0.1s; }
  </style>
</head>
<body class="bg-white text-gray-800 overflow-x-hidden">

<!-- Scroll Progress Bar -->
<div id="scroll-progress"></div>

<!-- ===== ANNOUNCEMENT TICKER ===== -->
<div class="bg-[#552c1c] text-white py-2 text-sm font-medium ticker-wrap">
  <div class="ticker-track">
    <!-- set 1 -->
    <span>✦ WhatsApp | 9227130063</span>
    <span>|</span>
    <span>INSTANT 10% OFF ON ALL PREPAID ORDERS</span>
    <span>|</span>
    <span>Trusted by 10M+ customers ❤️</span>
    <span>|</span>
    <span>FREE SHIPPING on all orders</span>
    <span>|</span>
    <span>7-Day Easy Returns</span>
    <span>|</span>
    <span>Cash on Delivery Available</span>
    <span>|</span>
    <!-- set 2 (duplicate for seamless loop) -->
    <span>✦ WhatsApp | 9227130063</span>
    <span>|</span>
    <span>INSTANT 10% OFF ON ALL PREPAID ORDERS</span>
    <span>|</span>
    <span>Trusted by 10M+ customers ❤️</span>
    <span>|</span>
    <span>FREE SHIPPING on all orders</span>
    <span>|</span>
    <span>7-Day Easy Returns</span>
    <span>|</span>
    <span>Cash on Delivery Available</span>
    <span>|</span>
  </div>
</div>

<!-- ===== STICKY HEADER ===== -->
<header id="site-header" class="sticky top-0 z-50 bg-white shadow-md transition-shadow duration-300">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">
    <div class="flex items-center justify-between h-16 lg:h-20">

      <!-- Mobile: Hamburger -->
      <button id="menu-toggle" class="lg:hidden text-gray-700 text-2xl focus:outline-none">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Logo -->
      <a href="index.php" class="flex items-center gap-2">
        <span class="text-2xl font-bold tracking-tight">
          <span class="text-[#552c1c]">HOME</span><span class="text-[#6d388b]">'WERA</span>
        </span>
      </a>

      <!-- Desktop Nav -->
      <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-gray-700">
        <a href="index.php"     class="nav-link active hover:text-[#552c1c] transition-colors">Home</a>
        <a href="catalog.php"   class="nav-link hover:text-[#552c1c] transition-colors">Catalog</a>
        <a href="contact.php"   class="nav-link hover:text-[#552c1c] transition-colors">Contact</a>
        <a href="track-order.php" class="nav-link hover:text-[#552c1c] transition-colors">Track Order</a>
      </nav>

      <!-- Right Icons -->
      <div class="flex items-center gap-4 text-gray-700">
        <!-- Search toggle -->
        <button id="search-toggle" class="hover:text-[#552c1c] transition-colors text-lg focus:outline-none">
          <i class="fas fa-search"></i>
        </button>
        <!-- Account -->
        <a href="#" class="hidden lg:block hover:text-[#552c1c] transition-colors text-lg">
          <i class="fas fa-user"></i>
        </a>
        <!-- Cart -->
        <button id="cart-toggle" class="relative hover:text-[#552c1c] transition-colors text-lg focus:outline-none">
          <i class="fas fa-shopping-bag"></i>
          <span id="cart-count" class="absolute -top-2 -right-2 bg-[#552c1c] text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">0</span>
        </button>
      </div>

    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="mobile-menu lg:hidden bg-white border-t border-gray-100 px-4 pb-4">
    <nav class="flex flex-col gap-3 pt-3 text-sm font-medium text-gray-700">
      <a href="index.php"       class="py-2 border-b border-gray-100 hover:text-[#552c1c]">Home</a>
      <a href="catalog.php"     class="py-2 border-b border-gray-100 hover:text-[#552c1c]">Catalog</a>
      <a href="contact.php"     class="py-2 border-b border-gray-100 hover:text-[#552c1c]">Contact</a>
      <a href="track-order.php" class="py-2 hover:text-[#552c1c]">Track Order</a>
    </nav>
  </div>
</header>

<!-- ===== SEARCH MODAL ===== -->
<div id="search-modal" class="search-modal fixed inset-0 z-[60] bg-black/50 items-start justify-center pt-24 px-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-6 animate-fadeIn">
    <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
      <input id="search-input" type="text" placeholder="Search for products…"
        class="flex-1 px-4 py-3 text-sm outline-none font-poppins" />
      <button class="px-5 py-3 bg-[#552c1c] text-white hover:bg-[#753f2a] transition-colors">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <div class="mt-3 text-xs text-gray-400 text-center">Popular: Storage Containers, Spice Jars, Idli Maker</div>
    <button id="search-close" class="absolute top-6 right-6 text-gray-400 hover:text-gray-700 text-xl focus:outline-none">
      <i class="fas fa-times"></i>
    </button>
  </div>
</div>

<!-- ===== CART DRAWER ===== -->
<div id="cart-overlay" class="fixed inset-0 z-[70] bg-black/40 hidden"></div>
<div id="cart-drawer" class="cart-drawer fixed top-0 right-0 z-[80] w-full max-w-sm h-full bg-white shadow-2xl flex flex-col">
  <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
    <h2 class="text-lg font-semibold text-gray-800">Your Cart <span id="cart-item-count" class="text-sm text-gray-400 font-normal">• 0 items</span></h2>
    <button id="cart-close" class="text-gray-400 hover:text-gray-700 text-xl focus:outline-none"><i class="fas fa-times"></i></button>
  </div>
  <div id="cart-items" class="flex-1 overflow-y-auto px-6 py-4">
    <!-- Empty state -->
    <div id="cart-empty" class="flex flex-col items-center justify-center h-full text-center gap-4 text-gray-400">
      <i class="fas fa-shopping-bag text-5xl"></i>
      <p class="font-medium">Your cart is empty</p>
      <a href="catalog.php" class="text-sm bg-[#552c1c] text-white px-6 py-2 rounded-xl hover:bg-[#753f2a] transition-colors">Continue Shopping</a>
    </div>
    <div id="cart-list" class="hidden space-y-4"></div>
  </div>
  <div class="px-6 py-4 border-t border-gray-100">
    <div class="flex justify-between text-sm font-semibold mb-3">
      <span>Subtotal</span><span id="cart-total">₹0.00</span>
    </div>
    <button class="w-full bg-[#552c1c] text-white py-3 rounded-xl font-semibold hover:bg-[#753f2a] transition-colors text-sm">
      Checkout
    </button>
  </div>
</div>

<!-- MAIN CONTENT -->
<main>
