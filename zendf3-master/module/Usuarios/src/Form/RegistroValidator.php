<?php

namespace Usuarios\Form;

use Zend\Validator\StringLength;
use Zend\InputFilter\InputFilter;

use Zend\InputFilter\Input;
use Zend\I18n\Validator\Alnum;
use Zend\Validator\Identical;

/**
 * Description of RegistroValidator
 *
 * @author Andres
 */
class RegistroValidator extends InputFilter {

    public function __construct() {

        $this->add(
                array(
                    'name' => 'nombre',
                    'validators' => array(
                        array(
                            'name' => 'Alnum',
                            'options' => array(
                                'allowWhiteSpace' => true,
                                'messages' => array(
                                    'notAlnum' => "El valor no es alfanúmerico",
                                )
                            ),
                        ),
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'apellido',
                    'validators' => array(
                        array(
                            'name' => 'Alnum',
                            'options' => array(
                                'allowWhiteSpace' => true,
                                'messages' => array(
                                    'notAlnum' => "El valor no es alfanúmerico",
                                )
                            )
                        ),
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'email',
                    'validators' => array(
                        array(
                            'name' => 'EmailAddress',
                        ),
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'password',
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => 4,
                                'max' => 8,
                                'messages' => array(
                                    StringLength::TOO_SHORT => "El campo debe tener tener al menos 4 caracteres",
                                    StringLength::TOO_LONG => "El campo debe tener un máximo de 8 caracteres",
                                )
                            )
                        ),
                        array(
                            'name' => 'Alnum',
                            'options' => array(
                                'messages' => array(
                                    'notAlnum' => "El valor no es alfanúmerico",
                                )
                            ),
                        ),
                    ),
                )
        );

        $confirmarPassword = new Input('confirmarPassword');
        $confirmarPassword->setRequired(true);
        $confirmarPassword->getValidatorChain()
                ->addValidator(new StringLength(array(
                    'min' => 4,
                    'max' => 8,
                    'messages' => array(
                        StringLength::TOO_SHORT => "El campo debe tener tener al menos 4 caracteres",
                        StringLength::TOO_LONG => "El campo debe tener un máximo de 8 caracteres",
                    )
                )))
                ->addValidator(new Alnum(array(
                    'messages' => array(
                        'notAlnum' => "El valor no es alfanúmerico",
                    )
                )))
                ->addValidator(new Identical(
                        array(
                    'token' => 'password',
                    'messages' => array(
                        'notSame' => "Las contraseñas no coinciden, por favor intente de nuevo",
                    ),
                        )
        ));

        $this->add($confirmarPassword);
    }

}
