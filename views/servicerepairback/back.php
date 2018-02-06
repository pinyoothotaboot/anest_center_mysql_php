<?php $ck = true ;
	//print_r($this->selectdatatable);
 ?>
	<form id="servicerepair-form" name="servicerepair-form"  enctype="multipart/form-data" action="<?php echo URL."servicerepairback/create/".$this->selectdatatable[8][0]['repair_id'];?> " method="post">
    	<div id="servicerepairback">
        	<div id="block">
            	<div id="logo">
                
                	<table width="100%">
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Back form</a></td>
                        </tr>
                    </table>
                </div>
            	<div id="control">
                <br />
                	<li id="control-input">
                    
                    <fieldset class="general-record">
                    <legend>
            <img id="img" name="img" src="<?php echo URL."publics/images/repair/".$this->selectdatatable[8][0]['repair_pic_name'];;?>">
                        
                    </legend>
                    	<p>Sap     : <?php echo $this->selectdatatable[8][0]['equipment_list_sap'];?> </p>
                        <p>S/N     : <?php echo $this->selectdatatable[8][0]['equipment_list_sn'];?></p>
                        <p>Name    : <?php echo $this->selectdatatable[8][0]['equipment_gen_name'];?></p>
                        <p>Group   : <?php echo $this->selectdatatable[8][0]['group_name'];?></p>
                        <p>Address : <?php echo $this->selectdatatable[8][0]['address_name'];?></p>
                    	 <p>detail to send : <?php echo $this->selectdatatable[8][0]['repair_about_send'];?></p>
                    <input type="hidden" id="id" name="id" value="<?php echo $this->selectdatatable[8][0]['equipment_list_id'];?>" />
                    </fieldset>
                    <fieldset class="general-record">
                    <legend>Back record</legend>
                    	<table width="100%" >
                        	<tr>
                            	<td >
                                <input type="date" id="date" name="date" required="required"  >&nbsp;Date back
                                </td>
                            </tr>
                            <tr>
                            	<td >
                                <input type="text" class="box" id="tech" name="tech" placeholder=" Tech service" required="required" >
                                
                                </td>
                            </tr>
                           
                            <tr>
                            	<td>
                                <textarea name="detail" required="required" class="box" id="detail" placeholder="  Detail" >
                                
                                </textarea>
                                
                                </td>
                            </tr>
                            <tr>
                            	<td>
                               
                                <input type="number" id="cost" name="cost" required="required" placeholder="Cost"></td>
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

