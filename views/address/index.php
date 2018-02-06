<?php 
	$list= array('id'=>'ID','name'=>'Address','sta'=>'Status','date'=>'Date deleted');
	$list1 = array('id','name','date','sta');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[0]);
?>
<form name="addres-form" method="post" action="<?php echo URL;?>address/select">  
<div id="table-address">
	<table id="address-table">
		<thead>
        	<th width="2%">
            	<a class="label-tr">ID</a>
            </th>
            <th width="15%">
            	<a class="label-tr">Name</a>
               
            </th>
           
            <th width="4%">
            	<a class="label-tr">A/C</a>
                
            </th>
            <th width="5%"><a class="label-tr">Date register</a></th>
            <th width="5%"><a class="label-tr">Date delete</a></th>
            <th width="2%"><a class="label-tr">Detail</a></th>
            <th width="2%"><a class="label-tr">Edit</a></th>
            <th width="2%"><a class="label-tr">Delete</a></th>
        </thead>
        <tbody>
        	
            	
                <?php
						foreach($this->selectdatatable[1] as $key => $value){
								echo "<td><a class=\"label-td\">".$value['address_id']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['address_name']."</a></td>";
							if($value['status']=='Active'){	
								echo "<td style=\"background:#0D0;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
							else{
								echo "<td style=\"background:#E00;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
								echo "<td><a class=\"label-td\">".$value['address_registed']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['address_date_delete']."</a></td>";
								
								echo "<td ><a class=\"label-td\" href=\"".URL."address/detail/".$value['address_id']."\"> Detail</a></td>";
								echo "<td ><a class=\"label-td\" href=\"".URL."address/edit/".$value['address_id']."\"> Edit</a></td>";
								
								if($value['status']=='Active')
									echo "<td ><a class=\"label-td\" href=\"".URL."address/delete/".$value['address_id']."\"> Delete</a></td>";
								else
									echo "<td ><a class=\"label-td\" href=\"".URL."address/delete/".$value['address_id']."\"> Un-delete</a></td>";
								echo "</tr>";
						}
				?>
                
                
           
        </tbody>
    </table>
</div>
</form>

