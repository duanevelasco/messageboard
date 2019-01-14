<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add', 'ty','index');
	}

	public function login(){
		if($this->request->is('post')){
			if($this->Auth->login()){
				$id = AuthComponent::user('id');
					if($this->User->findById($id)){
						$this->User->id = $id;
						$datetime = date("Y-m-d H:i:s");
					} $this->User->saveField('last_login_time', $datetime);
				return $this->redirect('index');	
			} else {
				$this->Session->setFlash('Incorrect email/password combination');
			}

		}
	}

	public function logout(){
		$this->Auth->logout();
		$this->redirect('login');
	}

	public function index(){
		$name = AuthComponent::user('name');
		$this->Session->write('name', $name);
		$id = (int)AuthComponent::user('id');
		$data = $this->User->findById($id);
		$this->set('data',$data);
	}

	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			// $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			$this->request->data['User']['created_ip'] = $this->request->clientIp();
			$this->request->data['User']['modified_ip'] = $this->request->clientIp();
			if ($this->User->save($this->request->data)) {
				$id = $this->request->data['User']['id'];
				$this->Session->write('id', $id);				
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'login'));
				// $this->set('data', $this->User->findById($id));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
		// var_dump($this->request->data['User']['hubby']);
		// die();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function fileupload() {
		// var_dump($this->request->data['Document']['submittedfile']['name']);
		// die();
		if(!empty($file = $this->request->data['Document']['submittedfile']['name'])){
			 $id = AuthComponent::user('id');
			 $file = $this->request->data['Document']['submittedfile'];
		      $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
		      $ary_ext=array('jpg','jpeg','gif','png');
		      $newName = date('Yhi') . '.' . $ext;
		     // $filepath = __($_SERVER['DOCUMENT_ROOT']) . DS . '/mboard/app/webroot/files/' . DS . $this->data['Document']['submittedfile']['name'];
		      $filename = $this->request->data['Document']['submittedfile']['tmp_name'];
		     // $filepath = WWW_ROOT . '/img' . $filename;
		    
		     //$this->pdfadd1->save($this->request->data);
		    if(in_array($ext, $ary_ext)){
		    	

			     move_uploaded_file($filename, WWW_ROOT  .'img'. DS . 'uploads' . DS . $newName); 
			     $this->request->data['Document']['submittedfile'] = $newName;
						if($this->User->findById($id)){
							$this->User->id = $id;
							$this->request->data['Document']['submittedfile'] = $newName;
							$this->User->saveField('image',$newName);
							$this->Session->setFlash(__('Image upload success'));
					        return $this->redirect(array('controller' => 'users','action' => 'index'));
						} 	else {
						unset($this->request->data['Document']['submittedFile']);
						$this->Session->setFlash('Image Upload Error');
							} 	
			}
		    
			
		}
	}

	public function profile($id){
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}
	public function ty(){
		$user = $this->User->findById($id);
$user = $user['User'];
$this->Auth->login($user);
	}
	
}

	
  

