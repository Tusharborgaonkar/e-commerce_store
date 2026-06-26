<?php
require_once 'includes/products.php';

$slug    = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$product = null;
foreach ($all_products as $p) {
  if ($p['slug'] === $slug) { $product = $p; break; }
}
if (!$product) { header('Location: catalog.php'); exit; }

/* helpers */
$gallery     = $product['gallery'] ?? [$product['img']];
$variants    = $product['variants']    ?? [];
$vPrices     = $product['variant_prices']  ?? [$product['price']];
$vCompare    = $product['variant_compare'] ?? [$product['original']];
$curPrice    = $vPrices[0]   ?? $product['price'];
$curCompare  = $vCompare[0]  ?? $product['original'];
$savePct     = $curCompare > 0 ? round(($curCompare - $curPrice) / $curCompare * 100) : 0;

require_once 'includes/header.php';
?>

<style>
/* ═══════════════════════════════════════════
   HOMEWERA-STYLE PRODUCT PAGE
   Primary  : #552c1c  (dark brown)
   Accent   : #48682b  (forest green)
   BG light : #f3f3f3
═══════════════════════════════════════════ */

/* ── Breadcrumb ─────────────────────────── */
.pdp-breadcrumb {
  font-family: 'Poppins', sans-serif;
  font-size: 0.78rem;
  color: #888;
  padding: 12px 0;
  letter-spacing: 0.02em;
}
.pdp-breadcrumb a { color: #888; text-decoration: none; }
.pdp-breadcrumb a:hover { color: #552c1c; text-decoration: underline; }
.pdp-breadcrumb .sep { margin: 0 6px; }

/* ── Page wrapper ───────────────────────── */
.pdp-wrap {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 20px 60px;
  font-family: 'Poppins', sans-serif;
}

/* ── Two-column layout ──────────────────── */
.pdp-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: start;
}
@media (max-width: 900px) {
  .pdp-grid { grid-template-columns: 1fr; gap: 24px; }
}

/* ══ LEFT: Gallery ══════════════════════ */
.pdp-gallery { position: sticky; top: 90px; }

/* Main image */
.pdp-gallery__main {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  background: #f3f3f3;
  aspect-ratio: 1 / 1;
  margin-bottom: 10px;
}
.pdp-gallery__main img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: opacity 0.25s ease;
}

/* Save badge on image */
.pdp-save-badge {
  position: absolute;
  bottom: 14px; left: 14px;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  background: #48682b;
  color: #fff;
  font-size: 0.72rem;
  font-weight: 700;
  padding: 5px 11px 5px 8px;
  border-radius: 6px;
  letter-spacing: 0.04em;
  pointer-events: none;
}
.pdp-save-badge svg { width: 12px; height: 12px; fill: #fff; flex-shrink: 0; }

/* Thumbnails */
.pdp-gallery__thumbs {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}
.pdp-thumb {
  width: 72px; height: 72px;
  border-radius: 8px;
  overflow: hidden;
  cursor: pointer;
  border: 2px solid transparent;
  transition: border-color 0.2s;
  background: #f3f3f3;
  flex-shrink: 0;
}
.pdp-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
.pdp-thumb.active,
.pdp-thumb:hover { border-color: #552c1c; }

/* ══ RIGHT: Info ════════════════════════ */
.pdp-info { }

/* Trust pills row */
.pdp-trust-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin-bottom: 14px;
}
.pdp-trust-pill {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: 0.68rem;
  font-weight: 600;
  color: #2d6e25;
  background: #eef6e8;
  border: 1px solid #bfe0ac;
  border-radius: 4px;
  padding: 3px 9px;
  letter-spacing: 0.02em;
  text-transform: uppercase;
}

/* Title */
.pdp-title {
  font-size: 1.45rem;
  font-weight: 700;
  color: #121212;
  line-height: 1.35;
  margin: 0 0 12px;
  letter-spacing: 0.01em;
}
@media (max-width: 480px) { .pdp-title { font-size: 1.2rem; } }

/* Stars */
.pdp-stars {
  display: flex;
  align-items: center;
  gap: 3px;
  margin-bottom: 14px;
}
.pdp-stars .s { color: #e8a317; font-size: 1.05rem; line-height: 1; }
.pdp-stars .s.empty { color: #d0d0d0; }
.pdp-stars .review-anchor {
  margin-left: 6px;
  font-size: 0.8rem;
  color: #552c1c;
  text-decoration: underline;
  cursor: pointer;
  white-space: nowrap;
}

/* Price row */
.pdp-price {
  display: flex;
  align-items: baseline;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 18px;
}
.pdp-price__sale {
  font-size: 1.55rem;
  font-weight: 700;
  color: #552c1c;
  letter-spacing: -0.01em;
}
.pdp-price__compare {
  font-size: 0.95rem;
  color: #999;
  text-decoration: line-through;
  font-weight: 400;
}
.pdp-price__save {
  font-size: 0.72rem;
  font-weight: 700;
  color: #2d7a3c;
  background: #e5f7ea;
  padding: 3px 9px;
  border-radius: 20px;
  letter-spacing: 0.03em;
}

/* Divider */
.pdp-divider {
  border: none;
  border-top: 1px solid #e8e8e8;
  margin: 16px 0;
}

/* Variant heading */
.pdp-variant-heading {
  font-size: 0.85rem;
  font-weight: 600;
  color: #121212;
  margin-bottom: 10px;
}
.pdp-variant-heading span {
  font-weight: 400;
  color: #555;
}

/* Variant pills */
.pdp-variant-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 22px;
}
.pdp-variant-btn {
  padding: 10px 20px;
  border-radius: 40px;
  border: 1.5px solid rgba(85,44,28,0.4);
  background: #fff;
  font-family: 'Poppins', sans-serif;
  font-size: 0.8rem;
  font-weight: 500;
  color: #121212;
  cursor: pointer;
  transition: border-color 0.18s, background 0.18s, color 0.18s;
  line-height: 1;
  white-space: nowrap;
}
.pdp-variant-btn:hover {
  border-color: #552c1c;
  color: #552c1c;
}
.pdp-variant-btn.selected {
  border-color: #552c1c;
  background: #552c1c;
  color: #fff;
}

/* Quantity selector */
.pdp-qty-wrap {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 18px;
}
.pdp-qty-label {
  font-size: 0.85rem;
  font-weight: 600;
  color: #121212;
  white-space: nowrap;
}
.pdp-qty-box {
  display: flex;
  align-items: center;
  border: 1.5px solid rgba(85,44,28,0.35);
  border-radius: 8px;
  overflow: hidden;
  height: 44px;
}
.pdp-qty-btn {
  width: 44px;
  height: 44px;
  border: none;
  background: #f8f8f6;
  color: #552c1c;
  font-size: 1.2rem;
  font-weight: 700;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.15s;
  flex-shrink: 0;
  line-height: 1;
}
.pdp-qty-btn:hover { background: #f0e8e4; }
.pdp-qty-btn:active { background: #e8dbd6; }
.pdp-qty-input {
  width: 52px;
  height: 44px;
  border: none;
  border-left: 1.5px solid rgba(85,44,28,0.2);
  border-right: 1.5px solid rgba(85,44,28,0.2);
  text-align: center;
  font-family: 'Poppins', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: #121212;
  background: #fff;
  outline: none;
  -moz-appearance: textfield;
}
.pdp-qty-input::-webkit-outer-spin-button,
.pdp-qty-input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }

.pdp-qty-total {
  font-size: 0.9rem;
  font-weight: 600;
  color: #552c1c;
  white-space: nowrap;
}

/* Delivery info */
.pdp-delivery {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #fdf5f2;
  border: 1px solid #f0ddd6;
  border-radius: 8px;
  padding: 11px 14px;
  margin-bottom: 18px;
  font-size: 0.82rem;
  color: #552c1c;
  font-weight: 500;
}
.pdp-delivery svg { flex-shrink: 0; color: #552c1c; }

/* Buy buttons */
.pdp-buy-wrap {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 20px;
}
.pdp-btn-buynow {
  display: block; width: 100%;
  padding: 15px 20px;
  border-radius: 12px;
  background: #552c1c;
  color: #fff;
  font-family: 'Poppins', sans-serif;
  font-size: 0.95rem;
  font-weight: 700;
  border: none;
  cursor: pointer;
  text-align: center;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  transition: background 0.18s, transform 0.1s;
  box-shadow: 0 4px 12px rgba(85,44,28,0.25);
}
.pdp-btn-buynow:hover { background: #6b3622; transform: translateY(-1px); }
.pdp-btn-buynow:active { transform: translateY(0); }

.pdp-btn-cart {
  display: block; width: 100%;
  padding: 13px 20px;
  border-radius: 12px;
  border: 2px solid #552c1c;
  background: transparent;
  color: #552c1c;
  font-family: 'Poppins', sans-serif;
  font-size: 0.95rem;
  font-weight: 700;
  cursor: pointer;
  text-align: center;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  transition: all 0.18s;
}
.pdp-btn-cart:hover { background: #552c1c; color: #fff; }

/* Trust assurance row */
.pdp-assurance {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 8px;
  margin-bottom: 24px;
  padding: 14px 12px;
  background: #f8f8f6;
  border-radius: 10px;
  border: 1px solid #eee;
}
@media (max-width: 480px) {
  .pdp-assurance { grid-template-columns: repeat(2, 1fr); }
}
.pdp-assurance__item {
  text-align: center;
  font-size: 0.68rem;
  font-weight: 600;
  color: #333;
  line-height: 1.4;
}
.pdp-assurance__icon {
  font-size: 1.35rem;
  display: block;
  margin-bottom: 4px;
}

/* ══ DESCRIPTION / FAQ / REVIEWS block ══ */
.pdp-content-block {
  margin-top: 48px;
  border-top: 2px solid #e8e8e8;
  padding-top: 40px;
}

/* Tab nav */
.pdp-tabs {
  display: flex;
  border-bottom: 2px solid #e8e8e8;
  margin-bottom: 28px;
  gap: 0;
  overflow-x: auto;
}
.pdp-tab-btn {
  flex-shrink: 0;
  padding: 10px 22px;
  font-family: 'Poppins', sans-serif;
  font-size: 0.88rem;
  font-weight: 600;
  color: #888;
  background: none;
  border: none;
  cursor: pointer;
  border-bottom: 2.5px solid transparent;
  margin-bottom: -2px;
  transition: color 0.18s, border-color 0.18s;
  white-space: nowrap;
}
.pdp-tab-btn.active { color: #552c1c; border-bottom-color: #552c1c; }
.pdp-tab-pane { display: none; }
.pdp-tab-pane.active { display: block; }

/* Description HTML content */
.pdp-desc {
  font-size: 0.9rem;
  line-height: 1.85;
  color: #333;
  max-width: 780px;
  margin: 0 auto;
}
.pdp-desc h3 {
  font-size: 1.1rem;
  font-weight: 700;
  margin: 0 0 10px;
  color: #121212;
}
.pdp-desc p { margin: 0 0 14px; }
.pdp-desc ul { padding-left: 20px; margin: 0 0 14px; }
.pdp-desc li { margin-bottom: 7px; }
.pdp-desc strong { color: #121212; }

/* FAQs */
.pdp-faq-item {
  border-bottom: 1px solid #e8e8e8;
}
.pdp-faq-q {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  padding: 16px 0;
  font-size: 0.88rem;
  font-weight: 600;
  color: #121212;
  cursor: pointer;
  user-select: none;
}
.pdp-faq-q .faq-arrow {
  flex-shrink: 0;
  width: 20px; height: 20px;
  border: 1.5px solid #ccc;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.25s, border-color 0.2s;
}
.pdp-faq-q .faq-arrow svg { width: 10px; height: 10px; }
.pdp-faq-item.open .pdp-faq-q .faq-arrow { transform: rotate(180deg); border-color: #552c1c; }
.pdp-faq-a {
  font-size: 0.85rem;
  color: #555;
  line-height: 1.75;
  padding-bottom: 16px;
  display: none;
}
.pdp-faq-item.open .pdp-faq-a { display: block; }

/* Reviews */
.pdp-review-summary {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 18px 20px;
  background: #f8f8f6;
  border-radius: 12px;
  margin-bottom: 20px;
}
.pdp-review-score {
  font-size: 2.8rem;
  font-weight: 700;
  color: #121212;
  line-height: 1;
}
.pdp-review-stars-row { display: flex; gap: 2px; margin-bottom: 4px; }
.pdp-review-stars-row .s { color: #e8a317; font-size: 1.1rem; }
.pdp-review-meta { font-size: 0.78rem; color: #777; }

.pdp-review-card {
  background: #fff;
  border: 1px solid #eee;
  border-radius: 12px;
  padding: 18px 20px;
  margin-bottom: 12px;
}
.pdp-review-card__head {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 8px;
}
.pdp-review-card__author {
  font-size: 0.85rem;
  font-weight: 700;
  color: #121212;
}
.pdp-review-card__stars { color: #e8a317; font-size: 0.9rem; }
.pdp-review-card__text {
  font-size: 0.84rem;
  color: #555;
  line-height: 1.65;
  margin: 0;
}

/* ══ RELATED PRODUCTS ════════════════════ */
.pdp-related {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 20px 60px;
  font-family: 'Poppins', sans-serif;
}
.pdp-related__title {
  font-size: 1.25rem;
  font-weight: 700;
  color: #121212;
  margin-bottom: 20px;
  letter-spacing: 0.02em;
}
.pdp-related__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
}
@media (max-width: 900px) { .pdp-related__grid { grid-template-columns: repeat(2, 1fr); } }

.pdp-related-card {
  display: block;
  text-decoration: none;
  border-radius: 14px;
  overflow: hidden;
  background: #fff;
  border: 1px solid #eee;
  box-shadow: 0.2rem 0.6rem 1.5rem rgba(0,0,0,0.06);
  transition: box-shadow 0.2s, transform 0.2s;
}
.pdp-related-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.12); transform: translateY(-2px); }
.pdp-related-card__img-wrap { position: relative; aspect-ratio: 1/1; overflow: hidden; background: #f3f3f3; }
.pdp-related-card__img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.35s ease; }
.pdp-related-card:hover .pdp-related-card__img-wrap img { transform: scale(1.04); }
.pdp-related-card__body { padding: 10px 12px 14px; }
.pdp-related-card__name {
  font-size: 0.78rem;
  font-weight: 600;
  color: #121212;
  line-height: 1.45;
  margin-bottom: 5px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.pdp-related-card__price {
  font-size: 0.82rem;
  font-weight: 700;
  color: #552c1c;
}
.pdp-related-card__compare {
  font-size: 0.76rem;
  color: #aaa;
  text-decoration: line-through;
  margin-left: 5px;
  font-weight: 400;
}

/* Utility */
.pdp-section-pad { max-width: 1280px; margin: 0 auto; padding: 0 20px; }
</style>

<!-- ══════════ BREADCRUMB ══════════ -->
<div class="pdp-section-pad">
  <nav class="pdp-breadcrumb" aria-label="Breadcrumb">
    <a href="index.php">Home</a>
    <span class="sep">›</span>
    <a href="catalog.php">All Products</a>
    <span class="sep">›</span>
    <span style="color:#121212;"><?= htmlspecialchars($product['name']) ?></span>
  </nav>
</div>

<!-- ══════════ PRODUCT MAIN ══════════ -->
<div class="pdp-wrap">
  <div class="pdp-grid">

    <!-- ──── LEFT: Gallery ──── -->
    <div class="pdp-gallery">
      <div class="pdp-gallery__main">
        <img id="pdp-main-img"
             src="<?= htmlspecialchars($gallery[0]) ?>"
             alt="<?= htmlspecialchars($product['name']) ?>" />

        <?php if ($savePct > 0): ?>
        <div class="pdp-save-badge">
          <svg viewBox="0 0 12 12"><path fill-rule="evenodd" clip-rule="evenodd" d="M7 0h3a2 2 0 012 2v3a1 1 0 01-.3.7l-6 6a1 1 0 01-1.4 0l-4-4a1 1 0 010-1.4l6-6A1 1 0 017 0zm2 2a1 1 0 102 0 1 1 0 00-2 0z"/></svg>
          SAVE <span id="pdp-save-pct"><?= $savePct ?>%</span>
        </div>
        <?php endif; ?>
      </div>

      <div class="pdp-gallery__thumbs">
        <?php foreach ($gallery as $i => $thumb): ?>
        <div class="pdp-thumb <?= $i === 0 ? 'active' : '' ?>"
             onclick="pdpSwitchImage(this, '<?= htmlspecialchars($thumb) ?>')">
          <img src="<?= htmlspecialchars($thumb) ?>" alt="view <?= $i+1 ?>" loading="lazy" />
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- ──── RIGHT: Info ──── -->
    <div class="pdp-info">

      <!-- Trust pills -->
      <?php if (!empty($product['badges'])): ?>
      <div class="pdp-trust-pills">
        <?php foreach ($product['badges'] as $badge): ?>
        <span class="pdp-trust-pill">✔ <?= htmlspecialchars($badge) ?></span>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Title -->
      <h1 class="pdp-title"><?= htmlspecialchars($product['name']) ?></h1>

      <!-- Stars & reviews -->
      <div class="pdp-stars">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <span class="s <?= $i > $product['stars'] ? 'empty' : '' ?>"><?= $i <= $product['stars'] ? '★' : '☆' ?></span>
        <?php endfor; ?>
        <a class="review-anchor" onclick="pdpSwitchTab('reviews')" style="margin-left:8px;font-size:0.8rem;color:#552c1c;text-decoration:underline;cursor:pointer;">
          <?= $product['reviews'] ?> reviews
        </a>
      </div>

      <!-- Price -->
      <div class="pdp-price">
        <span class="pdp-price__sale" id="pdp-price-sale">Rs. <?= number_format($curPrice) ?>.00</span>
        <span class="pdp-price__compare" id="pdp-price-compare">Rs. <?= number_format($curCompare) ?>.00</span>
        <span class="pdp-price__save" id="pdp-price-save">SAVE <?= $savePct ?>%</span>
      </div>

      <hr class="pdp-divider">

      <!-- Variants -->
      <?php if (!empty($variants)): ?>
      <div class="pdp-variant-heading">
        Size/Pack: <span id="pdp-variant-label"><?= htmlspecialchars($variants[0]) ?></span>
      </div>
      <div class="pdp-variant-grid">
        <?php foreach ($variants as $vi => $v): ?>
        <button class="pdp-variant-btn <?= $vi === 0 ? 'selected' : '' ?>"
                data-price="<?= $vPrices[$vi] ?? $curPrice ?>"
                data-compare="<?= $vCompare[$vi] ?? $curCompare ?>"
                onclick="pdpSelectVariant(this)">
          <?= htmlspecialchars($v) ?>
        </button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Quantity Selector -->
      <div class="pdp-qty-wrap">
        <span class="pdp-qty-label">Quantity:</span>
        <div class="pdp-qty-box">
          <button class="pdp-qty-btn" onclick="pdpChangeQty(-1)" aria-label="Decrease quantity">−</button>
          <input class="pdp-qty-input" type="number" id="pdp-qty" value="1" min="1" max="99" readonly />
          <button class="pdp-qty-btn" onclick="pdpChangeQty(1)" aria-label="Increase quantity">+</button>
        </div>
        <span class="pdp-qty-total" id="pdp-qty-total">Total: Rs. <?= number_format($curPrice) ?>.00</span>
      </div>

      <!-- Delivery -->
      <?php if (!empty($product['delivery'])): ?>
      <div class="pdp-delivery">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="1.5"/><circle cx="18.5" cy="18.5" r="1.5"/>
        </svg>
        <?= htmlspecialchars($product['delivery']) ?>
      </div>
      <?php endif; ?>

      <!-- Buy Now + Add to Cart -->
      <div class="pdp-buy-wrap">
        <button class="pdp-btn-buynow" onclick="pdpBuyNow()">Buy Now</button>
        <button class="pdp-btn-cart" id="pdp-cart-btn" onclick="pdpAddToCart(this)">Add to Cart</button>
      </div>

      <!-- Assurance row -->
      <div class="pdp-assurance">
        <div class="pdp-assurance__item">
          <span class="pdp-assurance__icon">🇮🇳</span>Made in India
        </div>
        <div class="pdp-assurance__item">
          <span class="pdp-assurance__icon">🔒</span>Secure Checkout
        </div>
        <div class="pdp-assurance__item">
          <span class="pdp-assurance__icon">↩</span>7-Day Returns
        </div>
        <div class="pdp-assurance__item">
          <span class="pdp-assurance__icon">🚚</span>Fast Delivery
        </div>
      </div>

    </div><!-- /pdp-info -->
  </div><!-- /pdp-grid -->

  <!-- ══ DESCRIPTION / FAQ / REVIEWS ══ -->
  <div class="pdp-content-block">
    <div class="pdp-tabs" role="tablist">
      <button class="pdp-tab-btn active" onclick="pdpSwitchTab('desc')" id="pdp-tab-desc">Description</button>
      <?php if (!empty($product['faqs'])): ?>
      <button class="pdp-tab-btn" onclick="pdpSwitchTab('faqs')" id="pdp-tab-faqs">
        FAQs (<?= count($product['faqs']) ?>)
      </button>
      <?php endif; ?>
      <?php if (!empty($product['review_list'])): ?>
      <button class="pdp-tab-btn" onclick="pdpSwitchTab('reviews')" id="pdp-tab-reviews">
        Reviews (<?= count($product['review_list']) ?>)
      </button>
      <?php endif; ?>
    </div>

    <!-- Description -->
    <div class="pdp-tab-pane active" id="pdp-pane-desc">
      <div class="pdp-desc">
        <?= $product['description'] ?? '<p>No description available.</p>' ?>
      </div>
    </div>

    <!-- FAQs -->
    <?php if (!empty($product['faqs'])): ?>
    <div class="pdp-tab-pane" id="pdp-pane-faqs">
      <?php foreach ($product['faqs'] as $fi => $faq): ?>
      <div class="pdp-faq-item" id="faq<?= $fi ?>">
        <div class="pdp-faq-q" onclick="pdpToggleFaq(<?= $fi ?>)">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-arrow">
            <svg viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
              <path d="M1 1l4 4 4-4"/>
            </svg>
          </span>
        </div>
        <div class="pdp-faq-a"><?= htmlspecialchars($faq['a']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Reviews -->
    <?php if (!empty($product['review_list'])): ?>
    <div class="pdp-tab-pane" id="pdp-pane-reviews">
      <!-- Summary bar -->
      <div class="pdp-review-summary">
        <div class="pdp-review-score"><?= number_format($product['stars'], 1) ?></div>
        <div>
          <div class="pdp-review-stars-row">
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <span class="s"><?= $i <= $product['stars'] ? '★' : '☆' ?></span>
            <?php endfor; ?>
          </div>
          <div class="pdp-review-meta">Based on <?= $product['reviews'] ?> reviews</div>
        </div>
      </div>
      <!-- Individual reviews -->
      <?php foreach ($product['review_list'] as $rev): ?>
      <div class="pdp-review-card">
        <div class="pdp-review-card__head">
          <span class="pdp-review-card__author"><?= htmlspecialchars($rev['author']) ?></span>
          <span class="pdp-review-card__stars">
            <?= str_repeat('★', $rev['stars']) ?><?= str_repeat('☆', 5 - $rev['stars']) ?>
          </span>
        </div>
        <p class="pdp-review-card__text"><?= htmlspecialchars($rev['text']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </div><!-- /pdp-content-block -->
</div><!-- /pdp-wrap -->

<!-- ══ RELATED PRODUCTS ══ -->
<?php
$related = array_values(array_filter($all_products, fn($p) =>
  $p['slug'] !== $product['slug'] && $p['category'] === $product['category']
));
if (count($related) < 4) {
  $extra = array_values(array_filter($all_products, fn($p) => $p['slug'] !== $product['slug'] && !in_array($p, $related)));
  $related = array_slice(array_merge($related, $extra), 0, 4);
}
$related = array_slice($related, 0, 4);
?>
<?php if (!empty($related)): ?>
<div class="pdp-related">
  <h2 class="pdp-related__title">You might also like</h2>
  <div class="pdp-related__grid">
    <?php foreach ($related as $rp):
      $rSave = round(($rp['original'] - $rp['price']) / $rp['original'] * 100);
    ?>
    <a href="product.php?slug=<?= urlencode($rp['slug']) ?>" class="pdp-related-card">
      <div class="pdp-related-card__img-wrap">
        <img src="<?= htmlspecialchars($rp['img']) ?>" alt="<?= htmlspecialchars($rp['name']) ?>" loading="lazy" />
        <?php if ($rSave > 0): ?>
        <span style="position:absolute;bottom:10px;left:10px;background:#48682b;color:#fff;font-size:0.65rem;font-weight:700;padding:3px 8px;border-radius:5px;letter-spacing:0.04em;">
          SAVE <?= $rSave ?>%
        </span>
        <?php endif; ?>
      </div>
      <div class="pdp-related-card__body">
        <div class="pdp-related-card__name"><?= htmlspecialchars($rp['name']) ?></div>
        <div>
          <span class="pdp-related-card__price">Rs. <?= number_format($rp['price']) ?>.00</span>
          <span class="pdp-related-card__compare">Rs. <?= number_format($rp['original']) ?>.00</span>
        </div>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<script>
/* ── Gallery ── */
function pdpSwitchImage(thumb, src) {
  document.querySelectorAll('.pdp-thumb').forEach(t => t.classList.remove('active'));
  thumb.classList.add('active');
  var img = document.getElementById('pdp-main-img');
  img.style.opacity = '0';
  setTimeout(function() { img.src = src; img.style.opacity = '1'; }, 220);
}

/* ── Current unit price tracker ── */
var pdpCurrentPrice = parseInt(document.getElementById('pdp-price-sale').textContent.replace(/[^0-9]/g, '')) || 0;

function pdpUpdateTotal() {
  var qty   = parseInt(document.getElementById('pdp-qty').value) || 1;
  var total = pdpCurrentPrice * qty;
  document.getElementById('pdp-qty-total').textContent =
    'Total: Rs. ' + total.toLocaleString('en-IN') + '.00';
}

/* ── Quantity ── */
function pdpChangeQty(delta) {
  var inp = document.getElementById('pdp-qty');
  var val = (parseInt(inp.value) || 1) + delta;
  if (val < 1)  val = 1;
  if (val > 99) val = 99;
  inp.value = val;
  pdpUpdateTotal();
}

/* ── Variant selection ── */
function pdpSelectVariant(btn) {
  document.querySelectorAll('.pdp-variant-btn').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');

  var price   = parseInt(btn.dataset.price);
  var compare = parseInt(btn.dataset.compare);
  var save    = compare > 0 ? Math.round((compare - price) / compare * 100) : 0;

  pdpCurrentPrice = price;

  document.getElementById('pdp-price-sale').textContent    = 'Rs. ' + price.toLocaleString('en-IN') + '.00';
  document.getElementById('pdp-price-compare').textContent = 'Rs. ' + compare.toLocaleString('en-IN') + '.00';
  document.getElementById('pdp-price-save').textContent    = 'SAVE ' + save + '%';
  var sEl = document.getElementById('pdp-save-pct');
  if (sEl) sEl.textContent = save + '%';
  document.getElementById('pdp-variant-label').textContent = btn.textContent.trim();
  pdpUpdateTotal();
}

/* ── Tabs ── */
function pdpSwitchTab(tab) {
  document.querySelectorAll('.pdp-tab-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.pdp-tab-pane').forEach(p => p.classList.remove('active'));
  var btn  = document.getElementById('pdp-tab-' + tab);
  var pane = document.getElementById('pdp-pane-' + tab);
  if (btn) btn.classList.add('active');
  if (pane) pane.classList.add('active');
  if (pane) pane.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

/* ── FAQ accordion ── */
function pdpToggleFaq(i) {
  document.getElementById('faq' + i).classList.toggle('open');
}

/* ── Add to Cart ── */
function pdpAddToCart(btn) {
  var name    = <?= json_encode($product['name']) ?>;
  var img     = document.getElementById('pdp-main-img').src;
  var qty     = parseInt(document.getElementById('pdp-qty').value) || 1;
  var selBtn  = document.querySelector('.pdp-variant-btn.selected');
  var variant = selBtn ? selBtn.textContent.trim() : '';
  var price   = pdpCurrentPrice;
  var compare = parseInt(document.getElementById('pdp-price-compare').textContent.replace(/[^0-9]/g,'')) || price;

  if (typeof addToCart === 'function') {
    addToCart(name, price, compare, img, variant, qty);
  }

  var orig = btn.textContent;
  btn.textContent = '✓ Added to Cart!';
  btn.style.cssText = 'background:#2d7a3c;color:#fff;border-color:#2d7a3c;';
  setTimeout(function() { btn.textContent = orig; btn.style.cssText = ''; }, 1800);
}

/* ── Buy Now ── */
function pdpBuyNow() {
  alert('Checkout page coming soon!\n(Connect your payment gateway here)');
}
</script>

<?php require_once 'includes/footer.php'; ?>
