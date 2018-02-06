<?php 
	$list= array('id'=>'ID','name'=>'Status','sta'=>'Status','date'=>'Date deleted');
	$list1 = array('id','name','date','sta');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[0]);
?>
<form name="status-form" method="post" action="<?php echo URL;?>status/selectdatatable">  
<div id="table-status">
	<table id="status-table">
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
								echo "<td><a class=\"label-td\">".$value['status_id']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['status_name']."</a></td>";
							if($value['status']=='Active'){	
								echo "<td style=\"background:#0D0;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
							else{
								echo "<td style=\"background:#E00;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
								echo "<td><a class=\"label-td\">".$value['status_registed']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['status_date_delete']."</a></td>";
								
								echo "<td ><a class=\"label-td\" href=\"".URL."status/detail/".$value['status_id']."\"> Detail</a></td>";
								echo "<td ><a class=\"label-td\" href=\"".URL."status/edit/".$value['status_id']."\"> Edit</a></td>";
								
								if($value['status']=='Active')
									echo "<td ><a class=\"label-td\" href=\"".URL."status/delete/".$value['status_id']."\"> Delete</a></td>";
								else
									echo "<td ><a class=\"label-td\" href=\"".URL."status/delete/".$value['status_id']."\"> Un-delete</a></td>";
								echo "</tr>";
						}
				?>
                
                
           
        </tbody>
    </table>
</div>
</form>

