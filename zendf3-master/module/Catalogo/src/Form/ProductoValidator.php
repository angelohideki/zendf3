<?php

namespace Catalogo\Form;

use Zend\InputFilter\InputFilter;

/**
 * Description of ContactoValidator
 *
 * @author Andres
 */
class ProductoValidator extends InputFilter {

    public function __construct() {

        $this->add([
            'name' => 'id',
            'filters' => [
                ['name' => 'Int'],
            ],
        ]);
        
        $this->add([
            'name' => 'categoria',
        ]);
        
        $this->add([
            'name' => 'descripcion',
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => 'Alnum',
                    'options' => [
                        'allowWhiteSpace' => true,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'precio',
            'validators' => [
                [
                    'name' => 'Int',
                ],
            ],
        ]);

        $this->add([
            'name' => 'cantidad',
            'validators' => [
                [
                    'name' => 'Int',
                ],
            ],
        ]);
    }

}
