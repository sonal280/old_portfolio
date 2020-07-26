<?php include('admin/db.php') ?>

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

				<?php  
					$select = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id WHERE c.cat_id='".$_REQUEST['cat_id']."'";
								$result = mysql_query($select, $con);
								$row = mysql_fetch_assoc($result)
				?>

					<!-- article body start -->
					<article class="article-wrapper">
						<div class="article-content">
							<h1 class="extra-title"><?=$row['cat_name']?></h1>
							<div class="article-inner">
								<div class="author-list">

								<?php 

								$select = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id WHERE c.cat_id='".$_REQUEST['cat_id']."'";
								$result = mysql_query($select, $con);
								
								while ( $row = mysql_fetch_assoc($result))
								 {
									# code...
								?>

									<div class="author-item">										
										<div class="timeline-post-image">
										<a href="#">
											<img src="admin/upload/<?=$row['image']?>" width="360">
										</a>
									</div>
										<div class="timeline-post-content">
										<br>
											<a href="single_blog.php?post_id=<?=$row['post_id']?>"" class="author-name"><h4><?=$row['title']?></h4></a>

											<div class="author-description">
												<?=substr($row['description'], 0, 250);?>   <b>. . .</b> <a href="single_blog.php?post_id=<?=$row['post_id']?>"">Read More</a>
											</div>

											<div class="author-extras">
												<span class="post-count"><?=date('d-M-Y h:i A', strtotime($row['created_at']))?></span>&nbsp;&nbsp;&nbsp;
												
											</div>
										</div>
									</div>

								<?php  
										}
								 ?>



									<!-- author item start -->







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

						<div class="widget-item">
							<div class="w-header">
								<div class="w-title">Editor's Picks</div>
								<div class="w-seperator"></div>
							</div>
							<div class="w-boxed-post">
								<ul>

									 <?php 
			                    $editors_post = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id ORDER BY p.post_id DESC LIMIT 0,4";
			                    $editors_result = mysql_query($editors_post, $con);
			                    $i=1;
			                     while($editors_row = mysql_fetch_assoc($editors_result))
			                    { ?>
									<li class="active" onclick="window.location='single_blog.php?post_id=<?=$editors_row['post_id']?>'">
										<a href="#" style="background-image: url(admin/upload/<?=$editors_row['image']?>);">
											<div class="box-wrapper">
												<div class="box-left">
													<span><?=$i?></span>
												</div>
												<div class="box-right">
													<h3 class="p-title"><?=$editors_row['title']?></h3>
													<div class="p-icons">
														213 likes . 124 comments
													</div>
												</div>
											</div>
										</a>
									</li>
									<?php $i++; }
									 ?>
								</ul>
							</div>
						</div>

						

					
					</div>
				</div>
			</div>
		</section>

	</main>

	<!-- Register popup html source start -->
	
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