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

//echo "select * from sharelog, followers where followers.userid = " . $user['id'] . " and followers.followerid = sharelog.username;";

$unreadMysqlQueryResult = mysql_query("
	select 
	latestview.shareid 
	from 
	latestview 
	where latestview.userid = " . $user['id'] . " limit 1
	");
$unreadMysqlQueryRow = mysql_fetch_assoc($unreadMysqlQueryResult);

$result = mysql_query("select sharelog.id,sharelog.page_name,sharelog.page,sharelog.time,sharelog.message,user.screen_name from sharelog, followers, user where followers.userid = " . $user['id'] . " and followers.followerid = sharelog.username and followers.followerid = user.id order by sharelog.id DESC;");
header('Content-type: application/json');
$log_entries;
while($row = mysql_fetch_assoc($result)) {
	$url = parse_url($row['page']);
	if($row['id'] > $unreadMysqlQueryRow['shareid']) $unreadStatus = 1;
	else $unreadStatus = 0;
	$log_entries[] = array(
			"id" => $row['id'],
			"name" => $row['screen_name'],
			"title" => $row['page_name'],
			"url" => $row['page'],
			"time" => $row['time'],
			"host" => $url['host'],
			"message" => $row['message'],
			"unread" => $unreadStatus
		);
}
$lastSeenShare = $log_entries[0];
$lastSeenShareId = $lastSeenShare['id'];

$CountLatestViewEntriesQueryResult = mysql_query("select count(*) from latestview where");
$result = mysql_query("select latestview.userid from latestview where userid = " . $user['id'] . ";");
if(mysql_num_rows($result) > 0)
	mysql_query("update latestview set shareid = " . $lastSeenShareId . " where userid = " . $user['id']. ";");	
else
	mysql_query("insert into latestview values(''," . $lastSeenShareId . "," . $user['id']. ",null);");
mysql_close($connection);	
print json_encode($log_entries);
