<?php
	@$article_line = $_GET['article_line'];
	
	if ($article_line == null) {
	
		header("Cotent-Type: text/html");
		
		echo "\$article_line => nil";
	
	} else {
	
		header("Cotent-Type: text/html");
		echo "\$article_line => $article_line";		
	}