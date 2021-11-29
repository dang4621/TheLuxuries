<?php


//Google Code
require_once ('vendor/autoload.php');
use  Google\Client;
use  Google\Service\Oauth2;
include './function.php';

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '925660983740-ikrggu7obrjphqvqqu73f8nm01itvlfs.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://localhost/TheLuxuries/google_source.php';



$client = new Google_Client();
$client->setClientId('925660983740-ikrggu7obrjphqvqqu73f8nm01itvlfs.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
   
$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    
    if(!isset($token['error']))
 {
 
  $client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
   $Gguser = ['name' => $data['given_name'], 'email' => $data['email']];
   loginFromSocialCallBack($Gguser);
}
 else {
    $authUrl = $client->createAuthUrl();
}


?>