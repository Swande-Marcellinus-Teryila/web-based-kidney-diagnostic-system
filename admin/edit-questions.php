<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
session_start();
//error_reporting(0);
$msg="";
$error = "";
$password='';
require_once('includes/autoloader.php');
$auth = new Auth();
try{
$password = $auth->displayField('password','admin','password',$_SESSION['admin_session1']);
}
catch(Exception $e){

}

if(!isset($_SESSION['admin_session1']) || $_SESSION['admin_session1']!=$password){
    header("location:../index.php");
}else{
    if(($_SERVER["REQUEST_METHOD"]=="POST") && isset($_POST['submit'])){
        try {
            $msg = $auth->updateQuestion($_POST,$id);
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Question</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
      <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
         <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>


    </head>
   <body class="top-navbar-fixed" style="background:#efffcc;" >
        <div class="main-wrapper" >

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar-->
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper" >
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page" >
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                              
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li class="active" >Edit Diagnostic Question</li>
                                    </ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

        <section class="section">
            <div class="container-fluid">

                

                

                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong></strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oops! </strong> <?php echo htmlentities($error);} ?>
                                        </div> 
                                     
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                 <h2>Edit Diagnostic Question</h2>
                                </div>
                            </div>
                                <div  id="showMessage">&nbsp;</div>

                                <div class="panel-body" >

                                    <form method="post" enctype="multipart/form-data" action="">
                                        
                                 <?Php try{ $results = $auth->displayAllSpecific('test_questions','id',$id);
                                    foreach ($results as $result) {?>
                                
                                         <div class="form-group has-success ">
                                            <label for="success" class="control-label">Question</label>
                                            <div class="">
                                           <input type="text" name="question" placeholder="Diagnostic question" class="form-control" required="" value="<?=$result['question']?>">
                                          
                                            </div>
                                        </div>
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Option 1 (0%)</label>
                                            <div class="">
                                            <input type="text" name="option1"value="<?=$result['option1']?>"required="">                                        
                                            </div>
                                        </div>

                                         <div class="form-group has-success">
                                            <label for="success" class="control-label">Option2 (25%)</label>
                                            <div class="">
                                            <input type="text" name="option2" value="<?=$result['option2']?>">                                        
                                            </div>
                                        </div>

                                         <div class="form-group has-success">
                                            <label for="success" class="control-label">Option3 (50%)</label>
                                            <div class="">
                                            <input type="text" name="option3" value="<?=$result['option3']?>">                                        
                                            </div>
                                        </div>

                                         <div class="form-group has-success">
                                            <label for="success" class="control-label">Option4 (100%)</label>
                                            <div class="">
                                            <input type="text" name="option4" value="<?=$result['option4']?>">                                        
                                            </div>
                                        </div>


                                         <div class="form-group has-success">
                                            <label for="success" class="control-label">Causes</label>
                                            <div class="">
                                            <input type="text" name="causes"  placeholder="What causes the above problem(optional)" value="<?=$result['causes']?>">                                        
                                            </div>
                                        </div> <?php }}catch(Exception $e){
                                            echo "no question found";
                                        }?>

                                           <div class="">
                                                <button type="submit" name="submit"  class="btn btn-success btn-labeled" id="submit">Save<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                
                                        </div>
                                    </form>

                            </div>
                        </div>
                        <!-- /.col-md-8 col-md-offset-2 -->
                    </div>
                    <!-- /.row -->

                    
                    

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.section -->

        </div>
        <!-- /.main-page -->

    </div>
    <!-- /.content-container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.main-wrapper -->

<!-- ========== COMMON JS FILES ========== -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>

<!-- ========== THEME JS ========== --> <div on></div>
<script src="js/main.js"></script>
<script src="js/customjs.js"></script>
<script src="js/customformjs.js"></script>


<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>
</html>
<?php }}else{
    header('../adminlogin.php');
}?>