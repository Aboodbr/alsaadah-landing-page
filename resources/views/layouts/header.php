<?php
// resources/views/layouts/header.php
if (!isset($pageTitle)) {
    $pageTitle = 'Front | اكتشف طعم الجودة';
}
if (!isset($activeNav)) {
    $activeNav = 'home';
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>
<link rel="icon" type="image/png" href="images/ui/logo.png">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Tajawal:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="neo-topline"></div>
<header class="neo-nav" id="navbar">
    <div class="container neo-nav-inner">
        <a class="neo-logo" href="index.php" aria-label="Front Home">
            <img src="images/ui/logo.png" alt="Front">
        </a>
        <nav class="neo-links" id="neoLinks">
            <a href="index.php" class="<?= $activeNav === 'home' ? 'active' : '' ?>">
                <span class="lang-ar">الرئيسية</span><span class="lang-en">Home</span>
            </a>
            <a href="products.php" class="<?= $activeNav === 'products' ? 'active' : '' ?>">
                <span class="lang-ar">منتجاتنا</span><span class="lang-en">Products</span>
            </a>
            <a href="about.php" class="<?= $activeNav === 'about' ? 'active' : '' ?>">
                <span class="lang-ar">قصتنا</span><span class="lang-en">Our Story</span>
            </a>
            <a href="gallery.php" class="<?= $activeNav === 'gallery' ? 'active' : '' ?>">
                <span class="lang-ar">من عالمنا</span><span class="lang-en">Gallery</span>
            </a>
            <a href="contact.php" class="<?= $activeNav === 'contact' ? 'active' : '' ?>">
                <span class="lang-ar">تواصل معنا</span><span class="lang-en">Contact</span>
            </a>
        </nav>
        <div class="neo-nav-tools">
            <button id="langSwitcher" class="neo-lang" type="button">English</button>
            <button class="neo-menu" id="mobileMenuBtn" type="button" aria-label="فتح القائمة" aria-expanded="false">☰</button>
        </div>
    </div>
</header>
<main>
