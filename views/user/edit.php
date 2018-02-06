<?php $ck = true ; 

//print_r($this->selectdatatable[8]);

?>
	<form id="user-form" name="user-form"  enctype="multipart/form-data" action="<?php echo URL;?>user/update/<?php echo $this->selectdatatable[8][0]['user_id'];?>" method="post">
    	<div id="user1">
        	<div id="block">
            	<div id="logo">
                
                	<table width="100%">
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Edit User Form</a></td>
                            
                        </tr>
                       
                    </table>
                </div>
            	<div id="control">
                <br />
                	<li id="control-input">
                    	<table width="100%" >
                         <tr>
                        	<td>
                            	<?php 
									if($this->selectdatatable[8][0]['user_id_link_pic']==null){
										echo "<img id=\"img\"  src=\"".URL."/publics/images/user/no-pic.jpg\" />";
									}
									else{
										$pic =$this->selectdatatable[8][0]['user_pic_name'];
										echo "<img id=\"img\"  src=\"".URL."/publics/images/user/$pic\" />";
									}
									
									
								?>
                            	
                            </td>
                        </tr>
                        	<tr>
                            
                     <td ><input type="text" class="box" id="name" name="name" placeholder=" Enter firstname" value="<?php echo $this->selectdatatable[8][0]['user_name'];?>" required="required" >
                     <input type="text" class="box" id="lastname" name="lastname" placeholder="Enter lastname"  value="<?php echo $this->selectdatatable[8][0]['user_lastname'];?>" required="required" >
                                </td>
                               
                            </tr>
                            <tr>
                            
                            	<td >
                                	<select id="gender" name="gender" class="box">
                                    <?php 
											if($this->selectdatatable[8][0]['user_gender']==0){
												echo "<option value=\"0\">MALE</option>";
												echo "<option value=\"1\">FEMALE</option>";
											}
											else{
												echo "<option value=\"1\">FEMALE</option>";
												echo "<option value=\"0\">MALE</option>";
											}
									?>
                                		
                                       <input type="hidden" id="linkpic" name="linkpic" value="<?php echo $this->selectdatatable[8][0]['user_pic_name'];?>" />
                                    </select>
                               		
                                    <select id="position" name="position" class="box">
                                    	
                                    	<?php
											if($this->selectdatatable[8][0]['user_position']==null)
												echo "<option>Select position</option>";
											else{
												$v= $this->selectdatatable[8][0]['position_id'];
												$n = $this->selectdatatable[8][0]['position_name'];
												echo "<option value=\"$v\">$n</option>";
											}
										 
						  				foreach($this->selectdatatable[9] as $key=>$value){
											echo "<option value=\"".$value['position_id']."\">".$value['position_name']."</option>";
										}
						 			 ?>
                                    </select>
                                </td>
                               
                            </tr>
                            <tr>
                            
                            	<td >
                     <input type="tel" class="box" id="tel" name="tel" placeholder="Enter tel" value="<?php echo $this->selectdatatable[8][0]['user_tel'];?>" required="required" >
                                	<select id="account" name="account" class="box">
                                		<?php 
											if($this->selectdatatable[8][0]['user_account']==0){
												echo "<option value=\"0\">ADMINISTRATOR</option>";
                                       			echo "<option value=\"1\">CUSTOMER</option>";
                                        		echo "<option value=\"2\">VISITOR</option>";
											}
											else if($this->selectdatatable[8][0]['user_account']==1){
												echo "<option value=\"1\">CUSTOMER</option>";
												echo "<option value=\"0\">ADMINISTRATOR</option>";
												echo "<option value=\"2\">VISITOR</option>";
											}
											else if($this->selectdatatable[8][0]['user_account']==2){
												echo "<option value=\"2\">VISITOR</option>";
												echo "<option value=\"0\">ADMINISTRATOR</option>";
												echo "<option value=\"1\">CUSTOMER</option>";
											}
												
										?>
                                        
                                        
                                    </select>
                                </td>
                               
                            </tr>
                            <tr>
 <td ><input type="text" class="box" id="email" name="email" placeholder="Enter E-mail" value="<?php echo $this->selectdatatable[8][0]['user_email'];?>" required="required" ></td>
                            </tr>
                           
                            <tr>
                 <td><input type="text" class="box" id="user" name="user" value="<?php echo $this->selectdatatable[8][0]['user_login'];?>" placeholder="  User name" required="required" ></td>
                            </tr>
                            <tr>
                            	<td> <input type="password" class="box" id="pass" name="pass" placeholder="  Your Password"  required="required"></td>
                            </tr>
                            <tr>
                            	<td> <input type="password" class="box" id="cpass" name="cpass" placeholder="  Your Confirm password" required="required" ></td>
                            </tr>
                            <tr>
                            	<?php 
									if($this->selectdatatable[8][0]['user_id_link_pic']==null){
										echo "<td><input type=\"file\" id=\"pic\" name=\"pic\" class=\"box\" required=\"required\"></td>";
									}
									else{
										echo "<td><input type=\"file\" id=\"pic\" name=\"pic\" class=\"box\"></td>";
									}
									
									
								?>
                                
                                
                            </tr>
                            <tr>
                            	<td><input type="submit" id="register" name="register" value="Update" /></td>
                            </tr>
                        </table>
                    	
                        
                        
                        
                       
                       
                    </li>
                </div>
                <div id="foot"></div>
            </div>
		</div>
	</form>

