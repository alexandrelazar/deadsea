<?php
namespace Items;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface{
	public function getConfig(){
		return include __DIR__ . '/../config/module.config.php';
	}

	public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\BrandsTable::class => function($container) {
                    $tableGateway = $container->get(Model\BrandsTableGateway::class);
                    return new Model\BrandsTable($tableGateway);
                },
                Model\BrandsTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Brand());
                    return new TableGateway('brands', $dbAdapter, null, $resultSetPrototype);
                },
                Model\ItemsTable::class => function($container) {
                    $tableGateway = $container->get(Model\ItemsTableGateway::class);
                    return new Model\ItemsTable($tableGateway);
                },
                Model\ItemsTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Item());
                    return new TableGateway('items', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\BrandsController::class => function($container) {
                    return new Controller\BrandsController(
                        $container->get(Model\BrandsTable::class)
                    );
                },
                Controller\ItemsController::class => function($container) {
                    return new Controller\ItemsController(
                        $container->get(Model\ItemsTable::class)
                    );
                },
            ],
        ];
    }
}
?>