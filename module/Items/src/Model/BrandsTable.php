<?php
namespace Items\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class BrandsTable{

	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway){
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll(){
		return $this->tableGateway->select();
	}

	public function getBrand($id){
		if(gettype($id) == "integer"){
			$id = (int) $id;
			$rowset = $this->tableGateway->select(['id' => $id]);
		}
		elseif (gettype($id) == "string"){
			$id = (string) $id;
			$rowset = $this->tableGateway->select(['routename' => $id]);
		}
		else throw new RuntimeException();
		$row = $rowset->current();
		if(!$row) throw new RuntimeException(sprintf('Could not find brand with excepted id'));
		return $row;
	}
}
?>