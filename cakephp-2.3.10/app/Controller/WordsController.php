<?php
class WordsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    
         $data = "words";
	 
	 $this->set('data', $data);
    }
    
}