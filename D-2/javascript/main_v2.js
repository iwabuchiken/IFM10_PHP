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
//	    $("#js").append(data);
	    $("#js").prepend(data);
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

function page_reload() {
	
	//REF http://www5e.biglobe.ne.jp/access_r/hp/javascript/js_091.html
	window.location.reload();
	
}

function change_sweets(name) {
	
	alert('The option with value => ' + name);
}

$(document).ready(function(){
    
//	alert("Ready");
	
//	//REF http://api.jquery.com/on/
//	var name = $(this).val());
//	var name = $("select").val();
//	$("select").on('change', change_sweets(name));
	
	//REF http://stackoverflow.com/questions/11216192/html-select-jquery-change-not-working answered Jun 26 '12 at 21:29
	$("select").on('change', function() {
		alert('The option with value ' + $(this).val());
		$("div#sweets").text("Selected => " + str);
//		$("div#sweets").html("Selected => " + str);
	});
	
//	$("select").on('change', {name: $(this).val()}, function() {
//	    alert('The option with value ' + name);
//		$("div#sweets").text("Selected => " + str);
////		$("div#sweets").html("Selected => " + str);
//	});
		//=> Not working
	
	
	
//    $("select").change(function () {
//    	var select = $("select");
////    	$("select#selected_item").change(function () {
////    		var select = $("select#selected_item");
//    	
//        var str = select.options[select.selectedIndex].value;
////          $("select#selected_item").each(function () {
////                str += $(this).text() + " ";
////              });
////          $("div").text(str);
////          alert("Selected => " + str);
//          $("div#sweets").text("Selected => " + str);
//        });
//		})
//        .change();

});//$(document).ready(function(){

// REF Fit the field size to the content http://stackoverflow.com/questions/6819548/onload-fit-input-size-to-length-of-text T.J. Crowder
