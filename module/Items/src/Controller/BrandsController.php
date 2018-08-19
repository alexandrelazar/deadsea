<?php
namespace Items\Controller;

use Items\Model\BrandsTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BrandsController extends AbstractActionController{

	private $table;

	public function __construct(BrandsTable $table){
		$this->table = $table;
	}

	public function indexAction(){
		return new ViewModel(['brands' => $this->table->fetchAll()]);
	}

	public function brandAction(){
		$name = (string) $this->params()->fromRoute('name', 0);
		if(!$name) {
			return $this->redirect()->toRoute('home');
		}

		try {
			$brand = $this->table->getBrand($name);
		}
		catch(\Exeption $e){
			$this->redirect()->toRoute('home');
		}
		return new ViewModel(['brand' => $brand]);
	}
}
?>