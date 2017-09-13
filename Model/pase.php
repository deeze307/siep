<?php
class Pase extends AppModel {
	var $name = 'Pase';
	public $displayField = 'id';
	//public $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Alumno' => array(
			'className' => 'Alumno',
			'foreignKey' => 'alumno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	//Validaciones
                var $validate = array(
                    'created' => array(
                        'required' => array(
						'rule' => 'notBlank',
                        'required' => 'create',
						'message' => 'Indicar una fecha y hora.'
                        )
                    ),
                    'alumno_id' => array(
                        'required' => array(
					    'rule' => 'notBlank',
                        'required' => 'create',
						'message' => 'Indicar un alumno.'
						),
						'numeric' => array(
	 					'rule' => 'naturalNumber',
	 					'message' => 'Indicar un alumno válido.'
	 					)
                    ),
                    'centro_id_origen' => array(
                        'required' => array(
					    'rule' => 'notBlank',
                        'required' => 'create',
						'message' => 'Indicar un centro.'
						),
						'numeric' => array(
	 					'rule' => 'naturalNumber',
	 					'message' => 'Indicar un centro válido.'
	 					)
                    ),
                    'centro_id_destino' => array(
                        'required' => array(
					    'rule' => 'notBlank',
                        'required' => 'create',
						'message' => 'Indicar un centro.'
						),
						'numeric' => array(
	 					'rule' => 'naturalNumber',
	 					'message' => 'Indicar un centro válido.'
	 					)
                    ),
				    'tipo' => array(
                        'required' => array(
						'rule' => 'notBlank',
                        'required' => 'create',
						'message' => 'Indicar un tipo de pase.'
						 ),
						'alphaBet' => array(
		 				'rule' => '/^[ áÁéÉíÍóÓúÚa-zA-ZñÑ]{5,}$/i',
		 				)
                    ),
                    'motivo' => array(
                        'minLength' => array(
                        'rule' => array('minLength', 3),
                        'allowEmpty' => true,
                        'message' => 'Indicar una opción.'
						),
						'alphaBet' => array(
 						'rule' => '/^[ áÁéÉíÍóÓúÚa-zA-ZñÑ]{3,}$/i',
 						)
                    ),
                    'nota_tutor' => array(
                           'boolean' => array(
                           'rule' => array('boolean'),
                           'allowEmpty' => true,
					       'message' => 'Indicar una opción'
				           )
                    ),
                    'usuario_id' => array(
                        'required' => array(
						'rule' => 'notBlank',
                        'required' => 'create',
						'message' => 'Indicar un nº de legajo.'
                        ),
						'isUnique' => array(
	                    'rule' => 'isUnique',
	                    'message' => 'Indicar un usuario.'
	                    )
                    )				   
         );
}
?>