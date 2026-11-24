<?php
require_once 'config/database.php';
$stmtCats = $pdo->query("SELECT * FROM categories ORDER BY id ASC");
$categories = $stmtCats->fetchAll();

$stmtProds = $pdo->query("
    SELECT p.*, c.slug as category_slug 
    FROM products p 
    JOIN categories c ON p.category_id = c.id 
    ORDER BY p.id ASC
");
$products = $stmtProds->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . '/includes/seo.php'; render_seo('منتجاتنا | شركة السعادة للمنتجات الغذائية', 'تصفح أكثر من 200 منتج من السعادة: معجون الطماطم والصلصات، المربيات، المخللات، الزيتون، الحلاوة والطحينة، المعلبات، البهارات والبقوليات.', 'products.php'); ?>
    <link rel="icon" type="image/png" href="images/ui/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/products.css">
</head>
<body>
    <div id="preloader" style="position: fixed; inset: 0.0; background: #e7ece3; z-index: 99999; display: flex; justify-content: center; align-items: center; transition: opacity 0.5s ease;">
        <img src="images/ui/logo.png" alt="Loading" style="width: 150px; animation: pulse-green 1.5s infinite;">
    </div>

    <header class="navbar" id="navbar">
        <div class="container nav-container">
            <div class="logo">
                <a href="index.php"><img src="images/ui/logo.png" alt="Logo" style="height: 60px; object-fit: contain;"></a>
            </div>
            <nav class="nav-links">
                <a href="index.php" data-i18n="nav_home">الرئيسية</a>
                <a href="products.php" class="active" data-i18n="nav_products">المنتجات</a>
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

    <section class="page-header" style="background-image: linear-gradient(rgba(15, 76, 35, 0.9), rgba(15, 76, 35, 0.9)), url('images/banners/slider1.jpg'); background-size: cover; background-position: center; padding: 6rem 0; margin-top: 80px;" data-aos="fade-down">
        <div class="container text-center">
            <h2 data-i18n="products_page_title" style="color: var(--clr-accent); font-size: 3rem; margin-bottom: 1rem;">منتجاتنا</h2>
            <p data-i18n="products_page_desc" style="color: #f7f8f4; font-size: 1.2rem; max-width: 600px; margin: 0 auto; opacity: 0.95;">اكتشف مجموعتنا الواسعة من المنتجات الغذائية الفاخرة المصنوعة بعناية لتناسب ذوقك.</p>
        </div>
    </section>

    <section class="products-section">
        <!-- طبقة الإيموجيز الطائرة في الخلفية -->
        <div class="neo-veggie-field" aria-hidden="true">
            <span>🫒</span><span>🫑</span><span>🌶️</span><span>🧄</span><span>🌿</span>
        </div>

        <div class="container">
            <div class="products-filter" data-aos="fade-up" style="margin-bottom: 2.5rem; display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
                <button class="filter-btn active" data-filter="all" data-i18n="filter_all">الكل</button>
                <?php foreach ($categories as $cat): ?>
                    <button class="filter-btn" data-filter="<?= htmlspecialchars($cat['slug']) ?>">
                        <span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span>
                        <span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="grid products-grid" id="productGrid" data-aos="fade-up" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 30px;">
                <?php foreach ($products as $product): ?>
                    <?php 
                        $catNameAr = ''; $catNameEn = '';
                        foreach ($categories as $c) {
                            if ($c['id'] == $product['category_id']) {
                                $catNameAr = $c['name_ar']; $catNameEn = $c['name_en']; break;
                            }
                        }
                    ?>
                    <div class="card product-card" data-category="<?= htmlspecialchars($product['category_slug']) ?>" style="display: flex; flex-direction: column;">
                        <div class="product-img-wrapper" style="height: 220px; display: flex; align-items: center; justify-content: center; padding: 15px;">
                            <img loading="lazy" decoding="async" src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>" loading="lazy" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="product-info" style="padding: 22px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <span class="category-tag">
                                    <span class="lang-ar"><?= htmlspecialchars($catNameAr) ?></span>
                                    <span class="lang-en"><?= htmlspecialchars($catNameEn) ?></span>
                                </span>
                                <h4 style="margin: 10px 0 15px; font-size: 1.25rem; color: var(--clr-primary, #0F4C23);">
                                    <span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span>
                                    <span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span>
                                </h4>
                            </div>
                            
                            <!-- الرابط المباشر لصفحة التفاصيل -->
                            <a href="product-details.php?id=<?= $product['id'] ?>" class="btn-details-custom" data-i18n="btn_details">عرض التفاصيل</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>