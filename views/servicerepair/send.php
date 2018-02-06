<?php $ck = true ;
	//print_r($this->selectdatatable);
 ?>
	<form id="servicerepair-form" name="servicerepair-form"  enctype="multipart/form-data" action="<?php echo URL."servicerepair/create/".$this->selectdatatable[8][0]['equipment_list_id'];?> " method="post">
    	<div id="servicerepair">
        	<div id="block">
            	<div id="logo">
                
                	<table width="100%">
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Repair form</a></td>
                        </tr>
                    </table>
                </div>
            	<div id="control">
                <br />
                	<li id="control-input">
                    
                    <fieldset class="general-record">
                    <legend>
            <img id="img" name="img" src="<?php echo URL."publics/images/equipment/".$this->selectdatatable[8][0]['equipment_pic_name'];;?>">
                        
                    </legend>
                    	<p>Sap     : <?php echo $this->selectdatatable[8][0]['equipment_list_sap'];?> </p>
                        <p>S/N     : <?php echo $this->selectdatatable[8][0]['equipment_list_sn'];?></p>
                        <p>Name    : <?php echo $this->selectdatatable[8][0]['equipment_gen_name'];?></p>
                        <p>Group   : <?php echo $this->selectdatatable[8][0]['group_name'];?></p>
                        <p>Address : <?php echo $this->selectdatatable[8][0]['address_name'];?></p>
                    	
                    
                    </fieldset>
                    <fieldset class="general-record">
                    <legend>Repair record</legend>
                    	<table width="100%" >
                        	<tr>
                            	<td >
                                <input type="date" id="date" name="date" required="required"  >
                                </td>
                            </tr>
                            <tr>
                            	<td >
                                <input type="text" class="box" id="social" name="social" placeholder="  Company" required="required" >
                                </td>
                            </tr>
                           
                            <tr>
                            	<td><textarea name="detail" required="required" class="box" id="detail" placeholder="  Detail" >
                                </textarea>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                            	<td><input type="file" id="pic" name="pic" class="box" required="required"></td>
                            </tr>
                            <tr>
                            	<td><input type="submit" id="save" name="save" value="Save" /></td>
                            </tr>
                        </table>
                    </li>
                    </fieldset>
                </div>
                <div id="foot"></div>
            </div>
		</div>
	</form>

