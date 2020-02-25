<?php
date_default_timezone_set("Asia/Bangkok");
require_once('db.class.php');

/**
 * University Class
 *
 * @category  Classes and Objects
 * @package   SQL Serevr
 * @author    Jiramet Kaewsiri <jirametk@lanna.co.th>
 * @copyright Copyright (c) 2018
 * @license   -
 * @version   1.0
 *
 **/

Class University {

    public function get(){

        $array = array();

		$sql = "SELECT * FROM University";

		$result = $GLOBALS['db']->query($sql);

		while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
		    $array[] = $row;
		}

		return $array;

    }

    public function set($params = array()){

    	$sql = "INSERT INTO University VALUES ('{$params['id']}','{$params['name']}','{$params['logo']}','{$params['desc']}',getdate(),getdate())";

        $result = $GLOBALS['db']->query($sql);

    }

    public function update($params = array()){

    	$sql = "UPDATE University SET 
		    	University_Name = '{$params['name']}',
		    	Logo 			= '{$params['logo']}',
		    	Description 	= '{$params['desc']}',
		    	Updated 		=  getdate(),
    			WHERE University_ID = '{$params['id']}'";

        $result = $GLOBALS['db']->query($sql);

    }


    public function delete($params = array()){

    	$sql = "DELETE FROM University WHERE University_ID = '{$params['id']}'";

        $result = $GLOBALS['db']->query($sql);

    }

    public function search($params = array()){

        $array = array();

		$sql = "SELECT * FROM University WHERE University_ID = '{$params['id']}'";

		$result = $GLOBALS['db']->query($sql);

		while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
		    $array[] = $row;
		}

		return $array;

    }
}
