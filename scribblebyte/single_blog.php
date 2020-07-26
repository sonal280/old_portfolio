<?php include('admin/db.php'); ?>


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

	<!-- Owl Carousel plugin css file. only used pages -->
	<link rel="stylesheet" type="text/css" href="plugins/owl-carousel/assets/owl.carousel.min.css">

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

		<!-- Detail extra post start -->
		<div class="extra-posts">
			<div class="extra-post-wrapper" >

			<?php 
	        $single_post = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id ORDER BY p.post_id LIMIT 0,3";
	        $single_result = mysql_query($single_post, $con);
	        $i=1;
	         while($sp = mysql_fetch_assoc($single_result))
	        { ?>


				<div class="columns column-2" onclick="window.location='single_blog.php?post_id=<?=$sp['post_id']?>'">
					<article class="extra-post-box">
						<a href="#" class="extra-post-link">
							<div class="post-image">
								<span><img src="admin/upload/<?=$sp['image']?>" width="80" height="80"></span>
							</div>
							<div class="post-title">
								<?=$sp['title']?>
								<span class="post-date"><?= $i?></span>
							</div>
						</a>
					</article>
				</div>

				<?php $i++;
				
			}

				 ?>

			</div>
		</div>
		<!-- Detail extra post start -->

		<section class="main-content sidebar-left">
			<div class="main-content-wrapper">
				<div class="content-body">


				<?php 
					$select_des = "SELECT * FROM category c INNER JOIN post p ON c.cat_id = p.cat_id WHERE p.post_id='".$_REQUEST['post_id']."'";
					$select_result = mysql_query($select_des, $con);
					$select_row = mysql_fetch_assoc($select_result);

				 ?>

					<!-- article body start -->
					<article class="article-wrapper">
						<div class="article-header">
							<div class="breadcrumb">
								<ul>
									<li><a href="#"><span>Home</span></a> <i class="material-icons">&#xE315;</i></li>
									<li><a href="#"><span><?=$select_row['cat_name']?></span></a> <i class="material-icons">&#xE315;</i></li>
									
								</ul>
							</div>

							<div class="article-header-title">
								<h1 class="article-title"><?=$select_row['title']?></h1>
							</div>

							<div class="article-meta-info">
								<a href="#" class="author-name"><?=$select_row['created_by']?></a> —
								<span class="article-post-date">49 minutes ago</span>
								<span class="article-reading-time">reading time 2 minute</span>
							</div>
							
						</div>
						<div class="article-content"> <!-- adbox120 or adbox160 -->
							<div class="article-left-box">
								<div class="article-left-box-inner">
									<div class="article-share">
										<a href="#" class="facebook"></a>
										<a href="#" class="twitter"></a>
										<a href="#" class="google-plus"></a>
									</div>
									<span class="add-to-favorite" data-zebra-tooltip title="Ad to favorite">
										<i class="material-icons">&#xE866;</i>
									</span>
									<ul class="article-emoticons">
										<li>
											<a href="#" class="popular happy"></a><span>13</span>
											<ul>
												<li><a href="#" class="love"></a><span>7</span></li>
												<li><a href="#" class="shocked"></a><span>5</span></li>
												<li><a href="#" class="angry"></a><span>4</span></li>
												<li><a href="#" class="crying"></a><span>1</span></li>
												<li><a href="#" class="sleepy"></a><span>0</span></li>
											</ul>
										</li>										
									</ul>
								</div>
							</div>
							<div class="article-inner">
								
								<?=$select_row['description']?>
								
								
								
								

								<!-- article tags area start -->
								<div class="article-tags">
									<span class="tag-subtitle">Tags : </span>
									<a href="#">theme</a><span class="tag-dot"></span>
									<a href="#">template</a><span class="tag-dot"></span>
									<a href="#">mobile ui</a>
								</div>
								<!-- article tags area end -->
							</div>

							<!--this is important for the left ad box or share box fixer -->
							<div id="endOfTheArticle"></div>

							<!-- More article unit start -->
							<div class="more-article">
								<div class="w-header">
									<div class="w-title">Continue Reading</div>
									<div class="w-seperator"></div>
								</div>
								<div class="more-posts">

								<?php 
			                    $con_post = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id INNER JOIN login l ON l.id=p.created_by ORDER BY p.post_id DESC LIMIT 4,3";
			                    $con_result = mysql_query($con_post, $con);
			                    $i=1;
			                     while($con_row = mysql_fetch_assoc($con_result))
			                    { ?>
									<div class="columns column-2">

								    	<article class="post-box" style="background-image: url(admin/upload/<?=$con_row['image']?>);">
								    		<div class="post-overlay">
								    			<a href="#" class="post-category" title="Title of blog post" rel="tag">Technology</a>
								    			<h3 class="post-title"><?=$con_row['title']?></h3>
								    			<div class="post-meta">
								    				<div class="post-meta-author-avatar">
								    					<img alt="avatar" src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" class="avatar" height="24" width="24">
								    				</div>
								    				<div class="post-meta-author-info">
								    					<span class="post-meta-author-name">
								    						<a href="#" title="Posts by John Doe" rel="author"><?=$con_row['user_name']?></a>
								    					</span>
								    					<span class="middot">·</span>
								    					<span class="post-meta-date">
								    						<abbr class="published updated" title="December 4, 2017"><?=$con_row['created_at']?></abbr>
								    					</span>
								    				</div>
								    			</div>
								    		</div>
								    		<a href="#" class="post-overlayLink"></a>
								    	</article>

								    </div>
								    
								    <?php 
								}
								     ?>

								</div>
							</div>
							<!-- More article unit end -->

							

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

	

	<div class="overlay"></div>

	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js"></script>

	<script type="text/javascript">

		//widget carousel initialize
		$('#widgetCarousel').owlCarousel({
		    dots:true,
		    nav:false,
		    items:1
		})

	</script>

</body>
</html>