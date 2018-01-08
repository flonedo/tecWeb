<?php
	session_start();
	
	$header = file_get_contents("header.html");
	$footer = file_get_contents("footer.html");
	$header = str_replace("<!--posizione -->", "<a href='index.php'>Home</a> - Chi siamo", $header);
	if(!isset($_SESSION["user"])){
		$log = file_get_contents("areaLogin.html");
	}
	else{
		$log = '<a class="abutt" id="aPers" href="userHome.php" title="Vai alla tua pagina personale"> Pagina Personale </a> </br>
                  <a class="abutt" id="logout" href="logout.php" title="Esci"> Logout </a>';
	}
	$header = str_replace("<!-- login -->", $log, $header);
	$men = file_get_contents("menuChiSiami.html");
	$header = str_replace("<!-- menu -->", $men, $header);
	$con = file_get_contents("contenutoChiSiamo.html");
	$header = str_replace("<!--titolo-->", "Chi Siamo - Scambio Libri Vi", $header);
	echo $header;
	echo $con;
	echo $footer;
?>
