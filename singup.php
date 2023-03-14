<?php 
	include_once "libs/functions.php";
	$faceBook 		= new FacebookMe;


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>facebook</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="facebook_login">

		<div class="facebook_logo">
			<img src="images/fb.png" alt="">
		</div>

		<div class="facebook_input_box">


			<?php 


					if( isset($_POST['submit'])){

						// Uesr fast Name and Last Name
						$fname							= $_POST['fname'];
						$flast							= $_POST['flast'];

						$fullName						= $fname . ' ' . $flast;
						//email or pass insert data
						$email							= $_POST['email'];

						$message 	= $faceBook -> emailchek($email);



						$pass							= $_POST['pass'];

						// Uesr Phonto insert data
						$uesr_img						= $_FILES['user_img']['name'];
						$tmp_uesr_img					= $_FILES['user_img']['tmp_name'];

						//img extantion name creation  
						$user_img_ext			= explode('.',$uesr_img);
						$user_img_end 			= end($user_img_ext);
						//img unice name creation
						$img_name				= time().$uesr_img;
						$user_unice_name 		= md5($img_name);

						$img_full_unice_name	= $user_unice_name . '.' . $user_img_end;



						//barth of date insert data
							$day							= $_POST['date_day'];
							$date_math						= $_POST['date_math'];
							$date_year						= $_POST['date_year'];

							$all_date 						= $date_math .' '. $day .','. $date_year;

							// gendar chache Now insert data
							$gendar 					= 	$_POST['gender'];


							if( empty($fullName) OR empty($email) OR empty($pass) OR empty($uesr_img) OR empty($all_date) OR empty($gendar) ){
								$messages = "<p style='color:red; font-size:14px; font-weight:bold;'>Age Fields Gulo Puron Koren Vaii???</p>";
							}elseif($message == false ){
								$emailcheck = "<p style='color:red; text-align:left; margin: 0px 0px 0px 15px; font-size:14px; font-weight:bold;'>ai j email ta thak kore bosan apni???</p>";
							}else{

								$messages = $faceBook -> fbRegistation($fullName, $email, $pass, $img_full_unice_name, $tmp_uesr_img, $all_date, $gendar);
							}




					}








			 ?>

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
				<h2 style="font-weight:bold;">Create a New Account</h2>
				<p>it's quick to easy.</p>
				<?php if(isset($messages)){ echo $messages;} ?>
				<div class="user_info_btn">
					<input name="fname" type="text" placeholder="Frist Name">
					<input name="flast" type="text" placeholder="Last Name">
				</div>

				<div class="user_email">
					<input name="email" type="email" placeholder="Email Address">
					<?php if(isset($emailcheck)){ echo $emailcheck;} ?>
					<input name="pass" type="password" placeholder="Password">
					<input name="user_img" type="file" >
				</div>

				<div class="user_date">
					<p>Date of birth</p>
					<select name="date_day">
						<option value="">Day</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
					</select>

					<select name="date_math">
						<option value="">Mothas</option>
						<option value="Jan">Jan</option>
						<option value="Feb">Feb</option>
						<option value="Mach">Mach</option>
						<option value="April">April</option>
					</select>

					<select name="date_year">
						<option value="">Years</option>
						<option value="2022">2022</option>
						<option value="2021">2021</option>
						<option value="2020">2020</option>
						<option value="2019">2019</option>
					</select>
				</div>

				<div class="uest_gender">
					<p>Gender</p>
					<div class="gender">
						<label for="male">Male</label>
						<input  name="gender" value="Male" id="male" type="radio">

						<label for="female">Female</label>
						<input  name="gender"  value="Female" id="female" type="radio">
					</div>
				</div>


				<div class="user_text">
					<p>People who use our service may have uploaded your contact information to Facebook. <a href="#">Learn more.</a></p>

					<p>By clicking Sign Up, you agree to our<a href="#">Terms,</a><a href="#">Data Policy</a>and <a href="#">Cookie Policy.</a>You may receive SMS notifications from us and can opt out at any time.</p>
				</div>

				<div class="uesr_botton">
					<input name="submit" type="submit" value="Sing Up Now ">
					
				</div>
				<div class="facebook_btn_link atag">
					<a href="index.php">Already have an Account?</a>
				</div>
			</form>
			
		</div>
	</div>
</body>
</html>


