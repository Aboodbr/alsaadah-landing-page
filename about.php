<?php
require_once 'config/database.php';
$categories = $pdo->query("SELECT name_ar, name_en FROM categories ORDER BY id ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front - About Us</title>
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
                <a href="about.php" class="active" data-i18n="nav_about">من نحن</a>
                <a href="gallery.php" data-i18n="nav_gallery">المعرض</a>
                <a href="contact.php" data-i18n="nav_contact">اتصل بنا</a>
            </nav>
            <div class="nav-actions">
                <button id="langSwitcher" class="lang-btn">English</button>
            </div>
        </div>
    </header>

    <section class="page-header" style="background-image: linear-gradient(rgba(15, 76, 35, 0.9), rgba(15, 76, 35, 0.9)), url('images/banners/about-cover.jpg'); margin-top: 80px;" data-aos="fade-down">
        <div class="container text-center">
            <h2 data-i18n="about_page_title" style="color: var(--clr-accent); font-size: 3rem; margin-bottom: 1rem;">شركة السعادة للمنتجات الغذائية</h2>
            <p data-i18n="about_page_subtitle" style="color: white; font-weight: bold; font-size: 1.5rem;">مذاق من التراث</p>
        </div>
    </section>

    <section class="about-story section-padding">
        <div class="container">
            <div class="about-grid">
                <div class="about-text-content" data-aos="fade-left">
                    <h3 data-i18n="story_title" class="text-primary mb-4">موثوقة عبر الأجيال</h3>
                    <p data-i18n="story_p1">موثوقة عبر الأجيال لجودتها العالية، السعادة® تجلب إلى الذهن أوقات الوجبات العائلية التي لا تنسى والوصفات المنزلية الشهية. منذ تأسيسها، قدمت السعادة مجموعة متنوعة من المنتجات التي تعزز طريقة تحضير الطعام ومذاقه لتكمل الطريقة التي تطهو بها وأطباقك المفضلة.</p>
                </div>
                <div class="about-video-wrapper" data-aos="fade-right">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/PbiPEZiACbw?si=1se8QbBNvokcqOht" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                </div>
            </div>
        </div>
    </section>

    <section class="about-expansion bg-light section-padding">
        <div class="container">
            <div class="about-grid reverse-grid">
                <div class="about-image-wrapper" data-aos="fade-left">
                    <img src="images/about.jpg" alt="Al Saadah Factory" class="rounded-img shadow-lg" style="width: 100%; border-radius: 12px;">
                </div>
                <div class="about-text-content" data-aos="fade-right">
                    <h3 data-i18n="expansion_title" class="text-primary mb-4">من قلب الغوطة الدمشقية إلى العالم</h3>
                    <p data-i18n="expansion_p1">وفرة وجودة المواد الغذائية التي تذخر بها أرضنا الشامية المباركة وخبرة أجدادنا في صناعة المنتجات الغذائية، كانت انطلاقة لشركتنا في عام 1984 م في قلب الغوطة الدمشقية بالأصناف المحددة كالمربيات والقمر الدين.</p>
                    <p data-i18n="expansion_p2">التحديات دفعتنا للاستمرار في العمل في وطننا مع ضرورة التوسع في الشرق الأوسط الذي كان بإنشاء مصنع في القاهرة للاستفادة من وفرة الخيرات الزراعية وتقديمها للأسواق الجديدة.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mission-goals section-padding text-center">
        <div class="container">
            <div class="mission-box mb-5" data-aos="zoom-in">
                <h3 data-i18n="mission_title" class="text-secondary">المهمة</h3>
                <p data-i18n="mission_desc" class="lead-text">المثابرة للوصول لمنتج غذائي صحي وشهي بالطعم والجودة التي تتميز بها محاصيلنا والخبرة الصناعية التي ورثناها عن أجدادنا، لتقديمه إلى عملائنا، وفق أفضل المعايير العالمية.</p>
            </div>
            
            <h3 data-i18n="goals_title" class="text-primary mb-4 mt-5" data-aos="fade-up">الأهداف</h3>
            <div class="goals-grid">
                <div class="goal-card" data-aos="fade-up" data-aos-delay="100"><div class="goal-icon">🛡️</div><h4 data-i18n="goal_1">"صحتكم أمانة في أعناقنا"</h4></div>
                <div class="goal-card" data-aos="fade-up" data-aos-delay="200"><div class="goal-icon">❤️</div><h4 data-i18n="goal_2">"رضاكم ما نسعى إليه"</h4></div>
                <div class="goal-card" data-aos="fade-up" data-aos-delay="300"><div class="goal-icon">🌟</div><h4 data-i18n="goal_3">"وثقتكم نجاحنا"</h4></div>
            </div>
        </div>
    </section>

    <section class="about-products-list bg-light section-padding" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h3 data-i18n="full_products_title">قائمة منتجاتنا</h3>
                <p data-i18n="full_products_desc">الآن نقدم مجموعة متكاملة من المنتجات تكمل احتياجات المستهلك لدينا وسنستمر في تطوير منتجات جديدة.</p>
            </div>
            <ul class="multi-column-list">
                <?php foreach ($categories as $cat): ?>
                    <li><span class="lang-ar"><?= htmlspecialchars($cat['name_ar']) ?></span><span class="lang-en"><?= htmlspecialchars($cat['name_en']) ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>