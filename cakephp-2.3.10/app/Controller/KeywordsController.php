<?php
class KeywordsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
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
}