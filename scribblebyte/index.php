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
		<section class="main-highlight">
			<div class="highlight-carousel">				
				<div class="owl-carousel" id="postCarousel">

					 <?php 
                    $recent_post = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id INNER JOIN login l ON l.id=p.created_by ORDER BY p.post_id LIMIT 0,4";
                    $recent_result = mysql_query($recent_post, $con);
                     while($recent_row = mysql_fetch_assoc($recent_result))
                    { 
                    	$t2 = date('d-m-Y H:i A', strtotime($recent_row['created_at']));
                    	?>

				    <div class="item" onclick="window.location='single_blog.php?post_id=<?=$recent_row['post_id']?>'">

				    	<article class="post-box" style="background-image: url(admin/upload/<?=$recent_row['image']?>);">
				    		<div class="post-overlay">
				    			<a href="single_blog.php?cat_id=<?=$recent_row['cat_id']?>" class="post-category" title="Title of blog post" rel="tag"><?=$recent_row['cat_name']?></a>
				    			<h3 class="post-title" onclick="window.location='single_blog.php?$cat_id=<?=$recent_row['cat_id']?>'"><?=$recent_row['title']?></h3>
				    			<div class="post-meta">
				    				<div class="post-meta-author-avatar">
				    					<img alt="avatar" src="admin/images/user2-160x160.jpg" class="avatar" height="24" width="24">
				    				</div>
				    				<div class="post-meta-author-info">
				    					<span class="post-meta-author-name">
				    						<a href="single_blog.php?cat_id=<?=$recent_row['cat_id']?>" title="Posts by John Doe" rel="author"><?=$recent_row['user_name']?></a>
				    					</span>
				    					<span class="middot">·</span>
				    					<span class="post-meta-date">
				    						<abbr class="published updated" title="December 4, 2017"><?=$t2?></abbr>
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
		</section>
		<section class="main-content">
			<div class="main-content-wrapper">
				<div class="content-body">
					<div class="content-timeline">
						<!--Timeline header area start -->
						<div class="post-list-header">
							<span class="post-list-title">Latest stories</span>
							<select class="frm-input">
								<?php 

								 $category = "SELECT * FROM category";
				                    $cat_result = mysql_query($category, $con);
				                     while($recent_row = mysql_fetch_assoc($cat_result))
				                    { ?>
									<option value="1"><?=$recent_row['cat_name']?></option>
									<?php }
								 ?>
								
							</select>
						</div>
						<!--Timeline header area end -->


						<!--Timeline items start -->


					 <?php 
                    $latest_post = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id INNER JOIN login l ON l.id = p.created_by ORDER BY p.post_id DESC LIMIT 6,4";
                    $latest_result = mysql_query($latest_post, $con);
                     while($latest_row = mysql_fetch_assoc($latest_result))
                    { ?>


						<div class="timeline-items" onclick="window.location='single_blog.php?post_id=<?=$latest_row['post_id']?>'">

							<div class="timeline-item">
								<div class="timeline-left">
									<div class="timeline-left-wrapper">
										<a href="#" class="timeline-category" data-zebra-tooltip title="Technology"><i class="material-icons">&#xE894;</i></a>
										<span class="timeline-date"><?=$latest_row['created_at']?></span>
									</div>
								</div>
								<div class="timeline-right">
									<div class="timeline-post-image">
										<a href="#">
											<img src="admin/upload/<?=$latest_row['image']?>" width="260">
										</a>
									</div>
									<div class="timeline-post-content">
										<a href="#" class="timeline-category-name"><?=$latest_row['cat_name']?></a>
										<a href="#">
											<h3 class="timeline-post-title"><?=$latest_row['title']?></h3>
										</a>
										<div class="timeline-post-info">
											<a href="#" class="author"><?=$latest_row['user_name']?></a>
											<!-- <span class="dot"></span> -->
											
										</div>
									</div>
								</div>
							</div>


						</div>
				<?php	}
				?>






						<!--Timeline items end -->

						<!--Data load more button start  -->
						<div class="load-more">
							<button class="load-more-button material-button" type="button">
								<i class="material-icons">&#xE5D5;</i>
								<span>Load More</span>
							</button>
						</div>
						<!--Data load more button start  -->
					</div>

				</div>
				<div class="content-sidebar">
					<div class="sidebar_inner">

						<div class="widget-item">
							<h4 class="w-title">Popular Posts</h4>
							<ul class="w-post-list">

								 <?php 
			                    $popular_post = "SELECT * FROM category c INNER JOIN post p ON c.cat_id=p.cat_id ORDER BY p.post_id DESC LIMIT 0,3";
			                    $popular_result = mysql_query($popular_post, $con);
			                    $i=1;
			                     while($popular_row = mysql_fetch_assoc($popular_result))
			                    { ?>
								<li onclick="window.location='single_blog.php?post_id=<?=$popular_row['post_id']?>'">
									<a href="#">
										<div class="w-post-image">
											<img src="admin/upload/<?=$popular_row['image']?>" width="80" height="80">
											<span><?= $i ?></span>
										</div>
										<div class="w-post-content">
											<span class="w-post-title"><?=$popular_row['title']?></span>
											<span class="w-post-views"><?=$popular_row['cat_name']?></span>
										</div>
									</a>
								</li>

							<?php $i++; 
						}

						 ?>
							</ul>
						</div>

						<div class="seperator"></div>

						<div class="widget-item">
							<h4 class="w-title">Carousel Posts</h4>
							<div class="w-carousel-post">
								<div class="owl-carousel" id="widgetCarousel">

									<?php 
									$carousel = "SELECT * FROM POST LIMIT 4";
									$carousel_result = mysql_query($carousel);
									while ($carousel_row = mysql_fetch_assoc($carousel_result)) {
										?>
										 <div class="item">
								    	<a href="#">
								    		<div class="w-play-img">
								    			<img src="admin/upload/<?=$carousel_row['image']?>" width="300">
								    			<span class="w-video-icon"><i class="material-icons">&#xE038;</i></span>
								    		</div>
								    		<span class="w-post-title" onclick="window.location='single_blog.php?post_id=<?=$carousel_row['post_id']?>'"><?=$carousel_row['title']?></span>
								    		
								    	</a>
								    </div>
									<?php
								}


									 ?>

								




								</div>
							</div>
						</div>

						<!-- <div class="seperator"></div> -->

						<!-- <a href="#" class="widget-ad-box">
							<img src="img/adbox300x250.png" width="300" height="250">
						</a> -->

					</div>
				</div>
			</div>
		</section>

	</main>

	<!-- Register popup html source start -->
	<!-- <div class="m-modal-box" id="registerModal">
		<div class="m-modal-overlay"></div>
		<div class="m-modal-content small">
			<div class="m-modal-header">
				<h3 class="m-modal-title">Register</h3>
				<span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
			</div>
			<div class="m-modal-body">
				<div class="m-modal-social-logins">
					<div class="columns column-2">
						<button class="frm-button facebook material-button full" type="button">Facebook</button>
					</div>
					<div class="columns column-2">
						<button class="frm-button twitter material-button full" type="button">Twitter</button>
					</div>
					<div class="columns column-2">
						<button class="frm-button google material-button full" type="button">Google</button>
					</div>
				</div>

				<div class="m-modal-seperator"><span>OR</span></div>

				<form>
					<div class="frm-row">
						<input class="frm-input" type="text" name="name" placeholder="Name">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="text" name="username" placeholder="Username">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="text" name="email" placeholder="Email">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="text" name="password" placeholder="Password">
					</div>
					<div class="frm-row">
						<label class="frm-check-radio-label"><input type="checkbox" name="test"> <span>I accept your <a href="#">register policy</a>.</span></label>
					</div>
					<div class="frm-row">
						<button class="frm-button material-button full" type="button">Register</button>
					</div>
				</form>
				<div class="frm-row">
					<p class="txt-center">Do you already have an account? <a href="#" data-modal="loginModal">Login</a></p>
				</div>
			</div>
		</div>
	</div> -->
	<!-- Register popup html source end ---->

	

	<!-- Newsletter popup html source start -->
	
	<!-- Newsletter popup html source end -->

	<div class="overlay"></div>

	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js"></script>

	<script type="text/javascript">

		//Owl carousel initializing
		$('#postCarousel').owlCarousel({
		    loop:true,
		    dots:true,
		    margin:10,
		    nav:false,
		    autoplay:true,
		    autoplayHoverPause:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:2
		        },
		        900:{
		            items:3
		        },
		        1100:{
		            items:4
		        },
		        1400:{
		            items:5
		        }
		    }
		})

		//widget carousel initialize
		$('#widgetCarousel').owlCarousel({
		    dots:true,
		    nav:false,
		    items:1
		})

	</script>

</body>



</html>