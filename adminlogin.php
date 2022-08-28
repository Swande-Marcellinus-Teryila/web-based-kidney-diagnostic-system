<?php  

              include('includes/autoloader.php');
              $crud = new Crud();
              $error = "";
              $msg = "";

      

              if($_SERVER['REQUEST_METHOD']=="POST"){
              try {
                $username = $_POST['email'];
                $password = $_POST['password'];
                if($crud->exist2('admin','username','password',$username,$password)){
                  session_start();
                  $_SESSION['admin_session1']=$password;
                  header("location:admin/index.php");
                }else{
                  $error = "Invalid details";
                }

              }catch(EXception $e){

              }
              }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>admin login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.0.1
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<?php include("includes/header.php");?>
<body style="background-image: url('images/bg4.jpg'); background-repeat: no-repeat ; background-size:cover">

  <main id="main"  style="z-index:30px;">
    
          <div class="col-sm-12 section-t8">
            <div class="row">
               <div class="col-md-3"> &nbsp;</div>
              <div class="col-md-7">
                <div class="title-single-box">
              <h1 class="title-single" style="color:white; background: mediumpurple; text-align: center;">Login</h1>
      
            </div>
                <div><?php include("includes/returnmsg.php")?></div>
                <form method="post"  class="php-email-form" enctype="multipart/form-data" >
                  <div class="row">
                    <div class="col-md-8 mb-3">
                      <div class="form-group">
                        <label>USERNAME</label>
                        <input type="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Your email" required>
                      </div>
                    </div>
                   
                   
                     <div class="col-md-8 mb-3">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control form-control-lg form-control-a" placeholder="Password">
                      </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </main><br><br><br><br><br>

            <?php include("includes/footer.php");?>
            