<?php

include '../dbc.php';


//fwrite("<url>".PHP_EOL);
$forid = 501980;
for($i=155;$i<201;$i++){
$file = fopen("sitemap".$i.".xml","a");
$new_qu="SELECT qid,link FROM `updates` WHERE qid>".$forid." LIMIT 0,9130";
$new_quer=mysql_query($new_qu);
fwrite($file,'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL);
fwrite($file,'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL);
while($rew=mysql_fetch_array($new_quer)){
  fwrite($file,"<url>".PHP_EOL);
  fwrite($file,"   <loc>http://marinelifes.com/".$rew['link']."</loc>".PHP_EOL);
  fwrite($file,"   <lastmod>2015-02-01T01:33:20+00:00</lastmod>".PHP_EOL);
  fwrite($file,"   <changefreq>always</changefreq>".PHP_EOL);
  fwrite($file,"   <priority>0.7</priority>".PHP_EOL);
  fwrite($file,"</url>".PHP_EOL);
  $forid = $rew['qid'];
}
fwrite($file,"</urlset>".PHP_EOL);
fclose($file);
}
?>