<?php $ck = true ; ?>
<form id="group1" name="group1" action="<?php echo URL;?>group/create" method="post">
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
                	<input type="text" id="group-input" name="group-input" placeholder="  Group name" required="required" /><br />
                    <input type="number" id="group-maintanance" name="group-maintanance" placeholder=" Number month of maintanance" required="required" /><br />
                    <input type="submit" class="btn" id="grp" value="Save" />
                    
                </li>
            </div>
        	<div id="foot">
           
               
            </div>
        </div>
</div>
</form>
