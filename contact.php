<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front - Contact Us</title>
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
                <a href="about.php" data-i18n="nav_about">من نحن</a>
                <a href="gallery.php" data-i18n="nav_gallery">المعرض</a>
                <a href="contact.php" class="active" data-i18n="nav_contact">اتصل بنا</a>
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

    <section class="page-header" style="background-image: linear-gradient(rgba(15, 76, 35, 0.9), rgba(15, 76, 35, 0.9)), url('images/banners/contact-cover.jpg'); padding: 6rem 0; margin-top: 80px;" data-aos="fade-down">
        <div class="container text-center">
            <h2 data-i18n="contact_page_title" style="color: var(--clr-accent); font-size: 3rem; margin-bottom: 1rem;">تواصل معنا</h2>
            <p data-i18n="contact_page_desc" style="color: white; font-size: 1.2rem;">نحن هنا للإجابة على استفساراتكم وتلبية طلباتكم.</p>
        </div>
    </section>

    <section class="contact-section section-padding">
        <div class="container">
            <div class="contact-grid">
                
                <div class="contact-info-card" data-aos="fade-left">
                    <h3 data-i18n="contact_info_title" class="text-primary mb-4">معلومات التواصل</h3>
                    <p data-i18n="contact_info_desc" class="mb-4">يسعدنا تواصلكم معنا عبر القنوات التالية أو من خلال زيارة مقرنا الرئيسي.</p>
                    
                    <div class="info-item"><div class="info-icon">📍</div><div><h4 data-i18n="lbl_address">العنوان</h4><p data-i18n="val_address">مدينة العاشر من رمضان
المنطقة الصناعية C5، مصر</p></div></div>
                    <div class="info-item"><div class="info-icon">📞</div><div><h4 data-i18n="lbl_phone">رقم الهاتف</h4><p dir="ltr">+20 110 488 2192</p></div></div>
                    <div class="info-item"><div class="info-icon">✉️</div><div><h4 data-i18n="lbl_email">البريد الإلكتروني</h4><p>info@alsaadahfood.com</p></div></div>
                </div>

                <div class="contact-form-wrapper shadow-lg rounded-img" style="border-radius: 12px;" data-aos="fade-right">
                    <h3 data-i18n="form_title" class="text-primary mb-4">أرسل لنا رسالة</h3>
                    <form id="contactForm" class="contact-form">
                        <div class="form-group"><label data-i18n="lbl_name">الاسم الكامل</label><input type="text" name="name" required></div>
                        <div class="form-row">
                            <div class="form-group"><label data-i18n="lbl_email_input">البريد الإلكتروني</label><input type="email" name="email" required></div>
                            <div class="form-group"><label data-i18n="lbl_phone_input">رقم الهاتف</label><input type="tel" name="phone" required></div>
                        </div>
                        <div class="form-group"><label data-i18n="lbl_subject">الموضوع</label><input type="text" name="subject" required></div>
                        <div class="form-group"><label data-i18n="lbl_message">الرسالة</label><textarea rows="4" name="message" required></textarea></div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;" data-i18n="btn_send">إرسال الرسالة</button>
                        <div id="formMessage" class="form-message hidden" style="margin-top: 15px;"></div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>