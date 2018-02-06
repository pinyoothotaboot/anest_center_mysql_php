<?php 
	$list= array('id'=>'ID','name'=>'Group','sta'=>'Status','main'=>'Maintanance','date'=>'Date deleted');
	$list1 = array('id','name','date','sta','main');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable[0]);
?>
<form name="group-form" method="post" action="<?php echo URL;?>group/selectdatatable">  
<div id="table-group">
	<table id="group-table">
		<thead>
        	<th width="2%">
            	<a class="label-tr">ID</a>
            </th>
            <th width="10%">
            	<a class="label-tr">Name</a>
               
            </th>
           <th width="4%">
            	<a class="label-tr">Maintanance</a>
               
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
								echo "<td><a class=\"label-td\">".$value['group_id']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['group_name']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['group_maintanance']."</a></td>";
							if($value['status']=='Active'){	
								echo "<td style=\"background:#0D0;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
							else{
								echo "<td style=\"background:#E00;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
								echo "<td><a class=\"label-td\">".$value['group_registed']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['group_date_delete']."</a></td>";
								
								echo "<td ><a class=\"label-td\" href=\"".URL."group/detail/".$value['group_id']."\"> Detail</a></td>";
								echo "<td ><a class=\"label-td\" href=\"".URL."group/edit/".$value['group_id']."\"> Edit</a></td>";
								
								if($value['status']=='Active')
									echo "<td ><a class=\"label-td\" href=\"".URL."group/delete/".$value['group_id']."\"> Delete</a></td>";
								else
									echo "<td ><a class=\"label-td\" href=\"".URL."group/delete/".$value['group_id']."\"> Un-delete</a></td>";
								echo "</tr>";
						}
				?>
                
                
           
        </tbody>
    </table>
</div>
</form>

