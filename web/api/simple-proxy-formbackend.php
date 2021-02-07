<?php
echo "foo";
// setup curl to reach out to active campaign api using our api key

$cURLConnection = curl_init();


// we're using the sync endpoint, which can create or just update

curl_setopt($cURLConnection, CURLOPT_URL, 'https://www.formbackend.com/f/7029518e8e5ace22');
curl_setopt($cURLConnection, CURLOPT_POST, 1);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_FAILONERROR, true); 




// the first 4 are the default ones we can address by name
// contactEmail is the unique. if you send it and it exists, it updates.
// if you send it and it doesn't exist in any contact, it creates a new one
// this lets us use the same proxy calls and api methods to update every 
// time a user goes forward in the form.

$passed_contact_basics = array(
		"email"				=> $_POST['contactEmail'],
		"firstName"			=> $_POST['contactFirstName'],
		"lastName"			=> $_POST['contactLastName'],	
		"phone"				=> $_POST['contactPhoneNumber'],	
		"businessName"		=> $_POST['businessName'],
		"amountToFinance"	=> $_POST['amountToFinance'],
		"itemsToFinance" 	=> $_POST['itemsToFinance'],
		"userTitle"			=> $_POST['userTitle'],
		"userPercentOwnership"	=> $_POST['userPercentOwnership'],
//		"userSocialSecurity"	=> $_POST['userSocialSecurity'],
		"userPersonalAddress"	=> $_POST['userPersonalAddress'],
		"legalBusinessName"		=> $_POST['legalBusinessName'],
		"businessAddress"		=> $_POST['businessAddress'],
		"businessPhoneNumber"			=> $_POST['businessPhoneNumber'],
		"businessForm"					=> $_POST['businessForm'],
		"businessIsStartup"				=> $_POST['businessIsStartup'],
		"businessYearsInBusiness"		=> $_POST['businessYearsInBusiness'],
		"businessWebsiteOrSocialUrl"	=> $_POST['businessWebsiteOrSocialUrl'],
		"yourStory"						=> $_POST['yourStory']
	);

curl_setopt($cURLConnection, CURLOPT_POSTFIELDS,$passed_contact_basics);

// in case we want to see the postvars for debugging

echo "<pre>";
print_r($passed_contact_basics);
echo "</pre>";


// fire away

$curlResult = curl_exec($cURLConnection);

if (curl_errno($cURLConnection)) {
    $error_msg = curl_error($cURLConnection);
}


// in case we want to see the results of the call

$jsonArrayResponse = json_decode($curlResult);
echo "<pre>";
print_r($jsonArrayResponse);
echo "</pre>";


// handle errors 

curl_close($cURLConnection);
if (isset($error_msg)) {
    // TODO - Handle cURL error accordingly
    print_r($error_msg);
}else{
	echo "ok";
}

?>