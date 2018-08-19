<?php
namespace Items;

use Zend\Router\Http\Segment;

return [
	'router' => [
		'routes' => [
			'brand' => [
				'type'    => Segment::class,
				'options' => [
					'route' => '/brand[/:name]',
					'constraints' => [
						'name' => '[a-zA-Z][a-zA-Z0-9_-]*',
					],
					'defaults' => [
						'controller' => Controller\BrandsController::class,
						'action'     => 'brand',
					],
				],
			],
			'items' => [
				'type'    => Segment::class,
				'options' => [
					'route' => '/items',
					'defaults' => [
						'controller' => Controller\ItemsController::class,
						'action'     => 'index',
					],
				],
			],
			'category' => [
				'type'    => Segment::class,
				'options' => [
					'route' => '/items/category[/:name]',
					'constraints' => [
						'name' => '[a-zA-Z][a-zA-Z0-9_-]*',
					],
					'defaults' => [
						'controller' => Controller\ItemsController::class,
						'action' => 'category'
					],
				],
			],
			'item' => [
				'type'    => Segment::class,
				'options' => [
					'route' => '/item[/:id]',
					'constraints' => [
						'id' => '[0-9]+',
					],
					'defaults' => [
						'controller' => Controller\ItemsController::class,
						'action'     => 'item',
					],
				],
			],
		],
	],

	'view_manager' => [
		'template_path_stack' => [
			'items' => __DIR__ . '/../view',
		],
	],
]

?>