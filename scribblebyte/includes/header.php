<?php session_start(); ?>
<?php 


if(isset($_SESSION['id']))
{
    header('Location: ./admin/home.php');
}
include "./admin/db.php";
if (isset($_POST['submit'])) 
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM login WHERE user_name = '".$username."' AND password = '".$password."'";
    $result = mysql_query($sql, $con);
    if (mysql_num_rows($result)>0) {
     $row = mysql_fetch_assoc($result);
     // echo $row['id'];
     // die();
     $_SESSION['id'] = $row['id'];
     $_SESSION['user_name'] = $row['user_name'];
     header('Location:./admin/home.php');
    }
    else
    {
      header('Location:./index.php?login=fail');
      echo "<script>alert('try it again')</script>";
    }

}
 ?>

 <?php 
 if (isset($_REQUEST['login']) && $_REQUEST['login']=="fail") {
   echo "<script>alert('LOGIN FAILED');</script>";
 }
  ?>







<header class="header">
		<div class="header-wrapper">

			<!--sidebar menu toggler start -->
			<div class="toggle-sidebar material-button">
				<i class="material-icons">&#xE5D2;</i>
			</div>
			<!--sidebar menu toggler end -->

			<!--logo start -->
			<div class="logo-box">
				<h1>
					<a href="index.php">Scribble Byte</a>
				</h1>
			</div>
			<!--logo end -->

			<div class="header-menu">

				<!-- header left menu start -->
				<ul class="header-navigation" data-show-menu-on-mobile>
					<li>
						<a href="index.php" class="material-button submenu-toggle">HOME</a>						
					</li>

					<li>
						<a href="#" class="material-button submenu-toggle">CATEGORY <i class="material-icons">&#xE313;</i></a>
						<div class="header-submenu">
							<ul>

								<?php 

								 $category = "SELECT * FROM category";
				                    $cat_result = mysql_query($category, $con);
				                     while($recent_row = mysql_fetch_assoc($cat_result))
				                    { ?>

										<li><a href="category.php?cat_id=<?=$recent_row['cat_id']?>"><?=$recent_row['cat_name']?></a></li>
								<?php }
								 ?> 
								<!-- <li><a href="authors.html">Authors</a></li> -->
							</ul>
						</div>
					</li>
					<li>
						<a href="about.php" class="material-button submenu-toggle">ABOUT</a>
					</li>


					<li>
						<a href="contact.php" class="material-button submenu-toggle">CONTACT</a>
					</li>
				</ul>
				<!-- header left menu end -->

			</div>
			<div class="header-right with-seperator">

				<!-- header right menu start -->
				<ul class="header-navigation">
					<li>
						<a href="#" class="material-button search-toggle"><i class="material-icons">&#xE8B6;</i></a>
					</li>
					<li>
						<a href="#" class="material-button submenu-toggle"><i class="material-icons">&#xE7FD;</i> <span class="hide-on-tablet">Account</span></a>
						<div class="header-submenu">
							<ul>
								<li><a href="#" data-modal="loginModal">Login</a></li>
								<!-- <li><a href="#" data-modal="registerModal">Register</a></li> -->
							</ul>
						</div>
					</li>
					<li class="hide-on-mobile"><a href="#" class="material-button" data-modal="newsletterModal"><i class="material-icons">&#xE0E1;</i></a></li>
				</ul>
				<!-- header right menu end -->

			</div>

			<!--header search panel start -->
			<div class="search-bar">
				<form class="search-form">
					<div class="search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="search-input">
						<button type="submit" name="search" class="search-submit"><i class="material-icons">&#xE5C8;</i></button>
					</div>
					<span class="search-close search-toggle">
						<i class="material-icons">&#xE5CD;</i>
					</span>
				</form>
			</div>
			<!--header search panel end -->

		</div>
	</header>









	<!-- Login popup html source start -->
	<div class="m-modal-box" id="loginModal">
		<div class="m-modal-overlay"></div>
		<div class="m-modal-content small">
			<div class="m-modal-header">
				<h3 class="m-modal-title">Login</h3>
				<span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
			</div	>
			<div class="m-modal-body">
				<!-- <div class="m-modal-social-logins">
					<div class="columns column-3">
						<button class="frm-button facebook material-button full" type="button">Facebook</button>
					</div>
					<div class="columns column-3">
						<button class="frm-button google material-button full" type="button">Google</button>
					</div>
				</div>

				<div class="m-modal-seperator"><span>OR</span></div> -->

				<form action="" method="post">
					<div class="frm-row">
						<input class="frm-input" type="text" name="username" placeholder="Email">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="password" name="password" placeholder="Password">
					</div>
					<div class="frm-row">
						<button class="frm-button material-button full" type="submit" name="submit">Login</button>
					</div>
				</form>
				<!-- <div class="frm-row">
					<p class="txt-center">Don't you have an account yet? <a href="#" data-modal="registerModal">Register</a></p>
				</div> -->
			</div>
		</div>
	</div>
	<!-- Login popup html source end -->







	<?php 
	if (isset($_POST['newsletter_send'])) {
		$insert = "INSERT INTO `subscriber`(`email`) VALUES ('".$_POST['email']."')";
		$result1 = mysql_query($insert, $con);
		if ($result1) {
			echo "<script><alert('Thank You ! For Subscribe our emagzine'))</script>";
		}

	}

	 ?>

	<!-- Newsletter popup html source start -->
	<div class="m-modal-box" id="newsletterModal">
		<div class="m-modal-overlay"></div>
		<div class="m-modal-content small">
			<div class="m-modal-header">
				<h3 class="m-modal-title">Newsletter</h3>
				<span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
			</div>
			<div class="m-modal-body">
				<p>Submit to our newsletter to receive exclusive stories delivered to you inbox!</p>
				<form method="post">
					<div class="frm-row">
						<input class="frm-input" type="email" name="email" placeholder="Email address" required="">
					</div>
					<div class="frm-row">
						<button class="frm-button material-button full" type="submit" name="newsletter_send">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Newsletter popup html source end -->

	