<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Models/Category.php';
require_once __DIR__ . '/app/Models/Product.php';

$categories = Category::getAll($pdo);
$products = Product::getAll($pdo);

$selectedCategory = isset($_GET['category']) ? trim($_GET['category']) : 'all';

$pageTitle = 'Front | منتجاتنا';
$activeNav = 'products';

$pageHeaderTitleAr = 'منتجاتنا';
$pageHeaderTitleEn = 'Our Products';
$pageHeaderDescAr = 'اكتشف مجموعتنا الواسعة من المنتجات الغذائية الفاخرة المصنوعة بعناية لتناسب ذوقك.';
$pageHeaderDescEn = 'Discover our wide range of premium food products crafted with care for your table.';

include_once __DIR__ . '/resources/views/layouts/header.php';
include_once __DIR__ . '/resources/views/layouts/page-header.php';
?>

<section class="neo-section">
    <div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div>
    <div class="container">
        <!-- Category Filter Pills -->
        <div class="neo-filter-wrap neo-reveal">
            <button class="neo-filter-btn <?= $selectedCategory === 'all' ? 'active' : '' ?>" data-filter="all">
                <span class="lang-ar">الكل</span>
                <span class="lang-en">All</span>
            </button>
            <?php foreach ($categories as $cat): ?>
                <button class="neo-filter-btn <?= $selectedCategory === $cat['slug'] ? 'active' : '' ?>" data-filter="<?= htmlspecialchars($cat['slug']) ?>">
                    <span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span>
                    <span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Product Cards Grid -->
        <div class="neo-product-grid" id="productGrid">
            <?php foreach ($products as $index => $product): ?>
                <article class="neo-product neo-reveal" data-category="<?= htmlspecialchars($product['category_slug']) ?>" style="transition-delay: <?= min($index * 60, 300) ?>ms; <?= ($selectedCategory !== 'all' && $selectedCategory !== $product['category_slug']) ? 'display: none;' : '' ?>">
                    <div class="neo-product-media">
                        <span class="neo-product-badge">
                            <span class="lang-ar">مميز</span>
                            <span class="lang-en">Featured</span>
                        </span>
                        <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>" loading="lazy">
                    </div>
                    <div class="neo-product-info">
                        <span class="neo-product-cat">
                            <span class="lang-ar"><?= htmlspecialchars($product['cat_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($product['cat_en']) ?></span>
                        </span>
                        <h3>
                            <span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span>
                        </h3>
                        <a href="product-details.php?id=<?= (int)$product['id'] ?>" class="neo-product-link">
                            <span class="lang-ar">عرض التفاصيل</span>
                            <span class="lang-en">View Details</span>
                            <i>↙</i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/resources/views/layouts/footer.php'; ?>
