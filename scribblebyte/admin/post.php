<?php 
session_start();
include('db.php');
include('session_check.php');

if (isset($_POST['update'])) {
	$update = "UPDATE `category` SET `cat_name`='".$_POST['up_cat_name']."'  WHERE cat_id = '".$_REQUEST['editid']."'";
	$result = mysql_query($update, $con);
	if ($result) {
		echo "<script>alert('update successfully')</script>";?>
		<script>window.location="category.php"</script><?php 
	}
	else
	{
		echo "<script>alert('updated not')</script>";

	}
}

elseif (isset($_REQUEST['userid'])) {
	$delete = "DELETE FROM `post` WHERE post_id = '".$_REQUEST['userid']."'";
	$result = mysql_query($delete, $con);
	if ($result) {
		echo "<script>alert('Data Deleted')</script>";
	}
	else
	{
		echo "<script>alert('Something Error')</script>";

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
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
	
	<!-- font awesome -->
	<link  rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">
	
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
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
   	<style type="text/css">
  #return-to-top {
    position: fixed;
    bottom: 63px;
    right: 20px;
    background: #ff6028;
    width: 50px;
    height: 50px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
    z-index: 500;
  }
  #return-to-top i {
      color: #fff;
      margin: 0;
      position: relative;
      left: 0px;
      top: 9px;
      font-size: 19px;
      -webkit-transition: all 0.3s ease;
      -moz-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease;
  }
  #return-to-top:hover {
      background: #ffbf36;
  }
  #return-to-top:hover i {
      color: #fff;
      /*top: 5px;*/
      -webkit-transform: rotate(360000deg);
    -ms-transform: rotate(360000deg);
    transform: rotate(360000deg);
  }
</style> 
  </head>

<body class="hold-transition skin-orange-light sidebar-mini">
<div class="wrapper">
<a href="addpost.php" title="Add Category" id="return-to-top" class="btn btn-warning"><i class="fa fa-plus" ></i></a>
<?php include('includes/header.php'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes/navigation.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post List
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Post</li>
      </ol>
    </section>

    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select Elements</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-2 col-12">
              <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
             
              <!-- /.form-group -->
            </div>

            <div class="col-md-2 col-12">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Activate</option>
                  <option>Deactivate</option>
                </select>
              </div>
            </div>

            <div class="col-md-2 col-12">
              <div class="form-group">
                <label>From date</label>
                <input type="text" class="form-control" style="width: 100%">
              </div>
            </div>

             <div class="col-md-2 col-12">
              <div class="form-group">
              	<label for="">To Date</label>
                <input type="text" class="form-control" style="width: 100%">
              </div>
            </div>


           <div class="col-md-4 col-12" style="margin-top: 30px;">
              <div class="form-group">
                <input type="submit" name="Search" value="Search" class="btn btn-lg btn-success">
                <input type="submit" name="reset" value="Reset" class="btn btn-lg btn-warning">
                <input type="submit" name="reset" value="Cancel" class="btn btn-lg btn-danger">
              </div>
            </div>
          </div>
        </div>  
      </div>
   
	    	<div class="box">
	      		<div class="box-body">
					<table id="example1" class="table table-striped table-bordered" style="width:100%">
				        <thead>
				            <tr>
				                <th>Post Id</th>
				                
				                <th>Title</th>
				                <th>Created By</th>
				                <th>Created at</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>
			            <?php 
				           	$select = "SELECT * FROM post";
				           	$result = mysql_query($select, $con);

				           	$session_query = "SELECT * FROM login WHERE id = '".$_SESSION['id']."'";
							$session_result = mysql_query($session_query, $con);
							$row1 = mysql_fetch_assoc($session_result);
				           	while ($row = mysql_fetch_assoc($result)) {
				           		?>
				           		<tr>
				           			<td><?php echo $row['post_id'] ?></td>
				           			
				           			<td><?php echo $row['title'] ?></td>
				           			<td><?php echo $row1['user_name'] ?></td>
				           			<td><?php echo date('d-M-Y H:i A', strtotime($row['created_at'])); ?></td>
			            			<td><a href="editnew.php?editid=<?=$row['post_id']?>" class="btn btn-warning">Edit</a>  <a href="post.php?userid=<?=$row['post_id']?>" class="btn btn-danger">Delete</a></td>
				           		</tr>
				          <?php 
				          	}
				            ?>
						
	            		
	        	</tbody>
   			 </table>
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
	
	<!-- Bootstrap 4.0 -->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>	
	
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
	<script src="assets/vendor_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
	  
    
    <!-- start - This is for export functionality only -->
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
	
	<!-- Minimal-art Admin for Data Table -->
	<script src="js/pages/data-table.js"></script> 
	<?php 
  	if (isset($_REQUEST['editid']) && $_REQUEST['editid']!="") {
  	 	?>
  	 	<script type="text/javascript">
  	 		document.getElementById("up").click();
  	 	</script><?php
  	 } ?>
	 
</body>

<!-- Mirrored from minimal-art-admin-templates.multipurposethemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Sep 2018 07:16:05 GMT -->
</html>
