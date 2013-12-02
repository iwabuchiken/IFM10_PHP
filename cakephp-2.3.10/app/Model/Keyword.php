<?php
class Keyword extends AppModel {
    
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        )
    );
    
}