<?php
$url = $_POST['url'];
$title = $_POST['title'];
$message = $_POST['message'];
include 'authlib/EpiCurl.php';
include 'authlib/EpiOAuth.php';
include 'authlib/EpiTwitter.php';
include '../secret.php';
require_once("../databaseconnection.php");
require_once("lib/isauthenticated.php");
if(!isauthenticated())
	exit("1");

function getPageTitle($page) {
	if (@fclose(@fopen($page, "r"))) {
		$file = file($page);
		$file = implode("",$file);

		if(preg_match("/<title>(.+)<\/title>/i",$file,$m))
		    return "$m[1]";
		else
		    return "";
	}
	return "";
}

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
$twitterInfo= $twitterObj->get_accountVerify_credentials();
$result = mysql_query("select id from user where screen_name='" . $twitterInfo->screen_name . "' and created_at='" . $twitterInfo->created_at . "' limit 1;");
$row = mysql_fetch_assoc($result);

//mysql_query("INSERT INTO sharelog VALUES('','" . $url . "','" . $id['id'] . "',NULL,'" . $title . "', " . $message . ");");
mysql_query("INSERT INTO sharelog VALUES('','" . $url . "','" . $row[id] . "',null,'" . $title . "','" . $message . "')");
mysql_close($connection); 
exit("0");
 
