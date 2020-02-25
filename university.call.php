<?php 

require_once('php/university.class.php');

$obj = new University();

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