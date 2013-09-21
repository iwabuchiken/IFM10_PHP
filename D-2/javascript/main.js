function show_msg() {
	
	alert("HI");
	
}

function set_msg() {
	
//	http://www.tohoho-web.com/js/jquery/ajax.htm
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
	
	targets = $(".time_label");
	
//	http://semooh.jp/jquery/api/manipulation/remove/%5Bexpr%5D/
	targets.remove();
	
}//function clear_msg() {

// REF Fit the field size to the content http://stackoverflow.com/questions/6819548/onload-fit-input-size-to-length-of-text T.J. Crowder
