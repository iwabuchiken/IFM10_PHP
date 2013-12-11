<h1>CR6(R)</h1>

<?php 
    echo $this->Html->link(
	'Add Word',
	array('controller' => 'words', 'action' => 'add'));
    
    echo " | ";
    
    echo $this->Form->postLink(
                'Delete all',
                array('controller' => 'words', 'action' => 'delete_all'),
                array('confirm' => "Are you sure? => All data will be deleted"));

    echo " | ";
    
    echo $this->Html->link(
                'Admins',
                array('controller' => 'admins', 'action' => 'index'));
    ?>

<table>
    <tr>
        <th>Id</th>
        <th>w1</th>
        <th>w2</th>
        <th>w3</th>
        <th>Remote id</th>
        <th>Lang id</th>
        <th></th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

</table>