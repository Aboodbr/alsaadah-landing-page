<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Models/Category.php';

$categories = Category::getAll($pdo);

$pageTitle = 'Front | قصتنا وجودتنا';
$activeNav = 'about';

$pageHeaderTitleAr = 'قصتنا وحكايتنا مع الجودة';
$pageHeaderTitleEn = 'Our Story & Heritage';
$pageHeaderDescAr = 'تعرّف على مسيرتنا في تقديم أجود المنتجات الغذائية من الطبيعة مباشرة إلى مائدتك.';
$pageHeaderDescEn = 'Discover our journey of bringing the finest food products from nature straight to your table.';

include_once __DIR__ . '/resources/views/layouts/header.php';
include_once __DIR__ . '/resources/views/layouts/page-header.php';
?>

<!-- Brand Mission Section -->
<section class="neo-section">
    <div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div>
    <div class="container">
        <div class="neo-story-grid">
            <div class="neo-story-visual neo-reveal">
                <div class="neo-story-image">
                    <img src="images/about.jpg" alt="Front Story" loading="lazy" onerror="this.src='images/banners/slider1.jpg';">
                </div>
                <div class="neo-story-stamp">
                    <span class="lang-ar">جودة<br>عالمية<br>✦</span>
                    <span class="lang-en">GLOBAL<br>QUALITY<br>✦</span>
                </div>
            </div>

            <div class="neo-reveal">
                <span class="neo-eyebrow">
                    <span class="lang-ar">شغفنا ورسالتنا</span>
                    <span class="lang-en">OUR PASSION & MISSION</span>
                </span>
                <h2>
                    <span class="lang-ar">أكثر من عقدين من<br>التميز والابتكار.</span>
                    <span class="lang-en">Over two decades of<br>excellence and flavor.</span>
                </h2>
                <p class="neo-story-copy" style="color: var(--neo-muted);">
                    <span class="lang-ar">تعتبر شركة Front إحدى الشركات الرائدة في تصنيع وتصدير المنتجات الغذائية الشرقية والغربية. نحن نلتزم بأعلى معايير سلامة الأغذية، بدءاً من اختيار أفضل المحاصيل الزراعية وحتى التعبئة والتغليف بأحدث التقنيات.</span>
                    <span class="lang-en">Front is a leading manufacturer and exporter of traditional and modern food products. We adhere to the highest international food safety standards, from selecting top-tier crops to state-of-the-art packaging.</span>
                </p>

                <div class="neo-story-points">
                    <div class="neo-story-point" style="color: var(--neo-green);"><b>✓</b><span class="lang-ar">جودة معتمدة دولياً</span><span class="lang-en">Internationally certified</span></div>
                    <div class="neo-story-point" style="color: var(--neo-green);"><b>✓</b><span class="lang-ar">مكونات طبيعية 100%</span><span class="lang-en">100% natural ingredients</span></div>
                    <div class="neo-story-point" style="color: var(--neo-green);"><b>✓</b><span class="lang-ar">تقنيات تعبئة حديثة</span><span class="lang-en">Advanced packaging</span></div>
                    <div class="neo-story-point" style="color: var(--neo-green);"><b>✓</b><span class="lang-ar">تصدير لجميع القارات</span><span class="lang-en">Exported worldwide</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Cards Section -->
<section class="neo-section" style="background: #fff;">
    <div class="container">
        <div class="neo-section-head neo-reveal text-center" style="text-align: center; margin-bottom: 50px;">
            <div>
                <span class="neo-eyebrow"><span class="lang-ar">قيمنا الجوهرية</span><span class="lang-en">OUR CORE VALUES</span></span>
                <h2><span class="lang-ar">لماذا يختارنا العملاء؟</span><span class="lang-en">Why Customers Trust Us</span></h2>
            </div>
        </div>

        <div class="neo-product-grid">
            <div class="neo-product neo-reveal" style="padding: 30px; text-align: center; display: block;">
                <div style="font-size: 2.8rem; margin-bottom: 15px;">🌟</div>
                <h3 style="color: var(--neo-green); font-weight: 900; margin-bottom: 12px;">
                    <span class="lang-ar">الأصالة والمذاق</span><span class="lang-en">Authenticity & Taste</span>
                </h3>
                <p style="color: var(--neo-muted); font-size: 0.95rem; line-height: 1.8;">
                    <span class="lang-ar">نحافظ على الوصفات الأصيلة التي تعيد إليك طعم البركة والذاكرة الجميلة.</span>
                    <span class="lang-en">We preserve authentic recipes that deliver rich, traditional flavors.</span>
                </p>
            </div>

            <div class="neo-product neo-reveal" style="padding: 30px; text-align: center; display: block; transition-delay: 100ms;">
                <div style="font-size: 2.8rem; margin-bottom: 15px;">🔬</div>
                <h3 style="color: var(--neo-green); font-weight: 900; margin-bottom: 12px;">
                    <span class="lang-ar">السلامة والرقابة</span><span class="lang-en">Safety & Hygiene</span>
                </h3>
                <p style="color: var(--neo-muted); font-size: 0.95rem; line-height: 1.8;">
                    <span class="lang-ar">تخضع جميع خطوط الإنتاج للفحص والرقابة المستمرة لضمان أعلى سلامة.</span>
                    <span class="lang-en">All production lines undergo rigorous, continuous quality inspection.</span>
                </p>
            </div>

            <div class="neo-product neo-reveal" style="padding: 30px; text-align: center; display: block; transition-delay: 200ms;">
                <div style="font-size: 2.8rem; margin-bottom: 15px;">🌍</div>
                <h3 style="color: var(--neo-green); font-weight: 900; margin-bottom: 12px;">
                    <span class="lang-ar">الانتشار العالمي</span><span class="lang-en">Global Reach</span>
                </h3>
                <p style="color: var(--neo-muted); font-size: 0.95rem; line-height: 1.8;">
                    <span class="lang-ar">نصل بمنتجاتنا إلى معظم الأسواق العالمية مع التزام تام بمواعيد التسليم.</span>
                    <span class="lang-en">Delivering our products to international markets with reliability.</span>
                </p>
            </div>

            <div class="neo-product neo-reveal" style="padding: 30px; text-align: center; display: block; transition-delay: 300ms;">
                <div style="font-size: 2.8rem; margin-bottom: 15px;">🤝</div>
                <h3 style="color: var(--neo-green); font-weight: 900; margin-bottom: 12px;">
                    <span class="lang-ar">خدمة شركاء النجاح</span><span class="lang-en">Partner Satisfaction</span>
                </h3>
                <p style="color: var(--neo-muted); font-size: 0.95rem; line-height: 1.8;">
                    <span class="lang-ar">نبني علاقات طويلة الأمد مع عملائنا وموزعينا قائمة على الشفافية والثقة.</span>
                    <span class="lang-en">Building long-term transparent partnerships with clients and agents.</span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Numbers & Achievements -->
<section class="neo-numbers">
    <div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div>
    <div class="container neo-number-grid">
        <div class="neo-number neo-reveal"><strong>+25</strong><span><span class="lang-ar">عاماً من الخبرة</span><span class="lang-en">Years of experience</span></span></div>
        <div class="neo-number neo-reveal"><strong>+30</strong><span><span class="lang-ar">دولة نسعد بالتصدير لها</span><span class="lang-en">Countries exported to</span></span></div>
        <div class="neo-number neo-reveal"><strong>100%</strong><span><span class="lang-ar">رضا شركائنا وعملائنا</span><span class="lang-en">Partner satisfaction</span></span></div>
    </div>
</section>

<?php include_once __DIR__ . '/resources/views/layouts/footer.php'; ?>
