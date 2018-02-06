<?php $ck = true; 
?>
<form id="status1" action="<?php echo URL;?>status/update/<?php echo $this->selectdatatable[8][0]['status_id'];?>" method="post">
<div id="status">
    	<div id="block">
        	<div id="logo">
            	<table width="100%">
                <br />
                	<tr></tr>
                	<tr></tr>
                	<tr>
                    	<td align="center"><a id="logo-label">Equipment Status Form</a></td>
                    </tr>
                </table>
                	
            </div>
            <div id="control">
            	<br />
            	<li id="control-input">
 <input type="text" id="status-input" name="status-input" value="<?php echo $this->selectdatatable[8][0]['status_name'];?>" required="required" /><br />
                    <input type="submit" class="btn" id="sta" name="sta"  />
                    
                </li>
                
            </div>
        	<div id="foot">
           
               
            </div>
        </div>
</div>
</form>
