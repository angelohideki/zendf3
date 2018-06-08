<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuarios\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Usuarios\Model\Dao\UsuarioDao;

class IndexController extends AbstractActionController {

    private $usuarioDao;
    
    private $config;

    public function __construct(UsuarioDao $usuarioDao, array $config) {
        $this->usuarioDao = $usuarioDao;
        $this->config = $config;
    }

    public function indexAction() {
        return $this->forward()->dispatch(IndexController::class, ['action' => 'listar']);
    }

    public function listarAction() {
        $layout = $this->layout();
        $layout->algunaVariable = "Hola, alguna variable para el layout";
        $layout->setTemplate('layout/layout_otro');
        
        return new ViewModel(['listaUsuario' => $this->usuarioDao->obtenerTodos(),
                    'titulo' => $this->config['parametros']['mvc']['usuario']['titulo']]);
    }

    public function verAction() {
        $id = (int) $this->params()->fromRoute("id", 0);

        $usuario = $this->usuarioDao->obtenerPorId($id);

        if (null === $usuario) {
            return $this->redirect()->toRoute('usuario', ['action' => 'listar']);
        }

        return new ViewModel(['usuario' => $usuario,
                    'titulo' => "Detalle usuario"]);
    }

}
