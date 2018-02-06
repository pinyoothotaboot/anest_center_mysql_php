<?php 
		$login =  Session::get('logedIn');
		$user  =  Session::get('user');
		$name  =  Session::get('name');
		$lname =  Session::get('lname');
		$acc   =  Session::get('account');
		$pic   =  Session::get('pic');
		if($pic == "")
			$pic ="no-pic.jpg";
		if($login =="")
			$login=false;
?>
<div id="menu-side">
<ul id="nav">

        	<li class="profile">
            	<a href="#">&nbsp;</a>
                <img id="img-profile" src="<?php echo URL;?>publics/images/user/<?php echo $pic;?>"  />
               
                <h4 id="name"><?php echo $name." ".$lname;?></h4>
            </li>
            
            <li class="home">
            	<a href="<?php echo URL;?>">Home</a>
            </li>
            <?php if($acc==0 && $acc!=""){?>
            <li class="admin">
            	<a href="#">Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;</a>
                <ul>
                  <li>
                  	<a href="#">การจัดการเครื่องมือแพทย์ &raquo;</a>
                    	<ul>
                        	<li><a href="<?php echo URL;?>equipment">ทะเบียนเครื่องมือแพทย์</a></li>
                        	<li><a href="<?php echo URL;?>group">กลุ่มเครื่องมือ</a></li>
                            <li><a href="<?php echo URL;?>address">สถานที่ใช้งาน</a></li>
                            <li><a href="<?php echo URL;?>status">สถานะเครื่อง</a></li>
                        </ul>
                  </li>
                  <li>
                  		<a href="<?php echo URL;?>user">การจัดการสมาชิก&raquo;</a>
                        <ul>
                        	 <li><a href="<?php echo URL;?>user">ทะเบียนสมาชิก</a></li>
                             <li><a href="<?php echo URL;?>position">ตำแหน่ง</a></li>    
                        </ul>
                  </li>
                  
                  <li><a href="#">การจัดการเกี่ยวกับงานบริการ&raquo;</a>
                  		<ul>
                        	<li><a href="#">Repair</a></li>
                        </ul>
                  </li>
                </ul>
            </li>
            <?php }
				 if( ($acc==0 || $acc==1) && $acc!="" ){
			?>
            <li class="service">
            	<a href="#">Service&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;</a>
                <ul>
                  <li><a href="#">การแก้ไขปัญหาเครื่องมือ</a></li>
                  <li><a href="<?php echo URL;?>servicerepair">การส่งซ่อมเครื่อง</a></li>
                  <li>
                  		<a href="#">สอบเทียบและบำรุงรักษา &raquo;</a>
                  		<ul>
                        	<li><a href="#">Force air warmer</a></li>
                            <li><a href="#">Machine</a></li>
                            <li><a href="#">Gas monitor</a></li>
                            <li><a href="#">Monitor</a></li>
                        </ul>
                  </li>
                  <li><a href="<?php echo URL;?>borrowed">การยืม-คืนเครื่องมือ</a></li>
                  <li><a href="<?php echo URL;?>switching">การสลับย้ายเครื่อง</a></li>
                  <li><a href="#">บันทึกผล Vaporizer</a></li>
                  <li><a href="<?php echo URL;?>inventory">การส่งเครื่องคืนพัสดุ </a></li>
                </ul>

            </li>
            <?php }
				if(($acc==0  || $acc==1 || $acc==2) && $acc!=""){
			 ?>
            <li class="report">
            	<a href="#">Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;</a>
                <ul>
                  <li><a href="<?php echo URL;?>equipmentreport">ประวัติเครื่อง</a></li>
                  <li><a href="#">Repaired report</a></li>
                  <li><a href="#">Borrowed-Back report</a></li>
                  <li><a href="#">Vaporizer processed</a></li>
                  <li><a href="#">Inventories back report</a></li>
                </ul>
            </li>
           <?php }?>
            <li class="logout">
            	<?php 
						if($login == false){
				?>
            	<a href="<?php echo URL;?>login">login</a>
                <?php   }else{
				?>
                	<a href="<?php echo URL;?>login/logout">logout</a>
                <?php }?>
            </li>
            
        </ul>

        <div id="menu-bar">
 	<ul id="wrapper">
     <?php if($ck != false) {?>
    	<li class="wraper-menu"><a href="#">&nbsp;</a>
        	<ul>
            	<li>
                	<?php
							if(($this->selectdatatable[0] =="servicerepair" )){
					 ?>
                     		<a href="<?php echo URL.$this->selectdatatable[0]."back";?>">รับเครื่องคืน</a></li>
                    <?php  
							}
							else if(($this->selectdatatable[0] =="servicerepairback" )){
					?>
                	<a href="<?php echo URL."servicerepair";?>">ส่งซ่อมเครื่อง</a></li>
                    
                    <?php  
							}
							else if(($this->selectdatatable[0] =="borrowedback" )){
					?>
                	<a href="<?php echo URL."borrowed";?>">ยืมเครื่อง</a></li>
                    
					<?php  
							}
							else if(($this->selectdatatable[0] =="borrowed" )){
					?>
                	<a href="<?php echo URL.$this->selectdatatable[0]."back";?>">คืนเครื่อง</a></li>
                    
                    
                    <?php  
							}
							else if(($this->selectdatatable[0] =="switching" )){
					?>
                	<a href="<?php echo URL.$this->selectdatatable[0]."detail";?>">ดูประวัติรายการย้าย</a></li>
                    
                    <?php  
							}
							else if(($this->selectdatatable[0] =="switchingdetail" )){
					?>
                	<a href="<?php echo URL."switching";?>">ย้ายสลับเครื่อง</a></li>
                    
                     <?php  
							}
							else if(($this->selectdatatable[0] =="inventory" )){
					?>
                	<a href="<?php echo URL.$this->selectdatatable[0]."detail";?>">ดูประวัติรายการคืนพัสดุ</a></li>
                    
                    <?php  
							}
							else if(($this->selectdatatable[0] =="inventorydetail" )){
					?>
                	<a href="<?php echo URL."inventory";?>">ส่งเครื่องคืนพัสดุ</a></li>
                    
					<?php  
							}
							else if(($this->selectdatatable[0] =="equipmentreport" )){
					?>
                	<a href="<?php echo URL."equipmentreport/exportExcel";?>">Export To Excel</a></li>
                    <li><a href="<?php echo URL."equipmentreport/exportPDF";?>">Export To PDF</a></li>
                    
                    <?php }
					
							else{ 
					?>
                    		<a href="<?php echo URL.$this->selectdatatable[0];?>/addnew">Addnew</a></li>
                    <?php } ?>
            	
            </ul>
            <?php if($this->selectdatatable[1]!=0) {?>
        </li>
        
            <li>
                    <form method="post" action="<?php echo URL.$this->selectdatatable[0]."/select";?>"> 
                           <input type="search" id="s" name="s" placeholder="search in <?php echo $this->selectdatatable[2];?> row" value="<?php echo $this->selectdatatable[8];?>"  > 
                           <button type="submit" id="btn">Submit</button>
             </li>
             		
             <li>          	
             		<select id="page" name="page" onchange="submit()">
                      <option value="<?php echo $this->selectdatatable[4];?>"><?php echo "Page:".$this->selectdatatable[4];?></option>
							<?php 
								$count = $this->selectdatatable[2];
								$row   = $this->selectdatatable[5];
			
								$i=0;
								$j=1;
									do{
										echo "<option value=\"".$j."\">Page:".$j."</option>";
										$i = $i+$row;
										$j++;
									}while($i<=$count);
							?>
                    </select>
             </li>
             <li>          	
             		<select id="row" name="row" onchange="submit()" >
                    	<option value="<?php echo $this->selectdatatable[5];?>"><?php echo $this->selectdatatable[5]." Rows";?></option>
                         <option value="10">10 Rows</option>
                         <option value="20">20 Rows</option>
                         <option value="50">50 Rows</option>
                         <option value="100">100 Rows</option>
                    </select>
             </li>
             <li>
             		<select id="list" name="list" onchange="submit()">
						 <?php
 	
 						echo "<option value=\"".$this->selectdatatable[7]."\">".$list[$this->selectdatatable[7]]."</option>";
					
 						 ?>
                         <?php  
						 		//for($i=0;$i < $list1[$i];$i++)
								foreach($list1 as $value)
									echo "<option value=\"".$value."\">". $list[$value]."</option>";
								//print_r($list);
						 
						 ?>
 </select>
 
             </li>
             
             <li>
             		<select id="sort" name="sort" onchange="submit()">
  						<?php
 							echo "<option value=\"".$this->selectdatatable[6]."\">".$about[$this->selectdatatable[6]]."</option>";
	
  						?>
 							<option value="0">A to Z</option>
    						<option value="1">Z to A</option>
 </select>
             </li>
             
               </form>   
               <?php  }
			   
			}
			     
				 ?>  
    </ul>
 </div>


 
 </div>
</body>
</html>
<?php  
	ob_flush();
?>