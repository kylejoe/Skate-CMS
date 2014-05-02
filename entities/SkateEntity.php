<?php 

class SkateEntity
{
	public $id;
	public $brand;
	public $deck;
	public $pros;
	public $cons;
	public $price;
	public $image;
	public $description;


	function __construct($id, $brand, $deck, $pros, $cons, $price, $image, $description){
		$this->id = $id;
		$this->brand = $brand;
		$this->deck = $deck;
		$this->pros = $pros;
		$this->cons = $cons;
		$this->price = $price;
		$this->image = $image;
		$this->description = $description;
	}

}









?>


<!-- id,brand,deck,pros,cons,price,image,description -->