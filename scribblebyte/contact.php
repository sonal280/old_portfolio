<?php include ('admin/db.php'); ?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scribble Byte</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,900&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Tooltip plugin (zebra) css file -->
	<link rel="stylesheet" type="text/css" href="plugins/zebra-tooltip/zebra_tooltips.min.css">

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.css">

	<!-- Ideabox responsive css file -->
	<link rel="stylesheet" type="text/css" href="css/responsive-style.css">
</head>

<body>
	
	<!-- header start -->
	<?php include('includes/header.php') ?>
	<!-- header end -->

	<!-- Left sidebar menu start -->
	<?php include('includes/sidemenu.php') ?>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="main-container">

		<section class="main-content extra-pages">
			<div class="main-content-wrapper add-to-margin">
				<div class="content-body">

					<!-- article body start -->
					<article class="article-wrapper">
						<div class="article-content">
							<h1 class="extra-title">Contact</h1>
							<div class="article-inner">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

								<div class="contact-form">
									<form id="contactFrom">
										<div class="frm-row">
											<div class="columns column-2">
												<input type="text" name="nname" placeholder="Name" class="frm-input">
											</div>
											<div class="columns column-2">
												<input type="text" name="eemail" placeholder="Email" class="frm-input">
											</div>
											<div class="columns column-2">
												<input type="text" name="wwebsite" placeholder="Website" class="frm-input">
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="frm-row">
											<input type="text" name="ssubject" placeholder="Subject" class="frm-input">
										</div>
										<dic class="frm-row">
											<textarea class="frm-input" rows="8" name="mmessage" placeholder="Enter your message"></textarea>
										</dic>
										<div class="frm-row send-button">
											<button type="button" class="frm-button material-button">Send message</button>
										</div>
									</form>
								</div>
							</div>

							<!--this is important for the left ad box or share box fixer -->
							<div id="endOfTheArticle"></div>

						</div>
					</article>
					<!-- article body end -->

				</div>
				<div class="content-sidebar">
					<div class="sidebar_inner">
						
						<div class="sidebar-spacer"></div>
						<div class="sidebar-button-group">
							<a href="about-us.html" class="sidebar-buttons material-button"><i class="material-icons">&#xE851;</i><span class="btn-label">About Us</span></a>
							<a href="authors.html" class="sidebar-buttons material-button"><i class="material-icons">&#xE866;</i><span class="btn-label">Authors</span></a>
							<a href="privacy-policy.html" class="sidebar-buttons material-button"><i class="material-icons">&#xE87F;</i><span class="btn-label">Privacy Policy</span></a>
							<a href="contact.html" class="sidebar-buttons material-button active"><i class="material-icons">&#xE894;</i><span class="btn-label">Contacts</span></a>
						</div>

					</div>
				</div>
			</div>
		</section>

	</main>


	<!-- Login popup html source end -->

	<!-- Newsletter popup html source start -->
	
	<!-- Newsletter popup html source end -->

	<div class="overlay"></div>

	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js"></script>


</body>


</html>