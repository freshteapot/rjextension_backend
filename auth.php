<?php
include 'authlib/EpiCurl.php';
include 'authlib/EpiOAuth.php';
include 'authlib/EpiTwitter.php';
include '../secret.php';
require_once("../databaseconnection.php");
require_once("lib/isauthenticated.php");

if(isauthenticated()) {
	mysql_close($connection);
	exit("0");
}
if(!$_COOKIE['oauth_token'] && !$_COOKIE['oauth_token_secret'] && $_GET['oauth_token']) {
	
	// if we receive an oauth_token attempt use token and register user, set cookies
	$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
	$twitterObj->setToken($_GET['oauth_token']);
	$token = $twitterObj->getAccessToken();
	$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
	setcookie('oauth_token', $token->oauth_token);
	setcookie('oauth_token_secret', $token->oauth_token_secret);
	$twitterInfo= $twitterObj->get_accountVerify_credentials();
	$result = mysql_query("select id from user where screen_name='" . $twitterInfo->screen_name . "' and created_at='" . $twitterInfo->created_at . "' limit 1;");
	if(mysql_num_rows($result) > 0)
		header("location: congratulations.html");
	else {
		mysql_query("INSERT INTO user VALUES('','" . $twitterInfo->screen_name . "','" . $twitterInfo->created_at . "',NULL);");
		$result = mysql_query("select user.id from user where screen_name = '" . $twitterInfo->screen_name . "' and created_at = '" . $twitterInfo->created_at . "' limit 1;");
		$row = mysql_fetch_assoc($result);
		mysql_query("INSERT INTO followers VALUES('','" . $row['id'] . "','1');");
		mysql_query("INSERT INTO followers VALUES('','" . $row['id'] . "','" . $row['id'] . "');");
		mysql_query("insert into latestview values('',0," . $row['id'] . ",null);");
		mysql_close($connection);
		header("location: congratulations.html");
	}
}

if(!$_COOKIE['oauth_token'] && !$_COOKIE['oauth_token_secret'] && !$_GET['oauth_token']) {
		mysql_close($connection);
		exit("2");
}	
mysql_close($connection);
exit("3");

