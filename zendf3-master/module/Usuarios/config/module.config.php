<?php
namespace Usuarios;

use Zend\Router\Http\Segment;

return [
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\ControllerFactory::class,
            Controller\LoginController::class => Controller\ControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'login' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/login[/:action]',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'usuario' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/usuario[/:action][/:id]',
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller'    => Controller\IndexController::class,
                        'action'        => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'Usuarios' => __DIR__ . '/../view',
        ],
    ],
];
