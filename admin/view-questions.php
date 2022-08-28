<?php
session_start();
//error_reporting(0);
$msg="";
$error = "";
$password='';
require_once('includes/autoloader.php');
$auth = new Auth();


if(!isset($_SESSION['admin_session1'])){
    header("location:../index.php");
}else{
    if(isset($_POST['approve_btn'])){
        try {
            $query = "UPDATE questions SET status=? WHERE id=?";
            $data =array('1',$_POST['id']);
            $auth->update($query,$data);
            $msg ="questions is public now";
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }

     

       if(isset($_POST['delete'])){
        try {
           
            $auth->deleteSpecific('test_questions','id',$_POST['id']);
            $msg= "deleted successfully";
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
        <title>view questions| hosptial management system</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <link  rel="stylesheet" href="css/style.css">
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
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
    <body class="top-navbar-fixed" style="background:#efffcc;">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">View questions</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="view-Applicants.php"><i class="fa fa-user"></i></a></li>
                                        <li class="active"> Manage all questions</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Manage  questions</h5>
                                                </div>
                                            </div>
                                          

                               
                                            <div class="panel-body p-20">

              <div class="" role="alert" id="showMessage">
                <?php if($msg){?>
<div class="alert alert-success left-icon-alert " style="color:red" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert" style="color:red">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error);} ?>
                                        </div> 


 </div>                 <div class=" col-md-12 col-md-12 col-sm-12" style="overflow:scroll; " >
                       

                    
                        <br/><table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                              <th>S/N</th>
                                              <th>Question</th>
                                               <th>Option1</th>
                                              <th>Option2</th>
                                              <th>Option3</th>
                                              <th>Option4</th>
                                              <th>Causes</th>
                                               <th>Action</th>
                                                          

                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
<tr>
     <?Php 
try {
     
    $results=$auth->displayAll('test_questions');
  
     $i=0;
     if(is_array($results)){

      foreach ($results as $result) {
        $i+=1;
     ?>
        
 <td><?Php echo $i?></td>                                    
                                                                 <td><?php echo $result['question'];?></td>
                                                                 <td><?php echo $result['option1'];?></td>
                                                                 <td><?php echo $result['option2'];?></td>
                                                                 <td><?php echo $result['option3'];?></td>
                                                                 <td><?php echo $result['option4'];?></td>
                                                                 <td><?=$result['causes']?></td>


                                                          <td>
                                                  
       <form method="post">
               <input type="submit" value="Delete" name="delete" style="background-color:indianred; border-radius: 4px; color:white">
               <input type="hidden" name="id" value="<?=$result['id']?>">
           </form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit-questions.php?id=<?=$result['id']?>" class="btn btn-primary"> <i class="fa fa-edit"></i> Edit</a>
                                                                                                      
                                                    
          
                                                    </td>
                                             
                </tr>
        
                                                       
                   <?php }}} catch(Exception $e) {

    $error=$e->getMessage();
    
 }?>                                 
                                                    </tbody>
                                                </table>

                                         </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

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
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="../js/prism/prism.js"></script>

<!-- ========== THEME JS ========== --> 
<script src="js/main.js"></script>
<script src="js/customjs.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>

       
    </body>
</html>
<?php } ?>

