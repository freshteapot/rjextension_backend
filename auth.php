<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once("../config.php");
require_once("../databaseconnection.php");
require_once("lib/isauthenticated.php");
include_once("authlib/twitteroauth.php");

if(!isauthenticated()) {
	mysql_close($connection);
	exit("1");
}
	
	$twitter_oauth_token = $_COOKIE['token'];
	$twitter_oauth_token_secret = $_COOKIE['token_secret'];

	$twitter_Connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $twitter_oauth_token, $twitter_oauth_token_secret);
	$twitter_Credentials = $twitter_Connection->get('account/verify_credentials');

	$twitter_Created_at = $twitter_Credentials->created_at;
	$twitter_Screen_name = $twitter_Credentials->screen_name;

	$result = mysql_query("select id from user where screen_name='" . $twitter_Screen_name . "' and created_at='" . $twitter_Created_at . "' limit 1;");
	if(mysql_num_rows($result) > 0) {
		header("location: congratulations.html");
	}	
	else {
		
		mysql_query("INSERT INTO user VALUES('','" . $twitter_Screen_name . "','" . $twitter_Created_at . "',NULL);");
		
		$result = mysql_query("select user.id from user where screen_name = '" . $twitter_Screen_name . "' and created_at = '" . $twitter_Created_at . "' limit 1;");
		
		$row = mysql_fetch_assoc($result);
		
		mysql_query("INSERT INTO followers VALUES('','" . $row['id'] . "','1');");
		
		mysql_query("INSERT INTO followers VALUES('','" . $row['id'] . "','" . $row['id'] . "');");
		
		mysql_query("insert into latestview values('',0," . $row['id'] . ",null);");
		
		mysql_close($connection);

		header("location: congratulations.html");

	}
mysql_close($connection);
exit("0");

