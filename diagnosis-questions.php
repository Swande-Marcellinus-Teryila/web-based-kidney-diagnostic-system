<?php   session_start();
if(isset($_SESSION['userlogin'])){

              include('includes/autoloader.php');
              $crud = new Crud();
              $error = "";
              $msg = "";


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Diagnostic quesitios</title>
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
          <h3 class="title-single" style="color:white; background: mediumpurple; text-align: center;">Please answer the diagnostic questions below <I class="mai mai-user"></I></h3>
      
            </div>
                <div><?php include("includes/returnmsg.php")?></div>
              <form method="post" action="diagnosis-result.php">
                  <ol>
                    <?Php try {
                    $id = 1;
                      $questions = $crud->displayAll('test_questions');
                      foreach ($questions as $qu){?>

                    <li> 
                      <p><?=$qu['question']?></p>
                      <p>
                        <input type="radio" name="q<?=$id?>" value="0_<?php echo $qu['id']  ?>" required> <?=$qu['option1']?></p>
                      <p><input type="radio" name="q<?=$id?>" value="30_<?php echo $qu['id']  ?>"> <?=$qu['option2']?></p>
                      <p><input type="radio" name="q<?=$id?>" value="60_<?php echo $qu['id']  ?>"> <?=$qu['option3']?></p>
                      <p><input type="radio" name="q<?=$id?>" value="100_<?php echo $qu['id']  ?>"> <?=$qu['option4']?></p>
                    </li> 

                  
                  <?Php $id++;
                }}catch(EXception $e){
                    echo "Diagnostic questions are yet to be uploaded, processing...";
                  }?>

                  </ol>
                   <center> <input type="submit" name="submit" value="submit" class="btn btn-primary btn-lg"></center>
                </form>
              </div>
            </div>
          </div>
        </main><br><br><br><br><br>

            <?php include("includes/footer.php");}else{
              header('location:login.php');
            }?>
            <script>
             
            </script>