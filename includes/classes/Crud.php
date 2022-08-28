<?php 
			/**
			 * 
			 */
	include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}

	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			return "No found records";
		}
	}

	public function getTotal($table)
	{
		$query = "SELECT * FROM {$table}";
		$result =  $this->con->prepare($query);
		$result->execute();
		return $result->rowCount();
	}

public function getTotalSpicific($table,$column,$item)
	{
		$query = "SELECT * FROM {$table} WHERE {$column}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item]);
		return $result->rowCount();
	}

	public function getTotalSpicific2($table,$column1,$column2,$item1,$item2)
	{
		$query = "SELECT * FROM {$table} WHERE {$column}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2]);
		return $result->rowCount();
	}

	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = array();
			$data = $result->fetchAll();
			return $data;
		}else{
			return 0;
		}
	}

public function displayAllWithOrderLimit($table,$orderValue,$orderType,$limit)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType} LIMIT {$limit}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = array();
			$data = $result->fetchAll();
			return $data;
		}else{
			return 0;
		}
	}


	
	public function displayAllSpecific($table,$value,$item)
	{
		$query = "SELECT * FROM {$table} WHERE $value=? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = array();
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecific2($table,$column1,$column2,$item1,$item2)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecific3($table,$column1,$column2,$column3,$item1,$item2,$item3)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? And {$column3}=?";
		$result =  $this->con->prepare($query);
		 $result->execute([$item1,$item2,$item3]);
		if ($result->rowCount() > 0){ 
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecificWithOrder($table,$column,$item,$orderColumn,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE {$column}=? ORDER BY {$orderColumn} {$orderType}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}





	public function displayAllSpecificWithOrderWithLimit($table,$column1,$item,$orderColumn,$orderType,$limit)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? ORDER BY {$orderColumn} {$orderType} LIMIT {$limit}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}

	public function displayAllSpecificWithOrderWithLimit2($table,$column1,$column2,$item1,$item2,$orderColumn,$orderType,$limit)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? ORDER BY {$orderColumn} {$orderType} LIMIT {$limit}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}


	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			return "No found records";
		}
	}

	public function displayAllWithStatusOk($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} Where status1='1' ORDER BY {$orderValue} {$orderType}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			return 0;
		}
	} 
			public function displayField1($column,$table)
	{
		$query = "SELECT {$column} FROM {$table}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data[$column];
		}else{
			throw new Exception("Record not found");	
		}
	}

		public function displayField($column,$table,$id,$item)
	{
		$query = "SELECT {$column} FROM {$table} WHERE {$id} =? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data[$column];
		}else{
			throw new Exception("Record not found");	
		}
	}
/*
	
	public function displayFullJoin($table1,$table2,$id1, $id2)
	{
		$query = "SELECT *FROM $table1 jOIN $table2 ON {$table1.$id1}={$table2.$id2};
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			return "No found records";
		}
	}
 */
//Search 
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result =  $this->con->prepare($query); $result->execute();
		if ($result->rowCount() > 0) {
			$row = $result->fetch(PDO::FETCH_ASSOC);
			return $row;
		}else{
			return false;
		}
	}
	/* insert */


	public function insertUser($post)
	{		$full_name = $_POST['full_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$age = $_POST['age'];
			$data= array($full_name, $email, $password, $age);

		$query="INSERT INTO users (full_name, email, password, age) VALUES(?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute($data)) {

			return 'Account created successfully';
			}
			throw new Exception("sorry, something went wrong,Try Again!");
		
	}	
	


public function insertQuestion($post)

	{
$question = $this->cleanse(ucfirst($_POST['question']));
$chronic = '0';
$acute = '0';
$stone = '0';
$glo = '0';
if(isset($_POST['chronic'])){
	$chronic =$_POST['chronic'];
}
if(isset($_POST['acute'])){
	$acute = $_POST['acute'];
}

if(isset($_POST['stone'])){
	$stone =$_POST['stone'];
}
if(isset($_POST['glo'])){
$glo = $_POST['glo'];	
}


$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$causes= ucfirst($_POST['causes']);
 $data = array(
 	$question,
 	$option1,
 	$option2,
 	$option3,
 	$option4,
 	$causes,
 	$chronic,
 	$acute,
 	$stone,
 	$glo,
 	
           );
		$query="INSERT INTO test_questions(question, option1, option2, option3, option4, causes,chronic_kidney_status, acute_kidney_status, kidney_stone_status, Glomerulonephritis) VALUES(?,?,?,?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($value =$sql->execute($data)) {

			return 'Diagnostic question submitted successfully';
			}
			throw new Exception("sorry, something went wrong,Try Again!");
		
	}	

	public function insertRec($post)

	{
$low_level = ucfirst($_POST['low_level']);			  
$high_level= ucfirst($_POST['high_level']);
 $data = array(
 		$low_level,
 		$high_level
           );
		$query="INSERT INTO recommendation(low_level, high_level) VALUES(?,?)";
		$sql = $this->con->prepare($query);
	
		if ($value =$sql->execute($data)) {

			return 'Recommendation submitted successfully';
			}
			throw new Exception("sorry, something went wrong,Try Again!");
		
	}	
	/* end of insertion*/

	/* update*/

		public function update($query,$data){
 		
 		$stmt = $this->con->prepare($query);
 		$stmt->execute($data);
		}
public function updateQuestion($post,$id)

	{
$question = $this->cleanse(ucfirst($_POST['question']));			  
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$causes= ucfirst($_POST['causes']);
 $data = array(
 	$question,
 	$option1,
 	$option2,
 	$option3,
 	$option4,
 	$causes,
 	$id
           );
		$query="UPDATE test_questions SET question=?, option1=?, option2=?, option3=?, option4=?,causes=? WHERE id=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute($data)) {

			return 'Diagnostic question Edited successfully';
			}
			throw new Exception("sorry, something went wrong,Try Again!");
		
	}

		public function updateRec($post)

	{
$low_level = $this->cleanse(ucfirst($_POST['low_level']));			  
$high_level= ucfirst($_POST['high_level']);
 $data = array(
 		$low_level,
 		$high_level
           );
		$query="UPDATE recommendation set low_level=?, high_level=?";
		$sql = $this->con->prepare($query);
	
		if ($value =$sql->execute($data)) {

			return 'Recommendation is updated successfully';
			}
			throw new Exception("sorry, something went wrong,Try Again!");
		
	}	
		

		public function updateAdmin1($post){
			$username =$this->cleanse($_POST['username']);
			$password = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);
			$time = time();
 			$query = "UPDATE  admin SET username=?, password=?,date_updated=? WHERE User_level=1";
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$username,])){
 			return true;
 		}
 		throw new Exception("sorry,Something went wrong, Try again!");
 		
		}


	

	/*end of update */

	/*  beginning delete*/

	public function deleteSpecific($table,$column,$item){
		$query = "DELETE FROM {$table} Where {$column}=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$item])) {
			return true;			
		}
			throw new Exception("sorry, something went wrong, Try again!");

	}
	/* end of deletion*/
	
	

	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return $str;
		}
	}




	

	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 

 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!,"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!,"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!,"; 

		return $welcome_string;

	}

	 public function exist($table, $column,$item):bool{
	 	$query = "SELECT * FROM {$table} WHERE {$column}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	 }


	 public function exist2($table, $column1,$column2,$item1,$item2):bool{
	 	$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	 }




	 public function validatePhoto($file,$maxsize=(1024*1024*5))
	 {
		$mb=$maxsize/1024;
		$fname=$_FILES[$file]['name'];
		$size=$_FILES[$file]['size'];
		$temp=$_FILES[$file]['tmp_name'];
			$fileXtension=pathinfo($fname,PATHINFO_EXTENSION);
			if( $fileXtension!='jpg' && $fileXtension!='png' && $fileXtension!='PNG' && $fileXtension!="Jpeg")
			{
			throw new Exception("Invalid file format, png or jpg file type expected!");
			}
			elseif($size>$maxsize){
	throw new Exception(floor($size/1024)." File size too large, file size must be less or equal to ".floor($mb). " MB");


			}else
			{

			return $temp;
			
			}
}

						 public function validateFile($file,$maxsize=(1024*1024*5)){
							$mb=$maxsize/1024;
							$fname=$_FILES[$file]['name'];
							$size=$_FILES[$file]['size'];
							$temp=$_FILES[$file]['tmp_name'];
							  $fileXtension=pathinfo($fname,PATHINFO_EXTENSION);
							 if( $fileXtension!='mp3' && $fileXtension!='wav') {
								 throw new Exception("Invalid file format, mp3 or wav file type expected!");
							 }
							 elseif($size>$maxsize){
						throw new Exception(floor($size/1024)." File size too large, file size must be less or equal to ".floor($mb). " MB");
				
	
							 }else{
	
							  return $temp;
							 
							 }					 

										 }
        public function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}




	public function encrypt($password){
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	public function decrypt($password,$hashed_pswd){
		$raw_pswd = password_verify($password, $hashed_pswd);
		return $raw_pswd;	
	}
	public function isValidEmail($email){
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			throw new Exception("Invalid Email,please check and try again!");
		}else{
			return $email;
		}
	}
}


?>