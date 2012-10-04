<?php
function isauthenticated() {
	if($_COOKIE['oauth_token'] && $_COOKIE['oauth_token_secret'])
		return true;
	return false;	
}