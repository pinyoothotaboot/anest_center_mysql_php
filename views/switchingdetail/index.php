<?php 
	$list= array('id'=>'ID','date'=>'Date','newaddress'=>'New address'
				,'oldaddress'=>'Old address','tech'=>'Tech','name'=>'Name');
						 
	$list1 = array('id','newaddress','tech','oldaddress','date','name');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[1]);
?>
<form name="switchingdetail-form" method="post" action="<?php echo URL;?>switchingdetail/select"> 
<div id="table-switchingdetail">
	<table id="switchingdetail-table">
		<thead>
        	<th width="7%">
            	<a class="label-tr">ชื่อเครื่อง</a>
            </th>
            <th width="10%">
            	<a class="label-tr">สถานที่เดิม</a>
            </th>
            <th width="15%">
            	<a class="label-tr">สถานที่ใหม่</a>
            </th>
            <th width="15%">
            	<a class="label-tr">ผู้ย้าย</a>
            </th>
            <th width="10%">
            	<a class="label-tr">วันที่ย้าย</a>
            </th>
        </thead>
        <tbody>
        	<?php
				foreach($this->selectdatatable[1] as $key => $value){
					echo "<td><a class=\"label-td\">".$value['equipment_gen_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['switch_address']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['address_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['user_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['switch_date']."</a></td>";
					echo "</tr>";
					}
				?>
        </tbody>
    </table>
</div>
</form>