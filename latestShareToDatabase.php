<?php
include 'authlib/EpiCurl.php';
include 'authlib/EpiOAuth.php';
include 'authlib/EpiTwitter.php';
include '../secret.php';
require_once("../databaseconnection.php");
require_once("lib/isauthenticated.php");
if(!isauthenticated())
	exit("1");

$lastSeenShareId = $_GET['id'];

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
$twitterInfo= $twitterObj->get_accountVerify_credentials();
$result = mysql_query("select id from user where screen_name='" . $twitterInfo->screen_name . "' and created_at='" . $twitterInfo->created_at . "' limit 1;");
$user = mysql_fetch_assoc($result);


$result = mysql_query("select userid, shareid from latestshareview where userid = " . $user['id'] . ";");

if(mysql_num_rows($result) > 0) {
	mysql_query("update latestshareview set shareid = " . $lastSeenShareId . " where userid = " . $user['id']. ";");	
	echo "0";
}
else {
	if(!$lastSeenShareId) echo $lastSeenShareId;
	else {
			mysql_query("insert into latestshareview values(''," . $lastSeenShareId . "," . $user['id']. ",null);");
}		}	
mysql_close($connection); 

exit("0");
 
