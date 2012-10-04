<?php

include 'authlib/EpiCurl.php';
include 'authlib/EpiOAuth.php';
include 'authlib/EpiTwitter.php';
include '../secret.php';
require_once("../databaseconnection.php");
require_once("lib/isauthenticated.php");
if(!isauthenticated())
	exit("1");

$followerid = $_POST['follower'];
$follow = $_POST['follow'];

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
$twitterInfo= $twitterObj->get_accountVerify_credentials();
$result = mysql_query("select id from user where screen_name='" . $twitterInfo->screen_name . "' and created_at='" . $twitterInfo->created_at . "' limit 1;");
$user = mysql_fetch_assoc($result);

if($follow == "Follow")
	mysql_query("
		INSERT INTO 
		followers 
		VALUES(
			'',
			" . $user['id'] . ",
			" . $followerid . ");");
if($follow == "Unfollow")
	mysql_query("
		DELETE
		FROM 
		followers
		WHERE 
		userid = " . $user['id'] . " 
		and
		followerid = " . $followerid . "
		");	
mysql_close($connection); 
exit("0");