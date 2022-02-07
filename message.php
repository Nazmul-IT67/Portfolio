<?php
	include'include/header.php';
	require_once'database.php';
	$select="SELECT * FROM contact";
	$users =mysqli_query($db, $select);
?>
<div class="midde_cont">
	<div class="container-fluid">
   	<div class="row column_title">
         <div class="col-md-12">
         	<div class="page_title">
           	  <h2><a href="dashboard.php">Dashboard/</a>Message</h2>
         	</div>
     	   </div>
   	</div>
   	<div class="row column3">
      	<div class="col-md-12">
		    	<div class="col-md-12">
		      	<div class="white_shd full margin_bottom_30">
		          	<div class="full graph_head">
		            	<div class="heading1 margin_0">
		                <h2>All Message</h2>
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
		                         	<th>Message</th>
		                         	<th>Status</th>
		                         	<!-- <th>Action</th> -->
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
				                        	<td><?php echo$value['message']?></td>
				                        	<td>
				                        		<?php
				                        			if ($value['status']==1) {
				                        				?>
				                        				<a class="btn btn-success" href="mstatus.php?status_id=<?php echo $value['id']?>">Red</a>
				                        				<?php
				                        			}else{
				                        				?>
				                        				<a class="btn btn-primary" href="mstatus.php?status_id=<?php echo $value['id']?>">Unred</a>
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