<?php

require 'vendor/autoload.php';
//require "Apis/database/Config/Config.php";

require "./Apis/database/DataBase.php";

DataBase::getApi("public","apis","google");
// init configuration
$clientID = DataBase::getApi("public", "apis", "google");
$clientSecret =DataBase:: getApi("private", "apis", "google");
$redirectUri =DataBase::getApiredirect("google");
//echo $redirectUri;
//exit();
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
// print_r(get_contry());

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $gender = $google_account_info->gender;
    $image = $google_account_info->picture;
    $id = $google_account_info->id;
    $locale = DataBase::get_contry() != null ? DataBase::get_contry() : "not set";
    // print_r(get_contry());
    $isActive = DataBase::signin_user($email, $id);

    if ($isActive) {
        header("location:../buysell");
    } else {
        $valu = DataBase::google_register($name, $email, $id, $locale, $image, $gender, $id);
        if($valu){
           header("location:../buysell"); 
        }else{
            header("location:../login");

        }
    }

    // now you can use this profile info to create account in your website and make user logged in.
} else {
    // echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
}