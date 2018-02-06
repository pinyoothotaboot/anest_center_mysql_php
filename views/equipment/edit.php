<?php $ck =true; ?>
	<form id="equipment-form" name="equipment-form" enctype="multipart/form-data" action="<?php echo URL;?>equipment/update/<?php echo $this->selectdatatable[8][0]['equipment_list_id'];?>" method="post">
    	<div id="equipment">
        	<div id="block">
            	<div id="logo">
               
                
                	<table width="100%">
                    	<tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Equipment Form</a></td>
                        </tr>
                    </table>
                </div>
            	<div id="control">
                <br /> 
                
                	<li id="control-input">
                    <fieldset class="general-record">
                    <legend>General record</legend>
                    <table  width="100%">
                    	<tr>
                        	<td> <img id="img"  src="<?php echo URL;?>/publics/images/equipment/<?php echo $this->selectdatatable[8][0]['equipment_pic_name'];?>" />
                                                        <input type="file" id="file" class="box" name="file"  placeholder="Find picture"   style="border:1px solid #AAA; width:400px; height:25px; background:#FFF;"  />
				<table  width="100%;" height="290px;">
                <tr>
                	<td></td>
                </tr>
                <tr>
                	<td></td>
                </tr>
                <tr>
                	<td></td>
                </tr>
                <tr>
                	<td></td>
                </tr>
                <tr>
                	<td></td>
                </tr>
                </table>
                                                       </td>
                            <td>
                                                 	
    <input type="text" class="box" id="sap" name="sap" value="<?php echo $this->selectdatatable[8][0]['equipment_list_sap'];?>" placeholder="  SAP" required="required" autofocus="autofocus" >     	 <input type="text" class="box" id="sn" name="sn" value="<?php echo $this->selectdatatable[8][0]['equipment_list_sn'];?>" placeholder="  SN" required="required" >
    
                              <input type="text" class="box" id="code" name="code" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_code'];?>" placeholder="  Siriraj code" required="required"  />
                 <input type="text" class="box" id="name" name="name" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_name'];?>" placeholder="  Name" required="required" >
                 
                 			<input type="text" class="box" id="brand" name="brand" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_brand'];?>" placeholder="  Brand name" required="required" >
                                 <input type="text" class="box" id="model" name="model" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_model'];?>" placeholder=" Model" required="required" >
                            	<select id="group" name="group" class="box">
                                
                                	<option value="<?php echo $this->selectdatatable[8][0]['group_id'];?>" > <?php echo $this->selectdatatable[8][0]['group_name'];?></option>
                          			<?php 
						  				foreach($this->selectdatatable[9] as $key=>$value){
											echo "<option value=\"".$value['group_id']."\">".$value['group_name']."</option>";
										}
						 			 ?>
                                	
                                </select>
                                <input type="text" class="box" id="budget"  name="budget" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_budget'];?>" placeholder="  Budget" required="required" >
                                 <input type="date" class="box" id="begin-date" name="begin-date" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_date_begin'];?>"  /> <a><?php echo $this->selectdatatable[8][0]['equipment_gen_date_begin'];?> </a>
                                        <input type="date" class="box" id="end-date" name="end-date" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_date_end'];?>"  /> <a><?php echo $this->selectdatatable[8][0]['equipment_gen_date_end'];?></a>
                                <input type="text" class="box" id="comp" name="comp" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_company'];?>" placeholder="  Company" required="required" >
                                 <input type="tel" class="box" id="comp-tel" name="comp-tel" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_company_tel'];?>" placeholder="  Company tel" required="required" >
<input type="tel" class="box" id="comp-fax" name="comp-fax" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_company_fax'];?>" placeholder="  Company fax" required="required" >
<input type="text" class="box" id="comp-sale" name="comp-sale" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_company_sales'];?>" placeholder="  Sales representative" required="required" >
<input type="tel" class="box" id="comp-sale-tel" name="comp-sale-tel" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_company_sales_tel'];?>" placeholder="  Sales tel" required="required" >
 <input type="text" class="box" id="comp-price" name="comp-price" value="<?php echo $this->selectdatatable[8][0]['equipment_gen_price'];?>" placeholder="  Price" required="required" >
 <select id="address" name="address" class="box" >
                                
                                	<option value="<?php echo $this->selectdatatable[8][0]['address_id'];?>" > <?php echo $this->selectdatatable[8][0]['address_name'];?></option>
                          			<?php 
						  				foreach($this->selectdatatable[11] as $key=>$value){
											echo "<option value=\"".$value['address_id']."\">".$value['address_name']."</option>";
										}
						 			 ?>
                                	
                                </select>
                                <input type="tel" class="box" id="tel" name="tel" value="<?php echo $this->selectdatatable[8][0]['equipment_list_tel'];?>" placeholder="  Tel"  required="required">
                                    <select id="status" name="status" class="box" >
                   <option value="<?php echo $this->selectdatatable[8][0]['status_id'];?>"><?php echo $this->selectdatatable[8][0]['status_name'];?></option>
                          			<?php 
						  				foreach($this->selectdatatable[10] as $key=>$value){
											echo "<option value=\"".$value['status_id']."\">".$value['status_name']."</option>";
										}
						 			 ?>
                                	
                                </select>
                                <input type="submit" id="register" name="register" value="Save" />
                            </td>
                        </tr>
                    </table>
                    		
                           
                               
                                	
                        </fieldset>
                    
                </div>
                <div id="foot"></div>
            </div>
		</div>
	</form>
    

