<?php

namespace Usuarios\Form;

use Zend\InputFilter\InputFilter;

/**
 * Description of ContactoValidator
 *
 * @author Andres
 */
class LoginValidator extends InputFilter {

    public function __construct() {

        $this->add(
                ['name' => 'email',
                    'validators' => [
                        [
                            'name' => 'EmailAddress',
                        ],
                    ],
        ]);

        $this->add(
                ['name' => 'password',
                    'filters' => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                    'validators' => [
                        [
                            'name' => 'StringLength',
                            'options' => [
                                'min' => 4,
                                'max' => 8,
                            ],
                        ],
                        [
                            'name' => 'Alnum',
                        ],
                    ],
        ]);
    }

}
