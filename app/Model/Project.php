<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 * @property Client $Client
 * @property Hour $Hour
 * @property Invoice $Invoice
 */
class Project extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'code';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique')
				),
		),
		'client_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function beforeSave($options = array()){
		// dates
		if(!empty($this->data['Project']['init_date'])){
			$init_date = explode('-', $this->data['Project']['init_date']);
			$this->data['Project']['init_date'] = $init_date[0] . '-' . $init_date[1] . '-' . $init_date[2];
		}
		if(!empty($this->data['Project']['deadline'])){
			$deadline = explode('-', $this->data['Project']['deadline']);
			$this->data['Project']['deadline'] = $deadline[0] . '-' . $deadline[1] . '-' . $deadline[2];
		}

		// billable
		if($this->data['Project']['billable'] == 'on')
			$this->data['Project']['billable'] = true;
		else
			$this->data['Project']['billable'] = false;
		return true;
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Hour' => array(
			'className' => 'Hour',
			'foreignKey' => 'project_id',
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
		'Invoice' => array(
			'className' => 'Invoice',
			'foreignKey' => 'project_id',
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

}
