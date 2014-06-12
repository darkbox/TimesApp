<?php
App::uses('AppModel', 'Model');
/**
 * Invoice Model
 *
 * @property Project $Project
 * @property Line $Line
 * @property Payment $Payment
 */
class Invoice extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Invoice number already exists',
				),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	public function beforeSave($options = array()){
		// dates
		if(!empty($this->data['Project']['invoice_date'])){
			$init_date = explode('-', $this->data['Project']['invoice_date']);
			$this->data['Project']['due_date'] = $init_date[0] . '-' . $init_date[1] . '-' . $init_date[2];
		}
		if(!empty($this->data['Project']['due_date'])){
			$deadline = explode('-', $this->data['Project']['due_date']);
			$this->data['Project']['due_date'] = $deadline[0] . '-' . $deadline[1] . '-' . $deadline[2];
		}

		// billable
		if(!empty($this->data['Project']['display_country'])){
			if($this->data['Project']['display_country'] == 'on')
				$this->data['Project']['display_country'] = true;
			else
				$this->data['Project']['display_country'] = false;
		}
		return true;
	}


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Line' => array(
			'className' => 'Line',
			'foreignKey' => 'invoice_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Payment' => array(
			'className' => 'Payment',
			'foreignKey' => 'invoice_id',
			'dependent' => true,
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
