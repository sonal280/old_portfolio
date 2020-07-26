<?php 
include('db.php');

 ?>

<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
        </div>
        <div class="info float-left">
          <p style="color: black">
            <?php
            
            echo $_SESSION['user_name']; 
           ?>
             
           </p>
          <a href="#" style="color: black"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
		  <!-- search form -->
      
      <!-- /.search form -->
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "home.php" ? "active" : "" ); ?>">
          <a href="./home.php" >
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>		
        </li>
		  
        <li class="treeview <?php echo (basename($_SERVER['PHP_SELF']) == ".php" ? "active" : "" ); ?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Add Users</span>
          </a>
        </li>
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "category.php" || basename($_SERVER['PHP_SELF']) == "new_category.php" ? "active" :"" ); ?>">
          <a href="category.php">
            <i class="fa fa-th"></i>
            <span>Category</span>
          </a>
        </li>
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "post.php" || basename($_SERVER['PHP_SELF']) == "addpost.php" ? "active" : "" ); ?>">
          <a href="post.php">
            <i class="fa fa-pie-chart"></i>
            <span>Posts</span>
          </a>
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
		<!-- item-->

	</div>
  </aside>




