<?php
class WordsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    
	$this->set('words', $this->Word->find('all'));
	
        $data = "words";
	 
	 $this->set('data', $data);
    }
    
    public function add() {
	
        if ($this->request->is('post')) {
            $this->Word->create();
	    
	    //REF http://cakephp.jp/modules/newbb/viewtopic.php?topic_id=2624&forum=7
	    $this->request->data['Word']['created'] = date('Y-m-d H:i:s');
	    
            if ($this->Word->save($this->request->data)) {
                $this->Session->setFlash(__('Your word has been saved.'));
                return $this->redirect(array('controller' => 'words', 'action' => 'index'));
//                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
	    
        }//if ($this->request->is('post'))
	
    }//public function add()

    public function delete_all() {
	
	//REF http://book.cakephp.org/2.0/ja/core-libraries/helpers/html.html
	if ($this->Word->deleteAll(array('id >=' => 1))) {
	    $this->Session->setFlash(__('Words all deleted'));
	    return $this->redirect(array('action' => 'index'));
	} else {
	    
	    $this->Session->setFlash(__('Words not deleted'));
	    return $this->redirect(array('action' => 'index'));
	    
	}
	
    }

}