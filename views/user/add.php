<?php $ck = true ; ?>
	<form id="user-form" name="user-form"  enctype="multipart/form-data" action="<?php echo URL;?>user/create" method="post">
    	<div id="user1">
        	<div id="block">
            	<div id="logo">
                
                	<table width="100%">
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">New User Form</a></td>
                        </tr>
                    </table>
                </div>
            	<div id="control">
                <br />
                	<li id="control-input">
                    	<table width="100%" >
                        	<tr>
                            
                            	<td ><input type="text" class="box" id="name" name="name" placeholder="  Your name" required="required" >
                                <input type="text" class="box" id="lastname" name="lastname" placeholder="  Your Last name" required="required" >
                                </td>
                               
                            </tr>
                            <tr>
                            
                            	<td >
                                	<select id="gender" name="gender" class="box">
                                		<option value="0">MALE</option>
                                        <option value="1">FEMALE</option>
                                    </select>
                               		
                                    <select id="position" name="position" class="box">
                                    	<?php 
						  				foreach($this->selectdatatable[8] as $key=>$value){
											echo "<option value=\"".$value['position_id']."\">".$value['position_name']."</option>";
										}
						 			 ?>
                                    </select>
                                </td>
                               
                            </tr>
                            <tr>
                            
                            	<td >
                                	<input type="tel" class="box" id="tel" name="tel" placeholder="  Tel" required="required" >
                                	<select id="account" name="account" class="box">
                                		<option value="2">VISITOR</option>
                                        <option value="1">CUSTOMER</option>
                                        <option value="0">ADMINISTRATOR</option>
                                    </select>
                                </td>
                               
                            </tr>
                            <tr>
                            	<td ><input type="text" class="box" id="email" name="email" placeholder="  Your E-mail" required="required" ></td>
                            </tr>
                           
                            <tr>
                            	<td><input type="text" class="box" id="user" name="user" placeholder="  User name" required="required" ></td>
                            </tr>
                            <tr>
                            	<td> <input type="password" class="box" id="pass" name="pass" placeholder="  Your Password"  required="required"></td>
                            </tr>
                            <tr>
                            	<td> <input type="password" class="box" id="cpass" name="cpass" placeholder="  Your Confirm password" required="required" ></td>
                            </tr>
                            <tr>
                            	<td><input type="file" id="pic" name="pic" class="box" required="required"></td>
                            </tr>
                            <tr>
                            	<td><input type="submit" id="register" name="register" value="Register" /></td>
                            </tr>
                        </table>
                    	
                        
                        
                        
                       
                       
                    </li>
                </div>
                <div id="foot"></div>
            </div>
		</div>
	</form>

