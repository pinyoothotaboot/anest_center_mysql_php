// JavaScript Document
// JavaScript Document
$(document).ready(function(e) {
	var ck;
	$("#group-input").focus();

	$("#group1").submit(function() {
		if(!$.isNumeric($('#group-maintanance').val())){
			alert("Number month is not numeric");
			$("#group-maintanance").focus();
			ck =false;
		}
		else{
					ck =true;
		}
		
		return ck;
		
	});
	
});// JavaScript Document