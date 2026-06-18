</main>

<!-- ═══════════════════════════════════════
     COURIER TICKER
═══════════════════════════════════════ -->
<style>
  @keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  .ticker-wrap {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    display: flex;
  }
  .ticker-content {
    display: inline-flex;
    align-items: center;
    animation: marquee 25s linear infinite;
  }
  .ticker-content.reverse {
    animation-direction: reverse;
    animation-duration: 30s;
  }
</style>

<!-- Top Ticker: Text -->
<div class="bg-white py-5 border-t border-gray-100 overflow-hidden">
  <div class="ticker-wrap">
    <div class="ticker-content gap-12 px-6">
      <?php for($i=0; $i<10; $i++): ?>
      <div class="flex items-center gap-3 shrink-0">
        <!-- Truck Icon -->
        <div class="relative w-[42px] h-[26px] bg-[#8a3324] rounded-md flex items-center justify-center text-white text-[10px] font-bold shadow-sm shrink-0">
          FREE
          <div class="absolute -right-2 top-2.5 w-3 h-4 bg-[#8a3324] rounded-r-md"></div>
          <div class="absolute bottom-[-5px] left-1.5 w-3 h-3 bg-gray-800 rounded-full border-[1.5px] border-white"></div>
          <div class="absolute bottom-[-5px] right-0 w-3 h-3 bg-gray-800 rounded-full border-[1.5px] border-white"></div>
        </div>
        <div class="flex flex-col leading-tight">
          <span class="text-[14px] font-bold text-gray-900 tracking-wide">We use TOP RATED COURIER</span>
          <span class="text-[14px] font-bold text-gray-900 tracking-wide">Company for SAFE Delivery</span>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</div>

<!-- Bottom Ticker: Logos -->
<div class="bg-white py-6 pb-10 overflow-hidden">
  <div class="ticker-wrap">
    <div class="ticker-content reverse gap-16 px-8 items-center">
      <?php for($i=0; $i<6; $i++): ?>
        <span class="font-black text-3xl shrink-0 tracking-tight"><span class="text-[#4d148c]">Fed</span><span class="text-[#ff6600]">Ex</span><sup class="text-sm text-[#ff6600] ml-0.5">®</sup></span>
        
        <div class="flex items-center gap-2 shrink-0">
          <!-- Shiprocket Logo SVG -->
          <svg class="w-9 h-9 fill-[#4b278f]" viewBox="0 0 24 24"><path d="M21.731 2.269a2.625 2.625 0 00-2.4-.652l-16.5 4.5a2.625 2.625 0 00-.317 4.962l6.236 3.118 3.118 6.236a2.625 2.625 0 004.962-.317l4.5-16.5a2.625 2.625 0 00-.652-2.4L21.731 2.269zM12.986 17.5l-2.484-4.969L16 7l-5.531 5.5-4.969-2.484 13.625-3.719-3.719 13.625z"/></svg>
          <div class="flex flex-col leading-none">
            <span class="text-[#4b278f] font-bold text-2xl tracking-tight">Shiprocket</span>
            <span class="text-[9px] text-gray-500 mt-1 font-semibold tracking-wide">Making Shipping Delightful</span>
          </div>
        </div>

        <span class="font-black text-4xl tracking-tighter shrink-0"><span class="text-[#f1a802]">e</span><span class="text-[#0066cc]">Kart</span></span>

        <span class="font-black text-3xl italic tracking-tighter shrink-0"><span class="text-[#00529b]">BLUE</span> <span class="text-[#009933]">DART</span></span>

        <div class="flex flex-col items-start leading-none shrink-0">
          <span class="text-black font-black text-3xl tracking-tighter">DELHIVE<span class="text-[#f12711]">R</span>Y</span>
          <span class="text-[10px] text-[#f12711] font-bold mt-1">Small World</span>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════
     WAVE DIVIDER (white → brown)
═══════════════════════════════════════ -->
<div class="bg-white overflow-hidden leading-none">
  <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-10 block fill-[#552c1c]">
    <path d="M0,40 C360,0 1080,70 1440,20 L1440,60 L0,60 Z"/>
  </svg>
</div>

<!-- ═══════════════════════════════════════
     FOOTER
═══════════════════════════════════════ -->
<footer class="bg-[#5d3a26] text-white w-full min-h-screen flex items-center">
  <div class="w-full px-8 lg:px-16 py-16">

    <!-- Main Footer Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 max-w-7xl mx-auto mb-16">

      <!-- Column 1: PRISMICA Brand -->
      <div>
        <div class="mb-8">
          <span class="text-[2.5rem] font-bold tracking-[0.08em] text-white block leading-tight">
            PRISMICA
          </span>
          <p class="text-[0.9rem] text-white/70 mt-2 font-medium tracking-wider">THE TRUSTED HUB</p>
        </div>
      </div>

      <!-- Column 2: A Brand of Keshwala Enterprises -->
      <div>
        <h4 class="text-white font-semibold text-[1.3rem] mb-4">A Brand of Keshwala Enterprises</h4>
        <p class="text-white/80 text-[1.1rem] leading-relaxed italic">
          194/2, opp. Anand industrial Estate,Narolgam, Ahmedabad
        </p>
      </div>

      <!-- Column 3: Reach out to us -->
      <div>
        <h4 class="font-semibold text-white text-[1.3rem] mb-6">Reach out to us</h4>
        <ul class="space-y-4">
          <li class="flex items-center gap-4">
            <span class="text-white/90 text-[1.1rem]">•</span>
            <span class="text-white/90 text-[1.1rem]">+91 9227130063</span>
          </li>
          <li class="flex items-center gap-4">
            <span class="text-white/90 text-[1.1rem]">•</span>
            <span class="text-white/90 text-[1.1rem]">Prismica.help@gmail.com</span>
          </li>
        </ul>
      </div>

      <!-- Column 4: Empty for this row -->
      <div></div>

    </div>

    <!-- Second Row: Policies and Company -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 max-w-7xl mx-auto mb-16">
      
      <!-- Column 1: Policies -->
      <div>
        <h4 class="font-semibold text-white text-[1.3rem] mb-6">Policies</h4>
        <ul class="space-y-3">
          <li><a href="#" class="text-white/80 text-[1.1rem] hover:text-white transition-colors">Privacy Policy</a></li>
          <li><a href="#" class="text-white/80 text-[1.1rem] hover:text-white transition-colors">Shipping Policy</a></li>
          <li><a href="#" class="text-white/80 text-[1.1rem] hover:text-white transition-colors">Refund Policy</a></li>
          <li><a href="#" class="text-white/80 text-[1.1rem] hover:text-white transition-colors">Terms of Service</a></li>
        </ul>
      </div>

      <!-- Column 2: Company -->
      <div>
        <h4 class="font-semibold text-white text-[1.3rem] mb-6">Company</h4>
        <ul class="space-y-3">
          <li><a href="#" class="text-white/80 text-[1.1rem] hover:text-white transition-colors">Order cancellation</a></li>
          <li><a href="#" class="text-white/80 text-[1.1rem] hover:text-white transition-colors">Track order</a></li>
          <li><a href="#" class="text-white/80 text-[1.1rem] hover:text-white transition-colors">Contact Information</a></li>
        </ul>
      </div>

      <!-- Empty columns -->
      <div></div>
      <div></div>

    </div>

    <!-- Social Media Icons -->
    <div class="flex justify-center gap-6 py-8 border-t border-white/20 max-w-7xl mx-auto">
      <a href="https://www.facebook.com/share/1Ci5B14sMJ/" target="_blank"
        class="w-12 h-12 rounded bg-white/10 hover:bg-white/25 flex items-center justify-center transition-colors">
        <i class="fab fa-facebook-f text-white text-xl"></i>
      </a>
      <a href="https://www.instagram.com/prismica" target="_blank"
        class="w-12 h-12 rounded bg-white/10 hover:bg-white/25 flex items-center justify-center transition-colors">
        <i class="fab fa-instagram text-white text-xl"></i>
      </a>
    </div>

    <!-- Payment Methods + Copyright -->
    <div class="flex flex-col items-center gap-8 pt-6 border-t border-white/20 max-w-7xl mx-auto">
      
      <!-- Payment Icons -->
      <div class="flex items-center gap-3 flex-wrap justify-center">
        <div class="bg-white rounded px-4 py-2 h-10 flex items-center justify-center">
          <span class="text-[12px] font-black text-[#097939]">UPI</span>
        </div>
        <div class="bg-white rounded px-4 py-2 h-10 flex items-center justify-center">
          <span class="text-[11px] font-bold text-[#00b9f1]">Paytm</span>
        </div>
        <div class="bg-white rounded px-4 py-2 h-10 flex items-center justify-center gap-0.5">
          <span class="text-[10px] font-bold">
            <span class="text-blue-500">G</span><span class="text-red-500">o</span><span class="text-yellow-500">o</span><span class="text-blue-500">g</span><span class="text-green-600">l</span><span class="text-red-500">e</span>
          </span>
          <span class="text-[10px] font-bold text-gray-600 ml-0.5">Pay</span>
        </div>
        <div class="bg-white rounded px-4 py-2 h-10 flex items-center justify-center">
          <span class="text-[10px] font-bold text-gray-700">Amazon</span>
        </div>
        <div class="bg-white rounded px-4 py-2 h-10 flex items-center justify-center">
          <span class="text-[10px] font-bold text-gray-700">Apple Pay</span>
        </div>
      </div>

      <!-- Copyright -->
      <p class="text-white/60 text-[1rem] text-center">
        © 2026, PRISMICA All Rights Reserved
      </p>

    </div>

  </div>
</footer>

<!-- ═══════════════════════════════════════
     SCROLL TO TOP
═══════════════════════════════════════ -->
<button id="scroll-top"
  style="display:none;"
  class="fixed bottom-6 right-6 z-50 w-11 h-11 bg-[#552c1c] text-white rounded-full shadow-lg
         hover:bg-[#6b3622] transition-all duration-300 flex items-center justify-center text-sm">
  <i class="fas fa-chevron-up"></i>
</button>

<!-- Scripts -->
<script src="js/script.js"></script>
</body>
</html>
