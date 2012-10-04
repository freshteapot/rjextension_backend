<?php
include 'authlib/EpiCurl.php';
include 'authlib/EpiOAuth.php';
include 'authlib/EpiTwitter.php';
include '../secret.php';

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
$location = "location: " . $twitterObj->getAuthenticateUrl();
header($location);
?>

