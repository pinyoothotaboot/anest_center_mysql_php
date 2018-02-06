<?php $ck = true ;
	//print_r($this->selectdatatable);
 ?>
	<form id="borrowedback-form" name="borrowedback-form"  enctype="multipart/form-data" action="<?php echo URL."borrowedback/create/".$this->selectdatatable[8][0]['borroweback_id'];?> " method="post">
    	<div id="borrowedback">
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
            					ข้อมูลการยืมเครื่อง
                        
                    </legend>
                    	<p>ชื่อเครื่อง     : <?php echo $this->selectdatatable[8][0]['equipment_gen_name'];?> </p>
                        <p>ชื่อผู้ยืม    : <?php echo $this->selectdatatable[8][0]['borroweback_nameborrower'];?></p>
                        <p>ชื่อผู้ให้ยืม    : <?php echo $this->selectdatatable[8][0]['borroweback_nametechborrowe'];?></p>
                        <p>วันที่ยืม   : <?php echo $this->selectdatatable[8][0]['borroweback_date_borrowe'];?> เวลายืม :
                        <?php echo $this->selectdatatable[8][0]['borroweback_time_borrowe'];?>
                        </p>
                        <p>สถานที่นำไปใช้ : <?php echo $this->selectdatatable[8][0]['borroweback_address_use'];?></p>
                    	
                    
                    </fieldset>
                    <fieldset class="general-record">
                    <legend>ลงบันทึกข้อมูลการคืน</legend>
                    	<table width="100%" >
                        	<tr>
                            	<td ><label >วันที่คืน</label>
                                <input type="date" id="date" name="date" required="required"  >
                                	<label>เวลาคืน</label>
                                    <input type="time" id="tim" name="tim" required="required" >
                                </td>
                            </tr>
                            <tr>
                            	<td ><label>ชื่อผู้คืน</label>
                                <input type="text" class="box" id="user" name="user" placeholder="  ผู้คืน" required="required" >
                                
                                </td>
                            </tr>
                           
                            
                           
                            <tr>
                            <td>
                            <label>ชื่อผู้รับเครื่องคืน</label>
                                <input type="text" class="box" id="tech" name="tech" placeholder="  ผู้รับเครื่องคืน" required="required" >
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

