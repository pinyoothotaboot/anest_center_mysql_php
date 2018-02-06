<?php 
	$list= array('id'=>'ID','user'=>'User','fname'=>'First Name','lname'=>'Last Name'
						 ,'tel'=>'Tel','email'=>'E-Mail','acc'=>'Account'
						 ,'sta'=>'Status','date'=>'Date deleted','gen'=>'Gender');
						 
	$list1 = array('id','fname','date','sta','tel','email','acc','lname','user','gen');
	$about = array('A to Z','Z to A');
	 $ck = true ;
	
	//print_r($this->selectdatatable);
?>
<form name="user-form" method="post" action="<?php echo URL;?>user/selectdatatable">  
<div id="table-user">
	<table id="user-table">
		<thead>
        	<th width="2%">
            	<a class="label-tr">ID</a>
            </th>
            <th width="7%">
            	<a class="label-tr">Username</a>
               
            </th>
            <th width="15%">
            	<a class="label-tr">Name-Lastname</a>
               
            </th>
            <th width="9%">
            	<a class="label-tr">E-mail</a>
               
            </th>
           
            <th width="7%">
            	<a class="label-tr">Tel</a>
               
            </th>
            <th width="7%">
            	<a class="label-tr">Account</a>
               
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
								echo "<td><a class=\"label-td\">".$value['user_id']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['user_login']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['user_name']." ".$value['user_lastname']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['user_email']."</a></td>";
								//echo "<td><a class=\"label-td\">".$value['position_name']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['user_tel']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['account']."</a></td>";
							if($value['status']=='Active'){	
								echo "<td style=\"background:#0D0;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
							else{
								echo "<td style=\"background:#E00;\"><a class=\"label-td\">".$value['status']."</a></td>";
							}
								echo "<td><a class=\"label-td\">".$value['user_registed']."</a></td>";
								echo "<td><a class=\"label-td\">".$value['user_date_delete']."</a></td>";
								
								echo "<td ><a class=\"label-td\" href=\"".URL."user/detail/".$value['user_id']."\"> Detail</a></td>";
								echo "<td ><a class=\"label-td\" href=\"".URL."user/edit/".$value['user_id']."\"> Edit</a></td>";
								
								if($value['status']=='Active')
									echo "<td ><a class=\"label-td\" href=\"".URL."user/delete/".$value['user_id']."\"> Delete</a></td>";
								else
									echo "<td ><a class=\"label-td\" href=\"".URL."user/delete/".$value['user_id']."\"> Un-delete</a></td>";
								echo "</tr>";
						}
				?>
                
                
           
        </tbody>
    </table>
</div>
</form>

