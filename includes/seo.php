<?php
/**
 * Prints SEO tags (title, description, canonical, Open Graph, Twitter).
 * Usage: render_seo($title, $description, 'index.php');
 */
function render_seo(string $title, string $description, string $path = ''): void
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'alsaadahfood.com';
    $base = $scheme . '://' . $host;
    $url = $base . '/' . ltrim($path, '/');
    $t = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $d = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    $u = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    echo "<title>{$t}</title>\n";
    echo "<meta name=\"description\" content=\"{$d}\">\n";
    echo "<meta name=\"robots\" content=\"index, follow\">\n";
    echo "<link rel=\"canonical\" href=\"{$u}\">\n";
    echo "<meta property=\"og:type\" content=\"website\">\n";
    echo "<meta property=\"og:site_name\" content=\"شركة السعادة للمنتجات الغذائية\">\n";
    echo "<meta property=\"og:locale\" content=\"ar_AR\">\n";
    echo "<meta property=\"og:title\" content=\"{$t}\">\n";
    echo "<meta property=\"og:description\" content=\"{$d}\">\n";
    echo "<meta property=\"og:url\" content=\"{$u}\">\n";
    echo "<meta property=\"og:image\" content=\"{$base}/images/ui/logo.png\">\n";
    echo "<meta name=\"twitter:card\" content=\"summary\">\n";
}
