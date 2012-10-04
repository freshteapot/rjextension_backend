<?php

include 'authlib/EpiCurl.php';
include 'authlib/EpiOAuth.php';
include 'authlib/EpiTwitter.php';
include '../secret.php';
require_once("../databaseconnection.php");
require_once("lib/isauthenticated.php");
if(!isauthenticated())
	exit("1");

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
$twitterInfo= $twitterObj->get_accountVerify_credentials();
$result = mysql_query("select id,screen_name from user where screen_name='" . $twitterInfo->screen_name . "' and created_at='" . $twitterInfo->created_at . "' limit 1;");
$user = mysql_fetch_assoc($result);


$followers = mysql_query("
	select 
	distinct 
	user.screen_name,
	user.id 
	from 
	user 
	where 
	user.id 
	in 
	(
		select 
		followers.followerid 
		from 
		followers 
		where 
		followers.userid = " . $user['id'] . "
	) 	
	and user.id != " . $user['id'] . ";");

$other_users = mysql_query("
	select 
	distinct 
	user.screen_name,
	user.id 
	from 
	user 
	where 
	user.id 
	NOT IN 
	(
		select followers.followerid 
		from 
		followers 
		where 
		followers.userid = " . $user['id'] . ");");

header('Content-type: application/json');
$log_entries;
while($row = mysql_fetch_assoc($followers)) {  
	$log_entries[] = array(
			"id" => $row['id'],
			"screen_name" => $row['screen_name'],
			"status" => 1
		);
}
while($row = mysql_fetch_assoc($other_users)) {

	$log_entries[] = array(
			"id" => $row['id'],
			"screen_name" => $row['screen_name'],
			"status" => 0
		);
	
}
mysql_close($connection);
print json_encode($log_entries);
