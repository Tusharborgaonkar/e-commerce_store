<?php require_once 'includes/header.php'; ?>

<style>
/* ═══════════════════════════════════════
   CATALOG PAGE — Homewera-style UI
═══════════════════════════════════════ */

/* Subtle scrollbar */
::-webkit-scrollbar { width: 6px; background: #f5f5f5; }
::-webkit-scrollbar-track { background: #f5f5f5; }
::-webkit-scrollbar-thumb { background: #999; border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: #777; }

/* ── Catalog Toolbar ── */
.catalog-toolbar {
  background: #fff;
  border-bottom: 1px solid #e8e8e8;
  padding: 16px 0;
}
.toolbar-inner {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  flex-wrap: wrap;
}

/* Left: Filter group */
.filter-group {
  display: flex;
  align-items: center;
  gap: 6px;
}
.filter-label {
  font-size: 0.88rem;
  font-weight: 400;
  color: #888;
  margin-right: 4px;
  font-family: 'Poppins', sans-serif;
}

/* Dropdown toggle buttons */
.dropdown-wrap {
  position: relative;
  display: inline-block;
}
.dropdown-toggle {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 0;
  border: none;
  background: none;
  font-family: 'Poppins', sans-serif;
  font-size: 0.88rem;
  font-weight: 400;
  color: #1a1a1a;
  cursor: pointer;
  transition: color 0.2s;
  border-bottom: 1px solid #1a1a1a;
  line-height: 1.3;
  padding-bottom: 1px;
}
.dropdown-toggle:hover { color: #552c1c; border-color: #552c1c; }
.dropdown-toggle svg {
  width: 10px;
  height: 10px;
  fill: currentColor;
  transition: transform 0.25s;
}
.dropdown-toggle.open svg {
  transform: rotate(180deg);
}

/* Dropdown panel */
.dropdown-panel {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  min-width: 220px;
  background: #fff;
  border: 1px solid #e5e5e5;
  border-radius: 8px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.1);
  padding: 16px;
  z-index: 50;
  display: none;
  font-family: 'Poppins', sans-serif;
}
.dropdown-panel.open { display: block; }
.dropdown-panel label {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.84rem;
  color: #333;
  padding: 6px 0;
  cursor: pointer;
  transition: color 0.2s;
}
.dropdown-panel label:hover { color: #552c1c; }
.dropdown-panel input[type="checkbox"] {
  width: 16px;
  height: 16px;
  accent-color: #552c1c;
  cursor: pointer;
}
.dropdown-panel .filter-count {
  font-size: 0.75rem;
  color: #aaa;
  margin-left: auto;
}

/* Right: Sort group */
.sort-group {
  display: flex;
  align-items: center;
  gap: 14px;
}
.sort-label {
  font-size: 0.88rem;
  font-weight: 400;
  color: #888;
  font-family: 'Poppins', sans-serif;
}
.sort-dropdown-wrap {
  position: relative;
}
.sort-toggle {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 0;
  border: none;
  background: none;
  font-family: 'Poppins', sans-serif;
  font-size: 0.88rem;
  font-weight: 400;
  color: #1a1a1a;
  cursor: pointer;
  border-bottom: 1px solid #1a1a1a;
  padding-bottom: 1px;
  line-height: 1.3;
}
.sort-toggle:hover { color: #552c1c; border-color: #552c1c; }
.sort-toggle svg {
  width: 10px;
  height: 10px;
  fill: currentColor;
  transition: transform 0.25s;
}
.sort-toggle.open svg {
  transform: rotate(180deg);
}
.sort-panel {
  position: absolute;
  top: calc(100% + 8px);
  right: 0;
  min-width: 200px;
  background: #fff;
  border: 1px solid #e5e5e5;
  border-radius: 8px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.1);
  padding: 6px 0;
  z-index: 50;
  display: none;
  font-family: 'Poppins', sans-serif;
}
.sort-panel.open { display: block; }
.sort-option {
  display: block;
  width: 100%;
  padding: 9px 16px;
  border: none;
  background: none;
  text-align: left;
  font-family: 'Poppins', sans-serif;
  font-size: 0.84rem;
  color: #333;
  cursor: pointer;
  transition: all 0.15s;
}
.sort-option:hover { background: #f8f5f2; color: #552c1c; }
.sort-option.active {
  color: #552c1c;
  font-weight: 600;
}

.product-count {
  font-size: 0.88rem;
  color: #888;
  font-weight: 400;
  font-family: 'Poppins', sans-serif;
  white-space: nowrap;
}

/* ── Product Grid ── */
.catalog-section {
  background: #fff;
  padding: 32px 0 80px;
}
.catalog-inner {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 24px;
}
.product-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 28px;
}

/* ── Product Card ── */
.product-card {
  background: #fff;
  border-radius: 1.2rem;
  box-shadow: 0.2rem 0.6rem 1.5rem rgba(0,0,0,0.1);
  transition: box-shadow 0.35s ease, transform 0.35s ease;
  position: relative;
  display: flex;
  flex-direction: column;
  overflow: hidden; /* needed for border-radius + image clip */
}
.product-card:hover {
  box-shadow: 0.2rem 0.8rem 2rem rgba(0,0,0,0.16);
  transform: translateY(-3px);
}

/* Card Image Container — fixed height via padding trick */
.card-image-wrap {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 100%; /* creates a perfect square */
  overflow: hidden;
  background: #f5f5f5;
  flex-shrink: 0;
}
/* Both images stacked absolutely inside the square */
.card-img {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: opacity 0.5s ease, transform 0.5s ease;
}
.card-img-primary   { opacity: 1; z-index: 1; transform: scale(1); }
.card-img-secondary { opacity: 0; z-index: 2; transform: scale(1.05); }
/* On hover: swap */
.product-card:hover .card-img-primary   { opacity: 0; transform: scale(1.05); }
.product-card:hover .card-img-secondary { opacity: 1; transform: scale(1); }

/* Green SAVE badge — bottom-left */
.save-badge {
  position: absolute;
  bottom: 10px;
  left: 10px;
  z-index: 5;
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: #48682b;
  color: #fff;
  font-size: 0.68rem;
  font-weight: 700;
  padding: 5px 9px;
  border-radius: 5px;
  letter-spacing: 0.02em;
  font-family: 'Poppins', sans-serif;
  line-height: 1;
}
.save-badge svg {
  width: 11px;
  height: 11px;
  fill: #fff;
  flex-shrink: 0;
}

/* ── Card Info ── */
.card-info {
  padding: 16px 16px 20px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;
}
.card-info h3 {
  font-family: 'Poppins', sans-serif;
  font-size: 0.92rem;
  font-weight: 600;
  color: #1a1a1a;
  line-height: 1.45;
  margin: 0 0 8px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  min-height: 2.6em;
}
.card-info h3 a {
  color: inherit;
  text-decoration: none;
  transition: color 0.2s;
}
.card-info h3 a:hover {
  text-decoration: underline;
}

/* Star ratings */
.card-stars {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 2px;
  margin-bottom: 8px;
}
.card-stars .star {
  color: #f5a623;
  font-size: 0.82rem;
}
.card-stars .star.empty {
  color: #ddd;
}
.review-count {
  font-size: 0.75rem;
  color: #888;
  margin-left: 4px;
  font-family: 'Poppins', sans-serif;
}

/* Price row */
.card-price {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  margin-bottom: 14px;
  flex-wrap: wrap;
}
.price-from {
  font-size: 0.88rem;
  font-weight: 600;
  color: #552c1c;
  font-family: 'Poppins', sans-serif;
}
.price-original {
  font-size: 0.82rem;
  font-weight: 400;
  color: #bbb;
  text-decoration: line-through;
  font-family: 'Poppins', sans-serif;
}

/* Choose Options button — left-to-right sweep */
.btn-choose {
  display: block;
  width: 100%;
  padding: 14px 24px;
  background: #552c1c;
  color: #fff;
  border: 2px solid #552c1c;
  border-radius: 30px;
  font-family: 'Poppins', sans-serif;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  letter-spacing: 0.03em;
  margin-top: auto;
  position: relative;
  overflow: hidden;
  transition: color 0.4s ease, border-color 0.4s ease;
}
/* Sweep layer — white slides from left to right on hover */
.btn-choose::after {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background: #fff;
  transform: translateX(-101%);
  transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 0;
}
/* Button text sits above sweep layer */
.btn-choose span {
  position: relative;
  z-index: 1;
}
.btn-choose:hover::after {
  transform: translateX(0);
}
.btn-choose:hover {
  color: #552c1c;
  border-color: #552c1c;
}
.btn-choose:active {
  transform: scale(0.97);
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .product-grid { grid-template-columns: repeat(3, 1fr); gap: 20px; }
}
@media (max-width: 768px) {
  .product-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
  .filter-label, .sort-label { font-size: 0.8rem; }
  .dropdown-toggle, .sort-toggle { font-size: 0.8rem; }
  .product-count { font-size: 0.8rem; }
  .card-info { padding: 12px 12px 16px; }
  .card-info h3 { font-size: 0.84rem; }
  .btn-choose { font-size: 0.84rem; padding: 12px 18px; }
}
@media (max-width: 420px) {
  .product-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
  .toolbar-inner { gap: 10px; }
  .card-info { padding: 10px 10px 14px; }
  .card-info h3 { font-size: 0.78rem; min-height: auto; }
  .save-badge { font-size: 0.6rem; padding: 4px 7px; }
  .btn-choose { font-size: 0.78rem; padding: 10px 14px; }
}

/* Fade-in animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to   { opacity: 1; transform: translateY(0); }
}
.product-card {
  animation: fadeIn 0.4s ease forwards;
}
</style>

<!-- ══ Toolbar ══ -->
<div class="catalog-toolbar" id="catalog-toolbar">
  <div class="toolbar-inner">

    <!-- Left: Filters -->
    <div class="filter-group">
      <span class="filter-label">Filter:</span>

      <!-- Availability dropdown -->
      <div class="dropdown-wrap" id="filter-availability-wrap">
        <button class="dropdown-toggle" id="filter-availability-btn" type="button">
          Availability
          <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div class="dropdown-panel" id="filter-availability-panel">
          <label>
            <input type="checkbox" value="in-stock" checked />
            In stock
            <span class="filter-count">(<?php echo count($products ?? []); ?>)</span>
          </label>
          <label>
            <input type="checkbox" value="out-of-stock" />
            Out of stock
            <span class="filter-count">(0)</span>
          </label>
        </div>
      </div>

      <!-- Price dropdown -->
      <div class="dropdown-wrap" id="filter-price-wrap">
        <button class="dropdown-toggle" id="filter-price-btn" type="button">
          Price
          <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div class="dropdown-panel" id="filter-price-panel">
          <label>
            <input type="checkbox" value="0-500" data-min="0" data-max="500" />
            Under ₹500
          </label>
          <label>
            <input type="checkbox" value="500-1000" data-min="500" data-max="1000" />
            ₹500 – ₹1,000
          </label>
          <label>
            <input type="checkbox" value="1000-1500" data-min="1000" data-max="1500" />
            ₹1,000 – ₹1,500
          </label>
          <label>
            <input type="checkbox" value="1500-2000" data-min="1500" data-max="2000" />
            ₹1,500 – ₹2,000
          </label>
          <label>
            <input type="checkbox" value="2000-99999" data-min="2000" data-max="99999" />
            ₹2,000+
          </label>
        </div>
      </div>
    </div>

    <!-- Right: Sort + Count -->
    <div class="sort-group">
      <span class="sort-label">Sort by:</span>
      <div class="sort-dropdown-wrap" id="sort-wrap">
        <button class="sort-toggle" id="sort-btn" type="button">
          <span id="sort-current">Alphabetically, A-Z</span>
          <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div class="sort-panel" id="sort-panel">
          <button class="sort-option active" data-sort="alpha-asc">Alphabetically, A-Z</button>
          <button class="sort-option" data-sort="alpha-desc">Alphabetically, Z-A</button>
          <button class="sort-option" data-sort="price-asc">Price, low to high</button>
          <button class="sort-option" data-sort="price-desc">Price, high to low</button>
          <button class="sort-option" data-sort="date-desc">Date, new to old</button>
          <button class="sort-option" data-sort="date-asc">Date, old to new</button>
        </div>
      </div>
      <span class="product-count" id="product-count-display"><!-- filled by JS --></span>
    </div>

  </div>
</div>

<!-- ══ Product Grid ══ -->
<section class="catalog-section">
  <div class="catalog-inner">
    <div class="product-grid" id="product-grid">

<?php
// ── Product data ──────────────────────────────────────────────────────────
$products = [
  [
    'name'      => 'Air -Tight Kitchen Storage / Containers',
    'price'     => 1299,
    'original'  => 3999,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 6,
    'img'       => 'https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1610348725531-843dff563e2c?w=600&q=80',
  ],
  [
    'name'      => 'Air-Tight Kitchen Storage Containers',
    'price'     => 1149,
    'original'  => 1749,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 6,
    'img'       => 'https://images.unsplash.com/photo-1610348725531-843dff563e2c?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=600&q=80',
  ],
  [
    'name'      => 'Air-Tight Kitchen Storage Jar',
    'price'     => 1649,
    'original'  => 1999,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 1,
    'img'       => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=600&q=80',
  ],
  [
    'name'      => 'Ayurvedic Kansa Wand Massager',
    'price'     => 999,
    'original'  => 1999,
    'category'  => 'eco',
    'stars'     => 5,
    'reviews'   => 5,
    'img'       => 'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1576426863848-c21f53c60b19?w=600&q=80',
  ],
  [
    'name'      => 'Copper Water Bottle – 1 Litre',
    'price'     => 1599,
    'original'  => 1999,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 214,
    'img'       => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1544145945-f90425340c7e?w=600&q=80',
  ],
  [
    'name'      => 'Cotton Table Runner – Boho Weave',
    'price'     => 699,
    'original'  => 999,
    'category'  => 'decor',
    'stars'     => 4,
    'reviews'   => 52,
    'img'       => 'https://images.unsplash.com/photo-1540574163026-643ea20ade25?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&q=80',
  ],
  [
    'name'      => 'Glass Candle Holder Set of 3',
    'price'     => 499,
    'original'  => 799,
    'category'  => 'decor',
    'stars'     => 5,
    'reviews'   => 87,
    'img'       => 'https://images.unsplash.com/photo-1603006905003-be475563bc59?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1572726729207-a78d6feb18d7?w=600&q=80',
  ],
  [
    'name'      => 'Bamboo Cutlery Set – Eco Pack',
    'price'     => 799,
    'original'  => 1099,
    'category'  => 'eco',
    'stars'     => 4,
    'reviews'   => 63,
    'img'       => 'https://images.unsplash.com/photo-1584559582128-b8be739912e1?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?w=600&q=80',
  ],
  [
    'name'      => 'Terracotta Pot with Drainage Tray',
    'price'     => 399,
    'original'  => 599,
    'category'  => 'decor',
    'stars'     => 5,
    'reviews'   => 148,
    'img'       => 'https://images.unsplash.com/photo-1491929829375-cf655b19f3de?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80',
  ],
  [
    'name'      => 'Linen Cushion Cover – 16×16 inch',
    'price'     => 599,
    'original'  => 899,
    'category'  => 'decor',
    'stars'     => 4,
    'reviews'   => 72,
    'img'       => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=600&q=80',
  ],
  [
    'name'      => 'Stainless Steel Spice Rack – 12 Jars',
    'price'     => 1899,
    'original'  => 2499,
    'category'  => 'storage',
    'stars'     => 5,
    'reviews'   => 203,
    'img'       => 'https://images.unsplash.com/photo-1547592180-85f173990554?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1565183928294-7063f23ce0f8?w=600&q=80',
  ],
  [
    'name'      => 'Woven Jute Storage Basket Set',
    'price'     => 1099,
    'original'  => 1499,
    'category'  => 'storage',
    'stars'     => 4,
    'reviews'   => 44,
    'img'       => 'https://images.unsplash.com/photo-1616091216791-a5360b5b3d7a?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1585559604959-45bb9bfcf5e1?w=600&q=80',
  ],
  [
    'name'      => 'Ceramic Dinner Plate Set of 4',
    'price'     => 2199,
    'original'  => 2999,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 167,
    'img'       => 'https://images.unsplash.com/photo-1557925923-cd4648e211a0?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?w=600&q=80',
  ],
  [
    'name'      => 'Macramé Wall Hanging – Boho Style',
    'price'     => 849,
    'original'  => 1199,
    'category'  => 'decor',
    'stars'     => 5,
    'reviews'   => 91,
    'img'       => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1579656381226-5fc0f0100c3b?w=600&q=80',
  ],
  [
    'name'      => 'Stainless Steel Matka – 5 Litre',
    'price'     => 1349,
    'original'  => 1799,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 319,
    'img'       => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1590154343-ee1c43f0a7c1?w=600&q=80',
  ],
  [
    'name'      => 'Brass Diya Set – Festival Edition',
    'price'     => 449,
    'original'  => 699,
    'category'  => 'decor',
    'stars'     => 5,
    'reviews'   => 236,
    'img'       => 'https://images.unsplash.com/photo-1630432052695-cc4b8de0a94b?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1603006905003-be475563bc59?w=600&q=80',
  ],
  [
    'name'      => 'Cane Bread Basket with Lid',
    'price'     => 649,
    'original'  => 899,
    'category'  => 'kitchen',
    'stars'     => 4,
    'reviews'   => 57,
    'img'       => 'https://images.unsplash.com/photo-1556910096-6f5e72db6803?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1616091216791-a5360b5b3d7a?w=600&q=80',
  ],
  [
    'name'      => 'Borosilicate Glass Water Jug – 1.5L',
    'price'     => 1199,
    'original'  => 1699,
    'category'  => 'kitchen',
    'stars'     => 4,
    'reviews'   => 112,
    'img'       => 'https://images.unsplash.com/photo-1544145945-f90425340c7e?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1599484615924-8de4de4a3f41?w=600&q=80',
  ],
  [
    'name'      => 'Premium Borosilicate Glass Spice Jar – 270ml',
    'price'     => 1299,
    'original'  => 1699,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 128,
    'img'       => 'https://images.unsplash.com/photo-1565538810643-b5bdb714032a?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1610348725531-843dff563e2c?w=600&q=80',
  ],
  [
    'name'      => 'Sprouts Maker Glass Jar – 720ml 🌱',
    'price'     => 699,
    'original'  => 999,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 96,
    'img'       => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=600&q=80',
  ],
  [
    'name'      => 'Food Grade Silicone Idli Liners ☘️',
    'price'     => 599,
    'original'  => 999,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 45,
    'img'       => 'https://images.unsplash.com/photo-1576426863848-c21f53c60b19?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=600&q=80',
  ],
  [
    'name'      => 'Sun Protection Mask ☀️',
    'price'     => 399,
    'original'  => 799,
    'category'  => 'eco',
    'stars'     => 4,
    'reviews'   => 34,
    'img'       => 'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1576426863848-c21f53c60b19?w=600&q=80',
  ],
  [
    'name'      => 'Ceramic Vase Set – Handcrafted',
    'price'     => 1299,
    'original'  => 1899,
    'category'  => 'decor',
    'stars'     => 5,
    'reviews'   => 128,
    'img'       => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1612196808214-b7e239e5f04b?w=600&q=80',
  ],
  [
    'name'      => 'Wooden Serving Board with Handles',
    'price'     => 899,
    'original'  => 1299,
    'category'  => 'kitchen',
    'stars'     => 4,
    'reviews'   => 96,
    'img'       => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1590540280511-4c1df1c8b7db?w=600&q=80',
  ],
  [
    'name'      => 'Stainless Steel Matka Stand With Dispenser',
    'price'     => 899,
    'original'  => 1999,
    'category'  => 'kitchen',
    'stars'     => 5,
    'reviews'   => 280,
    'img'       => 'https://images.unsplash.com/photo-1565538810643-b5bdb714032a?w=600&q=80',
    'img2'      => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=600&q=80',
  ],
];

// ── Helpers ──
function stars_html(int $n): string {
  $html = '';
  for ($i = 1; $i <= 5; $i++) {
    if ($i <= $n) {
      $html .= '<span class="star">★</span>';
    } else {
      $html .= '<span class="star empty">☆</span>';
    }
  }
  return $html;
}
function discount(int $price, int $orig): int {
  return (int) round(($orig - $price) / $orig * 100);
}

$totalProducts = count($products);

foreach ($products as $idx => $p):
  $off = discount($p['price'], $p['original']);
?>
      <!-- ── Card ── -->
      <div class="product-card" data-category="<?= $p['category'] ?>" data-price="<?= $p['price'] ?>" data-name="<?= htmlspecialchars($p['name']) ?>" style="animation-delay: <?= $idx * 0.04 ?>s;">

        <!-- Image area -->
        <div class="card-image-wrap">
          <!-- Primary image -->
          <img class="card-img card-img-primary"
               src="<?= $p['img'] ?>"
               alt="<?= htmlspecialchars($p['name']) ?>"
               loading="lazy" />
          <!-- Secondary image (shown on hover) -->
          <img class="card-img card-img-secondary"
               src="<?= $p['img2'] ?? $p['img'] ?>"
               alt="<?= htmlspecialchars($p['name']) ?> – alternate view"
               loading="lazy" />

          <?php if ($off > 0): ?>
          <span class="save-badge">
            <svg viewBox="0 0 12 12">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M7 0h3a2 2 0 012 2v3a1 1 0 01-.3.7l-6 6a1
                   1 0 01-1.4 0l-4-4a1 1 0 010-1.4l6-6A1 1 0 017
                   0zm2 2a1 1 0 102 0 1 1 0 00-2 0z"/>
            </svg>
            SAVE <?= $off ?>%
          </span>
          <?php endif; ?>
        </div>

        <!-- Info -->
        <div class="card-info">
          <h3><a href="javascript:void(0)"><?= htmlspecialchars($p['name']) ?></a></h3>

          <div class="card-stars">
            <?= stars_html($p['stars']) ?>
            <span class="review-count">(<?= $p['reviews'] ?>)</span>
          </div>

          <div class="card-price">
            <span class="price-from">From Rs. <?= number_format($p['price']) ?>.00</span>
            <span class="price-original">Rs. <?= number_format($p['original']) ?>.00</span>
          </div>

          <button class="btn-choose" type="button"><span>Choose options</span></button>
        </div>

      </div>
<?php endforeach; ?>

    </div><!-- /product-grid -->
  </div><!-- /catalog-inner -->
</section>

<script>
(function () {
  'use strict';

  /* ── 1. Header scroll behavior ── */
  const headerContainer = document.getElementById('header-container');
  const marqueeBar      = document.getElementById('marquee-bar');
  const toolbar         = document.getElementById('catalog-toolbar');

  function onScroll() {
    const sy = window.scrollY;
    if (marqueeBar) {
      if (sy > 60) {
        marqueeBar.style.maxHeight  = '0';
        marqueeBar.style.overflow   = 'hidden';
        marqueeBar.style.transition = 'max-height 0.3s ease';
        marqueeBar.style.padding    = '0';
      } else {
        marqueeBar.style.maxHeight  = '80px';
        marqueeBar.style.overflow   = 'visible';
        marqueeBar.style.padding    = '';
      }
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ── 2. Header spacer ── */
  function setSpacerHeight() {
    const spacer = document.getElementById('header-spacer');
    if (spacer && headerContainer) {
      spacer.style.height = headerContainer.offsetHeight + 'px';
    }
  }
  setSpacerHeight();
  window.addEventListener('resize', setSpacerHeight);

  /* ── 3. Product count ── */
  const allCards = Array.from(document.querySelectorAll('.product-card'));
  const countDisplay = document.getElementById('product-count-display');

  function updateCount() {
    const visible = allCards.filter(c => c.style.display !== 'none').length;
    countDisplay.textContent = visible + ' product' + (visible !== 1 ? 's' : '');
  }
  updateCount();

  /* ── 4. Dropdown toggles ── */
  function setupDropdown(btnId, panelId) {
    const btn   = document.getElementById(btnId);
    const panel = document.getElementById(panelId);
    if (!btn || !panel) return;

    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = panel.classList.contains('open');
      closeAllDropdowns();
      if (!isOpen) {
        panel.classList.add('open');
        btn.classList.add('open');
      }
    });
  }

  function closeAllDropdowns() {
    document.querySelectorAll('.dropdown-panel, .sort-panel').forEach(p => p.classList.remove('open'));
    document.querySelectorAll('.dropdown-toggle, .sort-toggle').forEach(b => b.classList.remove('open'));
  }

  document.addEventListener('click', function (e) {
    if (!e.target.closest('.dropdown-wrap') && !e.target.closest('.sort-dropdown-wrap')) {
      closeAllDropdowns();
    }
  });

  setupDropdown('filter-availability-btn', 'filter-availability-panel');
  setupDropdown('filter-price-btn', 'filter-price-panel');

  /* ── 5. Sort dropdown ── */
  const sortBtn     = document.getElementById('sort-btn');
  const sortPanel   = document.getElementById('sort-panel');
  const sortCurrent = document.getElementById('sort-current');

  sortBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    const isOpen = sortPanel.classList.contains('open');
    closeAllDropdowns();
    if (!isOpen) {
      sortPanel.classList.add('open');
      sortBtn.classList.add('open');
    }
  });

  document.querySelectorAll('.sort-option').forEach(opt => {
    opt.addEventListener('click', function () {
      document.querySelectorAll('.sort-option').forEach(o => o.classList.remove('active'));
      this.classList.add('active');
      sortCurrent.textContent = this.textContent;
      closeAllDropdowns();
      sortProducts(this.dataset.sort);
    });
  });

  /* ── 6. Sort logic ── */
  const grid = document.getElementById('product-grid');

  function sortProducts(mode) {
    const cards = Array.from(grid.querySelectorAll('.product-card'));
    cards.sort((a, b) => {
      const nameA  = (a.dataset.name || '').toLowerCase();
      const nameB  = (b.dataset.name || '').toLowerCase();
      const priceA = parseFloat(a.dataset.price) || 0;
      const priceB = parseFloat(b.dataset.price) || 0;

      switch (mode) {
        case 'alpha-asc':  return nameA.localeCompare(nameB);
        case 'alpha-desc': return nameB.localeCompare(nameA);
        case 'price-asc':  return priceA - priceB;
        case 'price-desc': return priceB - priceA;
        case 'date-desc':  return 0; // placeholder
        case 'date-asc':   return 0;
        default: return 0;
      }
    });
    cards.forEach(card => grid.appendChild(card));
  }

  /* ── 7. Price filter ── */
  const priceCheckboxes = document.querySelectorAll('#filter-price-panel input[type="checkbox"]');

  priceCheckboxes.forEach(cb => {
    cb.addEventListener('change', applyFilters);
  });

  function applyFilters() {
    const checkedPrices = Array.from(priceCheckboxes).filter(cb => cb.checked);

    allCards.forEach(card => {
      const price = parseFloat(card.dataset.price) || 0;

      if (checkedPrices.length === 0) {
        card.style.display = '';
        card.style.animation = 'fadeIn 0.35s ease forwards';
      } else {
        const matchesPrice = checkedPrices.some(cb => {
          const min = parseFloat(cb.dataset.min);
          const max = parseFloat(cb.dataset.max);
          return price >= min && price < max;
        });
        if (matchesPrice) {
          card.style.display = '';
          card.style.animation = 'fadeIn 0.35s ease forwards';
        } else {
          card.style.display = 'none';
        }
      }
    });

    updateCount();
  }

  /* ── 8. Choose Options → Add to Cart ── */
  document.querySelectorAll('.btn-choose').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      const card = this.closest('.product-card');
      const name = card.querySelector('h3 a').textContent.trim();

      /* Update cart count */
      const countEl = document.getElementById('cart-count');
      if (countEl) {
        countEl.textContent = parseInt(countEl.textContent || '0') + 1;
      }

      /* Button feedback */
      this.textContent = '✓ Added!';
      this.style.background = '#2d7a3c';
      const self = this;
      setTimeout(() => {
        self.textContent = 'Choose options';
        self.style.background = '';
      }, 1400);
    });
  });

})();
</script>

<?php require_once 'includes/footer.php'; ?>