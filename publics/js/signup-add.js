// JavaScript Document
$(document).ready(function(e) {
	var ck;
	$("#name").focus();

	$("#signup-form").submit(function() {
		if($("#pass").val() != $('#cpass').val() ){
			alert("Password not matching Confirm password");
			$("#cpass").focus();
			ck =false;
		}
		else{
					ck =true;
		}
		
		return ck;
		
	});
	
});// JavaScript Document