<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public function beforeFilter(){
		$this->Auth->allow('login','index');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
	}
	public $components = array('Paginator', 'RequestHandler');
	public $helpers= array('Js');
	
	
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
	
	}	
	
	
	public function logout(){
		$this->Auth->logout();
		$this->redirect('/users/login');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$id = AuthComponent::user('id');
		$this->Paginator->settings = array(
		'Message' => array(
		'conditions'=>array('OR' => array('Message.from_id'=> $id, 'Message.to_id'=>$id)),
		// 'conditions'=> array('Message.from_id'=>$id),
		'order' => array(
			'created' => 'asc'
		),
		'group' => 'conversation_id'
		)
	);
		$messages = $this->Paginator->paginate();

		// $messages = $this->Message->find('all', array(
		// 	'Message'=>array(
		// 	'conditions' => array('OR'=>array('Message.from_id'=> $id, 'Message.to_id'=>$id)),
		// 	'order'=> array('created'=>'asc'),
		// 	'group'=>'conversation_id'
		// 	)
		// ));
		$this->set('messages', $messages);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			$this->Message->create();
			$this->request->data['Message']['from_id'] = $this->Auth->user('id');
			$email = $this->request->data['Message']['to_id'];
			// var_dump($email);
			// die();
			$user = $this->Message->User_to->find('first', array(
					'conditions'=> array('email' => $email)
				));

			$id = $this->Message->find('first', array(
				'conditions' => array('conversation_id'),
				'order'=> array('conversation_id'=>'Desc')
			));
			// var_dump($email);
			// var_dump($user);
			// die();
			$this->request->data['Message']['to_id'] = $user['User_to']['id'];
			$newId = (int)$id['Message']['conversation_id']+1;
			$this->request->data['Message']['conversation_id'] = $newId;
			
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been sent.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		}
		$email = $this->Message->User->find('all');

		$this->set('email', $email);

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		// if (!$this->Message->exists($id)) {
		// 	throw new NotFoundException(__('Invalid message'));
		// }
		$this->request->allowMethod('post', 'delete');
			
		$cId = (int)$id;
		if ($this->Message->deleteAll(array('conversation_id' => $cId))) {
			$this->Session->setFlash(__('The message has been deleted.'));
		} else {
			$this->Session->setFlash(__('The message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'view'));
	}
/**
* view conversation method
* 
* @param string id of conversation_id
*
*
**/
	public function conversation($id){
		
		$conversation_id = (int)$id;
		$conversationList = $this->Message->find('all', array(
			'conditions'=> array('conversation_id'=> $conversation_id),
			'order'=> array('message.created'=>'asc'),
			// 'limit'=>5
		));
		if($this->request->is('post')){

		$rs = $this->Message->find('first', array(
				'fields' => array(
					'Message.to_id',
					'Message.from_id',
					'User_to.id',
					'User_from.id',
					'Message.conversation_id',
					'Message.created'
				),
				'conditions'=> array('conversation_id'=> $id),
				
			));
			
			
		if($rs['Message']['from_id'] == AuthComponent::user('id')){
			$this->request->data['Message']['from_id'] = AuthComponent::user('id');
			$this->request->data['Message']['to_id'] = $rs['Message']['to_id'];
		} else {
			$this->request->data['Message']['from_id'] = AuthComponent::user('id');
			$this->request->data['Message']['to_id'] = $rs['Message']['from_id'];
		}

		$this->request->data['Message']['conversation_id'] = $id;

		if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The reply has been sent.'));
				return $this->redirect(array('action' => 'conversation', $conversation_id));
		} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
		}
		}

		
		$this->set('conversationList', $conversationList);
		 //$this->render('conversation-ajax-response', 'ajax');
	}
}
