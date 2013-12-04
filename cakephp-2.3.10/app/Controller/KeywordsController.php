<?php
class KeywordsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {;;
    
         $this->set('keywords', $this->Keyword->find('all'));
//          $this->set('posts', $this->Post->find('all'));

         @$data = $_GET['data'];
         
         if ($data != null) {
         
         	$this->set('data', $data);;
         
         } else {
         
         	$this->set('data', null);;
         	
         }
         
         
    }

    public function view($id = null) {
//         if (!$id) {
//             throw new NotFoundException(__('Invalid post'));
//         }

//         $keyword = $this->Post->findById($id);
//         if (!$keyword) {
//             throw new NotFoundException(__('Invalid keyword'));
//         }
    	$keyword = $this->Keyword->findById(1);
        $this->set('msg', 'HELLO');
        $this->set('keyword', $keyword);
//         $this->set('keyword', $keyword);
        
        
        
//         $post = $this->Post->findById($id);
//         if (!$post) {
//             throw new NotFoundException(__('Invalid post'));
//         }
//         $this->set('post', $post);
    }

    public function add() {
	
        if ($this->request->is('post')) {
            $this->Keyword->create();
	    
	    //REF http://cakephp.jp/modules/newbb/viewtopic.php?topic_id=2624&forum=7
	    $this->request->data['Keyword']['created'] = date('Y-m-d H:i:s');
	    
            if ($this->Keyword->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('controller' => 'keywords', 'action' => 'index'));
//                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }
 
    public function edit($id = null) {
	if (!$id) {
	    throw new NotFoundException(__('Invalid post'));
	}

	$keyword = $this->Keyword->findById($id);
	if (!$keyword) {
	    throw new NotFoundException(__('Invalid keyword'));
	}

	if ($this->request->is(array('keyword', 'put'))) {
	    $this->Keyword->id = $id;
	    if ($this->Keyword->save($this->request->data)) {
		$this->Session->setFlash(__('Your keyword has been updated.'));
		return $this->redirect(array('action' => 'index'));
	    }
	    $this->Session->setFlash(__('Unable to update your keyword.'));
	} else {
	    
	    $this->Session->setFlash(__("Sorry. \$this->request->is(array('keyword', 'put')) => Not true"));
	    
	}

	if (!$this->request->data) {
	    $this->request->data = $keyword;;
	}
    }

    public function delete($id) {
	if ($this->request->is('get')) {
	    throw new MethodNotAllowedException();
	}

	if ($this->Keyword->delete($id)) {
	    $this->Session->setFlash(__('The keyword with id: %s has been deleted.', h($id)));
	    return $this->redirect(array('action' => 'index'));
	}
    }
    
    public function delete_all() {
	
//	if ($this->request->is('get')) {
//	    throw new MethodNotAllowedException();
//	}

	if ($this->Keyword->deleteAll(array('id >=' => 1))) {
	    $this->Session->setFlash(__('Keywords all deleted'));
	    return $this->redirect(array('action' => 'index'));
	} else {
	    
	    $this->Session->setFlash(__('Keywords not deleted'));
	    return $this->redirect(array('action' => 'index'));
	    
	}
	
    }
    
}