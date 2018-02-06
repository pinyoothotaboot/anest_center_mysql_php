<?php $ck = true ;
	//print_r($this->selectdatatable);
 ?>
	<form id="switching-form" name="switching-form"  enctype="multipart/form-data" action="<?php echo URL."switching/create/".$this->selectdatatable[8][0]['equipment_list_id'];?> " method="post">
    	<div id="switching">
        	<div id="block">
            	<div id="logo">
                
                	<table width="100%">
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Switching form</a></td>
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
                    <legend>Switching record</legend>
                    	<table width="100%" >
                        	<tr>
                            	<td ><label >วันที่ย้าย</label>
                                <input type="date" id="date" name="date" required="required"  >
                       <input type="hidden" name="oldaddr" id="oldaddr"  value="<?php echo $this->selectdatatable[8][0]['address_id'];?>">
                       <input type="hidden" name="addrname" id="addrname" value="<?php echo $this->selectdatatable[8][0]['address_name'];?>" />
                                </td>
                            </tr>
                            <tr>
                            	<td ><label >สถานที่ย้ายไป</label>
                                <select id="newaddr" name="newaddr" >
                                <option > Select new address</option>
                          			<?php 
						  				foreach($this->selectdatatable[9] as $key=>$value){
											echo "<option value=\"".$value['address_id']."\">".$value['address_name']."</option>";
										}
						 			 ?>
                                </select>
                                </td>
                            </tr>
                           
                            <tr>
                            	<td>
                                <label>หมายเหตุ!</label>
                                <textarea name="note" required="required" class="box" id="note" placeholder="  Detail" >
                                </textarea>
                                </td>
                            </tr>
                            <tr>
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

