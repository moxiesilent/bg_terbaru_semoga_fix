<?php
	function connectdb($host, $uname, $password, $schemaname = "bg_uas"){
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli($host, $uname, $password, $schemaname);
		$mysqli->set_charset('utf8mb4');
		return $mysqli;
	}
?>