<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Models/Product.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: products.php');
    exit;
}

$product_id = (int)$_GET['id'];
$product = Product::getById($pdo, $product_id);

if (!$product) {
    header('Location: products.php');
    exit;
}

$packagings = Product::getPackaging($pdo, $product_id);

$pageTitle = 'Front | ' . $product['name_ar'];
$activeNav = 'products';

$pageHeaderTitleAr = $product['name_ar'];
$pageHeaderTitleEn = $product['name_en'];
$pageHeaderDescAr = 'مواصفات وتفاصيل التعبئة الخاصة بالمنتج';
$pageHeaderDescEn = 'Product specifications and packaging details';

include_once __DIR__ . '/resources/views/layouts/header.php';
include_once __DIR__ . '/resources/views/layouts/page-header.php';
?>

<section class="neo-section">
    <div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div>
    <div class="container">
        <a href="products.php" class="neo-text-link" style="display: inline-flex; align-items: center; gap: 8px; margin-bottom: 30px;">
            <span>←</span> <span class="lang-ar">العودة لجميع المنتجات</span><span class="lang-en">Back to all products</span>
        </a>

        <div style="display: grid; grid-template-columns: 1fr 1.3fr; gap: 40px; align-items: start;">
            <!-- Product Image Glass Card -->
            <div class="neo-glass-card neo-reveal" style="text-align: center; padding: 20px;">
                <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name_ar']) ?>" style="border-radius: 20px; width: 100%; max-height: 480px; object-fit: contain; background: #fff; padding: 15px;">
            </div>

            <!-- Product Details Information -->
            <div class="neo-reveal" style="background: #fff; padding: 35px; border-radius: 28px; border: 1px solid rgba(15, 76, 35, 0.09); box-shadow: var(--neo-shadow-sm);">
                <span class="neo-eyebrow">
                    <span class="lang-ar"><?= htmlspecialchars($product['cat_name_ar']) ?></span>
                    <span class="lang-en"><?= htmlspecialchars($product['cat_name_en']) ?></span>
                </span>

                <h2 style="font-size: 2.2rem; color: var(--neo-green); margin: 10px 0 20px; font-weight: 900;">
                    <span class="lang-ar"><?= htmlspecialchars($product['name_ar']) ?></span>
                    <span class="lang-en"><?= htmlspecialchars($product['name_en']) ?></span>
                </h2>

                <p style="font-size: 1.1rem; line-height: 1.9; color: var(--neo-muted); margin-bottom: 30px;">
                    <span class="lang-ar"><?= htmlspecialchars($product['description_ar'] ?? 'منتج فاخر مصنع وفق أعلى معايير الجودة والسلامة الغذائية.') ?></span>
                    <span class="lang-en"><?= htmlspecialchars($product['description_en'] ?? 'Premium quality product manufactured according to the highest international safety standards.') ?></span>
                </p>

                <!-- Packaging Table -->
                <?php if (count($packagings) > 0): ?>
                    <h3 style="font-size: 1.3rem; color: var(--neo-green); font-weight: 900; margin-bottom: 15px;">
                        <span class="lang-ar">جدول التعبئة والتغليف</span>
                        <span class="lang-en">Packaging Details</span>
                    </h3>
                    <div class="neo-table-wrapper">
                        <table class="neo-table">
                            <thead>
                                <tr>
                                    <th><span class="lang-ar">الوزن</span><span class="lang-en">Weight</span></th>
                                    <th><span class="lang-ar">نوع العبوة</span><span class="lang-en">Package Type</span></th>
                                    <th><span class="lang-ar">التعبئة</span><span class="lang-en">Quantity</span></th>
                                    <th><span class="lang-ar">الوزن القائم</span><span class="lang-en">Gross Weight</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($packagings as $pack): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($pack['weight']) ?></td>
                                        <td>
                                            <span class="lang-ar"><?= htmlspecialchars($pack['package_type_ar']) ?></span>
                                            <span class="lang-en"><?= htmlspecialchars($pack['package_type_en']) ?></span>
                                        </td>
                                        <td>
                                            <span class="lang-ar"><?= htmlspecialchars($pack['quantity_ar']) ?></span>
                                            <span class="lang-en"><?= htmlspecialchars($pack['quantity_en']) ?></span>
                                        </td>
                                        <td><?= htmlspecialchars($pack['gross_weight']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

                <div style="margin-top: 30px;">
                    <a href="contact.php?subject=Inquiry regarding <?= urlencode($product['name_en']) ?>" class="neo-btn">
                        <span class="lang-ar">اطلب هذا المنتج الآن</span>
                        <span class="lang-en">Inquire About Product</span>
                        <i>↙</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/resources/views/layouts/footer.php'; ?>
