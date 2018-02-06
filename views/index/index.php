<?php $ck = false ; 
	//print_r($this->selectdatatable[15]);
?>
<div id="frame">
	<ul id="content">
    
     
    	<li id="t">
        	<a id="t0"><?php echo $this->selectdatatable[16];?></a><br />
    		<a id="t1"><?php echo $this->selectdatatable[15];?></a>
    	</li>
        <li id="d">
    		<a id="day"><?php echo $this->selectdatatable[14];?></a><br />
    		<a id="date1"><?php echo $this->selectdatatable[12];?></a>
    		<a id="month"><?php echo $this->selectdatatable[13];?></a>
    	</li>
    	
    	<li id="anes1"><a id="anest1">Siriraj</a></li>
        <li id="anes2"><a id="anest2">Anesthesia Equiptment Center</a></li>
        
      <div id="block">
       	<li id="b1">
        	<a id="b1-title">เครื่องมือพร้อมใช้งานทั้งหมด</a>
            <a id="b1-count"><?php echo $this->selectdatatable[8][0]['rows'];?></a>
            <a id="b1-from">จากทั้งหมด <?php echo $this->selectdatatable[9][0]['rows'];?> รายการ</a>
        </li>
       	<li id="b2">
        	<a id="b2-title">เครื่องมือที่ส่งซ่อม</a>
            <br />
            <a id="b2-count"><?php echo $this->selectdatatable[10][0]['rows'];?></a>
        </li>
       	<li id="b3">
        	<a id="b3-title">สถิติการยืมเครื่องประจำวันนี้</a>
            <a id="b3-count"><?php echo $this->selectdatatable[17][0]['rows'];?></a>
            <a id="b3-from">รวมทั้งหมด <?php echo $this->selectdatatable[18][0]['rows'];?>  รายการ</a>
        </li>
       	<li id="b4">
        	<a id="b4-title">จำนวนเครื่องส่งคืนพัสดุ</a>
            <a id="b4-count"><?php echo $this->selectdatatable[11][0]['rows'];?></a>
        </li>
        <li id="repair-grp"></li>
        <li id="repair-grp1"></li>
       </div>
       
       
       	
      
       
	</ul>
   