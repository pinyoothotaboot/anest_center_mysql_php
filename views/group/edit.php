<?php $ck = true; 
?>
<form id="group1" action="<?php echo URL;?>group/update/<?php echo $this->selectdatatable[8][0]['group_id'];?>" method="post">
<div id="group">
    	<div id="block">
        	<div id="logo">
            	<table width="100%">
                <br />
                	<tr></tr>
                	<tr></tr>
                	<tr>
                    	<td align="center"><a id="logo-label">Equipment Group Form</a></td>
                    </tr>
                </table>
                	
            </div>
            <div id="control">
            	<br />
            	<li id="control-input">
 <input type="text" id="group-input" name="group-input" value="<?php echo $this->selectdatatable[8][0]['group_name'];?>" required="required" /><br />
 
 <input type="number" id="group-maintanance" name="group-maintanance" value="<?php echo $this->selectdatatable[8][0]['group_maintanance'];?>"  required="required" /><br />
                    <input type="submit" class="btn" id="grp" name="grp"  />
                    
                </li>
                
            </div>
        	<div id="foot">
           
               
            </div>
        </div>
</div>
</form>
