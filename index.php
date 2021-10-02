<?php 
	$_SESSION['Username'] = 0;
	session_start();

	if(isset($_SESSION['Username'])){
      $url=null;
      $level = 0;
      if($_SESSION['Role']=="Admin"){
        $level = 4;
      } else if($_SESSION['Role']=="Seller"){
        $level = 2;
      } else if($_SESSION['Role']=="Member"){
        $level = 1;
      }
			
		}
	


	if(isset($_GET['logout'])){
		$_SESSION = array();
		session_destroy();
	}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MyTrade - Home</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-custom.css" rel="stylesheet">

  <style>
    


  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion ct-sidebar" id="accordionSidebar">

      <!-- Account Settings -->
      
      <div class="ct-accdet account">
        <?php if(isset($_SESSION['Username'])) : ?>
          <div class="ct-accpic account" id="account-pic"><a href="#" data-target="#uploadModal" data-toggle="modal" ><i class="fas fa-plus-circle"></i></a></div>
          <h4><?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER"?></h4>
          <span><?php if(isset($_SESSION['Role'])) { echo $_SESSION['Role'];} else echo "Not Mentioned"?></span><br>
          <!-- <span>[Description]</span><br> -->
          <button class="btn btn-light" onClick="logout()">LOGOUT</button><br><br>
        <?php else : ?>
          <div class="text-center">
            <h4>HINT</h4>
            <p id="user-warn">You need to Login to the website inorder to get full features.</p>
          </div>
          <a class="btn btn-light" 
          href="login.html"
          >LOGIN</a><br><br>
          <span>OR</span><br><br>
          <a class="btn btn-dark" 
          href="register.html"
          >REGISTER</a><br><br>
        <?php endif; ?>
      </div>

      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->

      <!-- Heading -->
      <div class="sidebar-heading">
        Site Navigation
      </div>
      <li class="nav-item">
        <a class="nav-link" href="index.php" id="ct-link">
          <i class="fas fa-users-cog"></i>
          <span>Home</span></a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="items.php" id="ct-link">
          <i class="fas fa-users-cog"></i>
          <span>Products</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php" id="ct-link">
          <i class="fas fa-users"></i>
          <span>About Us</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html" id="ct-link">
          <i class="fas fa-address-book"></i>
          <span>Contact Us</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->

      <!-- Heading -->
      <?php if(isset($_SESSION['Username'])) : ?>
      <div class="sidebar-heading">
        Dashboard
      </div>
      <li class="nav-item">
        <a class="nav-link" href="profile.php" id="ct-link">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.php" id="ct-link">
          <i class="fas fa-envelope"></i>
          <span>Messages</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my-items.php" id="ct-link">
          <i class="fas fa-users-cog"></i>
          <span>My Products</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my-orders.php" id="ct-link">
          <i class="fas fa-users-cog"></i>
          <span>My Orders</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="earnings_buyings.html" id="ct-link">
          <i class="fas fa-book"></i>
          <span>Earnings and Buyings</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="wallet.html" id="ct-link">
          <i class="fas fa-wallet"></i>
          <span>Ez Wallet</span></a>
      </li> -->
      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php endif; ?>

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav id="ct-nav" class="navbar navbar-expand navbar-light ct-nav-main topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <div class="ct-nav">
            
            
            <ul>
              <li><a href="index.html"><h3>MyTrade</h3></a></li>
              <?php if(isset($_SESSION['Username'])) : ?>
              <li><a href="my-items.php" class="nav-hide"><i class="fas fa-home"></i></a></li>
              <li><a href="my-orders.php" class="nav-hide"><i class="fas fa-shapes"></i></a></li>
              <?php endif; ?>
            </ul>
          </div>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <a href="#search-model">
              <div class="ct-search-hidden" id="search-icon">
                <i class="fas fa-search"></i>
              </div>
            </a>
            <div class="input-group" id="search-tool">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success ct-button-dynamic" type="button">
                  <!-- <i class="fas fa-search fa-sm"></i> -->
                  SEARCH
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Language Buttons -->
            <div class="ct-button-outline" id="language-pack">
              <div class="input-group-append">
                <button class="btn btn-primary">English</button>
                <button class="btn btn-primary">සිංහල</button>
                <button class="btn btn-primary">தமிழ்</button>
              </div>
            </div>
            
            

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-slash" id="user-icon"></i>
                <!-- Counter - User -->
                <!-- <span class="badge badge-danger badge-counter">3+</span> -->
              </a>
            </li>

            

            <div class="ct-button-outline" id="nav-log">
              <div class="input-group-append">
              <?php if(isset($_SESSION['Username'])) : ?>
                <a class="btn btn-light" id="logout"  onClick="logout()">LOGOUT</a>
              <?php else : ?>
                <a class="btn btn-success" id="login" href="login.html">LOGIN</a>
              <?php endif ; ?>
            </div>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Banner Design -->
          <div class="row" >

            <!-- Area Chart -->
            <div class="col-xl-12">
              <div class="card shadow mb-4" style="width: 100%;">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" id="slider" style="max-height: 85vh;">
                    <div class="carousel-item active">
                      <img src="img/sample/slider/pic2.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block ct-front-slide">
                        <h5>EVOLUTION</h5>
                            <p>Online Marketing industry is continuing with huge potential and well aligned order. It's time for you to join and 
                              become part of the order.</p>
                              
                              <div class="ct-button-outline">
                                <a class="btn btn-primary dark" id="login" href="login.html">LOGIN</a>
                                <a class="btn btn-primary dark" href="register.html">Register</a>
    
                              </div>
            
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="img/sample/slider/pic6.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block ct-front-slide">
                        <h5>EVOLUTION</h5>
                        <p>Online Marketing industry is continuing with huge potential and well aligned order. It's time for you to join and 
                          become part of the order.</p>
                          <div class="ct-button-outline">
                                <a class="btn btn-primary dark" id="login" href="login.html">LOGIN</a>
                                <a class="btn btn-primary dark" href="register.html">Register</a>
    
                          </div>
                          
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="img/sample/slider/pic7.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block ct-front-slide">
                        <h5>EVOLUTION</h5>
                        <p>Online Marketing industry is continuing with huge potential and well aligned order. It's time for you to join and 
                          become part of the order.</p>
                          
                          <div class="ct-button-outline">
                                <a class="btn btn-primary dark" id="login" href="login.html">LOGIN</a>
                                <a class="btn btn-primary dark" href="register.html">Register</a>
    
                          </div>

                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                

              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                
                
              </div>
            </div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; HACKISH | MAX</span>
            <br><br>
            <a href="#">Terms and Conditions</a> | <a href="#">License</a> | <a href="#">RSS</a>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Upload Modal-->
  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add a new Status.</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Add" button below if you want to add this Status.<br>
          <div class="form-group">
              <label>Descriptiion</label>
              <input type="file" id="upload" class="form-control" >
              <span></span>
              <small class="text-danger" > Upload is Empty!</small>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" onclick="userProfileUpload(event)" data-dismiss="modal">Upload</a>
        </div>
      </div>
    </div>
  </div>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Alternate -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Alternate -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Scroll Reveal -->
  

  <script src="https://unpkg.com/scrollreveal"></script>
  

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src="js/plugin/login_swap.js"></script>
  <script src="js/plugin/upload.js"></script>

  <script>
    const log = document.getElementById('logout');
    const log2 = document.getElementById('login');
    const user = document.getElementById('user-icon');
    const account = document.querySelectorAll('.account');
    const log_panel = document.getElementById('log-panel');

    // const upload = document.getElementById('btn_upload');
    // upload.addEventListener('click', userProfileUpload(event));

    var login_state = false;

    ScrollReveal().reveal('.row');
    
    function logout(){
      window.location="./php/logout.php";
    }
    
    
  </script>


</body>

</html>
