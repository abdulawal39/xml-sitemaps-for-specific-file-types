<?php
/**
* Create XML sitemap for all pdf files recurively inside a directory
* Remember to replace "folder/path/here" and "https://yourdomain.com/folder/url/here/"
* @author Abdul Awal Uzzal
* @link https://github.com/abdulawal39/xml-sitemaps-for-specific-file-types
* @version 1.0
* @copyright 2018 Abdul Awal Uzzal
*/

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('folder/path/here'));
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

foreach ($iterator as $file) {
    if ($file->isDir()) continue;
    if($file->getExtension() != "pdf") continue;

    $path = $file->getPathname();
?>
<url>
    <loc><?php echo 'https://yourdomain.com/folder/url/here/'.htmlspecialchars($path); ?></loc>
    <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    <priority>0.5</priority>
</url>
<?php
}
echo '</urlset>';