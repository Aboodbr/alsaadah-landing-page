<?php
require_once 'config/database.php';

$categories = $pdo->query("SELECT * FROM categories ORDER BY id ASC")->fetchAll();

// جلب المنتجات مع اسم القسم لعرضه في تأثير الـ Hover
$stmtProds = $pdo->query("
    SELECT p.image_path, p.name_ar, p.name_en, c.name_ar as cat_ar, c.name_en as cat_en, c.slug as filter_category 
    FROM products p 
    JOIN categories c ON p.category_id = c.id 
    WHERE p.image_path IS NOT NULL AND p.image_path != ''
");
$gallery_items = $stmtProds->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front - Gallery</title>
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
                <a href="index.php" data-i18n="nav_home">الرئيسية</a>
                <a href="products.php" data-i18n="nav_products">المنتجات</a>
                <a href="about.php" data-i18n="nav_about">من نحن</a>
                <a href="gallery.php" class="active" data-i18n="nav_gallery">المعرض</a>
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

    <section class="page-header" style="background-image: linear-gradient(rgba(15, 76, 35, 0.85), rgba(15, 76, 35, 0.85)), url('images/banners/gallery-cover.jpg'); padding: 5rem 0; margin-top: 80px;" data-aos="fade-down">
        <div class="container text-center">
            <h2 data-i18n="gallery_title" style="color: var(--clr-accent); font-size: 3rem;">معرض الصور</h2>
            <p data-i18n="gallery_desc" style="color: white; font-size: 1.2rem;">رحلة بصرية عبر منتجاتنا الفاخرة.</p>
        </div>
    </section>

    <section class="gallery-section section-padding bg-light">
        <div class="container">
          

            <!-- Premium Masonry Grid -->
            <div class="masonry-grid" id="galleryWrapper">
                <?php foreach ($gallery_items as $index => $item): ?>
                <!-- إضافة مكتبة AOS للظهور المتدرج، وتجهيز العنصر للـ 3D Tilt -->
                <div class="masonry-item" data-category="<?= htmlspecialchars($item['filter_category']) ?>" data-aos="fade-up" data-aos-delay="<?= ($index % 4) * 50 ?>">
                    
                    <!-- تمت إضافة loading="lazy" هنا -->
                    <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="<?= htmlspecialchars($item['name_ar']) ?>" loading="lazy">
                    
                    <!-- Glassmorphism Overlay -->
                    <div class="masonry-overlay">
                        <span class="masonry-cat">
                            <span class="lang-ar"><?= htmlspecialchars($item['cat_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($item['cat_en']) ?></span>
                        </span>
                        
                        <h4 class="masonry-title">
                            <span class="lang-ar"><?= htmlspecialchars($item['name_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($item['name_en']) ?></span>
                        </h4>
                        
                        <div class="masonry-icon">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Lightbox (النافذة المنبثقة) -->
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close">&times;</span>
        <img class="lightbox-img" id="lightbox-img" src="">
        <div id="lightbox-caption" class="lightbox-caption"></div>
    </div>

    <?php include 'footer.php'; ?>
    
    <!-- مكتبة 3D Tilt خفيفة الوزن -->
</body>
</html>