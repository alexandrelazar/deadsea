<?php
namespace Items\Model;

class Item{

	public $id;
	public $name;
	public $img;
	public $description;
	public $price;

	public function exchangeArray(array $data){
		$this->id = !empty($data['id']) ? $data['id'] : null;
		$this->name = !empty($data['name']) ? $data['name'] : null;
		$this->img = !empty($data['description']) ? $data['description'] : null;
		$this->description = !empty($data['description']) ? $data['description'] : null;
		$this->price = !empty($data['price']) ? $data['price'] : null;
	}
}
?>