<?php

include 'product.php';
include 'downloadable.php';
include 'book.php';



//at override
$bk = new Book( 2300,  "Alice in Wonderland", 500);
$bk2 = new Book(2300, "The Intelligenet Investor", 1000);



$type = $bk->getType();
echo $type;

echo '<br/>';
$pages = $bk->getPageCount();

echo $pages;

echo '<br/>';

$title = $bk->getTitle();

echo $title;

echo '<br/>';

$price = $bk->getPrice();
echo $price;

$bk->generateDownloadLink();

$bk->getCount();
Book::showType();
?>