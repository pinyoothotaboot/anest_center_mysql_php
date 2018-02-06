<?php $ck =true; ?>
	<form id="equipment-form" name="equipment-form" enctype="multipart/form-data" action="<?php echo URL;?>equipment/create" method="post">
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
                    		<ul>
                        	<li><input type="text" class="box" id="code" name="code" placeholder="  Siriraj code" required="required"  autofocus="autofocus">
                                <input type="file" id="file" name="file" placeholder="Find picture" required="required"  style="border:1px solid #AAA; width:510px; background:#FFF;"  />
                            
                            </li>
                    		<li><input type="text" class="box" id="name" name="name" placeholder="  Name" required="required" >
                            	<input type="text" class="box" id="brand" name="brand" placeholder="  Brand name" required="required" >
                                <input type="text" class="box" id="model" name="model" placeholder=" Model" required="required" >
                            </li>
                            <li>
                            	<select id="group" name="group" class="box">
                                
                                	<option > Select Group</option>
                          			<?php 
						  				foreach($this->selectdatatable[8] as $key=>$value){
											echo "<option value=\"".$value['group_id']."\">".$value['group_name']."</option>";
										}
						 			 ?>
                                	
                                </select>
                            	<input type="text" class="box" id="budget"  name="budget" placeholder="  Budget" required="required" >
                            </li>
                            <li>
                            	<input type="date" class="box" id="begin-date" name="begin-date" required="required" />
                                <input type="date" class="box" id="end-date" name="end-date" required="required" />
                            </li>
                            <li> 
                            	<input type="text" class="box" id="comp" name="comp" placeholder="  Company" required="required" >
                                <input type="tel" class="box" id="comp-tel" name="comp-tel" placeholder="  Company tel" required="required" >
                                <input type="tel" class="box" id="comp-fax" name="comp-fax" placeholder="  Company fax" required="required" >
                            </li>
                             <li>
                            	<input type="text" class="box" id="comp-sale" name="comp-sale" placeholder="  Sales representative" required="required" >
                                <input type="tel" class="box" id="comp-sale-tel" name="comp-sale-tel" placeholder="  Sales tel" required="required" >
                                <input type="text" class="box" id="comp-price" name="comp-price" placeholder="  Price" required="required" >
                            </li>
                           
                           
                        </ul>
                       
                        </fieldset>
                       
                        <fieldset class="list-record">
                        <legend>List record</legend>
                       
                        	<table id="myTbl">
                            	<tr id="firstTr">
                                	<td width="100px" ><input type="text" class="box" id="sap[]" name="sap[]" placeholder="  SAP" required="required" ></td>
                            		<td ><input type="text" class="box" id="sn[]" name="sn[]" placeholder="  SN" required="required" ></td>
                                	<td >
                          <select id="address" name="address[]" class="box" >
                                
                                	<option > Select address</option>
                          			<?php 
						  				foreach($this->selectdatatable[10] as $key=>$value){
											echo "<option value=\"".$value['address_id']."\">".$value['address_name']."</option>";
										}
						 			 ?>
                                	
                                </select>
                          	
                          </td>
                                	<td>
                                    <input type="tel" class="box" id="tel[]" name="tel[]" placeholder="  Tel"  required="required"></td>
                                	<td>
                                    <select id="status" name="status[]" class="box" >
                          			<?php 
						  				foreach($this->selectdatatable[9] as $key=>$value){
											echo "<option value=\"".$value['status_id']."\">".$value['status_name']."</option>";
										}
						 			 ?>
                                	
                                </select>
                                </tr>
                                
                            </table>
                        	
                           		
                           			<button id="add" class="btn" type="button">+</button>
                                	<button id="rev" class="btn" type="button">-</button>
                                	<input type="submit" id="register" name="register" value="Save" />
                        
                        </fieldset>
                        
                    </li>
                   
                    
                </div>
                <div id="foot"></div>
            </div>
		</div>
	</form>

