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
$result = mysql_query("select * from log where username =" . $user['id'] . " order by time DESC limit 100;");

header('Content-type: application/json');
$log_entries;
while($row = mysql_fetch_assoc($result)) {
	$url = parse_url($row['page']);
	$row['host'] =  
	$log_entries[] = array(
			"title" => $row['page_name'],
			"url" => $row['page'],
			"time" => $row['time'],
			"host" => $url['host']
		);
}
mysql_close($connection);
print json_encode($log_entries);