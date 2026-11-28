
<?php
require_once 'config/database.php';

/**
 * Escape output safely.
 */
function e($value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/**
 * Normalize product image paths.
 */
function productDetailsImage(string $value): string
{
    $path = trim(str_replace('\\', '/', $value));

    if ($path === '') {
        return 'images/ui/logo.png';
    }

    // Preserve absolute URLs and root-relative paths.
    if (preg_match('~^(https?:)?//|^data:|^/~i', $path)) {
        return $path;
    }

    $path = preg_replace('~^\./+~', '', $path);

    if (str_starts_with($path, 'images/')) {
        return $path;
    }

    if (str_starts_with($path, 'products/')) {
        return 'images/' . $path;
    }

    if (!str_contains($path, '/')) {
        return 'images/products/' . $path;
    }

    return $path;
}

// Validate product ID.
$product_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$product_id || $product_id < 1) {
    header('Location: products.php');
    exit;
}

// Fetch product details and category.
$stmt = $pdo->prepare("
    SELECT
        p.*,
        c.name_ar AS cat_name_ar,
        c.name_en AS cat_name_en
    FROM products p
    JOIN categories c ON p.category_id = c.id
    WHERE p.id = ?
    LIMIT 1
");

$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header('Location: products.php');
    exit;
}

// Fetch packaging information.
$stmtPacks = $pdo->prepare("
    SELECT *
    FROM product_packaging
    WHERE product_id = ?
");

$stmtPacks->execute([$product_id]);
$packagings = $stmtPacks->fetchAll(PDO::FETCH_ASSOC);

// The primary image is always included.
$galleryImages = [];
$primaryImage = productDetailsImage(
    (string)($product['image_path'] ?? '')
);

$galleryImages[] = [
    'src' => $primaryImage,
    'alt' => (string)($product['name_ar'] ?? 'صورة المنتج')
];

// Load extra images if product_images exists.
// If the table is missing, continue using the primary image.
try {
    $stmtImages = $pdo->prepare("
        SELECT image_path
        FROM product_images
        WHERE product_id = ?
        ORDER BY sort_order ASC, id ASC
    ");

    $stmtImages->execute([$product_id]);

    $extraImages = $stmtImages->fetchAll(PDO::FETCH_COLUMN);

    foreach ($extraImages as $imagePath) {
        $src = productDetailsImage((string)$imagePath);

        // Prevent duplicate images.
        $exists = false;

        foreach ($galleryImages as $image) {
            if ($image['src'] === $src) {
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $galleryImages[] = [
                'src' => $src,
                'alt' => (string)($product['name_ar'] ?? 'صورة المنتج')
            ];
        }
    }
} catch (PDOException $exception) {
    // Optional table unavailable: primary image remains available.
}

// Safely pass gallery data to JavaScript.
$galleryJson = json_encode(
    $galleryImages,
    JSON_UNESCAPED_UNICODE
    | JSON_UNESCAPED_SLASHES
    | JSON_HEX_TAG
    | JSON_HEX_APOS
    | JSON_HEX_QUOT
    | JSON_HEX_AMP
);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F4C23">

    <?php require_once __DIR__ . '/includes/seo.php'; render_seo($product['name_ar'].' | شركة السعادة للمنتجات الغذائية', 'تفاصيل منتج '.$product['name_ar'].' من شركة السعادة للمنتجات الغذائية.', 'product-details.php?id='.urlencode((string)($product['id'] ?? ''))); ?>

    <link rel="icon" type="image/png" href="images/ui/logo.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Tajawal:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="stylesheet" href="assets/css/product-details.css">
    <link rel="stylesheet" href="assets/css/jar-background.css">
</head>

<body>

    <?php $current_page = 'products'; include 'header.php'; ?>

    <main class="details-page">

        <section class="details-hero">

            <!-- Floating vegetable background -->
            <div class="details-veggie-field" aria-hidden="true">
                <span style="--left:4%;--size:34px;--duration:18s;--delay:-7s">🥕</span>
                <span style="--left:13%;--size:28px;--duration:23s;--delay:-15s">🥦</span>
                <span style="--left:24%;--size:32px;--duration:20s;--delay:-3s">🍅</span>
                <span style="--left:36%;--size:27px;--duration:25s;--delay:-18s">🫑</span>
                <span style="--left:49%;--size:35px;--duration:21s;--delay:-10s">🥬</span>
                <span style="--left:62%;--size:30px;--duration:24s;--delay:-5s">🌽</span>
                <span style="--left:74%;--size:32px;--duration:19s;--delay:-13s">🍆</span>
                <span style="--left:86%;--size:30px;--duration:22s;--delay:-8s">🥑</span>
                <span style="--left:95%;--size:26px;--duration:26s;--delay:-20s">🍅</span>
            </div>

            <div class="details-container">

                <div class="details-breadcrumb">
                    <a href="index.php">
                        <span class="lang-ar">الرئيسية</span>
                        <span class="lang-en">Home</span>
                    </a>

                    <span class="breadcrumb-separator">/</span>

                    <a href="products.php">
                        <span class="lang-ar">المنتجات</span>
                        <span class="lang-en">Products</span>
                    </a>

                    <span class="breadcrumb-separator">/</span>

                    <span>
                        <span class="lang-ar"><?= e($product['name_ar']) ?></span>
                        <span class="lang-en"><?= e($product['name_en']) ?></span>
                    </span>
                </div>

                <div class="product-details-grid">

                    <!-- Product image gallery -->
                    <section class="details-gallery" aria-label="Product image gallery">

                        <div class="gallery-card">

                            <div class="gallery-main" id="galleryMain">

                                <img loading="lazy" decoding="async"
                                    class="gallery-main-image"
                                    id="galleryMainImage"
                                    src="<?= e($galleryImages[0]['src']) ?>"
                                    alt="<?= e($galleryImages[0]['alt']) ?>"
                                    fetchpriority="high"
                                >

                                <button
                                    type="button"
                                    class="gallery-arrow gallery-prev"
                                    id="galleryPrev"
                                    aria-label="Previous image"
                                >‹</button>

                                <button
                                    type="button"
                                    class="gallery-arrow gallery-next"
                                    id="galleryNext"
                                    aria-label="Next image"
                                >›</button>

                                <span class="gallery-count" id="galleryCount">
                                    1 / <?= count($galleryImages) ?>
                                </span>

                            </div>

                            <div
                                class="gallery-thumbnails"
                                id="galleryThumbnails"
                                aria-label="Product image thumbnails"
                            >
                                <?php foreach ($galleryImages as $index => $image): ?>
                                    <button
                                        type="button"
                                        class="gallery-thumb<?= $index === 0 ? ' active' : '' ?>"
                                        data-gallery-index="<?= (int)$index ?>"
                                        aria-label="Show image <?= (int)($index + 1) ?>"
                                        aria-pressed="<?= $index === 0 ? 'true' : 'false' ?>"
                                    >
                                        <img loading="lazy" decoding="async"
                                            src="<?= e($image['src']) ?>"
                                            alt=""
                                            loading="lazy"
                                        >
                                    </button>
                                <?php endforeach; ?>
                            </div>

                            <div class="gallery-hint">
                                <span class="gallery-hint-symbol" aria-hidden="true">✦</span>

                                <span class="lang-ar">
                                    استعرض صور المنتج باستخدام الصور المصغّرة أو الأسهم
                                </span>

                                <span class="lang-en">
                                    Browse product images using the thumbnails or arrows
                                </span>
                            </div>

                        </div>

                    </section>

                    <!-- Product information -->
                    <section class="details-info-box">

                        <div class="category-tag">
                            <span class="lang-ar"><?= e($product['cat_name_ar']) ?></span>
                            <span class="lang-en"><?= e($product['cat_name_en']) ?></span>
                        </div>

                        <h1>
                            <span class="lang-ar"><?= e($product['name_ar']) ?></span>

                            <span class="details-title-en lang-en">
                                <?= e($product['name_en']) ?>
                            </span>
                        </h1>

                        <p class="details-desc">
                            <span class="lang-ar">
                                <?= nl2br(e($product['description_ar'] ?? '')) ?>
                            </span>

                            <span class="lang-en">
                                <?= nl2br(e($product['description_en'] ?? '')) ?>
                            </span>
                        </p>

                        <div class="details-divider"></div>

                        <!-- Packaging -->
                        <div class="packaging-heading">

                            <div class="packaging-icon" aria-hidden="true">
                                📦
                            </div>

                            <div>
                                <h2>
                                    <span class="lang-ar">التعبئة والتغليف</span>
                                    <span class="lang-en">Packaging Details</span>
                                </h2>

                                <p>
                                    <span class="lang-ar">
                                        تفاصيل أوزان وعبوات المنتج
                                    </span>

                                    <span class="lang-en">
                                        Available package sizes and weights
                                    </span>
                                </p>
                            </div>

                        </div>

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
                                                <td>
                                                    <?= e($pack['weight'] ?? '') ?>
                                                </td>

                                                <td>
                                                    <span class="lang-ar">
                                                        <?= e($pack['package_type_ar'] ?? '') ?>
                                                    </span>

                                                    <span class="lang-en">
                                                        <?= e($pack['package_type_en'] ?? '') ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="lang-ar">
                                                        <?= e($pack['quantity_ar'] ?? '') ?>
                                                    </span>

                                                    <span class="lang-en">
                                                        <?= e($pack['quantity_en'] ?? '') ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <?= e($pack['gross_weight'] ?? '') ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>

                            </div>

                        <?php else: ?>

                            <div class="no-packaging">
                                <span class="lang-ar">
                                    لا توجد تفاصيل تعبئة متاحة لهذا المنتج حاليًا.
                                </span>

                                <span class="lang-en">
                                    Packaging details are not available for this product yet.
                                </span>
                            </div>

                        <?php endif; ?>

                        <div class="details-back-bottom">
                            <a class="details-back-link" href="products.php">
                                <span aria-hidden="true">←</span>

                                <span data-i18n="btn_back">
                                    العودة للمنتجات
                                </span>
                            </a>
                        </div>

                    </section>

                </div>

            </div>

        </section>

    </main>

    <?php include 'footer.php'; ?>


    <script>
    (() => {
        'use strict';

        const images = <?= $galleryJson ?: '[]' ?>;

        const mainImage = document.getElementById('galleryMainImage');
        const galleryCount = document.getElementById('galleryCount');
        const galleryMain = document.getElementById('galleryMain');
        const thumbnails = Array.from(
            document.querySelectorAll('.gallery-thumb')
        );

        const previousButton = document.getElementById('galleryPrev');
        const nextButton = document.getElementById('galleryNext');

        let currentIndex = 0;
        let touchStartX = null;

        /**
         * Change the currently displayed product image.
         */
        function updateGallery(index) {
            if (!images.length || !mainImage) {
                return;
            }

            currentIndex = (index + images.length) % images.length;

            const selectedImage = images[currentIndex];

            mainImage.classList.add('changing');

            const preload = new Image();

            preload.onload = () => {
                mainImage.src = selectedImage.src;
                mainImage.alt = selectedImage.alt || '';

                requestAnimationFrame(() => {
                    mainImage.classList.remove('changing');
                });
            };

            preload.onerror = () => {
                mainImage.src = selectedImage.src;
                mainImage.alt = selectedImage.alt || '';
                mainImage.classList.remove('changing');
            };

            preload.src = selectedImage.src;

            thumbnails.forEach((thumbnail, index) => {
                const active = index === currentIndex;

                thumbnail.classList.toggle('active', active);
                thumbnail.setAttribute(
                    'aria-pressed',
                    active ? 'true' : 'false'
                );
            });

            if (galleryCount) {
                galleryCount.textContent =
                    `${currentIndex + 1} / ${images.length}`;
            }

            const activeThumbnail = thumbnails[currentIndex];

            if (activeThumbnail) {
                activeThumbnail.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'nearest'
                });
            }
        }

        // Thumbnail clicks.
        thumbnails.forEach((thumbnail) => {
            thumbnail.addEventListener('click', () => {
                const index = Number.parseInt(
                    thumbnail.dataset.galleryIndex || '0',
                    10
                );

                updateGallery(index);
            });
        });

        // Previous and next buttons.
        previousButton?.addEventListener('click', () => {
            updateGallery(currentIndex - 1);
        });

        nextButton?.addEventListener('click', () => {
            updateGallery(currentIndex + 1);
        });

        // Keyboard navigation.
        document.addEventListener('keydown', (event) => {
            // Do not interfere with keyboard navigation inside form fields.
            const tag = event.target?.tagName?.toLowerCase();

            if (
                tag === 'input' ||
                tag === 'textarea' ||
                event.target?.isContentEditable
            ) {
                return;
            }

            if (event.key === 'ArrowLeft') {
                updateGallery(currentIndex + 1);
            } else if (event.key === 'ArrowRight') {
                updateGallery(currentIndex - 1);
            }
        });

        // Touch swipe support for mobile.
        galleryMain?.addEventListener('touchstart', (event) => {
            touchStartX = event.changedTouches[0].screenX;
        }, { passive: true });

        galleryMain?.addEventListener('touchend', (event) => {
            if (touchStartX === null) {
                return;
            }

            const deltaX =
                event.changedTouches[0].screenX - touchStartX;

            if (Math.abs(deltaX) > 45) {
                updateGallery(
                    deltaX < 0
                        ? currentIndex + 1
                        : currentIndex - 1
                );
            }

            touchStartX = null;
        }, { passive: true });

        // Hide slider controls if only one image is available.
        if (images.length <= 1) {
            if (previousButton) previousButton.hidden = true;
            if (nextButton) nextButton.hidden = true;
            if (galleryCount) galleryCount.hidden = true;

            const thumbnailsContainer =
                document.getElementById('galleryThumbnails');

            if (thumbnailsContainer) {
                thumbnailsContainer.hidden = true;
            }

            const hint = document.querySelector('.gallery-hint');

            if (hint) {
                hint.hidden = true;
            }
        }

    })();
    </script>

</body>
</html>
