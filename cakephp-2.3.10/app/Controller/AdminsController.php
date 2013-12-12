<?php
class AdminsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    
         $data = "Admins";
	 
	 $this->set('data', $data);
         
    }//public function index()

    public function show_log() {
    
	 $data = "Log";
	 
	 $this->set('data', $data);
         
    }//public function index()

}