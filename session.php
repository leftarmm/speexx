<?php

session_start();

if (!isset($_SESSION['timeout']) || $_SESSION['timeout'] + 60 * 600 < time()) {
	echo "<meta http-equiv='refresh' content='0 ;url= logout.php'>"; exit();
} 
else {

}