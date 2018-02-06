<?php $ck = false ; ?>
<form id="login1" name="login1" action="<?php echo URL;?>login/run" method="post">
<div id="login">
    	<div id="block">
        	<div id="logo">
            	<table width="100%">
                <br />
                	<tr></tr>
                	<tr></tr>
                	<tr>
                    	<td align="center"><a id="logo1">Login Form</a></td>
                    </tr>
                </table>
                	
            </div>
            <div id="control">
            	<br />
            	<li id="control-input">
              <a class="label" id="label-user">Username</a><input type="text" id="user" name="user"  placeholder="  your username" required="required"  /><br />
            <a class="label" id="label-pass">Password</a><input type="password" id="pass" name="pass" placeholder="  your password" required="required"  /><br />
                    <br />
                    <a class="label" id="label-forgot">Forgot your password?</a><br />
                    <input type="checkbox" id="check"/><a>Remember Me</a>
                    
                </li>
            </div>
        	<div id="foot">
            <br />
            <table>
            	<tr>
                	<td><input type="submit" class="btn" id="sigin" name="sigin" value="Login" /></td>
                    </form>
                    <td>
                    	<form id="signup" action="<?php echo URL; ?>signup">
                        	<button class="btn" id="register" name="register">Register</button>
                        </form>
                    </td>
                </tr>
            </table>
               
            </div>
        </div>
</div>
