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
  const cartToggle  = document.getElementById('cart-toggle');
  const cartClose   = document.getElementById('cart-close');
  const cartDrawer  = document.getElementById('cart-drawer');
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

  if (cartToggle)  cartToggle.addEventListener('click', openCart);
  if (cartClose)   cartClose.addEventListener('click', closeCart);
  if (cartOverlay) cartOverlay.addEventListener('click', closeCart);

  // ── Cart Timer (5 min countdown) ──
  let timerSeconds = 300;
  let timerInterval = null;

  function startTimer() {
    if (timerInterval) return;
    timerInterval = setInterval(function () {
      timerSeconds = Math.max(0, timerSeconds - 1);
      const m = String(Math.floor(timerSeconds / 60)).padStart(2, '0');
      const s = String(timerSeconds % 60).padStart(2, '0');
      const el = document.getElementById('cart-timer');
      if (el) el.textContent = m + ':' + s;
      if (timerSeconds === 0) { clearInterval(timerInterval); timerInterval = null; timerSeconds = 300; }
    }, 1000);
  }

  // ── Cart State ──
  let cartItems = [];

  // Global addToCart — called from product & catalog pages
  window.addToCart = function (name, price, comparePrice, img, variant, qty) {
    qty = parseInt(qty) || 1;
    const priceNum   = parseFloat(String(price).replace(/[^\d.]/g, ''))   || 0;
    const compareNum = parseFloat(String(comparePrice).replace(/[^\d.]/g, '')) || priceNum;
    const key = name + '||' + (variant || '');
    const existing = cartItems.find(i => i.key === key);
    if (existing) {
      existing.qty += qty;
    } else {
      cartItems.push({ key, name, price: priceNum, compare: compareNum, img, variant: variant || '', qty });
    }
    renderCart();
    openCart();
    startTimer();
    showToast(name + ' added to cart!');
  };

  function renderCart() {
    const cartList    = document.getElementById('cart-list');
    const cartEmpty   = document.getElementById('cart-empty');
    const cartCount   = document.getElementById('cart-count');
    const cartItemCount = document.getElementById('cart-item-count');
    const cartTotal   = document.getElementById('cart-total');
    const cartSavings = document.getElementById('cart-savings');

    const totalQty  = cartItems.reduce((s, i) => s + i.qty, 0);
    const totalAmt  = cartItems.reduce((s, i) => s + i.price   * i.qty, 0);
    const totalComp = cartItems.reduce((s, i) => s + i.compare * i.qty, 0);
    const savings   = totalComp - totalAmt;

    if (cartCount)     cartCount.textContent     = totalQty;
    if (cartItemCount) cartItemCount.textContent = '\u2022 ' + totalQty + ' item' + (totalQty !== 1 ? 's' : '');
    if (cartTotal)     cartTotal.textContent     = 'Rs. ' + totalAmt.toLocaleString('en-IN', { minimumFractionDigits: 2 });
    if (cartSavings)   cartSavings.textContent   = '-Rs. ' + savings.toLocaleString('en-IN', { minimumFractionDigits: 2 });

    if (!cartList || !cartEmpty) return;

    if (cartItems.length === 0) {
      cartEmpty.classList.remove('hidden');
      cartList.classList.add('hidden');
      cartList.innerHTML = '';
      return;
    }

    cartEmpty.classList.add('hidden');
    cartList.classList.remove('hidden');

    cartList.innerHTML = cartItems.map((item, idx) => {
      const lineTotal   = item.price   * item.qty;
      const lineCompare = item.compare * item.qty;
      const lineSaving  = lineCompare - lineTotal;
      return `
      <div style="display:flex;gap:12px;padding:14px 0;border-bottom:1px solid #f0f0f0;align-items:flex-start;">
        <!-- Image -->
        <img src="${item.img}" alt="${item.name}"
          style="width:80px;height:80px;border-radius:10px;object-fit:cover;flex-shrink:0;border:1px solid #eee;" />

        <!-- Info -->
        <div style="flex:1;min-width:0;">
          <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:6px;">
            <p style="font-size:0.88rem;font-weight:700;color:#121212;line-height:1.4;margin:0;">${item.name}</p>
            <button onclick="removeFromCart(${idx})"
              style="flex-shrink:0;background:none;border:none;cursor:pointer;color:#bbb;font-size:1rem;padding:0;line-height:1;"
              title="Remove">
              <i class="fas fa-trash-alt" style="pointer-events:none;"></i>
            </button>
          </div>
          ${item.variant ? `<p style="font-size:0.75rem;color:#777;margin:3px 0 0;">${item.variant}</p>` : ''}

          <!-- Price row -->
          <div style="display:flex;align-items:center;gap:6px;margin-top:6px;flex-wrap:wrap;">
            <span style="font-size:0.78rem;color:#999;text-decoration:line-through;">Rs. ${item.compare.toLocaleString('en-IN')}.00</span>
            <span style="font-size:0.9rem;font-weight:800;color:#121212;">Rs. ${lineTotal.toLocaleString('en-IN')}.00</span>
          </div>
          <div style="font-size:0.75rem;font-weight:600;color:#2d7a3c;margin-top:1px;">(You save Rs. ${lineSaving.toLocaleString('en-IN')})</div>

          <!-- Qty controls -->
          <div class="cart-qty-box">
            <button class="cart-qty-btn" onclick="cartChangeQty(${idx}, -1)">−</button>
            <div class="cart-qty-num">${item.qty}</div>
            <button class="cart-qty-btn" onclick="cartChangeQty(${idx}, 1)">+</button>
          </div>
        </div>
      </div>`;
    }).join('');
  }

  window.cartChangeQty = function (idx, delta) {
    cartItems[idx].qty = Math.max(1, cartItems[idx].qty + delta);
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
