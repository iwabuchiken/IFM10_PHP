<h1>Blog posts(Total=<?php echo count($keywords)?>)</h1>

<?php 
    echo $this->Html->link(
	'Add Post',
	array('controller' => 'keywords', 'action' => 'add'));
    
    echo " | ";
    
    echo $this->Form->postLink(
                'Delete all',
                array('controller' => 'keywords', 'action' => 'delete_all'),
                array('confirm' => "Are you sure? => All data will be deleted"));
    
    echo " | ";
    
    echo $this->Html->link(
                'Admins',
                array('controller' => 'admins', 'action' => 'index'));

?>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Genre</th>
        <th>Category</th>
        <th>Remote id</th>
        <th>Created</th>
        <th></th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($keywords as $kw): ?>
    <tr>
        <td><?php echo $kw['Keyword']['id']; ?></td>
        <td>
            <?php echo $this->Html->link(
//                        mb_convert_encoding($kw['Keyword']['name'], "utf-8", "sjis"),
			$kw['Keyword']['name'],
                        array(
                            'controller' => 'keywords',
                            'action' => 'view', $kw['Keyword']['id'])); ?>
        </td>
	
        <td>
            <?php echo $kw['Keyword']['genre_id']; ?>
        </td>
	
        <td>
            <?php echo $kw['Keyword']['category_id']; ?>
        </td>
	
        <td>
            <?php echo $kw['Keyword']['remote_id']; ?>
        </td>
	
        <td><?php echo $kw['Keyword']['created']; ?></td>
        <td>
	    <?php echo $this->Html->link('Edit',
			array('action' => 'edit', $kw['Keyword']['id'])); ?>
	</td>
	
	<td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $kw['Keyword']['id']),
                array('confirm' => "Are you sure? => ".$kw['Keyword']['name']));
            ?>
        </td>
	
    </tr>
    <?php endforeach; ?>
    <?php unset($kw); ?>
</table>