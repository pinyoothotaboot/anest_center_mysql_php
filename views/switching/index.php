<?php 
	$list= array('id'=>'ID','sap'=>'SAP','sn'=>'S/N','name'=>'Name',
				 'code'=>'Code','group'=>'Group','address'=>'Address');
						 
	$list1 = array('id','sap','sn','name','code','group','address');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[1]);
?>
<form name="switching-form" method="post" action="<?php echo URL;?>switching/select"> 
<div id="table-switching">
	<table id="switching-table">
		<thead>
        	<th width="7%">
            	<a class="label-tr">SAP</a>
            </th>
            <th width="10%">
            	<a class="label-tr">S/N</a>
            </th>
            <th width="15%">
            	<a class="label-tr">Name</a>
            </th>
            <th width="15%">
            	<a class="label-tr">Code</a>
            </th>
            <th width="10%">
            	<a class="label-tr">Group</a>
            </th>
            <th width="15%">
            	<a class="label-tr">Address</a>
            </th>
            <th width="5%"><a class="label-tr">switching</a></th>
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
						
					echo "<td ><a class=\"label-td\" href=\"".URL."switching/switched/".$value['equipment_list_id']."\"> ย้ายเครื่อง</a></td>";
					echo "</tr>";
					}
				?>
        </tbody>
    </table>
</div>
</form>