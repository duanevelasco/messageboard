<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 * @property To $To
 * @property From $From
 */
class Message extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'to_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'from_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User_from' => array(
			'className' => 'User',
			'foreignKey' => 'from_id'
			// 'conditions' => '',
			// 'fields' => '',
			// 'order' => ''
		),
		'User_to' => array(
			'className' => 'User',
			'foreignKey' => 'to_id'
			// 'conditions' => '',
			// 'fields' => '',
			// 'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'id'
			// 'conditions' => '',
			// 'fields' => '',
			// 'order' => ''
		),
	);
}
