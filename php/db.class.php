<?php

require_once('db.config.php');

/**
 * Database Class
 *
 * @category  Database Access
 * @package   SQL Serevr
 * @author    Jiramet Kaewsiri <jirametk@lanna.co.th>
 * @author    Witsanu Chuenban <witsanuc@lanna.co.th>
 * @copyright Copyright (c) 2015
 * @license   -
 * @version   1.0
 *
 **/

Class Database {

    public $GLOBALS;

    public function connectDB($server,$coninfo){

        if ($server != null) {

            if ($coninfo != null) {

                $GLOBALS['conn'] = sqlsrv_connect($server, $coninfo);

                if($GLOBALS['conn']) {
                    //echo "<font color='blue'>Connection Established.</font><br/>";
                }
                else {
                    die( print_r( sqlsrv_errors(), true));
                }

            }
            else {
                echo "<font color='red'>ERROR: Connection Failed.</font><br/>";
            }

        }

        else {
            echo "<font color='red'>ERROR: Server Not Found.</font><br/>";
        }

    }

    public function query($sql){

        $result = sqlsrv_query($GLOBALS['conn'],$sql);

        return $result;

    }

}

$GLOBALS['db'] = new DATABASE();
$GLOBALS['db'] ->connectDB($SERVERNAME,$connectionInfo);
