<?php

class Book extends Product implements iDownloadable {

	private $pagecount;
	private static $count = 0;
	private $author;





	public function __construct($pg,  $title, $price){

		//call the overidden constructor first before any code in the constructor
		parent::__construct($title,$price);

		$this->pageCount =$pg;

		$this->type="book";

		++self::$count;


	}

	public function getPageCount(){

		return $this->pageCount;


	}
    
    public function preview(){
    	
    	echo "<p>type:".$this->getType(). "</p>";
    	
    	echo "<p>title:".$this->getTitle(). "</p>";
    	
    	echo "<p>price:".$this->getPrice(). "</p>";
    	
    	echo "<p>pagecount:".$this->getPageCount(). "</p>";
    }

    public function generateDownloadLink() {

    	echo "<p>This is the link</p>";
    }


    public function getCount() {

    	echo self::$count;
    }

}





?>