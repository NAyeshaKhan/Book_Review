	<?php
	require_once 'google-api/vendor/autoload.php';
	  
	// init configuration
	$clientID='328297619428-1lb4smedjic2p0166mlpgjrsm058drc7.apps.googleusercontent.com';
	$clientSecret='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';
	//URL where the user will be redirected after login.
	$redirectUri='http://localhost/book_review/login.php';
		
	// create Client Request to access Google API
	$client = new Google_Client();
	$client->setClientId($clientID);
	$client->setClientSecret($clientSecret);
	$client->setRedirectUri($redirectUri);
	$client->addScope("email");
	$client->addScope("profile");
	  
	// authenticate code from Google OAuth Flow
	if (isset($_GET['code'])) {
	  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
	  $client->setAccessToken($token['access_token']);
	   
	  // get profile info
	  $google_oauth = new Google_Service_Oauth2($client);
	  $google_account_info = $google_oauth->userinfo->get();
	  $email =  $google_account_info->email;
	  $name =  $google_account_info->name;
	  
	  // Storing data into database
			$fname = mysqli_real_escape_string($conn, trim($google_account_info->name));
			$email = mysqli_real_escape_string($conn, $google_account_info->email);
			$get_user = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$email'");
			if(mysqli_num_rows($get_user) > 0){
				header('Location: login.php?status=success');
				exit;
			}
			else{
				$hash="111111";
				// if user doesn't exist, we will insert the user
				$insert = mysqli_query($conn, "INSERT INTO `user`(`fname`, `lname`, `email`, `password`, `user_type`) VALUES ('$fname', '', '$email', '$hash', 'user')");
				if($insert){
					header('Location: login.php?status=success');
					exit;
				}
				else{
					echo "Sign up failed!(Something went wrong).";
				}
			}
	}else{
	  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
	}
	?>