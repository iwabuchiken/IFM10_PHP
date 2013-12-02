<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Keyword');
echo $this->Form->input('name');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Keyword');
?>

<br>

<?php echo $this->Html->link(
    'List',
    array('controller' => 'keywords', 'action' => 'index')
); ?>
