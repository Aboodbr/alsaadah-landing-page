<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Models/Category.php';
require_once __DIR__ . '/app/Models/Product.php';

$categories = Category::getAll($pdo);
$stmtProds = $pdo->query("
    SELECT p.id, p.image_path, p.name_ar, p.name_en, c.name_ar as cat_ar, c.name_en as cat_en, c.slug as filter_category
    FROM products p 
    JOIN categories c ON p.category_id = c.id 
    WHERE p.image_path IS NOT NULL AND p.image_path != ''
");
$gallery_items = $stmtProds->fetchAll();

$pageTitle = 'Front | من عالمنا - المعرض';
$activeNav = 'gallery';

$pageHeaderTitleAr = 'معرض المنتجات والصور';
$pageHeaderTitleEn = 'Our Visual Gallery';
$pageHeaderDescAr = 'جولة بصرية بين تشكيلة منتجاتنا المتنوعة وجودتها الاستثنائية.';
$pageHeaderDescEn = 'A visual tour through our diverse range of exceptional products.';

include_once __DIR__ . '/resources/views/layouts/header.php';
include_once __DIR__ . '/resources/views/layouts/page-header.php';
?>

<section class="neo-section">
    <div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div>
    <div class="container">
        <!-- Category Filter Pills -->
        <div class="neo-filter-wrap neo-reveal">
            <button class="neo-filter-btn active" data-filter="all">
                <span class="lang-ar">الكل</span>
                <span class="lang-en">All</span>
            </button>
            <?php foreach ($categories as $cat): ?>
                <button class="neo-filter-btn" data-filter="<?= htmlspecialchars($cat['slug']) ?>">
                    <span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span>
                    <span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Gallery Grid -->
        <div class="neo-product-grid" id="galleryGrid">
            <?php foreach ($gallery_items as $index => $item): ?>
                <div class="neo-product neo-reveal" data-category="<?= htmlspecialchars($item['filter_category']) ?>" data-lightbox-src="<?= htmlspecialchars($item['image_path']) ?>" style="cursor: pointer; transition-delay: <?= min($index * 50, 300) ?>ms;">
                    <div class="neo-product-media">
                        <span class="neo-product-badge">
                            <span class="lang-ar"><?= htmlspecialchars($item['cat_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($item['cat_en']) ?></span>
                        </span>
                        <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="<?= htmlspecialchars($item['name_ar']) ?>" loading="lazy">
                    </div>
                    <div class="neo-product-info" style="padding: 16px;">
                        <h3 style="font-size: 1.1rem; margin: 0; text-align: center;">
                            <span class="lang-ar"><?= htmlspecialchars($item['name_ar']) ?></span>
                            <span class="lang-en"><?= htmlspecialchars($item['name_en']) ?></span>
                        </h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Reusable Lightbox Modal -->
<div class="neo-lightbox" id="neoLightbox">
    <button class="neo-lightbox-close" id="neoLightboxClose" type="button" aria-label="Close">&times;</button>
    <div class="neo-lightbox-content">
        <img id="neoLightboxImg" src="" alt="Enlarged View">
    </div>
</div>

<?php include_once __DIR__ . '/resources/views/layouts/footer.php'; ?>
