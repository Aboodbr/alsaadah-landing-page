<?php
// resources/views/layouts/page-header.php
if (!isset($pageHeaderTitleAr)) $pageHeaderTitleAr = '';
if (!isset($pageHeaderTitleEn)) $pageHeaderTitleEn = '';
if (!isset($pageHeaderDescAr)) $pageHeaderDescAr = '';
if (!isset($pageHeaderDescEn)) $pageHeaderDescEn = '';
?>
<section class="neo-page-header">
    <div class="container text-center" style="text-align: center;">
        <span class="neo-eyebrow" style="color: var(--neo-accent);">FRONT</span>
        <h1>
            <span class="lang-ar"><?= htmlspecialchars($pageHeaderTitleAr) ?></span>
            <span class="lang-en"><?= htmlspecialchars($pageHeaderTitleEn) ?></span>
        </h1>
        <?php if ($pageHeaderDescAr || $pageHeaderDescEn): ?>
            <p>
                <span class="lang-ar"><?= htmlspecialchars($pageHeaderDescAr) ?></span>
                <span class="lang-en"><?= htmlspecialchars($pageHeaderDescEn) ?></span>
            </p>
        <?php endif; ?>
    </div>
</section>
