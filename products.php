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

$stmtPacks = $pdo->query("SELECT * FROM product_packaging");
$packagings = [];
while ($row = $stmtPacks->fetch()) {
    $packagings[$row['product_id']][] = $row;
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front - Our Products</title>
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

    <section class="page-header" style="background-image: linear-gradient(rgba(15, 76, 35, 0.8), rgba(15, 76, 35, 0.8)), url('images/banners/slider1.jpg'); background-size: cover; background-position: center; padding: 6rem 0; margin-top: 80px;" data-aos="fade-down">
        <div class="container text-center">
            <h2 data-i18n="products_page_title" style="color: var(--clr-accent); font-size: 3rem; margin-bottom: 1rem;">منتجاتنا</h2>
            <p data-i18n="products_page_desc" style="color: white; font-size: 1.2rem; max-width: 600px; margin: 0 auto; opacity: 0.9;">اكتشف مجموعتنا الواسعة من المنتجات الغذائية الفاخرة المصنوعة بعناية لتناسب ذوقك.</p>
        </div>
    </section>

    <section class="products-section section-padding">
        <div class="container">
            <div class="products-filter" data-aos="fade-up">
                <button class="filter-btn active" data-filter="all" data-i18n="filter_all">الكل</button>
                <?php foreach ($categories as $cat): ?>
                    <button class="filter-btn" data-filter="<?= htmlspecialchars($cat['slug']) ?>">
                        <span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span>
                        <span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="grid products-grid" id="productGrid" data-aos="fade-up">
                <?php foreach ($products as $product): ?>
                    <?php 
                        $catNameAr = ''; $catNameEn = '';
                        foreach ($categories as $c) {
                            if ($c['id'] == $product['category_id']) {
                                $catNameAr = $c['name_ar']; $catNameEn = $c['name_en']; break;
                            }
                        }
                    ?>
                    <div class="card product-card" data-category="<?= htmlspecialchars($product['category_slug']) ?>">
                        <div class="product-img-wrapper">
                            <!-- تمت إضافة loading="lazy" هنا -->
                            <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>" loading="lazy">
                        </div>
                        <div class="product-info">
                            <span class="category-tag">
                                <span class="lang-ar"><?= htmlspecialchars($catNameAr) ?></span>
                                <span class="lang-en"><?= htmlspecialchars($catNameEn) ?></span>
                            </span>
                            <h4>
                                <span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span>
                                <span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span>
                            </h4>
                            <div class="product-details-data hidden">
                                <p class="mb-4">
                                    <span class="lang-ar"><?= htmlspecialchars($product['description_ar'] ?? '') ?></span>
                                    <span class="lang-en"><?= htmlspecialchars($product['description_en'] ?? '') ?></span>
                                </p>
                                <?php if (isset($packagings[$product['id']])): ?>
                                <table class="product-table">
                                    <thead>
                                        <tr><th data-i18n="tbl_weight">الوزن</th><th data-i18n="tbl_pack">العبوة</th><th data-i18n="tbl_qty">التعبئة</th><th data-i18n="tbl_gross">القائم</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($packagings[$product['id']] as $pack): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($pack['weight']) ?></td>
                                            <td><span class="lang-ar"><?= htmlspecialchars($pack['package_type_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($pack['package_type_en']) ?></span></td>
                                            <td><span class="lang-ar"><?= htmlspecialchars($pack['quantity_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($pack['quantity_en']) ?></span></td>
                                            <td><?= htmlspecialchars($pack['gross_weight']) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                            <button class="btn btn-outline view-details-btn" data-i18n="btn_details">عرض التفاصيل</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div id="productModal" class="product-modal">
        <div class="product-modal-content">
            <span class="close-product-modal">&times;</span>
            <div class="product-modal-grid">
                <div class="modal-img-col"><img id="modalProductImg" src="" alt=""></div>
                <div class="modal-info-col">
                    <span id="modalProductCategory" class="category-tag"></span>
                    <h3 id="modalProductTitle" class="text-primary mb-4" style="font-size: 2rem;"></h3>
                    <div id="modalProductDetails"></div> 
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>