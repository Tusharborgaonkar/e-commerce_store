document.addEventListener('DOMContentLoaded', function () {

  // ── Smart Header Scroll ──
  let lastScrollTop = 0;
  const headerContainer = document.getElementById('header-container');
  const marqueeBar = document.getElementById('marquee-bar');
  const headerSpacer = document.getElementById('header-spacer');

  function updateSpacer() {
    if (headerContainer && headerSpacer) {
      headerSpacer.style.height = headerContainer.offsetHeight + 'px';
    }
  }

  // Wait a tick for styles to compute
  setTimeout(updateSpacer, 50);
  window.addEventListener('resize', updateSpacer);

  window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop && scrollTop > 50) {
      // Scrolling down -> hide completely
      if (headerContainer) {
        headerContainer.style.transform = 'translateY(-100%)';
      }
    } else if (scrollTop < lastScrollTop) {
      // Scrolling up -> show only main header (hide marquee)
      if (headerContainer) {
        if (scrollTop <= 50) {
          headerContainer.style.transform = 'translateY(0)';
        } else {
          const marqueeHeight = marqueeBar ? marqueeBar.offsetHeight : 0;
          headerContainer.style.transform = `translateY(-${marqueeHeight}px)`;
        }
      }
    }

    if (scrollTop <= 0) {
      if (headerContainer) {
        headerContainer.style.transform = 'translateY(0)';
      }
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  });

  // ── Scroll Progress Bar ──
  const progressBar = document.getElementById('scroll-progress');
  window.addEventListener('scroll', function () {
    if (!progressBar) return;
    const scrolled = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
    progressBar.style.width = scrolled + '%';
  });

  // ── Mobile Menu Toggle ──
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function () {
      mobileMenu.classList.toggle('open');
    });
  }

  // ── Search Modal ──
  const searchToggle = document.getElementById('search-toggle');
  const searchModal = document.getElementById('search-modal');
  const searchClose = document.getElementById('search-close');
  const searchInput = document.getElementById('search-input');

  if (searchToggle && searchModal) {
    searchToggle.addEventListener('click', function () {
      searchModal.classList.remove('hidden');
      searchModal.classList.add('flex');
      if (searchInput) searchInput.focus();
    });
    searchClose && searchClose.addEventListener('click', closeSearch);
    searchModal.addEventListener('click', function (e) {
      if (e.target === searchModal) closeSearch();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeSearch();
    });
  }

  function closeSearch() {
    searchModal.classList.add('hidden');
    searchModal.classList.remove('flex');
  }

  // ── Cart Drawer ──
  const cartToggle = document.getElementById('cart-toggle');
  const cartClose = document.getElementById('cart-close');
  const cartDrawer = document.getElementById('cart-drawer');
  const cartOverlay = document.getElementById('cart-overlay');

  function openCart() {
    cartDrawer.classList.add('open');
    cartOverlay.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
  function closeCart() {
    cartDrawer.classList.remove('open');
    cartOverlay.classList.add('hidden');
    document.body.style.overflow = '';
  }

  if (cartToggle) cartToggle.addEventListener('click', openCart);
  if (cartClose) cartClose.addEventListener('click', closeCart);
  if (cartOverlay) cartOverlay.addEventListener('click', closeCart);

  // ── Cart State ──
  let cartItems = [];

  window.addToCart = function (name, price, img) {
    const existing = cartItems.find(i => i.name === name);
    if (existing) {
      existing.qty++;
    } else {
      cartItems.push({ name, price, img, qty: 1 });
    }
    renderCart();
    openCart();
    showToast(name + ' added to cart!');
  };

  function renderCart() {
    const cartList = document.getElementById('cart-list');
    const cartEmpty = document.getElementById('cart-empty');
    const cartCount = document.getElementById('cart-count');
    const cartItemCount = document.getElementById('cart-item-count');
    const cartTotal = document.getElementById('cart-total');

    const totalQty = cartItems.reduce((s, i) => s + i.qty, 0);
    const totalAmt = cartItems.reduce((s, i) => {
      const num = parseFloat(i.price.replace(/[^\d.]/g, '')) || 0;
      return s + num * i.qty;
    }, 0);

    if (cartCount) cartCount.textContent = totalQty;
    if (cartItemCount) cartItemCount.textContent = '• ' + totalQty + ' item' + (totalQty !== 1 ? 's' : '');
    if (cartTotal) cartTotal.textContent = '₹' + totalAmt.toLocaleString('en-IN', { minimumFractionDigits: 2 });

    if (!cartList || !cartEmpty) return;

    if (cartItems.length === 0) {
      cartEmpty.classList.remove('hidden');
      cartList.classList.add('hidden');
      cartList.innerHTML = '';
      return;
    }

    cartEmpty.classList.add('hidden');
    cartList.classList.remove('hidden');
    cartList.innerHTML = cartItems.map((item, idx) => `
      <div class="flex items-center gap-3 py-3 border-b border-gray-100 last:border-0">
        <img src="${item.img}" alt="${item.name}"
          class="w-16 h-16 rounded-xl object-cover shrink-0 border border-gray-100" />
        <div class="flex-1 min-w-0">
          <p class="text-xs font-semibold text-gray-800 leading-tight line-clamp-2">${item.name}</p>
          <p class="text-[#552c1c] font-bold text-sm mt-1">${item.price}</p>
          <div class="flex items-center gap-2 mt-1">
            <button onclick="changeQty(${idx}, -1)"
              class="w-6 h-6 rounded-full border border-gray-300 text-gray-600 hover:border-[#552c1c] hover:text-[#552c1c] flex items-center justify-center text-xs transition-colors">
              <i class="fas fa-minus"></i>
            </button>
            <span class="text-xs font-semibold w-4 text-center">${item.qty}</span>
            <button onclick="changeQty(${idx}, 1)"
              class="w-6 h-6 rounded-full border border-gray-300 text-gray-600 hover:border-[#552c1c] hover:text-[#552c1c] flex items-center justify-center text-xs transition-colors">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        <button onclick="removeFromCart(${idx})"
          class="text-gray-300 hover:text-red-400 transition-colors shrink-0 ml-1 text-sm">
          <i class="fas fa-trash-alt"></i>
        </button>
      </div>
    `).join('');
  }

  window.changeQty = function (idx, delta) {
    cartItems[idx].qty += delta;
    if (cartItems[idx].qty <= 0) cartItems.splice(idx, 1);
    renderCart();
  };

  window.removeFromCart = function (idx) {
    cartItems.splice(idx, 1);
    renderCart();
  };

  // ── Toast Notification ──
  function showToast(msg) {
    const toast = document.getElementById('toast');
    const toastMsg = document.getElementById('toast-msg');
    if (!toast) return;
    if (toastMsg) toastMsg.textContent = msg;
    toast.style.opacity = '1';
    toast.style.pointerEvents = 'auto';
    setTimeout(function () {
      toast.style.opacity = '0';
      toast.style.pointerEvents = 'none';
    }, 2800);
  }

  // ── Hero Slider ──
  let currentSlide = 0;
  const slides = document.querySelectorAll('.hero-slide');
  const dots = document.querySelectorAll('.hero-dot');

  function updateSlider() {
    slides.forEach((s, i) => {
      s.classList.toggle('active', i === currentSlide);
    });
    dots.forEach((d, i) => {
      d.style.opacity = i === currentSlide ? '1' : '0.5';
      d.style.transform = i === currentSlide ? 'scale(1.4)' : 'scale(1)';
    });
  }

  window.goToSlide = function (n) {
    currentSlide = n;
    updateSlider();
    resetAutoplay();
  };

  window.changeSlide = function (dir) {
    currentSlide = (currentSlide + dir + slides.length) % slides.length;
    updateSlider();
    resetAutoplay();
  };

  let autoplayTimer = setInterval(function () {
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlider();
  }, 4000);

  function resetAutoplay() {
    clearInterval(autoplayTimer);
    autoplayTimer = setInterval(function () {
      currentSlide = (currentSlide + 1) % slides.length;
      updateSlider();
    }, 4000);
  }

  updateSlider();

  // ── Scroll-to-Top ──
  const scrollTopBtn = document.getElementById('scroll-top');
  window.addEventListener('scroll', function () {
    if (!scrollTopBtn) return;
    scrollTopBtn.style.display = window.scrollY > 400 ? 'flex' : 'none';
  });
  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── Video Carousel (3 Videos Visible) ──
  let currentVideoIndex = 0;
  const videoTrack = document.getElementById('video-track');
  const scrollLeftBtn = document.getElementById('scroll-left');
  const scrollRightBtn = document.getElementById('scroll-right');

  if (scrollLeftBtn && scrollRightBtn && videoTrack) {
    const totalVideos = videoTrack.children.length;
    const videosVisible = 3; // Always show 3 videos
    const maxIndex = totalVideos - videosVisible;

    function updateVideoCarousel() {
      // Each video takes 1/3 of container width + gap
      const translateX = -(currentVideoIndex * (100 / videosVisible));
      videoTrack.style.transform = `translateX(${translateX}%)`;

      // Update button states
      scrollLeftBtn.style.opacity = currentVideoIndex > 0 ? '1' : '0.5';
      scrollRightBtn.style.opacity = currentVideoIndex < maxIndex ? '1' : '0.5';
    }

    scrollLeftBtn.addEventListener('click', function () {
      if (currentVideoIndex > 0) {
        currentVideoIndex--;
        updateVideoCarousel();
      }
    });

    scrollRightBtn.addEventListener('click', function () {
      if (currentVideoIndex < maxIndex) {
        currentVideoIndex++;
        updateVideoCarousel();
      }
    });

    // Initialize
    updateVideoCarousel();
  }

  // ── Contact Form ──
  const contactForm = document.querySelector('.contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      showToast('Message sent successfully!');
      this.reset();
    });
  }

  // ── Track Order Form ──
  const trackForm = document.querySelector('.track-form');
  const trackResult = document.getElementById('track-result');
  if (trackForm && trackResult) {
    trackForm.addEventListener('submit', function (e) {
      e.preventDefault();
      trackResult.classList.remove('hidden');
      trackResult.scrollIntoView({ behavior: 'smooth' });
    });
  }

});
