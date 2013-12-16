<?php
class CategoriesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    
//	$this->set('words', $this->Word->find('all'));
	$this->set('categories', $this->Category->find('all'));
	
        $data = "categories";
	 
	 $this->set('data', $data);
    }
    
    public function add() {
	
	if ($this->request->is('post')) {
            $this->Category->create();
	    
	    //REF http://cakephp.jp/modules/newbb/viewtopic.php?topic_id=2624&forum=7
	    $this->request->data['Category']['created'] = date('Y-m-d H:i:s');
	    $this->request->data['Category']['modified'] = date('Y-m-d H:i:s');
	    
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Your category has been saved.'));
                return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
//                return $this->redirect(array('controller' => 'category', 'action' => 'index'));
//                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your category.'));
        }
    }//public function add()

   public function delete_all() {
	
	//REF http://book.cakephp.org/2.0/ja/models/deleting-data.html
	//REF http://book.cakephp.org/2.0/ja/core-libraries/helpers/html.html
	if ($this->Category->deleteAll(array('id >=' => 1))) {
	    $this->Session->setFlash(__('Categories all deleted'));
	    return $this->redirect(array('action' => 'index'));
	} else {
	    
	    $this->Session->setFlash(__('Categories not deleted'));
	    return $this->redirect(array('action' => 'index'));
	    
	}
	
    }
 
}