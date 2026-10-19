<?php
require_once 'config/database.php';

// التحقق من وجود رقم المنتج في الرابط
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: products.php');
    exit;
}

$product_id = intval($_GET['id']);

// جلب تفاصيل المنتج مع اسم القسم
$stmt = $pdo->prepare("
    SELECT p.*, c.name_ar as cat_name_ar, c.name_en as cat_name_en 
    FROM products p 
    JOIN categories c ON p.category_id = c.id 
    WHERE p.id = ?
");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

// إذا كان المنتج غير موجود، أعد توجيهه لصفحة المنتجات
if (!$product) {
    header('Location: products.php');
    exit;
}

// جلب بيانات التعبئة الخاصة بالمنتج
$stmtPacks = $pdo->prepare("SELECT * FROM product_packaging WHERE product_id = ?");
$stmtPacks->execute([$product_id]);
$packagings = $stmtPacks->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name_ar']) ?> - Al Saadah</title>
    <link rel="icon" type="image/png" href="images/ui/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .product-details-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 4rem;
            align-items: start;
            margin-top: 100px;
        }
        .details-image-box {
            background: var(--clr-surface);
            padding: 3rem;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            text-align: center;
        }
        .details-image-box img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .details-info-box h1 {
            font-size: 2.5rem;
            color: var(--clr-primary);
            margin: 1rem 0;
        }
        .details-desc {
            font-size: 1.2rem;
            color: var(--clr-text-light);
            line-height: 1.8;
            margin-bottom: 2rem;
        }
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            box-shadow: var(--shadow-sm);
            border-radius: 8px;
        }
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            color: var(--clr-text-light);
            font-weight: 600;
            transition: var(--transition);
        }
        .back-btn:hover {
            color: var(--clr-primary);
        }
        @media (max-width: 768px) {
            .product-details-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
                margin-top: 80px;
            }
            .details-info-box h1 {
                font-size: 2rem;
            }
            .details-image-box {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    
    <!-- Navbar (نفس النافبار الخاص بموقعك) -->
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
            <div class="nav-actions">
                <button id="langSwitcher" class="lang-btn">English</button>
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </div>
    </header>

    <section class="section-padding">
        <div class="container">
            <a href="products.php" class="back-btn">
                <span>&rarr;</span> <span data-i18n="btn_back">العودة للمنتجات</span>
            </a>
            
            <div class="product-details-grid">
                <!-- صورة المنتج -->
                <div class="details-image-box">
                    <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>">
                </div>
                
                <!-- تفاصيل المنتج -->
                <div class="details-info-box">
                    <span class="category-tag">
                        <span class="lang-ar"><?= htmlspecialchars($product['cat_name_ar']) ?></span>
                        <span class="lang-en"><?= htmlspecialchars($product['cat_name_en']) ?></span>
                    </span>
                    
                    <h1>
                        <span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span>
                        <span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span>
                    </h1>
                    
                    <p class="details-desc">
                        <span class="lang-ar"><?= htmlspecialchars($product['description_ar'] ?? '') ?></span>
                        <span class="lang-en"><?= htmlspecialchars($product['description_en'] ?? '') ?></span>
                    </p>

                    <!-- جدول التعبئة -->
                    <?php if (count($packagings) > 0): ?>
                    <div class="table-responsive">
                        <table class="product-table">
                            <thead>
                                <tr>
                                    <th data-i18n="tbl_weight">الوزن</th>
                                    <th data-i18n="tbl_pack">العبوة</th>
                                    <th data-i18n="tbl_qty">التعبئة</th>
                                    <th data-i18n="tbl_gross">القائم</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($packagings as $pack): ?>
                                <tr>
                                    <td><?= htmlspecialchars($pack['weight']) ?></td>
                                    <td><span class="lang-ar"><?= htmlspecialchars($pack['package_type_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($pack['package_type_en']) ?></span></td>
                                    <td><span class="lang-ar"><?= htmlspecialchars($pack['quantity_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($pack['quantity_en']) ?></span></td>
                                    <td><?= htmlspecialchars($pack['gross_weight']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>