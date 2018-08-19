<?php
namespace Items\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ItemsTable{

	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway){
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll(){
		return $this->tableGateway->select();
	}

	public function getItem($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(['id' => $id]);
		$row = $rowset->current();
		if(!$row) throw new RuntimeException(sprintf('Could not find item with excepted id'));
		return $row;
	}

	public function getItemsFromBrand($brand_id){
		$brand_id = (int) $brand_id;
		$rowset = $this->tableGateway->select(['brand_id' => $id])->toArray();
		if(!$rowset) throw new RuntimeException(sprintf('Could not find items for this brand'));
	}
}
?>