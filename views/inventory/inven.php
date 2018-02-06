<?php $ck = true ;
	//print_r($this->selectdatatable);
 ?>
	<form id="inventory-form" name="inventory-form"  enctype="multipart/form-data" action="<?php echo URL."inventory/create/".$this->selectdatatable[8][0]['equipment_list_id'];?> " method="post">
    	<div id="inventory">
        	<div id="block">
            	<div id="logo">
                
                	<table width="100%">
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Inventory form</a></td>
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
                    <legend>Inventory record</legend>
                    	<table width="100%" >
                        	<tr>
                            	<td ><label >วันที่คืนพัสดุ</label>
                                <input type="date" id="date" name="date" required="required"  >
                                </td>
                            </tr>
                            <tr>
                            	<td ><label >เหตุผลในการคืน</label>
                                	<textarea name="about" required="required" class="box" id="about"  >
                                </textarea>
                                </td>
                            </tr>
                           
                            <tr>
                            	<td>
                                <label>หมายเหตุ!</label>
                                <textarea name="note" required="required" class="box" id="note"  >
                                </textarea>
                                </td>
                            </tr>
                            <tr>
                            <td>
                            	<label>สถานที่เก็บ</label>
                                <input type="text" class="box" id="addr" name="addr" required="required">
                                </td>
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

