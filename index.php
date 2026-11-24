<?php
require_once 'config/database.php';
$sliders = $pdo->query("SELECT * FROM sliders")->fetchAll();
$categories = $pdo->query("SELECT * FROM categories ORDER BY id ASC")->fetchAll();
$featured_products = $pdo->query("SELECT p.*, c.name_ar as cat_ar, c.name_en as cat_en FROM products p JOIN categories c ON p.category_id = c.id WHERE p.image_path IS NOT NULL LIMIT 4")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once __DIR__ . '/includes/seo.php'; render_seo('شركة السعادة للمنتجات الغذائية | مخللات وزيتون ومعجون طماطم ومربيات من دمشق ومصر', 'شركة سورية مصرية للمنتجات الغذائية: بدأنا في دمشق عام 1990 وتوسعنا إلى القاهرة عام 2014. أكثر من 200 منتج في أكثر من 35 دولة: معجون طماطم، مربيات، مخللات، زيتون، حلاوة وطحينة، بهارات وبقوليات.', 'index.php'); ?>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Organization","name":"شركة السعادة للمنتجات الغذائية","alternateName":"Al Saadah Food","url":"https://alsaadahfood.com/","logo":"https://alsaadahfood.com/images/ui/logo.png","foundingDate":"1990","description":"شركة سورية مصرية تأسست في دمشق عام 1990 وتوسعت إلى القاهرة عام 2014، تنتج أكثر من 200 منتج غذائي من المخللات والزيتون ومعجون الطماطم والمربيات والطحينة والحلاوة.","address":{"@type":"PostalAddress","addressLocality":"العاشر من رمضان","addressCountry":"EG"},"contactPoint":[{"@type":"ContactPoint","telephone":"+20-102-811-6220","contactType":"customer service","email":"Info@alsaadahfood.com"}]}
</script>
<link rel="icon" type="image/png" href="images/ui/logo.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Tajawal:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
<?php $current_page = 'home'; include 'header.php'; ?>
<main>
   <section class="hero-slider">
        <div class="slider-container" id="heroSlider">
            <?php foreach ($sliders as $index => $slide): ?>
            <div class="slide <?= $index === 0 ? 'active' : '' ?>">
                <div class="slide-bg" style="background-image: url('<?= htmlspecialchars($slide['image_path']) ?>');"></div>
                <div class="slide-overlay"></div>
                <div class="container hero-content text-center">
                    <h2>
                        <span class="lang-ar"><?= htmlspecialchars($slide['title_ar']) ?></span>
                        <span class="lang-en"><?= htmlspecialchars($slide['title_en']) ?></span>
                    </h2>
                    <p>
                        <span class="lang-ar"><?= htmlspecialchars($slide['desc_ar']) ?></span>
                        <span class="lang-en"><?= htmlspecialchars($slide['desc_en']) ?></span>
                    </p>
                    <div class="hero-buttons justify-center">
                        <a href="<?= htmlspecialchars($slide['btn_link']) ?>" class="btn btn-primary">
                            <span class="lang-ar"><?= htmlspecialchars($slide['btn_text_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($slide['btn_text_en']) ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="slider-controls">
            <button class="prev-slide" id="nextSlide">&#10095;</button> 
            <button class="next-slide" id="prevSlide">&#10094;</button>
        </div>
        <div class="slider-dots" id="sliderDots">
            <?php foreach ($sliders as $index => $slide): ?>
                <span class="dot <?= $index === 0 ? 'active' : '' ?>" data-index="<?= $index ?>"></span>
            <?php endforeach; ?>
        </div>
    </section>
    <div></div>
<div class="container neo-trust-wrap"><div class="neo-trust neo-reveal">
<div class="neo-trust-item"><div class="neo-trust-icon">✧</div><div><strong><span class="lang-ar">خبرة دمشقية منذ 1990</span><span class="lang-en">Damascene expertise since 1990</span></strong><small><span class="lang-ar">أكثر من 35 عامًا من الريادة</span><span class="lang-en">Over 35 years of leadership</span></small></div></div>
<div class="neo-trust-item"><div class="neo-trust-icon">❋</div><div><strong><span class="lang-ar">أعلى المواصفات الصحية العالمية</span><span class="lang-en">Highest global health standards</span></strong><small><span class="lang-ar">جودة عالية وطعم رائع</span><span class="lang-en">High quality and great taste</span></small></div></div>
<div class="neo-trust-item"><div class="neo-trust-icon">➤</div><div><strong><span class="lang-ar">مصانع في سوريا ومصر</span><span class="lang-en">Factories in Syria and Egypt</span></strong><small><span class="lang-ar">نخدم أكثر من 35 دولة حول العالم</span><span class="lang-en">Serving over 35 countries worldwide</span></small></div></div>
</div></div>
<?php if (count($categories) > 0): ?>
<section class="neo-section neo-categories"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container">
<div class="neo-section-head neo-reveal"><div><span class="neo-eyebrow"><span class="lang-ar">منتجات السعادة</span><span class="lang-en">AL SAADAH PRODUCTS</span></span><h2><span class="lang-ar">نكهات دمشقية أصيلة،<br>على مائدتك.</span><span class="lang-en">Authentic Damascene flavors, on your table.</span></h2><p><span class="lang-ar">معجون الطماطم والصلصات، المربيات الفاخرة، المخللات، الزيتون، المنتجات المحفوظة بالزيت، الحلاوة والطحينة، المعلبات الفاخرة، والبهارات والبقوليات.</span><span class="lang-en">Tomato paste and sauces, premium jams, pickles, olives, oil-preserved products, halawa and tahini, premium canned goods, spices and legumes.</span></p></div><a href="products.php" class="neo-text-link"><span class="lang-ar">كل المنتجات ←</span><span class="lang-en">All products →</span></a></div>
<div class="neo-category-grid"><?php foreach ($categories as $index => $cat): ?>
<a href="products.php?category=<?= htmlspecialchars($cat['slug']) ?>" class="neo-category neo-reveal" style="transition-delay:<?= min($index * 80,320) ?>ms"><img src="<?= htmlspecialchars($cat['image_path']) ?>" alt="<?= htmlspecialchars($cat['name_ar']) ?>" loading="lazy"><div class="neo-category-content"><h3><span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span></h3><span><span class="lang-ar">اكتشف القسم</span><span class="lang-en">Explore category</span></span></div></a>
<?php endforeach; ?></div></div></section><?php endif; ?>
<?php if (count($featured_products) > 0): ?>
<section class="neo-section neo-products"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container">
<div class="neo-section-head neo-reveal"><div><span class="neo-eyebrow"><span class="lang-ar">من منتجاتنا</span><span class="lang-en">FROM OUR PRODUCTS</span></span><h2><span class="lang-ar">أكثر من 200 منتج،<br>بجودة واحدة.</span><span class="lang-en">Over 200 products, one standard of quality.</span></h2><p><span class="lang-ar">أعددناها لكم بخبرات دمشقية عريقة ووفق أعلى المواصفات والمقاييس الصحية العالمية.</span><span class="lang-en">Prepared with long-standing Damascene expertise and to the highest international health standards.</span></p></div><a href="products.php" class="neo-text-link"><span class="lang-ar">تصفّح الكل ←</span><span class="lang-en">Browse all →</span></a></div>
<div class="neo-product-grid"><?php foreach ($featured_products as $index => $product): ?>
<article class="neo-product neo-reveal" style="transition-delay:<?= min($index * 90,270) ?>ms"><div class="neo-product-media"><span class="neo-product-badge"><span class="lang-ar">من السعادة</span><span class="lang-en">Al Saadah</span></span><img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>" loading="lazy"></div><div class="neo-product-info"><span class="neo-product-cat"><span class="lang-ar"><?= htmlspecialchars($product['cat_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($product['cat_en']) ?></span></span><h3><span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span></h3><a class="neo-product-link" href="product-details.php?id=<?= (int)$product['id'] ?>"><span class="lang-ar">اكتشف المنتج</span><span class="lang-en">Discover product</span><i>↙</i></a></div></article>
<?php endforeach; ?></div><div class="neo-center neo-reveal"><a href="products.php" class="neo-btn"><span class="lang-ar">شاهد المجموعة كاملة</span><span class="lang-en">View the Full Collection</span> ↙</a></div>
</div></section><?php endif; ?>
<section class="neo-section neo-story"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container neo-story-grid">
<div class="neo-story-visual neo-reveal"><div class="neo-story-image"><?php if (count($categories) > 1): ?><img src="<?= htmlspecialchars($categories[1]['image_path']) ?>" alt="منتجات شركة السعادة" loading="lazy"><?php elseif (count($categories) > 0): ?><img src="<?= htmlspecialchars($categories[0]['image_path']) ?>" alt="منتجات شركة السعادة" loading="lazy"><?php else: ?><img src="images/banners/stats-bg.jpg" alt="Front" loading="lazy"><?php endif; ?></div><div class="neo-story-stamp"><span class="lang-ar">اختيار<br>بكل عناية<br>✦</span><span class="lang-en">CAREFULLY<br>SELECTED<br>✦</span></div></div>
<div class="neo-reveal"><span class="neo-eyebrow"><span class="lang-ar">قصة السعادة</span><span class="lang-en">THE AL SAADAH STORY</span></span><h2><span class="lang-ar">من دمشق منذ 1990<br>إلى القاهرة والعالم.</span><span class="lang-en">From Damascus in 1990 to Cairo and the world.</span></h2><p class="neo-story-copy"><span class="lang-ar">بدأنا في دمشق منذ عام 1990 وتوسعنا إلى القاهرة منذ 2014 لنغطي الطلب المتزايد على منتجاتنا حول العالم. نقدم منتجات غذائية تتميز بالجودة العالية والطعم الرائع، أعددناها لكم بخبرات دمشقية عريقة وفق أعلى المواصفات والمقاييس الصحية العالمية، وعلى مدى أكثر من خمسة وثلاثين عامًا ما زلنا نحافظ على سمعتنا وريادتنا.</span><span class="lang-en">We started in Damascus in 1990 and expanded to Cairo in 2014 to meet growing demand for our products around the world. Our food products are known for high quality and great taste, made with long-standing Damascene expertise and to the highest international health standards. For over thirty-five years we have kept our reputation and leadership.</span></p><div class="neo-story-points"><div class="neo-story-point"><b>✓</b><span class="lang-ar">أكثر من 200 منتج</span><span class="lang-en">Over 200 products</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">مصنعان في سوريا ومصر</span><span class="lang-en">Factories in Syria and Egypt</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">تصدير لأكثر من 35 دولة</span><span class="lang-en">Exported to 35+ countries</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">مواصفات صحية عالمية</span><span class="lang-en">Global health standards</span></div></div><a href="about.php" class="neo-btn"><span class="lang-ar">تعرّف على قصتنا</span><span class="lang-en">Get to Know Us</span> ↙</a></div>
</div></section>
<section class="neo-numbers"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container neo-number-grid">
<div class="neo-number neo-reveal"><strong data-count="200" data-suffix="+">+200</strong><span><span class="lang-ar">منتج غذائي</span><span class="lang-en">Food products</span></span></div>
<div class="neo-number neo-reveal"><strong data-count="35" data-suffix="+">+35</strong><span><span class="lang-ar">دولة نصدّر إليها</span><span class="lang-en">Countries we export to</span></span></div>
<div class="neo-number neo-reveal"><strong data-count="35" data-suffix="+">+35</strong><span><span class="lang-ar">عامًا من الخبرة</span><span class="lang-en">Years of experience</span></span></div>
</div></section>
<section class="neo-cta-section"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container"><div class="neo-cta neo-reveal"><div class="neo-cta-inner"><div><span class="neo-eyebrow" style="color:var(--neo-accent)"><span class="lang-ar">تواصل معنا</span><span class="lang-en">GET IN TOUCH</span></span><h2><span class="lang-ar">تريد استيراد أو توزيع<br>منتجات السعادة؟</span><span class="lang-en">Want to import or distribute Al Saadah products?</span></h2><p><span class="lang-ar">تواصل مع إدارتنا في العاشر من رمضان في مصر أو مع مصنعنا في ريف دمشق، وسنرد على استفسارك بكل سرور.</span><span class="lang-en">Contact our head office in 10th of Ramadan, Egypt or our factory in Rural Damascus and we will gladly answer your inquiry.</span></p></div><a href="contact.php" class="neo-btn"><span class="lang-ar">لنتحدث معًا</span><span class="lang-en">Let's Talk</span> ↙</a></div></div></div></section>
</main>
<?php include 'footer.php'; ?>
<script src="assets/js/index.js" defer></script>
</body></html>
