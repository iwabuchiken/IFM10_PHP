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
        <th>created_at_mill</th>
        <th>updated_at_mill</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach ($words as $w): ?>
    <tr>
        <td><?php echo $w['Word']['id']; ?></td>
	
        <td>
            <?php echo $w['Word']['w1']; ?>
        </td>
	
        <td>
            <?php echo $w['Word']['w2']; ?>
        </td>
	
        <td>
            <?php echo $w['Word']['w3']; ?>
        </td>
	
        <td><?php echo $w['Word']['remote_id']; ?></td>
	
        <td><?php echo $w['Word']['lang_id']; ?></td>
	
        <td><?php echo $w['Word']['created_at_mill']; ?></td>
	
        <td><?php echo $w['Word']['updated_at_mill']; ?></td>
	
	<td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $w['Word']['id']),
                array('confirm' => "Are you sure? => ".$w['Word']['w1']));
            ?>
        </td>
	
    </tr>
    <?php endforeach; ?>
    <?php unset($w); ?>
    <!-- Here is where we loop through our $posts array, printing out post info -->

</table>