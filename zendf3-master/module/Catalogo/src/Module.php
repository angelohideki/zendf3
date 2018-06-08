<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Catalogo;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Catalogo\Model\Dao\IProductoDao;
use Catalogo\Model\Dao\ProductoDao;
use Catalogo\Model\Entity\Producto;
use Catalogo\Model\Entity\Categoria;

class Module {

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig() {
        return [
            'factories' => [
                'ProductoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Producto());
                    return new TableGateway('productos', $dbAdapter, null, $resultSetPrototype);
                },
                'CategoriaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Categoria());
                    return new TableGateway('categorias', $dbAdapter, null, $resultSetPrototype);
                },
                IProductoDao::class => function($sm) {
                    $tableGateway = $sm->get('ProductoTableGateway');
                    $tableCategoria = $sm->get('CategoriaTableGateway');
                    $dao = new ProductoDao($tableGateway, $tableCategoria);
                    return $dao;
                },
            ],
        ];
    }

}
