<?php 
	$list= array('id'=>'ID','user'=>'User','tech'=>'Tech','name'=>'Name',
				 'date'=>'Date','address'=>'Address');
						 
	$list1 = array('id','user','tech','name','date','address');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[1]);
?>
<form name="borrowed-form" method="post" action="<?php echo URL;?>borrowedback/select"> 
<div id="table-borrowed">
	<table id="borrowed-table">
		<thead>
        <th width="7%">
            	<a class="label-tr">S/N</a>
            </th>
        	<th width="7%">
            	<a class="label-tr">ชื่อเครื่อง</a>
            </th>
            <th width="10%">
            	<a class="label-tr">ชื่อผู้ยืม</a>
            </th>
            <th width="15%">
            	<a class="label-tr">ชื่อผู้ให้ยืม</a>
            </th>
            <th width="15%">
            	<a class="label-tr">วันที่ยืม</a>
            </th>
            <th width="10%">
            	<a class="label-tr">เวลายืม</a>
            </th>
            <th width="15%">
            	<a class="label-tr">สถานที่นำไปใช้</a>
            </th>
            <th width="5%"><a class="label-tr">คืนเครื่อง</a></th>
        </thead>
        <tbody>
        	<?php
				foreach($this->selectdatatable[1] as $key => $value){
					echo "<td><a class=\"label-td\">".$value['equipment_list_sn']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['borroweback_nameborrower']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['borroweback_nametechborrowe']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['borroweback_date_borrowe']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['borroweback_time_borrowe']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['borroweback_address_use']."</a></td>";
						
					echo "<td ><a class=\"label-td\" href=\"".URL."borrowedback/borrowback/".$value['borroweback_id']."\"> คืนเครื่อง</a></td>";
					echo "</tr>";
					}
				?>
        </tbody>
    </table>
</div>
</form>