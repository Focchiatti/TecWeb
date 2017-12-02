<?php
session_start();
	
	if(!isset($_SESSION["Name"]) || session_id()==''){
		echo 
		"<li><a href=\"Login.php\">Le mie serie</a></li>
		<div id=\"login\">
		<li>
		<form action=\"Login.php\" method=\"POST\">
		
		<input type=\"hidden\" name=\"URL\" value=\"".$_SERVER['REQUEST_URI']."\" />
		<input id=\"TastoLogIn\" type=\"submit\" value=\"Login\" />
		</form>
		</li>
		</div>
		";
	}
	else
	{
		echo "
		<li><a href=\"Mypage.php\">Le mie serie</a></li>
		<li><p>Benvenuto ".$_SESSION["Name"]." </p></li>
		<div id=\"login\"><li><a href=\"logout.php\">Logout</a></li></div>";
	}


	
	
echo"
</div>
	"
?>