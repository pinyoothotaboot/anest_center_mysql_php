<?php 
	$list= array('id'=>'ID','sn'=>'S/N','name'=>'Name',
				 'group'=>'Group','address'=>'Address');
						 
	$list1 = array('id','sn','name','group','address');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[0]);
?>
<form name="servicerepair-form" method="post" action="<?php echo URL;?>servicerepair/select"> 
<div id="table-servicerepair">
	<table id="servicerepair-table">
		<thead>
            <th width="10%">
            	<a class="label-tr">S/N</a>
            </th>
            <th width="20%">
            	<a class="label-tr">Name</a>
            </th>
            <th width="20%">
            	<a class="label-tr">Address</a>
            </th>
            <th width="20%">
            	<a class="label-tr">Detail send</a>
            </th>
            <th width="10%">
            	<a class="label-tr">Tech send</a>
            </th>
             <th width="10%">
            	<a class="label-tr">Date send</a>
            </th>
            <th width="5%"><a class="label-tr">Back</a></th>
        </thead>
        <tbody>
        	<?php
				foreach($this->selectdatatable[1] as $key => $value){
					echo "<td><a class=\"label-td\">".$value['equipment_list_sn']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['equipment_gen_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['address_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['repair_about_send']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['user_name']."</a></td>";
					echo "<td><a class=\"label-td\">".$value['repair_date_send']."</a></td>";
						
					echo "<td ><a class=\"label-td\" href=\"".URL."servicerepairback/back/".$value['repair_id']."\"> Back</a></td>";
					echo "</tr>";
					}
				?>
        </tbody>
    </table>
</div>
</form>