<div class="sidebar">
		<div class="sidebar-wrapper">

			<!-- side menu logo start -->
			<div class="sidebar-logo">
				<a href="index.php">Scribble Byte</a>
				
			</div>
			<!-- side menu logo end -->

			<!-- showing on mobile screen sizes -->
			<!-- mobile menu start -->
			<div id="mobileMenu">
				<div class="sidebar-seperate"></div>
			</div>
			<!-- mobile menu end -->

			<!-- sidebar menu start -->
			<ul class="sidebar-menu">
				<li class="active">
					<a href="index.php" class="material-button">
						<span class="menu-icon"><i class="material-icons">&#xE88A;</i></span>
	                	<span class="menu-label">Home</span>
	                </a>
	            </li>

	            <li>
					<a href="#" class="material-button">
						<span class="menu-icon"><i class="material-icons">&#xE8B0;</i></span>
	                	<span class="menu-label">Category</span>
	                	<span class="multimenu-icon"><i class="material-icons">&#xE313;</i></span>
	                </a>
	                <ul>

	                	<?php 

								 $category = "SELECT * FROM category";
				                    $cat_result = mysql_query($category, $con);
				                     while($recent_row = mysql_fetch_assoc($cat_result))
				                    { ?>


										<li>
					                		<a href="category.php?cat_id=<?=$recent_row['cat_id']?>"><span class="menu-label"><?=$recent_row['cat_name']?></span></a>
					                	</li>


								<?php }
								 ?> 
	                </ul>
	            </li>
	            <li>
					<a href="about.php" class="material-button">
						<span class="menu-icon"><i class="material-icons">person</i></span>
	                	<span class="menu-label">About</span>
	                </a>
	            </li>
	            <li>
					<a href="contact.php" class="material-button">
						<span class="menu-icon"><i class="material-icons">contacts</i></span>
	                	<span class="menu-label">Contact</span>
	                </a>
	            </li>
	            
			</ul>
			<!-- sidebar menu end -->

		</div>
	</div>