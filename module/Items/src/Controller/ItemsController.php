<?php
namespace Items\Controller;

use Items\Model\ItemsTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ItemsController extends AbstractActionController{

	private $table;

	public function __construct(ItemsTable $table){
		$this->table = $table;
	}

	public function indexAction(){
		return new ViewModel(['items' => $this->table->fetchAll()]);
	}

	public function itemAction(){
		$id = $this->params()->fromRoute('id', 0);
		if($id === 0) return $this->redirect()->toRoute('items', ['action' => 'index']);
		try {
			$item = $this->table->getItem($id);
		} catch (\Exception $e) {
			return $this->redirect()->toRoute('items', ['action' => 'index']);
		}
		return new ViewModel($item);
	}

	public function categoryAction(){

	}
}
?>