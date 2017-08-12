<?php
// yo can follow this guide to http://www.benrlodge.com/blog/post/how-to-generate-an-instagram-access-token#
	#1 first you need to create a Client in Instgram Developer Dashboard
	// https://www.instagram.com/developer/clients/manage/
	
	#2 after you need to retrive a oAuth code for after get access_token
	// https://www.instagram.com/developer/authentication/
	
	// change the params with your one and open link in browser
	// https://www.instagram.com/oauth/authorize/?client_id=YOUR_CLIENT_ID_GOES_HERE&redirect_uri=THAT_REDIRECT_URI_YOU_GAVE&response_type=code
	
	// at this point you have a code ex: http://www.YOUR_REDIRECT_LINK.com?code=asdf4a0c15d80bc54ddea32d6f1751
	// we need the code "asdf4a0c15d80bc54ddea32d6f1751"
	
	# for use it in pour CURL request and obtain a access_token
	// curl native commands
	//curl -F 'client_id=CLIENT_ID' \
	//		-F 'client_secret=CLIENT_SECRET' \
	//		-F 'grant_type=authorization_code' \
	//		-F 'redirect_uri=AUTHORIZATION_REDIRECT_URI' \
	//		-F 'code=CODE' \
	//		
	/// curl with PHP
	$uri = 'https://api.instagram.com/oauth/access_token'; 
	$data = [
		'client_id' => 'cee6b5886c0b4d8ca14cd876b5821670', 
		'client_secret' => '383632aac01041de91c4743f4f995c76', 
		'grant_type' => 'authorization_code', 
		'redirect_uri' => 'https://moomanst.github.io/philo', 
		'code' => '2f5b298ba7794d528eefafa84eb40ef6'
	];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $uri); // uri
	curl_setopt($ch, CURLOPT_POST, true); // POST
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // POST DATA
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // RETURN RESULT true
	curl_setopt($ch, CURLOPT_HEADER, 0); // RETURN HEADER false
	curl_setopt($ch, CURLOPT_NOBODY, 0); // NO RETURN BODY false / we need the body to return
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // VERIFY SSL HOST false
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // VERIFY SSL PEER false
	$result = json_decode(curl_exec($ch)); // execute curl
	echo '<pre>'; // preformatted view
	
	// ecit directly the result
	exit(print_r($result)); 
?>