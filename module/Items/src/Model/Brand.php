<?php
namespace Items\Model;

class Brand{

	public $id;
	public $routename;
	public $name;
	public $title;
	public $description;

	public function exchangeArray(array $data){
		$this->id = !empty($data['id']) ? $data['id'] : null;
		$this->routename = !empty($data['routename']) ? $data['routename'] : null;
		$this->name = !empty($data['name']) ? $data['name'] : null;
		$this->title = !empty($data['title']) ? $data['title'] : null;
		$this->description = !empty($data['description']) ? $data['description'] : null;
	}
}
?>