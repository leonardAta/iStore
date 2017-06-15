<?php

abstract class Product
{

	protected $title;
	protected $price;
	protected $type;


	public function __construct( $title, $price){

	
		
		$this->title=$title;

		$this->price=$price;



	}



	//public function setType($type){
		//$this->type=$type;
	//}

    public function getType(){
		//this means the current object

		return $this->type;
	}
	
	
	//public function setPrice($price){
		//$this->price=$price;
	//}
	
	public function getPrice(){
		return $this->price;
	}
	
	//public function setTitle($title){
		//$this->title=$title;

	//}

	
	public function getTitle(){
		return $this->title;
	}


	public static function showType() {

		echo $this->type;
	}





//abstract public function preview();



}