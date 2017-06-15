<?php


	include 'Product.php';

	//Instantiate an object or class Product

	$prod = new Product();

	$type = $prod->getType();

	echo $type;

	echo '<br/>';

	echo $prod->type;

	$prod2 = new Product();

	$prod2->setPrice(500);
	$price = $prod2->getPrice();

	echo $price;




?>+