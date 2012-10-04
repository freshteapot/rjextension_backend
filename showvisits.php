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

?>
<html>
<head>
	 <style type="text/css">
	 	body {
	 		background: white;	
	 	}
	 	.wrapper {
	 		width: 1200px;
	 		padding-left: 10px;
	 		padding-right:; 10px;
	 		
	 	}

	 	.timestamp {
	 		float: left;
	 	}
	 	.visitelement {
	 		float: left;
	 		width: 1200px;
			margin-bottom: 2px;
			margin-top: 0px;
			height: 20px;
	 	}
	 	.linkcontainer {
	 		float: left;
	 	}
	 	.visitelement img {
	 		float: left;
	 		width: 16px;
	 		padding: 4px;
	 	}
	 	.visitelement .links {
	 		float: left;
	 	}
	 	.visitelement .linkcontainerurl {
	 		font-size: small;
	 	}	
	 		 		 		 	
	 </style>
</head>	
<body>
	<div class='wrapper'>
			<?php
				while($row = mysql_fetch_assoc($result)) {
					$url = parse_url($row['page']);
					echo "<div class='visitelement'>";
						echo "<img src='http://www.google.com/s2/favicons?domain=" . $url['host']. "'>";
						echo "<div class='links'>";
							echo "<a href='" . $row['page'] . "' alt='" . $row['page'] . "' class='pagelink'>" . $row['page_name'] . "</a>";
							if($row['page_name']) echo "&nbsp;&nbsp;";
							echo "<a href='" . $row['page'] . "' alt='" . $row['page'] . "' class='pagelink'>" . $row['page'] . "</a>";
						echo "</div>";
					echo "</div>"; 
				}
			?>
	</div>			
</body>
</html>	