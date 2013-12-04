<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Keyword');
//echo $this->Form->create('Post');
echo $this->Form->input('name');
//echo $this->Form->hidden('created');


echo $this->Form->end('Save keyword');
?>

<br>

<?php echo $this->Html->link(
    'List',
    array('controller' => 'keywords', 'action' => 'index')
); ?>
