
<?php
require_once 'config/database.php';

$categories = $pdo->query(
    "SELECT name_ar, name_en FROM categories ORDER BY id ASC"
)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once __DIR__ . '/includes/seo.php'; render_seo('من نحن | شركة السعادة للمنتجات الغذائية - من دمشق إلى العالم', 'تعرف على قصة شركة السعادة للمنتجات الغذائية: خبرة دمشقية عريقة، مصنع في ريف دمشق ومصنع في العاشر من رمضان بمصر، ومنتجات تصل إلى أكثر من 35 دولة.', 'about.php'); ?>

    <link rel="icon" type="image/png" href="images/ui/logo.png">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&family=Tajawal:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="stylesheet" href="assets/css/jar-background.css">
</head>

<body>

    <!-- Animated floating food emojis -->
    <div class="about-floating-food" aria-hidden="true">
        <span class="food-item" style="--left:5%;--size:31px;--duration:23s;--delay:-4s;--opacity:.24;">🍅</span>
        <span class="food-item" style="--left:13%;--size:25px;--duration:29s;--delay:-15s;--opacity:.20;">🥕</span>
        <span class="food-item" style="--left:21%;--size:34px;--duration:25s;--delay:-9s;--opacity:.23;">🍃</span>
        <span class="food-item" style="--left:30%;--size:27px;--duration:31s;--delay:-21s;--opacity:.19;">🍎</span>
        <span class="food-item" style="--left:39%;--size:32px;--duration:24s;--delay:-12s;--opacity:.22;">🌿</span>
        <span class="food-item" style="--left:48%;--size:26px;--duration:28s;--delay:-5s;--opacity:.20;">🍋</span>
        <span class="food-item" style="--left:57%;--size:35px;--duration:26s;--delay:-18s;--opacity:.22;">🍇</span>
        <span class="food-item" style="--left:66%;--size:27px;--duration:32s;--delay:-8s;--opacity:.18;">🥬</span>
        <span class="food-item" style="--left:75%;--size:32px;--duration:24s;--delay:-16s;--opacity:.23;">🍓</span>
        <span class="food-item" style="--left:84%;--size:28px;--duration:30s;--delay:-6s;--opacity:.20;">🫒</span>
        <span class="food-item" style="--left:93%;--size:34px;--duration:27s;--delay:-20s;--opacity:.22;">🍊</span>
    </div>

    <div id="preloader" style="position:fixed;inset:0;background:var(--clr-bg,#faf8f0);z-index:99999;display:flex;justify-content:center;align-items:center;transition:opacity .5s ease;">
        <img src="images/ui/logo.png" alt="Loading" style="width:150px;max-width:40vw;animation:pulse-green 1.5s infinite;">
    </div>

    <?php $current_page = 'about'; include 'header.php'; ?>

    <!-- Hero -->
    <section class="about-hero" data-aos="fade-down">
        <div class="container about-hero-content">
            <span class="about-eyebrow" data-i18n="about_eyebrow">حكاية جودة وأصالة</span>

            <h1 data-i18n="about_page_title">
                شركة السعادة <span>للمنتجات الغذائية</span>
            </h1>

            <p data-i18n="about_page_subtitle">مذاق من التراث، وجودة تجمع الأجيال</p>

            <div class="about-hero-divider"></div>
        </div>
    </section>

    <!-- Story and video -->
    <section class="about-section about-story-section">
        <div class="container">
            <div class="about-section-heading" data-aos="fade-up">
                <span class="eyebrow" data-i18n="story_eyebrow">قصتنا</span>
                <h2 data-i18n="story_section_heading">نكهة الأصالة في كل منتج</h2>
                <p data-i18n="story_section_desc">
                    سنوات من الخبرة والشغف لتقديم منتجات غذائية تثق بها العائلة.
                </p>
            </div>

            <div class="about-story-grid">
                <div class="about-story-card" data-aos="fade-left">
                    <span class="story-label" data-i18n="story_label">موثوقة عبر الأجيال</span>

                    <h2 data-i18n="story_title">موثوقة عبر الأجيال</h2>

                    <p data-i18n="story_p1">
                        موثوقة عبر الأجيال لجودتها العالية، السعادة® تجلب إلى الذهن
                        أوقات الوجبات العائلية التي لا تنسى والوصفات المنزلية الشهية.
                        منذ تأسيسها، قدمت السعادة مجموعة متنوعة من المنتجات التي
                        تعزز طريقة تحضير الطعام ومذاقه لتكمل الطريقة التي تطهو بها
                        وأطباقك المفضلة.
                    </p>

                    <div class="story-decoration"></div>
                </div>

                <div class="about-video-card" data-aos="fade-right">
                    <iframe
                        class="about-video-frame"
                        src="https://www.youtube.com/embed/PbiPEZiACbw"
                        title="فيديو شركة السعادة للمنتجات الغذائية"
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Company history -->
    <section class="about-section about-expansion-section">
        <div class="container">
            <div class="about-expansion-grid">
                <div class="about-factory-image" data-aos="fade-left">
                    <img
                        src="images/about.jpg"
                        alt="مصنع شركة السعادة للمنتجات الغذائية"
                        loading="lazy">
                </div>

                <div class="about-expansion-copy" data-aos="fade-right">
                    <div class="about-section-heading" style="text-align:start;margin:0 0 25px;">
                        <span class="eyebrow" data-i18n="expansion_eyebrow">رحلة من الشام إلى العالم</span>
                        <h2 data-i18n="expansion_title">
                            من قلب الغوطة الدمشقية إلى العالم
                        </h2>
                    </div>

                    <p data-i18n="expansion_p1">
                        من قلب الغوطة الدمشقية بدأت الحكاية عام 1990، بخبرة الأجداد
                        وخيرات الأرض الشامية. ومع نمو الطلب، فتحنا مصنعنا في مصر لنصل
                        إلى أسواق جديدة، وبقينا أوفياء لنفس الطعم ونفس المعايير.
                    </p>

                    <p data-i18n="expansion_p2">
                        التحديات دفعتنا للاستمرار في العمل في وطننا مع ضرورة التوسع
                        في الشرق الأوسط الذي كان بإنشاء مصنع في القاهرة للاستفادة
                        من وفرة الخيرات الزراعية وتقديمها للأسواق الجديدة.
                    </p>

                    <div class="about-history-note">
                        <span class="about-year">1990</span>
                        <p data-i18n="history_note">
                            بداية رحلة من الخبرة والتراث والجودة في عالم المنتجات الغذائية.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission and goals -->
    <section class="about-section about-mission-section">
        <div class="container">
            <div class="about-section-heading" data-aos="fade-up">
                <span class="eyebrow" data-i18n="mission_eyebrow">ما الذي يحركنا؟</span>
                <h2 data-i18n="mission_section_heading">قيمنا هي أساس نجاحنا</h2>
                <p data-i18n="mission_section_desc">
                    نعمل كل يوم لنقدم لعملائنا جودة يستحقونها وثقة تستمر.
                </p>
            </div>

            <div class="about-mission-card" data-aos="zoom-in">
                <div class="about-mission-icon">🌱</div>

                <h3 data-i18n="mission_title">المهمة</h3>

                <p data-i18n="mission_desc">
                    منتج غذائي صحي وشهي، يجمع جودة محاصيلنا وخبرة صناعية ورثناها
                    عن أجدادنا، ويصل إلى عملائنا وفق أفضل المعايير العالمية.
                </p>
            </div>

            <h3 class="about-goals-title" style="text-align:center;" data-aos="fade-up" data-i18n="goals_title">
                الأهداف
            </h3>

            <div class="about-goals-grid">
                <div class="about-goal-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-goal-icon">🛡️</div>
                    <h4 data-i18n="goal_1">صحتكم أمانة في أعناقنا</h4>
                </div>

                <div class="about-goal-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-goal-icon">❤️</div>
                    <h4 data-i18n="goal_2">رضاكم ما نسعى إليه</h4>
                </div>

                <div class="about-goal-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-goal-icon">🌟</div>
                    <h4 data-i18n="goal_3">وثقتكم نجاحنا</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Product categories -->
    <section class="about-section about-products-section">
        <div class="container">
            <div class="about-section-heading" data-aos="fade-up">
                <span class="eyebrow" data-i18n="products_eyebrow">منتجاتنا</span>
                <h2 data-i18n="full_products_title">قائمة منتجاتنا</h2>
                <p data-i18n="full_products_desc">
                    الآن نقدم مجموعة متكاملة من المنتجات تكمل احتياجات المستهلك
                    لدينا وسنستمر في تطوير منتجات جديدة.
                </p>
            </div>

            <ul class="about-categories-grid">
                <?php foreach ($categories as $cat): ?>
                    <li class="about-category-item" data-aos="fade-up">
                        <span class="about-category-icon" aria-hidden="true">✓</span>

                        <span class="about-category-name">
                            <span class="lang-ar">
                                <?= htmlspecialchars($cat['name_ar'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                            </span>
                            <span class="lang-en">
                                <?= htmlspecialchars($cat['name_en'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/about.js" defer></script>
</body>
</html>
