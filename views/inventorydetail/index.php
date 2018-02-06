<?php 
	$list= array('id'=>'ID','date'=>'Date','about'=>'About'
				,'note'=>'Note','addr'=>'Address','name'=>'Name');
						 
	$list1 = array('id','about','note','addr','date','name');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[1]);
?>
<form name="inventorydetail-form" method="post" action="<?php echo URL;?>inventorydetail/select"> 
<div id="table-inventorydetail">
	<table id="inventorydetail-table">
		<thead>
        <th width="7%">
            	<a class="label-tr">S/N</a>
            </th>
        	<th width="7%">
            	<a class="label-tr">ชื่อเครื่อง</a>
            </th>
            <th width="10%">
            	<a class="label-tr">เหตุผลในการส่งคืน</a>
            </th>
            <th width="15%">
            	<a class="label-tr">หมายเหตุ</a>
            </th>
            <th width="15%">
            	<a class="label-tr">ผู้คืน</a>
            </th>
            <th width="10%">
            	<a class="label-tr">สถานที่เก็บ</a>
            </th>
            <th width="10%">
            	<a class="label-tr">วันที่ส่งคืนพัสดุ</a>
            </th>
        </thead>
        <tbody>
        	<?php
				foreach($this->selectdatatable[1] as $key => $value){
					echo "<td><a class=\"label-td\">".$value['equipment_list_sn']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['inventory_about']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['inventory_note']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['user_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['inventory_address_store']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['inventory_date']."</a></td>";
					echo "</tr>";
					}
				?>
        </tbody>
    </table>
</div>
</form>