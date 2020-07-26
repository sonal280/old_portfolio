<?php 
session_start();
include('session_check.php');
include('db.php');
// include'db.php';

$query ="SELECT * FROM login where id = '".$_SESSION['id']."'";
$result = mysql_query($query, $con);
$row = mysql_fetch_assoc($result);

// for login; 
$query1 = "SELECT count(*) as total_user from login";
$result1 = mysql_query($query1, $con);
$row1 = mysql_fetch_assoc($result1);

// for Category
$query2 = "SELECT count(*) as total_user from Category";
$result2 = mysql_query($query2, $con);
$row2 = mysql_fetch_assoc($result2);


// for Post
$query3 = "SELECT count(*) as total_user from post";
$result3 = mysql_query($query3, $con);
$row3 = mysql_fetch_assoc($result3);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>E-magzine Admin - Dashboard</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
	
	<!-- font awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">
	
	<!-- ionicons -->
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/master_style.css">
	
	<!-- Minimal-art Admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">
	
	<!-- jvectormap -->
	<link rel="stylesheet" href="assets/vendor_components/jvectormap/jquery-jvectormap.css">
	
	<!-- Morris charts -->
	<link rel="stylesheet" href="assets/vendor_components/morris.js/morris.css">
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

     
  </head>

<body class="hold-transition skin-orange-light sidebar-mini">
<div class="wrapper">

<?php include('includes/header.php'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes/navigation.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xl-4 col-md-4 col-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-orange"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number"><?php echo $row1['total_user']; ?></span>

              <div class="progress">
                <div class="progress-bar bg-orange" style="width: 15%"></div>
              </div>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-md-4 col-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-orange"><i class="ion ion-ios-eye-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Categories</span>
              <span class="info-box-number"><?php echo $row2['total_user']; ?></span>

              <div class="progress">
                <div class="progress-bar bg-orange" style="width: 30%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-md-4 col-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-orange"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Post</span>
              <span class="info-box-number"><?php echo $row3['total_user']; ?></span>

              <div class="progress">
                <div class="progress-bar bg-orange" style="width: 45%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('includes\footer.php') ?>
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	  
	<script src="assets/vendor_components/jquery/dist/jquery.js"></script>
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	
	<script src="assets/vendor_components/chart-js/chart.js"></script>
	<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
	<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>	
	<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>	
	<script src="assets/vendor_components/raphael/raphael.min.js"></script>
	<script src="assets/vendor_components/morris.js/morris.min.js"></script>
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	<script src="js/template.js"></script>
	<script src="js/pages/dashboard.js"></script>
	<script src="js/demo.js"></script>
</body>
</html>
