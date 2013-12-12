<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Word</h1>

<?php
    echo $this->Form->create('Word');
    //echo $this->Form->create('Post');
    echo $this->Form->input('w1');
    //echo $this->Form->hidden('created');


    echo $this->Form->end('Save Word');
?>

<br>

<?php echo $this->Html->link(
    'List',
    array('controller' => 'words', 'action' => 'index')
); ?>
