<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Category</h1>

<?php
    echo $this->Form->create('Category',
		    array(
			//REF number http://stackoverflow.com/questions/8361856/cakephp-input-type-number
			'type'	=> 'number',
			//REF width http://stackoverflow.com/questions/973637/how-do-i-set-the-width-of-a-text-box-in-cakephp-using-the-style-option answered Jun 10 '09 at 4:10
			'style'	=> 'width: 210px'));
    
    //echo $this->Form->create('Post');
    echo $this->Form->input('name',
		    array(
			'onmouseover'	=> "focus()",
			//REF class http://greenday.sakura.ne.jp/cakememo/2012/04/25/cakephp2-0-this-form-input%E4%BD%BF%E3%81%84%E6%96%B9%E4%BE%8B/
			'class'		=> 'focus'
		    ));
    echo $this->Form->input('genre_id',
		    array(
			'type'	=> 'number',
			'style'	=> 'width: 60px'));
    
    echo $this->Form->input('remote_id',
		    array(
			'type'	=> 'number',
			'style'	=> 'width: 60px'));
    
//    echo $this->Form->input('genre_id');
    //echo $this->Form->hidden('created');


    echo $this->Form->end('Save Category');
?>

<br>

<?php echo $this->Html->link(
    'List',
    array('controller' => 'categories', 'action' => 'index')
); ?>
