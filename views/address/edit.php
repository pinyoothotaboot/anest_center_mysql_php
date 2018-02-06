<?php $ck = true; 
?>
<form id="address1" action="<?php echo URL;?>address/update/<?php echo $this->selectdatatable[8][0]['address_id'];?>" method="post">
<div id="address">
    	<div id="block">
        	<div id="logo">
            	<table width="100%">
                <br />
                	<tr></tr>
                	<tr></tr>
                	<tr>
                    	<td align="center"><a id="logo-label">Equipment Address Form</a></td>
                    </tr>
                </table>
                	
            </div>
            <div id="control">
            	<br />
            	<li id="control-input">
 <input type="text" id="address-input" name="address-input" value="<?php echo $this->selectdatatable[8][0]['address_name'];?>" required="required" /><br />
                    <input type="submit" class="btn" id="addr" name="addr"  />
                    
                </li>
                
            </div>
        	<div id="foot">
           
               
            </div>
        </div>
</div>
</form>
