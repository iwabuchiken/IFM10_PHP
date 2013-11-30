<p><?php echo "list" ?></p>

<p><?php echo "keywords => ".count($keywords); ?></p>
<p><?php echo "keywords => ".$keywords[0]['Keyword']['name']; ?></p>

<table border="1">
	<?php
		for($i = 0; $i < count($keywords); $i ++) {
			echo "<tr>";
				echo "<td width='10'>".$keywords[$i]['Keyword']['id']."</td>";
				echo "<td>".$keywords[$i]['Keyword']['name']."</td>";
			echo "</tr>";
		}

	?>
</table>

data => <?php echo $data ?>