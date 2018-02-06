<?php 
	$list= array('id'=>'ID','sap'=>'SAP','sn'=>'S/N','name'=>'Name',
				 'code'=>'Code','group'=>'Group','address'=>'Address');
						 
	$list1 = array('id','sap','sn','name','code','group','address');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[1]);
?>
<form name="equipmentreport-form" method="post" action="<?php echo URL;?>switching/select"> 
<div id="table-equipmentreport">
	<table id="equipmentreport-table">
		<thead>
        	<th width="7%">
            	<a class="label-tr">SAP</a>
            </th>
            <th width="7%">
            	<a class="label-tr">S/N</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Name</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Group</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Brand</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Model</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Address</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Status</a>
            </th>
            <th width="3%"><a class="label-tr">Age</a>
            
            </th>
             <th width="3%"><a class="label-tr">Repaired</a>
            
            </th>
            <th width="3%"><a class="label-tr">Detail</a>
            
            </th>
        </thead>
        <tbody>
        	<?php
				foreach($this->selectdatatable[1] as $key => $value){
					echo "<td><a class=\"label-td\">".$value['equipment_list_sap']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_list_sn']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['group_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_brand']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_model']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['address_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['status_name']."</a></td>";
					echo "<td><a class=\"label-td\">".(int)$value['DiffDate']."</a></td>";
					echo "<td><a class=\"label-td\">".(int)$value['rows']."</a></td>";	
	echo "<td ><a class=\"label-td\" href=\"".URL."equipmentreport/detail/".$value['equipment_list_id']."\"> See</a></td>";
					echo "</tr>";
					}
				?>
        </tbody>
    </table>
</div>
</form>