<?php 
	$list= array('id'=>'ID','sap'=>'SAP','sn'=>'S/N','name'=>'Name',
				 'code'=>'Code','group'=>'Group','address'=>'Address',
				 'sta'=>'Status','stad'=>'Status delete');
				 
				 //array('id'=>'ID','sap'=>'SAP','sn'=>'SN',
						// 'name'=>'Name','code'=>'Code','group'=>'Group',
						// 'address'=>'Address','sta'=>'Status','stad'=>'Status delete');
						 
	$list1 = array('id','sap','sn','name','code','group','address','sta','stad');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[1]);
?>
<form name="equipment-form" method="post" action="<?php echo URL;?>equipment/select"> 
<div id="table-equipment">
	<table id="equipment-table">
		<thead>
        	<th width="7%">
            	<a class="label-tr">SAP</a>
            </th>
            <th width="10%">
            	<a class="label-tr">S/N</a>
            </th>
            <th width="20%">
            	<a class="label-tr">Name</a>
            </th>
            <th width="20%">
            	<a class="label-tr">Code</a>
            </th>
            <th width="10%">
            	<a class="label-tr">Group</a>
            </th>
            <th width="20%">
            	<a class="label-tr">Address</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Status</a>
            </th>
            <th width="7%">
            	<a class="label-tr">A/C</a>
            </th>
            <th width="7%"><a class="label-tr">Date register</a></th>
            <th width="7%"><a class="label-tr">Date delete</a></th>
            <th width="5%"><a class="label-tr">Detail</a></th>
            <th width="5%"><a class="label-tr">Edit</a></th>
            <th width="5%"><a class="label-tr">Delete</a></th>
        </thead>
        <tbody>
        	<?php
				foreach($this->selectdatatable[1] as $key => $value){
					echo "<td><a class=\"label-td\">".$value['equipment_list_sap']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_list_sn']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_code']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['group_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['address_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['status_name']."</a></td>";
					if($value['status']=='Active'){	
						echo "<td style=\"background:#0D0;\"><a class=\"label-td\">".$value['status']."</a></td>";
					}
					else{
						echo "<td style=\"background:#E00;\"><a class=\"label-td\">".$value['status']."</a></td>";
					}
						echo "<td><a class=\"label-td\">".$value['equipment_list_registed']."</a></td>";
						echo "<td><a class=\"label-td\">".$value['equipment_list_date_delete']."</a></td>";
						
						echo "<td ><a class=\"label-td\" href=\"".URL."equipment/detail/".$value['equipment_list_id']."\"> Detail</a></td>";
						echo "<td ><a class=\"label-td\" href=\"".URL."equipment/edit/".$value['equipment_list_id']."\"> Edit</a></td>";
						if($value['status']=='Active')
							echo "<td ><a class=\"label-td\" href=\"".URL."equipment/delete/".$value['equipment_list_id']."\"> Delete</a></td>";
						else
							echo "<td ><a class=\"label-td\" href=\"".URL."equipment/delete/".$value['equipment_list_id']."\"> Un-delete</a></td>";
							echo "</tr>";
					}
				?>
        </tbody>
    </table>
</div>
</form>