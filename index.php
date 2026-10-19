<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Models/Category.php';
require_once __DIR__ . '/app/Models/Product.php';
require_once __DIR__ . '/app/Models/Slider.php';

$sliders = Slider::getAll($pdo);
$categories = Category::getAll($pdo);
$featured_products = Product::getFeatured($pdo, 4);

$pageTitle = 'Front | اكتشف طعم الجودة';
$activeNav = 'home';

include_once __DIR__ . '/resources/views/layouts/header.php';
?>

<section class="neo-hero" aria-label="Front premium food">
<div class="neo-hero-slides" id="neoHeroSlides">
<?php foreach ($sliders as $index => $slide): ?>
<div class="neo-hero-slide <?= $index === 0 ? 'active' : '' ?>"><img src="<?= htmlspecialchars($slide['image_path']) ?>" alt="" <?= $index === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>></div>
<?php endforeach; ?>
<?php if (count($sliders) === 0): ?><div class="neo-hero-slide active"><img src="images/banners/slider1.jpg" alt="" fetchpriority="high"></div><?php endif; ?>
</div><div class="neo-hero-shade"></div><div class="neo-orb one"></div><div class="neo-orb two"></div>
<div class="container neo-hero-inner">
<div class="neo-hero-text">
<div class="neo-kicker"><span class="lang-ar">اختيار مختلف… وجودة تُلاحظ</span><span class="lang-en">A better choice. A quality you can feel.</span></div>
<h1><span class="lang-ar">الطبيعة على<br> <em>مائدتك</em> بشكل أرقى.</span><span class="lang-en">Bring nature to your table, <em>beautifully.</em></span></h1>
<p class="neo-hero-copy"><span class="lang-ar">اكتشف منتجات غذائية مختارة بعناية، تجمع بين المذاق الأصيل والاهتمام بالتفاصيل، لتجعل كل اختيار بداية لتجربة ألذ.</span><span class="lang-en">Discover carefully selected food products where authentic taste meets attention to detail — making every choice a better experience.</span></p>
<div class="neo-hero-actions"><a class="neo-btn" href="products.php"><span class="lang-ar">اكتشف التشكيلة</span><span class="lang-en">Explore the Collection</span><span aria-hidden="true">↙</span></a><a class="neo-btn ghost" href="about.php"><span class="lang-ar">حكاية الجودة</span><span class="lang-en">Our Quality Story</span><span aria-hidden="true">↗</span></a></div>
</div>
<div class="neo-hero-visual" aria-hidden="true">
<div class="neo-glass-card"><div class="neo-glass-inner">
<?php if (count($featured_products) > 0): ?><img src="<?= htmlspecialchars($featured_products[0]['image_path']) ?>" alt=""><?php elseif (count($categories) > 0): ?><img src="<?= htmlspecialchars($categories[0]['image_path']) ?>" alt=""><?php else: ?><img src="images/banners/slider1.jpg" alt=""><?php endif; ?>
<div class="neo-glass-caption"><small><span class="lang-ar">مختار بعناية</span><span class="lang-en">CURATED WITH CARE</span></small><strong><span class="lang-ar">جودة في كل تفصيلة</span><span class="lang-en">Quality in Every Detail</span></strong></div>
</div></div><div class="neo-float-chip top"><span class="lang-ar">من الاختيار إلى التقديم</span><span class="lang-en">From selection to serving</span> ✦ Crafted with care</div><div class="neo-float-chip bottom">✓ <span class="lang-ar">اختيارات تستحقها</span><span class="lang-en">Choices worth making</span></div>
</div></div>
<?php if (count($sliders) > 1): ?><div class="neo-slider-dots" id="neoSliderDots"><?php foreach ($sliders as $index => $slide): ?><button type="button" class="<?= $index === 0 ? 'active' : '' ?>" data-slide="<?= $index ?>" aria-label="Slide <?= $index + 1 ?>"></button><?php endforeach; ?></div><?php endif; ?>
</section>

<div class="container neo-trust-wrap"><div class="neo-trust neo-reveal">
<div class="neo-trust-item"><div class="neo-trust-icon">✧</div><div><strong><span class="lang-ar">جودة نختارها لك</span><span class="lang-en">Quality, selected for you</span></strong><small><span class="lang-ar">اهتمام يبدأ من التفاصيل</span><span class="lang-en">Care in every detail</span></small></div></div>
<div class="neo-trust-item"><div class="neo-trust-icon">❋</div><div><strong><span class="lang-ar">تجربة بطعم أصيل</span><span class="lang-en">Authentic taste</span></strong><small><span class="lang-ar">منتجات تضيف لمائدتك</span><span class="lang-en">Made for your table</span></small></div></div>
<div class="neo-trust-item"><div class="neo-trust-icon">➤</div><div><strong><span class="lang-ar">نحن قريبون منك</span><span class="lang-en">Here for you</span></strong><small><span class="lang-ar">تواصل سهل وخدمة تهتم بك</span><span class="lang-en">Friendly, thoughtful service</span></small></div></div>
</div></div>

<?php if (count($categories) > 0): ?>
<section class="neo-section neo-categories"><div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div><div class="container">
<div class="neo-section-head neo-reveal"><div><span class="neo-eyebrow"><span class="lang-ar">اعثر على ما تحب</span><span class="lang-en">FIND YOUR FAVORITES</span></span><h2><span class="lang-ar">عالم من النكهات،<br>في انتظارك.</span><span class="lang-en">A world of flavors, waiting to be explored.</span></h2><p><span class="lang-ar">تجوّل بين أقسامنا واكتشف اختيارات صُممت لتناسب أذواقًا مختلفة وتفاصيل يومك.</span><span class="lang-en">Explore our categories and discover selections for different tastes and moments in your day.</span></p></div><a href="products.php" class="neo-text-link"><span class="lang-ar">كل المنتجات ←</span><span class="lang-en">All products →</span></a></div>
<div class="neo-category-grid"><?php foreach ($categories as $index => $cat): ?>
<a href="products.php?category=<?= htmlspecialchars($cat['slug']) ?>" class="neo-category neo-reveal" style="transition-delay:<?= min($index * 80, 320) ?>ms"><img src="<?= htmlspecialchars($cat['image_path']) ?>" alt="<?= htmlspecialchars($cat['name_ar']) ?>" loading="lazy"><div class="neo-category-content"><h3><span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span></h3><span><span class="lang-ar">اكتشف القسم</span><span class="lang-en">Explore category</span></span></div></a>
<?php endforeach; ?></div></div></section><?php endif; ?>

<?php if (count($featured_products) > 0): ?>
<section class="neo-section neo-products"><div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div><div class="container">
<div class="neo-section-head neo-reveal"><div><span class="neo-eyebrow"><span class="lang-ar">اختياراتنا لك</span><span class="lang-en">THE FRONT SELECTION</span></span><h2><span class="lang-ar">تفاصيل صغيرة،<br>فرق كبير.</span><span class="lang-en">Little details. A big difference.</span></h2><p><span class="lang-ar">تعرّف على مجموعة من منتجاتنا المختارة، واكتشف ما يجعلها إضافة مميزة لمائدتك.</span><span class="lang-en">Meet a selection of our products and discover what makes them a special addition to your table.</span></p></div><a href="products.php" class="neo-text-link"><span class="lang-ar">تصفّح الكل ←</span><span class="lang-en">Browse all →</span></a></div>
<div class="neo-product-grid"><?php foreach ($featured_products as $index => $product): ?>
<article class="neo-product neo-reveal" style="transition-delay:<?= min($index * 90, 270) ?>ms"><div class="neo-product-media"><span class="neo-product-badge"><span class="lang-ar">اختيار مميز</span><span class="lang-en">Selected</span></span><img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>" loading="lazy"></div><div class="neo-product-info"><span class="neo-product-cat"><span class="lang-ar"><?= htmlspecialchars($product['cat_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($product['cat_en']) ?></span></span><h3><span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span></h3><a class="neo-product-link" href="product-details.php?id=<?= (int)$product['id'] ?>"><span class="lang-ar">اكتشف المنتج</span><span class="lang-en">Discover product</span><i>↙</i></a></div></article>
<?php endforeach; ?></div><div class="neo-center neo-reveal" style="margin-top: 40px; text-align: center;"><a href="products.php" class="neo-btn"><span class="lang-ar">شاهد المجموعة كاملة</span><span class="lang-en">View the Full Collection</span> ↙</a></div>
</div></section><?php endif; ?>

<section class="neo-section neo-story"><div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div><div class="container neo-story-grid">
<div class="neo-story-visual neo-reveal"><div class="neo-story-image"><?php if (count($categories) > 1): ?><img src="<?= htmlspecialchars($categories[1]['image_path']) ?>" alt="منتجات Front" loading="lazy"><?php elseif (count($categories) > 0): ?><img src="<?= htmlspecialchars($categories[0]['image_path']) ?>" alt="منتجات Front" loading="lazy"><?php else: ?><img src="images/banners/slider1.jpg" alt="Front" loading="lazy"><?php endif; ?></div><div class="neo-story-stamp"><span class="lang-ar">اختيار<br>بكل عناية<br>✦</span><span class="lang-en">CAREFULLY<br>SELECTED<br>✦</span></div></div>
<div class="neo-reveal"><span class="neo-eyebrow"><span class="lang-ar">أكثر من مجرد منتج</span><span class="lang-en">MORE THAN A PRODUCT</span></span><h2><span class="lang-ar">نؤمن أن الجودة<br>تُذاق ولا تُقال.</span><span class="lang-en">Quality isn't just promised. It's experienced.</span></h2><p class="neo-story-copy"><span class="lang-ar">في Front، نرى أن التفاصيل هي ما يصنع الفرق. لذلك نمنح الاختيار والجودة وتجربة العميل اهتمامًا يستحقه كل شخص يختارنا.</span><span class="lang-en">At Front, we believe the details make the difference. That's why we care about selection, quality, and creating an experience worthy of everyone who chooses us.</span></p><div class="neo-story-points"><div class="neo-story-point"><b>✓</b><span class="lang-ar">اختيارات مدروسة</span><span class="lang-en">Thoughtful selection</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">اهتمام بالتفاصيل</span><span class="lang-en">Attention to detail</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">تجربة سهلة وواضحة</span><span class="lang-en">A simple experience</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">تطوير مستمر</span><span class="lang-en">Always improving</span></div></div><a href="about.php" class="neo-btn"><span class="lang-ar">تعرّف على قصتنا</span><span class="lang-en">Get to Know Us</span> ↙</a></div>
</div></section>

<section class="neo-numbers"><div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div><div class="container neo-number-grid">
<div class="neo-number neo-reveal"><strong data-count="50" data-suffix="+">+50</strong><span><span class="lang-ar">منتج لتختار منه</span><span class="lang-en">Products to explore</span></span></div>
<div class="neo-number neo-reveal"><strong data-count="1000" data-suffix="+">+1000</strong><span><span class="lang-ar">عميل وثقوا بنا</span><span class="lang-en">Customers who trust us</span></span></div>
<div class="neo-number neo-reveal"><strong data-count="100" data-suffix="%">100%</strong><span><span class="lang-ar">اهتمام بالجودة</span><span class="lang-en">Committed to quality</span></span></div>
</div></section>

<section class="neo-cta-section"><div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div><div class="container"><div class="neo-cta neo-reveal"><div class="neo-cta-inner"><div><span class="neo-eyebrow" style="color:var(--neo-accent)"><span class="lang-ar">الخطوة التالية لك</span><span class="lang-en">YOUR NEXT DISCOVERY</span></span><h2><span class="lang-ar">اختيارك القادم<br>قد يكون المفضل لديك.</span><span class="lang-en">Your next favorite might be one click away.</span></h2><p><span class="lang-ar">ابدأ اكتشاف منتجاتنا اليوم، وإذا أردت معرفة المزيد فنحن هنا لمساعدتك.</span><span class="lang-en">Start exploring our products today. If you need more information, we're here to help.</span></p></div><a href="contact.php" class="neo-btn"><span class="lang-ar">لنتحدث معًا</span><span class="lang-en">Let's Talk</span> ↙</a></div></div></div></section>

<?php include_once __DIR__ . '/resources/views/layouts/footer.php'; ?>
