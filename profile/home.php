<?php 	
	include_once"../libs/functions.php";
	$faceBook 		= new FacebookMe; 


	if( empty( $_SESSION['imgt'] ) AND empty($_SESSION['name'])){

		header("location:../index.php");

	}

	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook</title>
	

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">

	<link rel="shortcut icon" type="image/x-icon" href="images/favi.png">



	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body class="home-body">
	

	<!-- Topbar section start  -->
	<div class="top-bar">
		<div class="mid-home">
			<div class="top-left">
				<div class="fb-logo">
					<a class="fb-home" href="#"><img src="images/fb-sada.png" alt=""></a>
				</div>
				<div class="fb-search">
					<input type="text" placeholder="Search Facebook" >
					<button><i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="top-right">
				<div class="icon-menu">
					<ul>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li> | </li>
						<li><a href="#"></a></li>
						<li><a href="#"></a>
							
							<div class="top-menu-bar">
									<ul>
										<li><a href="#">Create Page</a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#">Create Group</a></li>
										<li><a href="#">Nwe Group</a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#">Create Adds</a></li>
										<li><a href="#">Advertising on Facebook</a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#"> Activity Log </a></li>
										<li><a href="#"> News Feed Preference </a></li>
										<li><a href="#"> Settings </a></li>
										<li><a href="logour.php"> Logout </a></li>
									</ul>
									<hr>
									<ul>
										<li><a href="#">Help</a></li>
										<li><a href="#"> Support Inbox</a></li>
										<li><a href="#"> Report a Problem</a></li>
									</ul>

							</div>

						</li>
					</ul>
				</div>
				<div class="user-menu">
					<ul>
						<li><a href="#"><img src="../uploaded/<?php echo $_SESSION['imgt']; ?>" alt=""></a></li>
						<li><a href="#"><?php echo $_SESSION['name']; ?></a></li>
						<li><a href="#">Home</a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Top bar ends -->
	<!-- fb body -->

	<div class="main-body">
		<div class="mid-home">
			<div class="left-area">


				<div class="user">
					<a href="#"><img src="../uploaded/<?php echo $_SESSION['imgt']; ?>" alt=""> <?php echo $_SESSION['name']; ?></a>
				</div>
				
				<div class="news-sec">
					<ul>
						<li><a href="#"><span></span> News Feed</a></li>
						<li><a href="#"><span></span> Messenger</a></li>
					</ul>
				</div>

				<div class="groups-sec">
					<p>SHORTCUTS</p>
					<ul>
						<li><a href="#"><span></span> Softtech IT Batch 92</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 87</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 85</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 70</a></li>
						<li><a href="#"><span></span> Softtech IT Batch 66</a></li>
					</ul>
				</div>

				<div class="eve-sec">
					<p>EXPLORE</p>
					<ul>
						<li><a href="#"><span></span> Events</a></li>
						<li><a href="#"><span></span> Groups</a></li>
						<li><a href="#"><span></span> Pages</a></li>
						<li><a href="#"><span></span> Friend Lists</a></li>
					</ul>
				</div>


			</div>
			<div class="main-area">
				<!-- Post input area start -->
				<div class="post-area">
					<div class="post-top">
						<ul>
							<li><a href="#"><span></span>Create a post</a></li>
							<li>|</li>
							<li><a href="#"><span></span>Photo / Video Album</a></li>
						</ul>
					</div>

					<?php 

					if( isset($_POST['submit'])){

						$fb_user_name	=  		$_SESSION['name'];
						$fb_user_img	=  		$_SESSION['imgt'];

						$fb_post_text 			= $_POST['fb_post'];

						$fb_post_img 			= $_FILES['postp_img']['name'];
						$fb_post_img_t 			= $_FILES['postp_img']['tmp_name'];


						$user_img_ext			= explode('.',$fb_post_img);
						$user_img_end 			= end($user_img_ext);
						//img unice name creation
						$img_name				= time().$fb_post_img;
						$user_unice_name 		= md5($img_name);

						$img_full_unice_name	= $user_unice_name . '.' . $user_img_end;

						$fb_post_date 			= date('F d, Y');


						if( !empty($fb_post_text)){

							echo $data_pro 	= $faceBook -> FbPostUploade($fb_user_name, $fb_user_img, $fb_post_text, $img_full_unice_name, $fb_post_img_t, $fb_post_date);
							echo $data_pro ;
						}else{
							echo"<script> alert('Age kichu Ak Ta Lekhen Vai?');</script>";
						}





					}
				 ?>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
						<div class="post-middle">
							<div class="user-image">
								<img src="../uploaded/<?php echo $_SESSION['imgt']; ?>" alt="">
							</div>
							<div class="post-input">
								<textarea name="fb_post" placeholder="What's on your mind ?"></textarea>
							</div>
						</div>
						<div class="post-bottom">
							<div class="p-left">
								<ul>
									<li><a href="#"></a></li>
									<li><a href="#"></a></li>
									<li><a href="#"></a></li>
									<li><a href="#"><label for="post_img"><i class="fa fa-facebook"></i></label><input name="postp_img" id="post_img" type="file"></a></li>

								</ul>
							</div>
							<div class="p-right">
								<ul>
									<li><button><span></span> Public</button></li>
									<li><button name="submit" type="submit">Post</button></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
				<!-- Post input area ends -->


				<?php 


					$fbPostData 		=   $faceBook -> fbPostdataHear();



					while( $postData = $fbPostData  -> fetch_assoc()) :




				 ?>

				<!-- Post show area start -->
				<div class="post-show-area">
					<div class="post-author">
						<div class="author-image">
							<a href="#"><img src="../uploaded/<?php echo $postData['fb_post_user_img'];?>" alt=""></a>
						</div>
						<div class="author-info">
							<h3><a href="#"><?php echo $postData['fb_post_user'];?></a></h3>
							<p><?php echo $postData['fb_bost_data'];?></p>
						</div>
					</div>
					<div class="post-content">
						<p><?php echo $postData['fb_post_text'];?></p>
						<img src="../postupload/<?php echo $postData['fb_post_img'];?>" alt="">
						<div class="like">
							<hr>
							<ul>
								<li><a href="#"><span></span> Like</a></li>
								<li><a href="#"><span></span> Comment</a></li>
								<li><a href="#"><span></span> Share</a></li>
							</ul>
						</div>
					</div>
					
				</div>


				<div class="post-comments">
						
						<div class="post-comment-content">
							<div class="comment-author-image">
								<img src="images/haq.jpg" alt="">
							</div>
							<div class="comment-content">
								<a href="#">আশরাফুল হক</a>
								<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, reprehenderit.</span>
							</div>
						</div>

						<div class="post-comment-content">
							<div class="comment-author-image">
								<img src="images/haq.jpg" alt="">
							</div>
							<div class="comment-content">
								<a href="#">আশরাফুল হক</a>
								<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, reprehenderit.</span>
							</div>
						</div>

						<div class="post-comment-content">
							<div class="comment-author-image">
								<img src="images/haq.jpg" alt="">
							</div>
							<div class="comment-content">
								<a href="#">আশরাফুল হক</a>
								<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, reprehenderit.</span>
							</div>
						</div>

						<div class="post-comment-content">
							<div class="comment-author-image">
								<img src="images/haq.jpg" alt="">
							</div>
							<div class="comment-content">
								<a href="#">আশরাফুল হক</a>
								<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, reprehenderit.</span>
							</div>
						</div>
						
						<!-- post a comment -->
						<div class="post-comment-content">
							<hr>
							<div class="comment-author-image">
								<a href="#"><img src="../uploaded/<?php echo $_SESSION['imgt']; ?>" alt=""></a>
							</div>
							<div class="comment-content">
								<input type="text">
							</div>
						</div>
				</div>
				<!-- Full post ends from here -->

			<?php endwhile; ?>

				



			</div>
			<div class="right-area">
				
				<div class="your-page">
					<h2>Your Page</h2>
					<hr>
					<div class="page-info">
						<div class="page-image">
							<a href="#"><img src="images/page.png" alt=""></a>
						</div>
						<div class="page-details">
							<h3>আশরাফুল হক</h3>
							<ul>
								<li><a href="#"><span></span> Message</a></li>
								<li><a href="#"><span></span> Notification</a></li>
							</ul>
						</div>
					</div>
					<hr>

					<div class="camera">
						<div class="came">
							<span></span>
							<h4>Publish</h4>
						</div>
						<div class="came">
							<span></span>
							<h4>Photo</h4>
						</div>
						<div class="came">
							<span></span>
							<h4>Event</h4>
						</div>
						<div class="came">
							<span></span>
							<h4>Promote</h4>
						</div>
					</div>
					<div class="lvp">
						<ul>
							<li><a href="#">Like</a></li>
							<li><a href="#">View</a></li>
							<li><a href="#">Post</a></li>
						</ul>
					</div>
					<img src="images/ll.png" alt="">
				</div>



			</div>
		</div>
	</div>
	


										

		
	

</body>
</html>