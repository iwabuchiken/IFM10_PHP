<?php
class Word extends AppModel {
    
    public $validate = array(
	//REF http://oneday.ter.jp/php/cakephp-php/927.html
        'w1' => array(
            array(
		   'rule' => 'notEmpty',
		    'message' => 'Input a name'
	    ),
	    array(
		'rule' => 'isUnique',
		'message' => 'The name already exists'
	    )
	    
        )//'name' => array(
    );
    
}

