<?php 

						
					
						include('../../includes/connectionpage.php');
						
					
						if (isset($_POST['id']) && isset($_POST['tableName']) && isset($_POST['column_id']) ){
								$id=$_POST['id'];
								$tableName=$_POST['tableName'];
								$column_id=$_POST['column_id'];

						try {
							
							

							$sql="DELETE From $tableName where $column_id=:id";
						 		$stmt=$con->prepare($sql);
						 		$stmt->bindParam(':id',$id,PDO::PARAM_STR);
						 		$success=$stmt->execute();
								if($success){
									echo '<div class="alert alert-success">Record deleted successfully</div>';
								}
						 	
						} catch (Exception $e) {
							
						}
					}elseif (isset($_POST['deleteAll'])) {
							
								$tableName=$_POST['tableName'];

						try {
							
							

							$sql="DELETE  From $tableName";
						 		$stmt=$con->prepare($sql);
						 		//$stmt->bindParam(':id',$id,PDO::PARAM_STR);
						 		echo $stmt->rowCount();
						 		$success=$stmt->execute();
								if($success){
									echo '<div class="alert alert-success">All Records deleted successfully</div>';
								}
						 	
						} catch (Exception $e) {
							
						}
					} 
				?>
				


