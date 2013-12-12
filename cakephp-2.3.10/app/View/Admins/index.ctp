<h1>Admins</h1>

<table>
    <tr>
	<td>
	    <?php echo $this->Html->link('Words',
			array('controller' => 'words', 'action' => 'index')); ?>
	</td>
    </tr>

    <tr>
	<td>
	    <?php echo $this->Html->link('Keywords',
			array('controller' => 'keywords', 'action' => 'index')); ?>
	</td>
    </tr>
    
    <tr>
	<td>
	    <?php echo $this->Html->link('Log',
			array('controller' => 'admins', 'action' => 'show_log')); ?>
	</td>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

</table>