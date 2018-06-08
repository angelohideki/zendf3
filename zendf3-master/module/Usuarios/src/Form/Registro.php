<?php

namespace Usuarios\Form;

use Zend\Form\Form;
use Zend\Form\Element;

/**
 * Description of Registro
 *
 * @author Andres
 */
class Registro extends Form {

    public function __construct($name = null) {
        parent::__construct($name);

        $this->add([
            'name' => 'id',
            'attributes' => [
                'type' => 'hidden',
            ],
        ]);

        $this->add([
            'name' => 'nombre',
            'type' => Element\Text::class,
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Nombre',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        $this->add([
            'name' => 'apellido',
            'type' => Element\Text::class,
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Apellido',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        $this->add(['type' => Element\Email::class,
            'name' => 'email',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Email',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        // Crear y configurar el elemento confirmarPassword:
        $this->add([
            'type' => Element\Password::class,
            'name' => 'confirmarPassword',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Confirmar Password',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        $this->add(['type' => Element\Password::class,
            'name' => 'password',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Password',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);


        $this->add(['name' => 'send',
            'attributes' => [
                'type' => 'submit',
                'value' => 'Crear',
                'class' => 'btn btn-primary',
            ],
        ]);
    }

}
