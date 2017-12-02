<?php
session_start();
echo "
	<ul>
		<li><p>Home</p></li>
		<!--<li>Generi</li>-->
		<li><a href=\"news.php\">News</a></li>";
		
	if(!isset($_SESSION["Name"]) || session_id()==''){
		echo "
		<li><a href=\"Login.php\">Le mie serie</a></li>
		<div id=\"login\">
		<li>
		<form action=\"Login.php\" method=\"POST\">
		<input type=\"hidden\" name=\"URL\" value=\"".$_SERVER['REQUEST_URI']."\" />
		<input id=\"TastoLogIn\" type=\"submit\" value=\"Login\" />
		</form>
		</li>
		</div>
		</ul>";
	}
	else
	{
		echo "
		<li><a href=\"Mypage.php\">Le mie serie</a></li>
		<li><p>Benvenuto ".$_SESSION["Name"]." </p></li>
		<div id=\"login\"><li><a href=\"logout.php\">Logout</a></li></div>
	</ul>";
	}


	
	
echo"
</div>
	"
?>