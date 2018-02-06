// JavaScript Document
$(document).ready(function(e) {
	var ck;
	
    $("#add").click(function(){  
        $("#myTbl").append($("#firstTr").clone());  
	
    }); 
	 
    $("#rev").click(function(){  
        if($("#myTbl tr").size()>1){  
            $("#myTbl tr:last").remove();  
        }else{  
            jAlert('warning', 'Table 1 field', 'Warning Dialog');  
        }  
    }); 
	
	$("#equipment-form").submit( function(){
		if(!$.isNumeric( $("#comp-tel").val())){
			alert("Enter company tel is number!!");
			$("#comp-tel").focus();
			ck = false;
		}
		else if(!$.isNumeric( $("#comp-fax").val())){
			alert("Enter company Fax is number!!");
			$("#comp-fax").focus();
			ck = false;
		}
		else if(!$.isNumeric( $("#comp-sale-tel").val())){
			alert("Enter sales tel is number!!");
			$("#comp-sale-tel").focus();
			ck = false;
		}
		else if(!$.isNumeric( $("#comp-price").val())){
			alert("Enter price is number!!");
			$("#comp-price").focus();
			ck = false;
		}
		
		else
			ck=true;
			
			return ck;
	});
	
});