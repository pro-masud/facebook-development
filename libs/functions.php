<?php 

	// include_once "config.php";

	

	 class FacebookMe{

	 		

			private $host 		 = "localhost";
			private $name 		 = "root";
			private $pass  		 = "";
			private $db 		 = "facebook";

			private $fbconn;


			public function __construct(){

				session_start();

				$this -> fbconn  = new mysqli( $this -> host, $this 	-> name, $this -> pass,  $this -> db);

			

			}

			//facebook user section data input to database

			public function fbRegistation($fullName, $email, $pass, $img_full_unice_name, $tmp_uesr_img, $all_date, $gendar){

				$this -> fbconn -> query("INSERT INTO fbuser (name, email, pass, img, fbdate, gendar) VALUES ('$fullName','$email','$pass','$img_full_unice_name','$all_date','$gendar')");


				move_uploaded_file($tmp_uesr_img, "uploaded/". $img_full_unice_name);


				header("location:index.php");

			}




			//facebook user section data select a scerching data to database

			public function userLogin($uemail, $upassecho){

				$all_user_data 		= $this -> fbconn -> query("SELECT * FROM fbuser WHERE email = '$uemail' AND pass ='$upassecho'");

				 $row = $all_user_data  -> num_rows ;

				if( $row  == 1 ){

					while( $all_data = $all_user_data -> fetch_assoc()){

						$_SESSION['name']		=	$all_data['name'];
						$_SESSION['imgt']		=	$all_data['img'];
					}


					header("location: profile/home.php");

				}else{

				}


			}


			//facebook user Email Cheak to database

			public function emailchek($email){
				$emailsingle 	= $this -> fbconn -> query("SELECT email FROM fbuser WHERE email = '$email' ");

				$rorw = $emailsingle  -> num_rows ;
				if( $rorw  == 1 ){
					return $emailsin 		= false;
				}else{
					return $emailsin 		= true;
				}



			}

			//facebook post text data insert to database 

			public function FbPostUploade($fb_user_name, $fb_user_img, $fb_post_text, $img_full_unice_name, $fb_post_img_t, $fb_post_date){

				 $this -> fbconn -> query("INSERT INTO fbpost (fb_post_user, fb_post_user_img, fb_post_text, fb_post_img, fb_bost_data ) VALUES ('$fb_user_name','$fb_user_img','$fb_post_text','$img_full_unice_name','$fb_post_date')");

				 move_uploaded_file($fb_post_img_t,"../postupload/". $img_full_unice_name);

			}



			// facebook post all data select to database in facebook post

			public function fbPostdataHear(){

				$allDataPost 	= $this -> fbconn -> query("SELECT * FROM fbpost ORDER BY fb_post_id DESC");

				return $allDataPost;

			}


	}



 ?>