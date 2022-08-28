<?php 
/**
 * 
 */
class Auth extends Crud

{
	
	private $password=null;
	private $email=null;

	public function is_AuthenticatedAdmin($post){

		$sql="SELECT  *FROM admin where username = ?  LIMIT 1";
			$username = strip_tags($_POST['username']); 
			$password = strip_tags($_POST['password']); 
			$stmt=$this->con->prepare($sql);
			$stmt->execute([$username]);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0){

						switch ($row['Userlevel']) {
							case '1':
								$_SESSION['admin_session1'] = $row['password'];
								$this->redirect('admin/');
								break;
							default:
								
							break;
						} 
		}
		else{
			throw new Exception("Invalid Details");
		}
	}

		public function is_AuthenticatedApplicant($post){

		$sql="SELECT  *FROM applicants where matno = ?  LIMIT 1";
			$matno = strip_tags($_POST['matno']);  
			$stmt=$this->con->prepare($sql);
			$stmt->execute([$matno]);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0){
					$_SESSION['applicants_session']=$matno;
					$this->redirect('applications/students-dashboard.php');
			}
		else{
			throw new Exception("sorry, you have not applied for hostels");
		}
	}
/*
	public function validateAdminLogin(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			
		  		if($this->is_AuthenticatedAdmin($_POST,$password)){
		 
		   if($this->checkUserLevel($email)=='0'){
		   	 $_SESSION['user'] = $this->displayField('users','id','email',$email);
		    $this->redirect('users/index.php');
		} elseif($this->checkUserLevel($email)=='1'){
			$_SESSION['adminlogins'] = $this->displayField('users','id','email',$email);;
			$this->redirect('admin/');
		}

		  }else{
		  	throw new Exception("Invalid password or email");
		  	
		  }
	
	}
} */
	/*to change main admins details*/
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


	 public function validateLogin($post){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$email = $this->isValidEmail($_POST['email']);
			$password = $_POST['password']; 
			
		  		if($this->is_AuthenticatedUser($email,$password)){
		 
		   if($this->checkUserLevel($email)=='0'){
		   	 $_SESSION['user'] = $this->displayField('users','id','email',$email);
		    $this->redirect('users/index.php');
		} elseif($this->checkUserLevel($email)=='1'){
			$_SESSION['adminlogins'] = $this->displayField('users','id','email',$email);;
			$this->redirect('admin/');
		}

		  }else{
		  	throw new Exception("Invalid password or email");
		  	
		  }
	
	}
}


	public function is_AuthenticatedUser($email,$password){

		$this->email=$email;
		$sql="SELECT  *FROM users where email=? LIMIT 1";
	
			$stmt=$this->con->prepare($sql);
			$stmt->execute([$email]);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0){
				if(password_verify($password,$row['password'])){

					return true;
				}
				else{
				return false;
			}
		}
		else{
			return false;
		}
	}


	public function checkUserLevel($email){

		$sql="SELECT  *FROM users where email=? LIMIT 1";
	
			$stmt=$this->con->prepare($sql);
			$stmt->execute([$email]);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			return $row['user_level'];
		
	}


	public function checkLogin($session){

			if(!isset($_SESSION[$session])){
				$this->redirect("../");
			}
	}

	public function userInfo($column,$id){
		$data = $this->displayAllSpecific('users',$column,$id);
		return $data;
	}
	public function redirect($url){
		header('location:'.$url);
	}
	public function getReferral($referral){
		if(isset($referral)){
			$this->insertReferral($referral);
		}
	}
}
?>