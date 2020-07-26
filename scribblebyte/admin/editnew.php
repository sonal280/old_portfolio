<?php 
session_start();
include('session_check.php');
include('/db.php');
//include('session_check.php');

if (isset($_POST['update'])) {
	$update = "UPDATE post SET cat_id='".$_POST['up_name']."', title='".$_POST['up_title']."', description='".$_POST['up_description']."', image='".$_POST['up_fileToUpload']['name']."' where post_id = '".$_REQUEST['editid']."'";	

$result = mysql_query($update, $con);
	if ($result) {
		$target_dir = "upload/";
 		$target_file = $target_dir.basename($_FILES["up_fileToUpload"]["name"]);
 		move_uploaded_file($_FILES["up_fileToUpload"]["tmp_name"], $target_file);
		?>
		<script>window.location="post.php"</script><?php 
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
<div class="wrapper">


  <?php include('includes/header.php') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes/navigation.php') ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>Edit Post</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Post</li>
      </ol>
      
    </section>

   	<?php 
   		$select = "SELECT * FROM `post` WHERE post_id = '".$_REQUEST['editid']."'";
   		$result = mysql_query($select, $con);
   		$row = mysql_fetch_assoc($result);
   		
   	 ?>


	<section class="content">
	    <div class="box">
	  		<div class="box-body">
   	 			<form action="" method="post" enctype="multipart/form-data">
		     		<div class="row">
		          		<div class="col-lg-12"><label for=""><b>Category Name</b></label></div>
		          		<div class="col-lg-12 ">
		          			<select name="up_name" id="" class="form-control">
		          				<?php 
		          					$query = "SELECT * FROM `category`"; 
		          					$result = mysql_query($query, $con);
		          					if (mysql_num_rows($result)>0) {
		          						while ($row1 = mysql_fetch_assoc($result)) {
		          							?>
		          							<option <?php if ($row['cat_id'] == $row1['cat_id']) {echo "selected";}
		          								
		          							 ?> value="<?=$row1['cat_id']?>" ><?php echo $row1['cat_name'] ?></option>
		          					<?php 	}
		          					}
		          				?>

		          			</select>
		          		</div>
		        	</div>
		        	<br>
		        	<div class="row">
		          		<div class="col-lg-12"><label for="">Title</label></div>
		          		<div class="col-lg-12"><input type="text" class="form-control" name="up_title" value="<?=$row['title']?>" >
		          		</div>
		        	</div>
		        	<br>
		        	<div class="row">
		          		<div class="col-lg-12"><label for="">Description</label></div>
		          		<div class="col-lg-12"><textarea id="editor"" cols="30" rows="10" class="form-control ckeditor" name="up_description" ><?=$row['description']?></textarea>
		          		</div>
		        	</div>
		        	<div class="row">
		          		<!-- <div class="col-lg-12"><label for="">Image</label></div> -->
		          		<div class="col-lg-12"><input type="file" class="form-control" name="up_fileToUpload"  id="fileToUpload" accept="image/png, image/jpeg" value="<?=$row['image']?>">
		          		</div>
		        	</div> 	
		            <div class="col-md-12 text-center"><br> 
		            	<button type="submit" class="btn btn-block btn-success" name="update" value="1" style="border-bottom: 4px green inset">SUBMIT</button>
		            </div>
				</form>
			</div>
		</div>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('includes\footer.php') ?>
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  
  
</div>
<!-- ./wrapper -->
  	
  	
	  
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

<!-- Mirrored from minimal-art-admin-templates.multipurposethemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Sep 2018 07:16:05 GMT -->
</html>
