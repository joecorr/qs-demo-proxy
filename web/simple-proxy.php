<?php


$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
    'Api-Token: f48dc664bd22b94cae71c56bcceb444ef5f8bff9f34d115f71ac37f7d1745ed6940e07a7'
));

curl_setopt($cURLConnection, CURLOPT_URL, 'https://doublenines.api-us1.com/api/3/contact/sync');
curl_setopt($cURLConnection, CURLOPT_POST, 1);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);




class fieldValue
{
    public $field;
    public $value;
}

$businessName = new fieldValue();
$businessName->field = '1';
$businessName->value = $_POST['businessName'];

$passed_contact_fieldValues=array($businessName);

$passed_contact_basics = array(
		"email"				=> $_POST['contactEmail'],
		"firstName"			=> $_POST['contactFirstName'],
		"lastName"			=> $_POST['contactLastName'],	
		"phone"				=> $_POST['contactPhoneNumber'],	
		"fieldValues"		=> $passed_contact_fieldValues
	);

$postvars = json_encode(array("contact"=>$passed_contact_basics));
/*
echo "<pre>";
print_r($postvars);
echo "</pre>";
*/
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS,$postvars);


$curlResult = curl_exec($cURLConnection);



$jsonArrayResponse = json_decode($curlResult);
/*
echo "<pre>";
print_r($jsonArrayResponse);
echo "</pre>";
*/
curl_close($cURLConnection);

?>