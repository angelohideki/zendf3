<?php
namespace Catalogo\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Catalogo\Model\Dao\IProductoDao;

class ControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $controller = null;
        switch ($requestedName) {
            case IndexController::class :
                $productoDao = $container->get(IProductoDao::class );
                $controller = new IndexController($productoDao);
                break;
            default:
                return (null === $options) ? new $requestedName : new $requestedName($options);
        }
        return $controller;
    }

}
