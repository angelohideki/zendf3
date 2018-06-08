<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuarios;

use Zend\Mvc\MvcEvent;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Factory\InvokableFactory;

use Usuarios\Model\Dao\UsuarioDao;
use Usuarios\Model\Login;
use Application\Controller\IndexController as HomeController;
use Application\Controller\ContactoController;

class Module {

    public function onBootstrap($e) {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, [$this, 'initAuth'], 100);
    }

    public function initAuth(MvcEvent $e) {
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $auth = $serviceManager->get(Login::class);

        // Asignamos el objeto auth al layout
        $layout = $e->getViewModel();
        $layout->auth = $auth;

        $matches = $e->getRouteMatch();
        $controllerName = $matches->getParam('controller');
        $action = $matches->getParam('action');

        switch ($controllerName) {
            case Controller\LoginController::class:
                if (in_array($action, ['index', 'autenticar'])) {
                    // Validamos cuando el controlador sea Login
                    // exepto las acciones index y autenticar.
                    return;
                }
                break;
            case HomeController::class:
                if (in_array($action, ['index'])) {
                    // Validamos cuando el controlador sea Index (Home)
                    // exepto las acciones index.
                    return;
                }
                break;
            case ContactoController::class:
                if (in_array($action, ['index', 'form', 'resultado'])) {
                    // Validamos cuando el controlador sea Contacto
                    // exepto las acciones index, form y resultado.
                    return;
                }
                break;
        }

        if (!$auth->isLoggedIn()) {
            // No existe Session, redirigimos al login.
            $matches->setParam('controller', Controller\LoginController::class);
            $matches->setParam('action', 'index');
        }
    }

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig() {
        return [
            'factories' => [
                AuthenticationService::class => InvokableFactory::class,
                Login::class => function ($sm) {
                    $dbAdapter = $sm->get(AdapterInterface::class);
                    $authService = $sm->get(AuthenticationService::class);
                    return new Login($dbAdapter, $authService);
                },
                UsuarioDao::class => function($sm) {
                    return new UsuarioDao();
                },
            ],
            'aliases' => [
                'auth_service' => AuthenticationService::class,
            ],
        ];
    }

}
