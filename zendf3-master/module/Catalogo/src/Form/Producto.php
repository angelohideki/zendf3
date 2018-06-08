<?php

namespace Catalogo\Form;

use Zend\Form\Form;
use Zend\Form\Element;

/**
 * Description of Contacto
 *
 * @author Andres
 */
class Producto extends Form {

    public function __construct($name = null) {
        parent::__construct($name);

        $this->add([
            'name' => 'id',
            'type' => Element\Hidden::class,
        ]);

        $this->add([
            'type' => Element\Select::class,
            'name' => 'categoria',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Categoría',
                'empty_option' => 'Seleccione una categoria =>',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'descripcion',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Descripcion',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'precio',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Precio',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'cantidad',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Cantidad',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label',
                ],
            ],
        ]);

        $this->add([
            'name' => 'send',
            'type' => Element\Submit::class,
            'attributes' => [
                'value' => 'Crear',
                'class' => 'btn btn-primary',
            ],
        ]);
    }

}
