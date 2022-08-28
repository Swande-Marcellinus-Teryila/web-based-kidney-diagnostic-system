	<?php 

						include('../../includes/connectionpage.php');
						require("autoloader.php");
					
				if(isset($_POST['submittedCand']) && isset($_POST['course_code'])){	
			/* getting data(number of candidates) for candidates that have submiited there exams*/
			$value=$_POST['submittedCand'];
			$course_code=$_POST['course_code'];


							$cand= new ExamController();
								echo  $course_code.": logs ".count($cand->getLoginCand($value,$course_code));

								}

				?>
				


