function show_msg() {
	
	alert("HI");
	
}

function set_msg() {
	
//	show_msg();
	
//	$("#js").load("main.php");
//	$("#js").html("ABCDE");
//	$("#time_label").html("ABCDE");	//=> Nothing shown
//	$("#js").html("<input id='timecal_full' " +
//					"name='date_only_label' " +
//					"onmouseover='this.select()' " +
//					"size='20' " +
//					"type='text' " +
//					"value='<?php echo date('H:i:s'); ?>' " +
//					"/>");
	

	$.ajax({
		
	    url: "./utils/main.php",
	    type: "GET",
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
//	    $("#js").html(data);
	    $("#js").append(data);
//	    $("#js").append("<br/>");
	    
	    
	}).fail(function(xhr, status, error) {
		
	    $("#js").append("xhr.status = " + xhr.status + "<br>");          // 例: 404
	    
	});
	
}//function set_msg() {

function clear_msg() {
	
//	target = $("#js").get(0);
	
//	http://semooh.jp/jquery/api/internals/jQuery.removeData/elem/src-1/
//	jQuery.removeData(target);	//=> Not working
	
//	target = $("#js");
//	target.remove();
	targets = $(".time_label");
	targets.remove();
	
}//function clear_msg() {
