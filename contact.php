<?php
require_once __DIR__ . '/config/database.php';

$pageTitle = 'Front | تواصل معنا';
$activeNav = 'contact';

$pageHeaderTitleAr = 'تواصل معنا';
$pageHeaderTitleEn = 'Get in Touch';
$pageHeaderDescAr = 'نحن هنا للإجابة على استفساراتكم وبناء شراكات ناجحة ومستدامة.';
$pageHeaderDescEn = 'We are here to answer your inquiries and build successful, sustainable partnerships.';

$defaultSubject = isset($_GET['subject']) ? trim($_GET['subject']) : '';

include_once __DIR__ . '/resources/views/layouts/header.php';
include_once __DIR__ . '/resources/views/layouts/page-header.php';
?>

<section class="neo-section">
    <div class="neo-veggie-field" aria-hidden="true"><span>🥕</span><span>🥦</span><span>🍅</span><span>🫑</span><span>🥬</span><span>🌽</span><span>🍆</span><span>🥑</span></div>
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 45px; align-items: start;">
            <!-- Contact Form Card -->
            <div class="neo-reveal" style="background: #fff; padding: 40px; border-radius: 28px; border: 1px solid rgba(15, 76, 35, 0.09); box-shadow: var(--neo-shadow-sm);">
                <span class="neo-eyebrow">
                    <span class="lang-ar">أرسل لنا رسالة</span>
                    <span class="lang-en">SEND US A MESSAGE</span>
                </span>
                <h2 style="font-size: 2rem; color: var(--neo-green); font-weight: 900; margin: 10px 0 25px;">
                    <span class="lang-ar">يسعدنا تواصلك معنا دائماً</span>
                    <span class="lang-en">We'd Love to Hear From You</span>
                </h2>

                <form id="neoContactForm" method="POST">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px;">
                        <div class="neo-form-group">
                            <label for="name"><span class="lang-ar">الاسم الكامل *</span><span class="lang-en">Full Name *</span></label>
                            <input type="text" id="name" name="name" class="neo-input" required placeholder="أدخل اسمك الكامل">
                        </div>
                        <div class="neo-form-group">
                            <label for="email"><span class="lang-ar">البريد الإلكتروني *</span><span class="lang-en">Email Address *</span></label>
                            <input type="email" id="email" name="email" class="neo-input" required placeholder="name@example.com">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px;">
                        <div class="neo-form-group">
                            <label for="phone"><span class="lang-ar">رقم الهاتف / الواتساب</span><span class="lang-en">Phone / WhatsApp</span></label>
                            <input type="tel" id="phone" name="phone" class="neo-input" placeholder="+20 110 000 0000">
                        </div>
                        <div class="neo-form-group">
                            <label for="subject"><span class="lang-ar">الموضوع</span><span class="lang-en">Subject</span></label>
                            <input type="text" id="subject" name="subject" class="neo-input" value="<?= htmlspecialchars($defaultSubject) ?>" placeholder="موضوع الرسالة">
                        </div>
                    </div>

                    <div class="neo-form-group">
                        <label for="message"><span class="lang-ar">نص الرسالة *</span><span class="lang-en">Your Message *</span></label>
                        <textarea id="message" name="message" class="neo-input" rows="5" required placeholder="اكتب استفسارك أو طلبك هنا..."></textarea>
                    </div>

                    <button type="submit" class="neo-btn" style="width: 100%;">
                        <span class="lang-ar">إرسال الرسالة الآن</span>
                        <span class="lang-en">Send Message Now</span>
                        <i>↙</i>
                    </button>

                    <div id="formResponse" style="margin-top: 15px;"></div>
                </form>
            </div>

            <!-- Branch Details & Direct Contact Info -->
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <div class="neo-reveal" style="background: var(--neo-green); color: #fff; padding: 35px; border-radius: 28px; box-shadow: var(--neo-shadow);">
                    <span class="neo-eyebrow" style="color: var(--neo-accent);">🇪🇬 <span class="lang-ar">المركز الرئيسي والمصنع</span><span class="lang-en">HEAD OFFICE & FACTORY</span></span>
                    <h3 style="font-size: 1.5rem; color: #fff; font-weight: 900; margin: 10px 0 15px;">
                        <span class="lang-ar">جمهورية مصر العربية</span>
                        <span class="lang-en">Egypt Branch</span>
                    </h3>
                    <p style="color: rgba(255,255,255,0.85); line-height: 1.8; margin-bottom: 20px;">
                        <span class="lang-ar">الشرقية – مدينة العاشر من رمضان<br>المنطقة الصناعية C5، قطعة 19</span>
                        <span class="lang-en">Al-Sharqia – 10th of Ramadan City<br>Industrial Zone C5, Plot 19</span>
                    </p>
                    <p dir="ltr" style="font-size: 1.1rem; font-weight: 800; color: var(--neo-accent); margin-bottom: 8px;">
                        📞 +20 110 488 2192 | +20 102 811 6220
                    </p>
                    <p style="color: rgba(255,255,255,0.9); font-weight: 700;">
                        ✉️ Info@alsaadahfood.com
                    </p>
                </div>

                <div class="neo-reveal" style="background: #fff; padding: 35px; border-radius: 28px; border: 1px solid rgba(15, 76, 35, 0.09); box-shadow: var(--neo-shadow-sm); transition-delay: 100ms;">
                    <span class="neo-eyebrow">🇸🇾 <span class="lang-ar">فرع سوريا</span><span class="lang-en">SYRIA BRANCH</span></span>
                    <h3 style="font-size: 1.4rem; color: var(--neo-green); font-weight: 900; margin: 10px 0 12px;">
                        <span class="lang-ar">الجمهورية العربية السورية</span>
                        <span class="lang-en">Syrian Arab Republic</span>
                    </h3>
                    <p style="color: var(--neo-muted); line-height: 1.8; margin-bottom: 15px;">
                        <span class="lang-ar">ريف دمشق – التل</span>
                        <span class="lang-en">Rural Damascus – Al-Tall</span>
                    </p>
                    <p dir="ltr" style="font-size: 1.05rem; font-weight: 800; color: var(--neo-green);">
                        📞 +963 944 216 432
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/resources/views/layouts/footer.php'; ?>
