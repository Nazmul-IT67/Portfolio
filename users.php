<?php
	include'include/header.php';
	require_once'database.php';
	$select="SELECT * FROM users";
	$users =mysqli_query($db, $select);
	$count ="SELECT COUNT(*) AS total, name, email, phone FROM users";
	$aluser=mysqli_query($db, $count);
	$assoc =mysqli_fetch_assoc($aluser);

?>
<div class="midde_cont">
	<div class="container-fluid">
   	<div class="row column_title">
         <div class="col-md-12">
         	<div class="page_title">
           	  <h2><a href="dashboard.php">Dashboard/</a>Users</h2>
         	</div>
     	   </div>
   	</div>
   	<div class="row column3">
      	<div class="col-md-12">
		    	<div class="col-md-12">
		      	<div class="white_shd full margin_bottom_30">
		          	<div class="full graph_head">
		            	<div class="heading1 margin_0">
		                <h2>All Users(<?php echo$assoc['total']?>)</h2>
		               	<span>
		                  <strong><a href="register.php" class="text-align-center"><i class="fa fa-plus"></i>Add Users</a></strong>
		               	</span>
		            	</div>
		          	</div>
		          	<div class="table_section padding_infor_info">
		             	<div class="table-responsive-sm">
				            <?php
		                     if (isset($_SESSION['status'])) {
		                        ?>
		                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
		                        <strong><?php echo $_SESSION['status'];?></strong>
		                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                           <span aria-hidden="true">&times;</span>
		                        </button>
		                        </div>
		                        <?php
		                        unset($_SESSION['status']);
		                     }
		                  	?>
			              	<table class="table" id="data">
			                 	<thead class="text-center">
		                   	   <tr>
		                         	<th>ID</th>
		                         	<th>Name</th>
		                         	<th>Email</th>
		                         	<th>Phone</th>
		                         	<th>Status</th>
		                         	<th>Action</th>
		                      	</tr>
			                  </thead>
			                  <tbody class="text-center">
		                   		<?php
		                   			foreach ($users as $key => $value) {
		                   			?>
				                      	<tr>
				                      		<td><?php echo ++$key?></td>
				                        	<td><?php echo$value['name']?></td>
				                        	<td><?php echo$value['email']?></td>
				                        	<td><?php echo$value['phone']?></td>
				                        	<td>
				                        		<?php
				                        			if ($value['status']==1) {
				                        				?>
				                        				<a class="btn btn-success" href="status.php?status_id=<?php echo $value['id']?>">Active</a>
				                        				<?php
				                        			}else{
				                        				?>
				                        				<a class="btn btn-primary" href="status.php?status_id=<?php echo $value['id']?>">Deactive</a>
				                        				<?php
				                        			}
				                        		?>
				                        	</td>
				                        	<td>
				                        		<?php
				                        			if($value['status']==1){
				                        			?>
				                        				<a href="edit.php?edit_id=<?php echo$value['id']?>" class="btn btn-success">Edit</a>
				                        				<a href="delete.php?delete_id=<?php echo$value['id']?>" class="btn btn-danger">Delete</a>
				                        			<?php
				                        			}else{
				                        				?>
				                        					<a class="btn btn-dark">Not Allow</a>
				                        				<?php
				                        			}
				                        		?>
				                        	</td>
				                        </tr>
		                   			<?php
		                   			}
		                   		?>	
				               </tbody>
				            </table>
			            </div>
		            </div>
		         </div>
		      </div>
		   </div>
      </div>
   </div>
</div>
<?php include'include/footer.php'?>    