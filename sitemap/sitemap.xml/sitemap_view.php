<!-- Ubicación: application/views/sitemap_view.php -->

<?php
header("Content-Type: application/xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($products as $product): ?>
    <url>
        <loc><?php echo site_url('product/' . $product->slug); ?></loc>
        <lastmod><?php echo date(DATE_W3C, strtotime($product->updated_at)); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
<?php endforeach; ?>
</urlset>
