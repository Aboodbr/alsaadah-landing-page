<?php
require_once 'config/database.php';
$sliders = $pdo->query("SELECT * FROM sliders")->fetchAll();
$categories = $pdo->query("SELECT * FROM categories ORDER BY id ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front - Premium Food Products</title>
    <link rel="icon" type="image/png" href="images/ui/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div id="preloader" style="position: fixed; inset: 0; background: var(--clr-bg); z-index: 99999; display: flex; justify-content: center; align-items: center; transition: opacity 0.5s ease;">
        <img src="images/ui/logo.png" alt="Loading" style="width: 150px; animation: pulse-green 1.5s infinite;">
    </div>

    <header class="navbar" id="navbar">
        <div class="container nav-container">
            <div class="logo">
                <a href="index.php"><img src="images/ui/logo.png" alt="Logo" style="height: 60px; object-fit: contain;"></a>
            </div>
            <nav class="nav-links">
                <a href="index.php" class="active" data-i18n="nav_home">الرئيسية</a>
                <a href="products.php" data-i18n="nav_products">المنتجات</a>
                <a href="about.php" data-i18n="nav_about">من نحن</a>
                <a href="gallery.php" data-i18n="nav_gallery">المعرض</a>
                <a href="contact.php" data-i18n="nav_contact">اتصل بنا</a>
            </nav>
            <!-- زر القائمة للجوال -->
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <div class="nav-actions">
                <button id="langSwitcher" class="lang-btn">English</button>
            </div>
        </div>
    </header>

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

    <section class="categories section-padding" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h3 data-i18n="cat_title">أقسام منتجاتنا</h3>
                <p data-i18n="cat_desc">مجموعة واسعة من المنتجات الغذائية الفاخرة التي تلبي كافة احتياجاتك</p>
            </div>
            <div class="grid categories-grid">
                <?php foreach ($categories as $index => $cat): ?>
                <?php $delay = min($index * 50, 400); // تدرج زمني لظهور الكروت ?>
                <a href="products.php?category=<?= htmlspecialchars($cat['slug']) ?>" class="card category-card" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                    <img src="<?= htmlspecialchars($cat['image_path']) ?>" alt="<?= htmlspecialchars($cat['name_ar']) ?>">
                    <div class="card-overlay">
                        <h4>
                            <span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span>
                        </h4>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>