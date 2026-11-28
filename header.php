<?php
// Shared site header. Set $current_page before including:
// 'home' | 'products' | 'about' | 'gallery' | 'contact'
$current_page = $current_page ?? '';
$nav_items = [
    'home'     => ['index.php',    'الرئيسية',  'Home'],
    'products' => ['products.php', 'منتجاتنا',  'Products'],
    'about'    => ['about.php',    'قصتنا',     'Our Story'],
    'gallery'  => ['gallery.php',  'من عالمنا', 'Gallery'],
    'contact'  => ['contact.php',  'تواصل معنا', 'Contact'],
];
?>
<link rel="stylesheet" href="assets/css/header.css">
<div class="neo-topline"></div>
<header class="neo-nav" id="navbar"><div class="neo-nav-inner">
<a class="neo-logo" href="index.php" aria-label="شركة السعادة - الرئيسية"><img src="images/ui/logo.png" alt="شعار شركة السعادة للمنتجات الغذائية" width="160" height="60"></a>
<nav class="neo-links" id="neoLinks" aria-label="Main navigation">
<?php foreach ($nav_items as $key => $item): ?>
<a href="<?= $item[0] ?>"<?= $current_page === $key ? ' class="active" aria-current="page"' : '' ?>><span class="lang-ar"><?= $item[1] ?></span><span class="lang-en"><?= $item[2] ?></span></a>
<?php endforeach; ?>
</nav>
<div class="neo-nav-tools"><button id="langSwitcher" class="neo-lang" type="button">English</button><button class="neo-menu" id="mobileMenuBtn" type="button" aria-label="فتح القائمة" aria-expanded="false">☰</button></div>
</div></header>
<script src="assets/js/header.js" defer></script>
