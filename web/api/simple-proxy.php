<?php

// setup curl to reach out to active campaign api using our api key

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
    'Api-Token: f48dc664bd22b94cae71c56bcceb444ef5f8bff9f34d115f71ac37f7d1745ed6940e07a7'
));


// we're using the sync endpoint, which can create or just update

curl_setopt($cURLConnection, CURLOPT_URL, 'https://doublenines.api-us1.com/api/3/contact/sync');
curl_setopt($cURLConnection, CURLOPT_POST, 1);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_FAILONERROR, true); 



// in the future, can add more custom fields for active campaign if 
// needed. right now, we just have one custom field, and we have
// to address them by their ID. each new one is a sequential ID.
// we have a test way to grab the known ids:
// see /web/tools/getCustomFields.php

class fieldValue
{
    public $field;
    public $value;
}

$businessName = new fieldValue();
$businessName->field = '1';
$businessName->value = $_POST['businessName'];

$passed_contact_fieldValues=array($businessName);
// TODO: add more custom fieldValue objects to the array to pass


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
		"fieldValues"		=> $passed_contact_fieldValues
	);

$postvars = json_encode(array("contact"=>$passed_contact_basics));
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS,$postvars);

// in case we want to see the postvars for debugging
/*
echo "<pre>";
print_r($postvars);
echo "</pre>";
*/

// fire away

$curlResult = curl_exec($cURLConnection);

if (curl_errno($cURLConnection)) {
    $error_msg = curl_error($cURLConnection);
}


// in case we want to see the results of the call
/*
$jsonArrayResponse = json_decode($curlResult);
echo "<pre>";
print_r($jsonArrayResponse);
echo "</pre>";
*/

// handle errors 

curl_close($cURLConnection);
if (isset($error_msg)) {
    // TODO - Handle cURL error accordingly
    print_r($error_msg);
}else{
	echo "ok";
}

?>