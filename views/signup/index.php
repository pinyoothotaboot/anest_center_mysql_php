<?php $ck = false ; ?>
	<form id="signup-form" action="<?php echo URL;?>signup/create" method="post">
    	<div id="signup">
        	<div id="block">
            	<div id="logo">
                <br />
                
                	<table width="100%">
                    	<tr></tr>
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Signup Form</a></td>
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
                            	<td ><input type="text" class="box" id="email" name="email" placeholder="  Your E-mail" required="required" ></td>
                            </tr>
                            <tr>
                            	<td><input type="text" class="box" id="user" name="user" placeholder="  Your user name" required="required" ></td>
                            </tr>
                            <tr>
                            	<td> <input type="password" class="box" id="pass" name="pass" placeholder="  Your Password" required="required" ></td>
                            </tr>
                            <tr>
                            	<td> <input type="password" class="box" id="cpass" name="cpass" placeholder="  Your Confirm password" required="required" ></td>
                            </tr>
                            <tr>
                            	<td><input type="submit" id="register" value="Register" /></td>
                            </tr>
                        </table>
                    	
                        
                        
                        
                       
                       
                    </li>
                </div>
                <div id="foot"></div>
            </div>
		</div>
	</form>

