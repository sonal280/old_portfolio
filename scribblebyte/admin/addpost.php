<?php 
session_start();
include('session_check.php');
include('db.php');
//include('session_check.php');
if (isset($_POST['save'])) {

 	$query = "INSERT INTO `post`(`cat_id`, `title`, `description`, `image`, created_by) VALUES ('".$_POST['cate_name']."', '".$_POST['post_title']."', '".$_POST['post_description']."', '".$_FILES['fileToUpload']['name']."', '".$_SESSION['id']."')";
 	$result = mysql_query($query, $con);
 	if ($result) {
 		$target_dir = "upload/";
 		$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
 		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);?>

 		<script>window.location="post.php"</script>
 		
 	<?php }
 	else
 	{
 		echo "false";
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
		    	<h4 class="modal-title">Add New Post</h4>
			      <ol class="breadcrumb">
			        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
			        <li class="breadcrumb-item "><a href="post.php"><i class="fa fa-dashboard"></i> Home</a></li>
			        <li class="breadcrumb-item active">Add New Post</li>
			      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		    	<div class="box">
	      			<div class="box-body">
					  	<form method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validate()">
				     		<div class="row">
				          		<div class="col-lg-12"><label for=""><b>Category Name</b></label></div>
				          		<div class="col-lg-12">
				          			<select name="cate_name" id="" class="form-control">
				          				<?php 
				          					$query = "SELECT * FROM `category`"; 
				          					$result = mysql_query($query, $con);
				          					if (mysql_num_rows($result)>0) {
				          						while ($row = mysql_fetch_assoc($result)) {
				          							?>
				          							<option value="<?=$row['cat_id']?>" name="cattt"><?php echo $row['cat_name'] ?></option>
				          					<?php 	}
				          					}
				          				?>

				          			</select>
				          		</div>
				        	</div>
				        	<br>
				        	<div class="row">
				          		<div class="col-lg-12"><label for=""><b>Title</b></label></div>
				          		<div class="col-lg-12"><input required type="text" class="form-control" name="post_title">
				          		</div>
				        	</div>
				        	<br>
				        	<div class="row">
				          		<div class="col-lg-12"><label for=""><b>Cover Image</b></label></div>
				          		<div class="col-lg-12"><input required type="file" class="form-control" name="fileToUpload"  id="fileToUpload" accept="image/png, image/jpeg">
				          		</div>
				        	</div>
				        	<br>	 	
				        	<div class="row">
				          		<div class="col-lg-12"><label for=""><b>Description</b></label></div>
				          		<div class="col-lg-12"><textarea required id="editor"" cols="20" rows="10" class="form-control ckeditor" name="post_description"></textarea>
				          		</div>
				        	</div>
				        	
				            <div class="col-md-12 text-center"><br> 
				            	<button type="submit" class="btn btn-block btn-success" name="save" value="1" style="border-bottom: 4px green inset">SUBMIT
				            	</button>
				            </div>
						</form>
					</div>
				</div>
			</section>
		    <!-- /.content -->
		  </div>
  		<?php include('includes\footer.php') ?> 
	</div>
<!-- ./wrapper -->
  	<script>
   function validate() {
    var cate_name = document.myForm.cate_name.value;
    var post_title = document.myForm.post_title.value;
    var post_image = document.myForm.fileToUpload.value;
    var post_description = document.myForm.post_description.value;
    var letters = /^[a-zA-Z]*$/g;

   

     if (post_title == "") {
        alert("Post Title should not be blank");
        post_title.focus();
        return false;
    }

    if (!letters.test(post_title)) {
        alert('Please Enter input alphabet characters only');
        post_title.focus();
        return false;
    }
    if (post_description == "") {
        // alert("Post Description should not be blank");
        post_description.focus();
        return false;
    }
    if (post_image == "") {
        alert("Please choose jpeg, jpg or png file only");
        post_image.focus();
        return false;
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
