<?php $ck = true; 
?>
<form id="position1" action="<?php echo URL;?>position/update/<?php echo $this->selectdatatable[8][0]['position_id'];?>" method="post">
<div id="position">
    	<div id="block">
        	<div id="logo">
            	<table width="100%">
                <br />
                	<tr></tr>
                	<tr></tr>
                	<tr>
                    	<td align="center"><a id="logo-label">Position Form</a></td>
                    </tr>
                </table>
                	
            </div>
            <div id="control">
            	<br />
            	<li id="control-input">
 <input type="text" id="position-input" name="position-input" value="<?php echo $this->selectdatatable[8][0]['position_name'];?>" required="required" /><br />
                    <input type="submit" class="btn" id="pos" name="pos"  />
                    
                </li>
                
            </div>
        	<div id="foot">
           
               
            </div>
        </div>
</div>
</form>
