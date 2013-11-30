<p><?php echo $msg ?></p>
<p><?php echo count(array_keys($keyword)) ?></p>
<p><?php echo array_keys($keyword)[0] ?></p>
<p><?php echo $keyword['Keyword'] ?></p>
count($keyword['Keyword']) =>
		<p><?php echo count($keyword['Keyword']) ?></p>
		
gettype($keyword['Keyword'])
	=>
		<p><?php echo gettype($keyword['Keyword']) ?></p>
		
count($keyword['Keyword'])
	=>
		<p><?php echo count($keyword['Keyword']) ?></p>
	
count(array_keys($keyword['Keyword']))
	=>
		<p><?php echo 
				count(array_keys($keyword['Keyword']))
			?></p>
	
$keyword['Keyword']['name']
	=>
		<p><?php echo 
				$keyword['Keyword']['name']
			?></p>
	
		