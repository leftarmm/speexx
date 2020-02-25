<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once('php/faculty.class.php');

$obj = new Faculty();

if(isset($_POST['type'])&&$_POST['type']=='get'){
	echo json_encode($obj->get());
}

if(isset($_POST['type'])&&$_POST['type']=='set'){
	$obj->set($_POST);
}

if(isset($_POST['type'])&&$_POST['type']=='update'){
	$obj->update($_POST);
}

if(isset($_POST['type'])&&$_POST['type']=='delete'){
	$obj->delete($_POST);
}

if(isset($_POST['type'])&&$_POST['type']=='search'){
	echo json_encode($obj->search($_POST));
}