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

  <title>MyTrade - Your Products</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-custom.css" rel="stylesheet">

  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-firestore.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-analytics.js"></script>
  
  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>

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

          

          <!-- Content Row -->
          <div class="row">

            <!-- Breadcrumb -->
            <div class="col-xl-12">
              <div class="card shadow mb-4">
                <div class=" d-flex flex-row  breadcr" >
                  <span class="bread"><a href="index.php">Home</a></span>
                  <span class="ct-breaker">|</span>
                  <span class="current">Products</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Banner Design -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12">
              <div class="card shadow mb-4">

                <div class="card-body ct-card-spec ct-round-corn" >
                  <div class="row">
                    <div class="col">
                      <div class="ct-title-container">
                        <h1 class="ct-special">ERA OF<br><span class="ct-font-green">DIGITAL PRODUCTS</span> </h1>
                        <h4 class="ct-font-green">JOIN WITH US. FIND PRODUCTS. START YOUR BUSINESS.</h4>
                      </div>
                      
                    </div>
  
                    <div class="ct-m-img col" id="im-col" >
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                        
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="ct-title-container">
                        <p id="exec-dec">Open Sans is a humanist sans serif typeface designed by Steve Matteson, Type Director of Ascender Corp. 
                          This version contains the complete 897 character set, which includes the standard ISO Latin 1, Latin CE, 
                          Greek and Cyrillic character sets. Open Sans was designed with an upright stress, open forms and a neutral, 
                          yet friendly appearance. It was optimized for print, web, and mobile interfaces, and has excellent 
                          legibility characteristics in its letterforms.</p>
                        <a href="register.html" class="btn btn-primary  bread" >Join</a>
                      </div>
                    </div>
                  </div>
                  
                  
                </div>

              </div>
            </div>
          </div>

          <!-- Displayer -->

          <div class="row" id="item-container"></div>
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

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>

  <script src="js/firebase/items.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

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

    getItems();

    function logout(){
      window.location="./php/logout.php";
    }
  </script>

</body>

</html>
