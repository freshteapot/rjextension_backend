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


$unreadMysqlQueryResult = mysql_query("
	select count(sharelog.id) 
	from sharelog,followers 
	where sharelog.id > (select latestview.shareid from latestview where latestview.userid = " . $user['id'] . " limit 1) 
	and followers.userid = 1 
	and followers.followerid = sharelog.username;");
$unreadMysqlQueryRow = mysql_fetch_assoc($unreadMysqlQueryResult);



//$unreadArray = array(
//			"unread" => $unreadMysqlQueryRow['count(sharelog.id)']);
//
//header('Content-type: application/json');
//print json_encode($unreadArray);
mysql_close($connection);
echo $unreadMysqlQueryRow['count(sharelog.id)'];