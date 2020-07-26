<?php 
session_start();
include('./db.php');
// include('session_check.php');

if (isset($_POST['submit'])) {

  $cat_name = $_POST['cat_name'];
  $select = "SELECT * FROM category WHERE cat_name = '".$cat_name."'";
  $result1 = mysql_query($select, $con);
  if (mysql_num_rows($result1)>0) {
    ?>
    <script>alert('duplicate entry');</script>
  <?php 
  }

   else
   {

    	$insert = "INSERT INTO `category`(`cat_name`, `cat_status`, `cover_image`, created_by) VALUES ('".$_POST['cat_name']."', '".$_POST['cat_status']."', '".$_FILES['file']['name']."', '".$_SESSION['id']."')";
    	$result = mysql_query($insert, $con);
    	if ($result) {
    		$target_dir = "upload/";
    		$target_file = $target_dir.basename($_FILES["file"]["name"]);
    		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        echo "<script>alert('New category added successfully');</script>";
    		header('Location:category.php');
      }
	 }

}
?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from minimal-art-admin-templates.multipurposethemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Sep 2018 07:15:22 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">

<title>E-magzine</title>

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

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
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
<?php include('includes\header.php') ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes\navigation.php') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Category
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="category.php">Category</a></li>
        <li class="breadcrumb-item active">Add New Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
            	<form method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validate()">
					<div class="form-group">
						<h5>Category Name <span class="text-danger">*</span></h5>
						<div class="controls">
							<input required type="text" name="cat_name" class="form-control" required data-validation-required-message="This field is required">
							 </div>
						
					</div>
					<div class="form-group">
						<h5>Category Status <span class="text-danger">*</span></h5>
						<div class="controls">
             <select class="form-control select2" style="width: 100%;" name="cat_status">
                  <option selected="selected" value="1">Active</option>
                  <option value="0">Deactive</option>
             </select>
						</div>
					</div>
					<div class="form-group">
						<h5>Category Cover Image <span class="text-danger">*</span></h5>
						<div class="controls">
							<input required type="file" name="file" id="fileToUpload" accept="image/png, image/jpeg" class="form-control" required onchange="ValidateSize(this)"> </div>
					</div>
					
					<div class="text-xs-right">
						<button type="submit" class="btn btn-info" name="submit" >Submit</button>
					</div>
				</form>
            	
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
	
	<script>
   function validate() {
    var category_name = document.myForm.cat_name.value;
    // var category_status = document.myForm.cat_status.value;
    var category_image = document.myForm.file.value;
    var letters = /^[a-zA-Z]*$/g;

    if (category_name == "") {
        alert("Enter a name");
        category_name.focus();
        return false;
    }

    
  else if (!letters.test(category_name)) {
        alert('Please Enter input alphabet characters only');
        category_name.focus();
        $(category_name).val('');
        return false;
    }
  
    else if (category_image == "") {
        alert("Please choose jpeg, jpg or png file only");
        category_image.focus();
        return false;
    }



}


function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024; // in MB
        if (FileSize > 1024) {
            alert('File size exceeds 1 MB');
           $(file).val(''); //for clearing with Jquery
        } else {

        }
    }
  </script>
  
<!-- jQuery 3 -->
<script src="assets/vendor_components/jquery/dist/jquery.js"></script>
<!-- popper -->
<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	

<!-- ChartJS -->
<script src="assets/vendor_components/chart-js/chart.js"></script>

<!-- Sparkline -->
<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>

<!-- jvectormap -->
<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>	
<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>	

<!-- Morris.js charts -->
<script src="assets/vendor_components/raphael/raphael.min.js"></script>
<script src="assets/vendor_components/morris.js/morris.min.js"></script>

<!-- Slimscroll -->
<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- Minimal-art Admin App -->
<script src="js/template.js"></script>

<!-- Minimal-art Admin dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>

<!-- Minimal-art Admin for demo purposes -->
<script src="js/demo.js"></script>
 
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</body>
</html>
