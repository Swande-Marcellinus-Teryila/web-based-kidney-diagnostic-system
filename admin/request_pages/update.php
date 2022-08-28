<?php 

						
					
						include('../../includes/connectionpage.php');
						
					
						if(isset(($_POST['id']))){
								$id=$_POST['id'];
								$tableName=$_POST['tableName'];
								$column_id=$_POST['column_id'];
								$column_name=$_POST['column_name'];
								$newdata=$_POST['newData'];
								

						try {
					
							$sql="UPDATE $tableName SET $column_name=:newData WHERE $column_id=:id";
						 		$stmt=$con->prepare($sql);
						 		$stmt->bindParam(':id',$id,PDO::PARAM_STR);
						 		$stmt->bindParam(':newData',$newdata,PDO::PARAM_STR);
						 	
						 		$success=$stmt->execute();
								if($success){
									echo '<div class="alert alert-success">Record Updated successfully</div>';
								}
						 	
						} catch (Exception $e) {
							
						}
					} 
				?>
				


