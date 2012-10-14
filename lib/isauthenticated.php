<?php
function isauthenticated() {
	if(isset($_COOKIE['token']) && isset($_COOKIE['token_secret'])) {
		return true;
	}	
	else {
		return false;
	}	
}