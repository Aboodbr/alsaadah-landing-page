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
<link rel="stylesheet" href="assets/css/hero-lineup.css">
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
        <div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span></div>
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
<div class="neo-trust-item"><div class="neo-trust-icon">✧</div><div><strong><span class="lang-ar">وصفات شامية أصيلة</span><span class="lang-en">Authentic Levantine recipes</span></strong><small><span class="lang-ar">طعم تعرفه من أول لقمة، كما تُحضّر في بيوتنا.</span><span class="lang-en">A taste you know from the first bite, as it is made in our homes.</span></small></div></div>
<div class="neo-trust-item"><div class="neo-trust-icon">❋</div><div><strong><span class="lang-ar">مكوّنات مختارة بعناية</span><span class="lang-en">Carefully selected ingredients</span></strong><small><span class="lang-ar">نبدأ من الحقل، ونحافظ على الطعم الطبيعي دون تكلف.</span><span class="lang-en">We start in the field and keep the natural taste, without fuss.</span></small></div></div>
<div class="neo-trust-item"><div class="neo-trust-icon">➤</div><div><strong><span class="lang-ar">لكل مناسبة وكل مائدة</span><span class="lang-en">For every occasion and every table</span></strong><small><span class="lang-ar">من وجبة يومية بسيطة إلى سفرة العيد، السعادة حاضرة.</span><span class="lang-en">From a simple everyday meal to the Eid feast, Al Saadah is there.</span></small></div></div>
</div></div>
<?php if (count($categories) > 0): ?>
<section class="neo-section neo-categories"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container">
<div class="neo-section-head neo-reveal"><div><span class="neo-eyebrow"><span class="lang-ar">منتجات السعادة</span><span class="lang-en">AL SAADAH PRODUCTS</span></span><h2><span class="lang-ar">مطبخك يبدأ من هنا</span><span class="lang-en">Your kitchen starts here</span></h2><p><span class="lang-ar">منتجات نصنعها بعناية لتمنح أطباقك الطعم الذي تحبه، عبوة بعد عبوة.</span><span class="lang-en">Products we make with care to give your dishes the taste you love, jar after jar.</span></p></div><a href="products.php" class="neo-text-link"><span class="lang-ar">كل المنتجات ←</span><span class="lang-en">All products →</span></a></div>
<div class="neo-category-grid"><?php foreach ($categories as $index => $cat): ?>
<a href="products.php?category=<?= htmlspecialchars($cat['slug']) ?>" class="neo-category neo-reveal" style="transition-delay:<?= min($index * 80,320) ?>ms"><img src="<?= htmlspecialchars($cat['image_path']) ?>" alt="<?= htmlspecialchars($cat['name_ar']) ?>" loading="lazy"><div class="neo-category-content"><h3><span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span></h3><span><span class="lang-ar">اكتشف القسم</span><span class="lang-en">Explore category</span></span></div></a>
<?php endforeach; ?></div></div></section><?php endif; ?>
<?php if (count($featured_products) > 0): ?>
<section class="neo-section neo-products"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container">
<div class="neo-section-head neo-reveal"><div><span class="neo-eyebrow"><span class="lang-ar">من منتجاتنا</span><span class="lang-en">FROM OUR PRODUCTS</span></span><h2><span class="lang-ar">من مطبخنا إلى مائدتك</span><span class="lang-en">From our kitchen to your table</span></h2><p><span class="lang-ar">أصناف نختارها لك بعناية، ونحافظ فيها على الطعم الذي اعتاده أهل الشام جيلًا بعد جيل.</span><span class="lang-en">Products we choose for you with care, keeping the taste the people of the Levant have known for generations.</span></p></div><a href="products.php" class="neo-text-link"><span class="lang-ar">تصفّح الكل ←</span><span class="lang-en">Browse all →</span></a></div>
<div class="neo-product-grid"><?php foreach ($featured_products as $index => $product): ?>
<article class="neo-product neo-reveal" style="transition-delay:<?= min($index * 90,270) ?>ms"><div class="neo-product-media"><span class="neo-product-badge"><span class="lang-ar">من السعادة</span><span class="lang-en">Al Saadah</span></span><img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>" loading="lazy"></div><div class="neo-product-info"><span class="neo-product-cat"><span class="lang-ar"><?= htmlspecialchars($product['cat_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($product['cat_en']) ?></span></span><h3><span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span></h3><a class="neo-product-link" href="product-details.php?id=<?= (int)$product['id'] ?>"><span class="lang-ar">اكتشف المنتج</span><span class="lang-en">Discover product</span><i>↙</i></a></div></article>
<?php endforeach; ?></div><div class="neo-center neo-reveal"><a href="products.php" class="neo-btn"><span class="lang-ar">شاهد المجموعة كاملة</span><span class="lang-en">View the Full Collection</span> ↙</a></div>
</div></section><?php endif; ?>
<section class="neo-section neo-story"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container neo-story-grid">
<div class="neo-story-visual neo-reveal"><div class="neo-story-image"><?php if (count($categories) > 1): ?><img src="<?= htmlspecialchars($categories[1]['image_path']) ?>" alt="منتجات شركة السعادة" loading="lazy"><?php elseif (count($categories) > 0): ?><img src="<?= htmlspecialchars($categories[0]['image_path']) ?>" alt="منتجات شركة السعادة" loading="lazy"><?php else: ?><img src="images/banners/stats-bg.jpg" alt="Front" loading="lazy"><?php endif; ?></div><div class="neo-story-stamp"><span class="lang-ar">مختارة<br>بعناية<br>✦</span><span class="lang-en">CAREFULLY<br>SELECTED<br>✦</span></div></div>
<div class="neo-reveal"><span class="neo-eyebrow"><span class="lang-ar">قصة السعادة</span><span class="lang-en">THE AL SAADAH STORY</span></span><h2><span class="lang-ar">حكاية بدأت<br>في مطبخ دمشقي</span><span class="lang-en">A story that began in a Damascus kitchen</span></h2><p class="neo-story-copy"><span class="lang-ar">بدأت السعادة في دمشق عام 1990 بشغف بسيط: أن يصل الطعم الأصيل إلى كل بيت. ومع نمو الطلب، فتحنا مصنعًا في مصر عام 2014، وبقينا أوفياء لنفس المعايير. واليوم، بعد أكثر من 35 عامًا، ما زالت منتجاتنا تحمل روح البداية.</span><span class="lang-en">Al Saadah began in Damascus in 1990 with a simple passion: to bring authentic taste to every home. As demand grew, we opened a factory in Egypt in 2014 and stayed true to the same standards. Today, after more than 35 years, our products still carry the spirit of the beginning.</span></p><div class="neo-story-points"><div class="neo-story-point"><b>✓</b><span class="lang-ar">تشكيلة واسعة تناسب كل مائدة</span><span class="lang-en">A wide range for every table</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">مصنعان، ومعيار جودة واحد</span><span class="lang-en">Two factories, one quality standard</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">حاضرون في أسواق العالم</span><span class="lang-en">Present in markets around the world</span></div><div class="neo-story-point"><b>✓</b><span class="lang-ar">التزام بالمواصفات الصحية</span><span class="lang-en">Committed to health standards</span></div></div><a href="about.php" class="neo-btn"><span class="lang-ar">تعرّف على قصتنا</span><span class="lang-en">Get to Know Us</span> ↙</a></div>
</div></section>
<section class="neo-numbers"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container neo-number-grid">
<div class="neo-number neo-reveal"><strong data-count="200" data-suffix="+">+200</strong><span><span class="lang-ar">صنف على مائدتك</span><span class="lang-en">Products for your table</span></span></div>
<div class="neo-number neo-reveal"><strong data-count="35" data-suffix="+">+35</strong><span><span class="lang-ar">دولة تصلها منتجاتنا</span><span class="lang-en">Countries our products reach</span></span></div>
<div class="neo-number neo-reveal"><strong data-count="35" data-suffix="+">+35</strong><span><span class="lang-ar">عامًا من الثقة</span><span class="lang-en">Years of trust</span></span></div>
</div></section>
<section class="neo-cta-section"><div class="neo-veggie-field" aria-hidden="true"><span class="produce-shape shape-1"></span><span class="produce-shape shape-2"></span><span class="produce-shape shape-3"></span><span class="produce-shape shape-4"></span><span class="produce-shape shape-5"></span><span class="produce-shape shape-6"></span><span class="produce-shape shape-7"></span><span class="produce-shape shape-8"></span></div><div class="container"><div class="neo-cta neo-reveal"><div class="neo-cta-inner"><div><span class="neo-eyebrow" style="color:var(--neo-accent)"><span class="lang-ar">تواصل معنا</span><span class="lang-en">GET IN TOUCH</span></span><h2><span class="lang-ar">هل تبحث عن شريك موثوق؟</span><span class="lang-en">Looking for a trusted partner?</span></h2><p><span class="lang-ar">يسعدنا أن نتعاون معك في الاستيراد أو التوزيع. راسل فريقنا في العاشر من رمضان أو في ريف دمشق، وسنعود إليك سريعًا.</span><span class="lang-en">We would be glad to work with you on import or distribution. Write to our team in 10th of Ramadan or Rural Damascus and we will get back to you quickly.</span></p></div><a href="contact.php" class="neo-btn"><span class="lang-ar">ابدأ التعاون</span><span class="lang-en">Start Working Together</span> ↙</a></div></div></div></section>
</main>
<?php include 'footer.php'; ?>
<script src="assets/js/index.js" defer></script>
</body></html>
