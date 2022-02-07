<?php
	include'include/header.php';
	require_once'database.php';
	$select="SELECT * FROM image";
	$users =mysqli_query($db, $select);
?>
<div class="midde_cont">
	<div class="container-fluid">
   	<div class="row column_title">
         <div class="col-md-12">
         	<div class="page_title">
           	  <h2><a href="dashboard.php">Dashboard/</a>Gallery</h2>
         	</div>
     	   </div>
   	</div>
   	<div class="row column3">
      	<div class="col-md-12">
		    	<div class="col-md-12">
		      	<div class="white_shd full margin_bottom_30">
		          	<div class="full graph_head">
		            	<div class="heading1 margin_0">
			                <h2>All Images</h2>
			               	<span>
			                  <strong><a href="image.php" class="text-align-center"><i class="fa fa-plus"></i>Add Image</a></strong>
			               	</span>
		            	</div>
		          	</div>
	          	
		          	<div class="table_section padding_infor_info">
		             	<div class="table-responsive-sm">
			              	<table class="table" id="data">
			            <?php
                     if (isset($_SESSION['delete'])) {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['delete'];?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <?php
                        unset($_SESSION['delete']);
                     }
                  	?>		
			                 	<thead class="text-center">
		                   	   <tr>
		                         	<th>ID</th>
		                         	<th>Name</th>
		                         	<th>Image</th>
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
				                        	<td>
				                        		<img style="width:75px" src="gallery/image/<?php echo$value['gallery']?>">
				                        	</td>
				                        	<td>
				                        		<?php
				                        			if($value['status']==1){
				                        			?>
				                        				<a href="img-delete.php?delete_id=<?php echo$value['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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