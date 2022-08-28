

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top"  >
    <div class="container">
      <button class="navbar-toggler collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand"  href="index.php"><span class="color-b" style="color:whitesmoke;">
     </span></a>

      <div class="navbar-collapse collapse header justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="index.php" style="color:white;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="create-account.php"  style="color:white;">Create Account</a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="adminlogin.php"  style="color:white;">Admin Login</a>
          </li>
           <?php if(isset($_SESSION['userlogin'])){ ?>
             <li class="nav-item">
            <a class="nav-link " href="logout.php"  style="color:red;">Log out</a>
          </li>
          
        <?php }else{?>
          <li class="nav-item">
            <a class="nav-link " href="login.php"  style="color:white;">Login</a>
          </li> <?php } ?>

           
    
        </ul>
      </div>


    </div>
  </nav><!-- End Header/Navbar -->
