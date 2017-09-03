<?php
class Persona extends AppModel {

	var $name = 'Persona';
    //var $displayField = 'apellido';
	public $virtualFields = array('nombre_completo_persona'=> 'CONCAT(Persona.nombres, " ", Persona.apellidos)');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

  var $hasMany = array(
    'Familiar' => array(
      'className' => 'Familiar',
      'foreignKey' => 'persona_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    ),
    'Alumno' => array(
      'className' => 'Alumno',
      'foreignKey' => 'persona_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    )
  );

  //Validaciones
        var $validate = array(
            'created' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Indicar una fecha y hora.'
                )
            ),
            'nombres' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Indicar los nombres.'
                ),
                'alphaBet' => array(
                'rule' => '/^[ a-zA-ZñÑ]{3,}$/i',
                'message' => 'Sólo letras, mínimo tres caracteres'
                ),
            ),
            'apellidos' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Indicar los apellidos.'
                ),
                'alphaBet' => array(
                'rule' => '/^[ a-zA-ZñÑ]{3,}$/i',
                'message' => 'Sólo letras, mínimo tres caracteres'
                ),
            ),
            'sexo' => array(
                'required' => array(
                'rule' => array('inList', array('FEMENINO', 'MASCULINO')),
                'required' => true,
                'message' => 'Indicar sexo.'
                )
            ),
            'documento_tipo' => array(
                'required' => array(
                'rule' => array('inList', array('DNI','CI','LC','LE','Cédula Mercosur','Pasaporte extranjero','Cédula de identidad extranjera','Otro documento extranjero','No posee', 'En trámite')),
                'required' => true,
                'message' => 'Indicar un tipo de documento.'
                )
            ),
            'documento_nro' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Indicar un nº de documento.'
                ),
                'numeric' => array(
                  'rule' => 'naturalNumber',
                  'message' => 'Indicar número sin puntos ni comas ni espacios.'
                ),
                'isUnique' => array(
                  'rule' => 'isUnique',
                  'message' => 'Este documento de alumno esta siendo usado.'
                )
            ),
            'fecha_nac' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Indicar una fecha de nacimiento.'
                ),
             'date' => array(
                'rule' => array('date'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
              )
            ),
            'edad' => array(
                'numeric' => array(
                'rule' => 'naturalNumber',
                'required' => true,
                'message' => 'Indicar número sin puntos ni comas ni espacios.'
                )
            ),
            'pcia_nac' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Indicar una provincia.'
                ),
                'alphaBet' => array(
                'rule' => '/^[ a-zA-ZñÑ]{3,}$/i',
                'message' => 'Sólo letras, mínimo tres caracteres'
                ),
            ),
            'nacionalidad' => array(
                'required' => array(
                'rule' =>  array('inList', array('Argentino', 'Boliviana', 'Brasileña', 'Chilena', 'Colombiana','Ecuatoriana','Guyanesa','Paraguaya','Peruana','Surinamesa','Uruguaya','Venezolana','Beliceña',
			         'Costarricense','Guatemalteca','Hondureña','Nicaragüense','Salvadoreña','Canadiense','Estadounidense','Mexicana','Cubana','Arubana','Bahameña','Barbadense','Dominiquesa',
			         'Dominicana','Haitiana','Jamaiquina','Puertorriqueña','Sancristobaleña','Santaluciana','Sanvicentina','Albanesa','Alemana','Andorrana','Armenia','Austríaca','Belga','Bielorrusa',
			         'Bosnia','Búlgara','Checa','Chipriota','Croata','Danesa','Escocesa','Eslovaca','Hindú','Eslovena','Española','Estonia','Finlandesa','Francesa','Griega','Holandesa','Húngara',
			         'Británica','Irlandesa','Italiana','Letona','Lituana','Luxemburguesa','Maltesa','Moldava','Monegasca','Montenegrina','Noruega','Luxemburguesa','Portuguesa','Rumana','Rusa',
			         'Serbia','Sueca','Suiza','Turca','Ucraniana','Australiana','Neozelandesa','Afgana','Azerbaiyana','Bangladesí','Bareiní','China','Liberiana','Emiratí','Filipina','Georgiana',
			         'Hindú','Indonesia','Israelí','Japonesa','Libanesa','Mongola','Norcoreana','Hindú','Siria','Surcoreana','Vietnamita','Argelina','Camerunesa','Etíope','Ecuatoguineana','Egipcia',
			         'Libia','Marroquí','Namibia','Nigeriana','Saharaui','Senegalesa','Sudafricana','Togolesa')),
                'required' => true,
                'message' => 'Indicar una nacionalidad.'
                )
            ),
            /*
            'indigena' => array(
            ),
            */
            'estado_civil' => array(
                'required' => array(
                'rule' => array('inList', array('Soltero','Casado','Viudo','Divorciado','Concubinato','Unión civil')),
                'required' => true,
                'message' => 'Indicar un estado civil.'
                )
            ),
            'ocupacion' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => 'create',
                'message' => 'Indicar una ocupación.'
                ),
                'alphaBet' => array(
                'rule' => '/^[ a-zA-ZñÑ]{3,}$/i',
                'message' => 'Sólo letras, mínimo tres caracteres'
                )
            ),
            'lugar_de_trabajo' => array(
                'alphaBet' => array(
                'rule' => '/^[ a-zA-ZñÑ]{3,}$/i',
                'required' => false,
                'message' => 'Sólo letras, mínimo tres caracteres'
                )
            ),
            'horario_de_trabajo' => array(
                'required' => array(
                'rule' => array('inList', array('mañana','mañana y tarde','tarde','tarde y noche','noche', 'noche y mañana')),
                'required' => false,
                'message' => 'Indicar un horario de trabajo.'
                )
            ),
            'agente' => array(
                'required' => array(
                'rule' => array('boolean'),
                'message' => 'Valor incorrecto para el Checkbox'
               )
            ),
            'alumno' => array(
                'required' => array(
                'rule' => array('boolean'),
                'message' => 'Valor incorrecto para el Checkbox'
               )
            ),
            'familiar' => array(
                'required' => array(
                'rule' => array('boolean'),
                'message' => 'Valor incorrecto para el Checkbox'
               )
            ),
            'telefono_nro' => array(
                'numeric' => array(
                'rule' => 'naturalNumber',
                'required' => true,
                'message' => 'Indicar un número de teléfono (sólo números, sin puntos, ni comas, ni guiones, ni espacios).'
                )
            ),
            'email' => array(
                'email' => array(
                'rule' => array('email', true),
                'required' => false,
                'message' => 'Indicar un correo electrónico válido.'
                )
            ),
            'calle_nombre' => array(
                'required' => array(
                'rule' => 'notBlank',
                'required' => 'create',
                'message' => 'Indicar un nombre de calle.'
                ),
                'alphaBet' => array(
                'rule' => '/^[ a-zA-ZñÑ]{3,}$/i',
                'message' => 'Sólo letras, mínimo tres caracteres'
                )
            ),
            'calle_nro' => array(
                'numeric' => array(
                'rule' => 'naturalNumber',
                'required' => true,
                'message' => 'Indicar un número de calle (sólo números, sin puntos, ni comas, ni guiones, ni espacios).'
                )
            )
        );
    }
?>
