<?php   session_start();
if(isset($_SESSION['userlogin'])){
  $email = $_SESSION['userlogin'];
              include('includes/autoloader.php');
              $crud = new Crud();
              $error = "";
              $msg = "";
              error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>diagnostic Result</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 
 
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
                 <?php
                  
              function getTotalMarks($totalQuestions){
                $counter=0;
                 for ($i=1; $i<=$totalQuestions; $i++) { 
                  $arr = explode('_', $_POST['q'.$i]);
                    
                   $counter+= $arr[0];
                 }
              return $counter;
              }


                 function getDiseaseType($totalQuestions,$finalResult){
                   include('includes/autoloader.php');
              $crud = new Crud();
              $chronic =0;
                 $stone =0;
                 $glo =0;
                 $acute =0;
                $counter=0;
                $arrtype =array();
                 for ($i=1; $i<=$totalQuestions; $i++) { 
                  $arr = explode('_', $_POST['q'.$i]);
                    
                   $id=$arr[1];
                   $results = $crud->displayAllSpecific('test_questions','id',$id);
                   foreach ($results as $type) {
                 if($type['acute_kidney_status']=='1'){
                  $acute+=$arr[0];
                 }

                 if($type['kidney_stone_status']=='1'){
                  $stone+=$arr[0];
                 } 

                 if($type['Glomerulonephritis']=='1'){
                    $glo+=$arr[0];
                   }


                 }
                 }
                if($finalResult>=90){
                return 'Chronic kidney Disease';
                }elseif($finalResult<=49){
                 return 'No kidney infection detected'; 
                }elseif($finalResult>51 && $finalResult<=89){
              
                 $arrtype=array('Kidney Stone'=> $stone,'Acute kidney Disease'=> $acute,'Glomerulonephritis'=> $glo);
                 arsort($arrtype);
                 foreach ($arrtype as $key => $value) {
                  return $key;
                break;
            }
              }
           }   
               
       function analyzer($totalQuestions){
                 
                
                 $totalMarks = getTotalMarks($totalQuestions);
               return ($totalMarks/$totalQuestions);
               
               }


              if($_SERVER['REQUEST_METHOD']=="POST"){
              try {$i=1;
                 $totalQuestions = $crud->getTotal('test_questions');
                 $finalResult = analyzer($totalQuestions);
                  $diseasetype = getDiseaseType($totalQuestions,$finalResult);
                 $fullname = $crud->displayField('full_name','users','email',$email);
                                  ?>

               <table cellpadding="0"  border="1" style="width:100%">
                <tr>
                  <td><center><b>Kidney Diagnosis Result</b></center></td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;Name: <?=$fullname; ?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>
                    <b style="padding-right: 10px; text-align: left; border: solid 2px skyblue; float:right">
                    Over All Analysis:<?= round(($finalResult-5),2);?>% </b>
                  </td>
                </tr>
                <tr>
                  <td>

                    <strong style="color:blue; font-size: 15x; text-transform: uppercase;">kidney Disease Type detected:</strong><b style="color:green; font-size: 16px;"><?= strtoupper($diseasetype) ?></b> <br><br>
                   <?php if($finalResult>=50 && $finalResult<=89){?>
                   
                    <P style="border:3px solid black;"><center>
                      <h2 style="background:mediumpurple;">Recommendation</h2>
                    <?php  
                    $recommendation = $crud->displayField1('low_level','recommendation');
                     echo $recommendation;
                   }?></center>

                   </P>
                    <?php if($finalResult>=90 && $finalResult<=100){?>
                      <h2 style="background:mediumpurple;">Recommendation<br></h2>
                      <h5>
                    <P style="border:3px solid black; float: right;"><center>
                      
                      <?php $recommendation = $crud->displayField1('high_level','recommendation');
                     echo $recommendation;
                   }?>
                     
                   </center>
                 </h5>
                   </P>
            
                   <?php if($finalResult<=49){?>
                      <h2 style="background:mediumpurple;">Recommendation<br></h2>
                      <h5>
                    <P style="border:3px solid black; float: right;"><center>
                      
                      <?php 
                     echo "No kidney disease detected.";
                   }?></center>
                 </h5>
                   </P>

                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="float:right;">
                      <button onclick="window.print()" class="btn btn-dark">PRINT</button>
                    </p></td>
                </tr>
                 
               </table>
                <?php
               
              }catch(EXception $e){

              }
              }
  ?>
          
              </div>
            </div>
          </div>
        </main><br><br><br><br><br>
   <?php include("includes/footer.php");}else{
              header('location:login.php');
            }?>