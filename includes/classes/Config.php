<?php 
/**
 * 
 */
class Config
{   
					private $password = '';
					private $user = 'root';
				// Establish database connection
				protected $con;
				private $dsn="mysql:host=localhost; dbname=kidney_diagnosis";

					function __construct()
					{	
						try {
							$this->con = new PDO($this->dsn,$this->user,$this->password);
							return $this->con;
						} catch(PDOEXCEPTION $se) {
							exit("Error: " . $se->getMessage());
						}
					}

					public function title(){
						return 'kidney_diagnosis';
					}
}
?>