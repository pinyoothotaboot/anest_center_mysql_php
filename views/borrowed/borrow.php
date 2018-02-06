<?php $ck = true ;
	//print_r($this->selectdatatable);
 ?>
	<form id="borrowed-form" name="borrowed-form"  enctype="multipart/form-data" action="<?php echo URL."borrowed/create/".$this->selectdatatable[8][0]['equipment_list_id'];?> " method="post">
    	<div id="borrowed">
        	<div id="block">
            	<div id="logo">
                
                	<table width="100%">
                		<tr></tr>
                    	<tr>
                        
                        	<td align="center"><a id="logo-label">Borrow form</a></td>
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
                    <legend>Borrowe</legend>
                    	<table width="100%" >
                        	<tr>
                            	<td ><label >วันที่ยืม</label>
                                <input type="date" id="date" name="date" required="required"  >
                                	<label>เวลายืม</label>
                                    <input type="time" id="tim" name="tim" required="required" >
                                </td>
                            </tr>
                            <tr>
                            	<td ><label>ชื่อผู้ให้ยืม</label>
                                <input type="text" class="box" id="tech" name="tech" placeholder="  ผู้ให้ยืม" required="required" >
                                <label>ชื่อผู้ยืม</label>
                                <input type="text" class="box" id="user" name="user" placeholder="  ผู้ยืม" required="required" >
                                </td>
                            </tr>
                           
                            <tr>
                            	<td>
                                <label>สถานที่นำไปใช้งาน</label>
                                <input type="text" name="room" required="required" class="box" id="room" placeholder="  สถานที่นำไปใช้งาน" required="required" >
                               <label>รายการอื่นๆ</label>
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                
                                <textarea name="note" required="required" class="box" id="note" placeholder="  รายการอื่นๆ" >
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

