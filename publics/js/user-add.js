// JavaScript Document
$(document).ready(function(e) {
	var ck;
	$("#name").focus();
	$("#user-form").submit(function() {
		if(!$.isNumeric( $("#tel").val())){
			alert(" Tel number is numeric");
			$("#tel").focus();
			ck =false;
		}
		else if($("#pass").val() != $('#cpass').val() ){
			alert("Password not matching Confirm password");
			$("#cpass").focus();
			ck =false;
		}
		else
			ck =true;
		
		
		return ck;
		
	});
	
});