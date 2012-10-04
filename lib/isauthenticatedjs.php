<?php
if($_COOKIE['oauth_token'] && $_COOKIE['oauth_token_secret'])
	exit("0");
exit("1");	