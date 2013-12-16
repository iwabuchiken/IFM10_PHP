<h1>NR4::Categories</h1>

<?php
    echo $this->Html->link(
                'Add',
                array('controller' => 'categories', 'action' => 'add'));
    
    echo " | ";
    
    echo $this->Form->postLink(
                'Delete all',
                array('controller' => 'categories', 'action' => 'delete_all'),
                array('confirm' => "Are you sure? => All data will be deleted"));

    echo " | ";
    
    echo $this->Html->link(
                'Admins',
                array('controller' => 'admins', 'action' => 'index'));
    
?>

<table>
    <tr>
        <th>Id</th>
        <th>name</th>

	<th>Genre id</th>
        <th>Remote id</th>
        
        <th>created_at</th>
        <th>updated_at</th>
	
        <th>created</th>
        <th>updated</th>
    </tr>

    <?php foreach ($categories as $c): ?>
    <tr>
        <td><?php echo $c['Category']['id']; ?></td>
	
        <td>
            <?php echo $c['Category']['name']; ?>
        </td>
	
        <td>
            <?php echo $c['Category']['genre_id']; ?>
        </td>
	
        <td>
            <?php echo $c['Category']['remote_id']; ?>
        </td>
	
        <td><?php echo $c['Category']['created_at']; ?></td>
	
        <td><?php echo $c['Category']['updated_at']; ?></td>
	
        <td><?php echo $c['Category']['created']; ?></td>
	
        <td><?php echo $c['Category']['modified']; ?></td>
	
	<td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $c['Category']['id']),
                array('confirm' => "Are you sure? => ".$c['Category']['name']));
            ?>
        </td>
	
    </tr>
    <?php endforeach; ?>
    <?php unset($c); ?>
    <!-- Here is where we loop through our $posts array, printing out post info -->

</table>
