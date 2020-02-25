<?php

require_once('db.class.php');

/**
 * Report Class
 *
 * @category  Classes and Objects
 * @package   SQL Serevr
 * @author    Jiramet Kaewsiri <jirametk@lanna.co.th>
 * @copyright Copyright (c) 2018
 * @license   -
 * @version   1.0
 *
 **/

Class Report {

    public function get(){

        $array = array();

        $sql = "SELECT * FROM [Report_Data]";

        $result = $GLOBALS['db']->query($sql);

        while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
            $array[] = $row;
        }

        return $array;

    }

    public function set($params = array()){

        $sql = "INSERT INTO [Report_Data] VALUES ('{$params['email']}',
        '{$params['fname']}',
        '{$params['lname']}',
        '{$params['a1_score']}',
        '{$params['a1_time']}',
        '{$params['a1_update_score']}',
        '{$params['a1_update_time']}',
        '{$params['a1_average_score']}',
        '{$params['a1_rank']}',
        '{$params['a2_score']}',
        '{$params['a2_time']}',
        '{$params['a2_update_score']}',
        '{$params['a2_update_time']}',
        '{$params['a2_average_score']}',
        '{$params['a2_rank']}',
        '{$params['b11_score']}',
        '{$params['b11_time']}',
        '{$params['b11_update_score']}',
        '{$params['b11_update_time']}',
        '{$params['b11_average_score']}',
        '{$params['b11_rank']}',
        '{$params['b12_score']}',
        '{$params['b12_time']}',
        '{$params['b12_update_score']}',
        '{$params['b12_update_time']}',
        '{$params['b12_average_score']}',
        '{$params['b12_rank']}',
        '{$params['b21_score']}',
        '{$params['b21_time']}',
        '{$params['b21_update_score']}',
        '{$params['b21_update_time']}',
        '{$params['b21_average_score']}',
        '{$params['b21_rank']}',
        '{$params['b22_score']}',
        '{$params['b22_time']}',
        '{$params['b22_update_score']}',
        '{$params['b22_update_time']}',
        '{$params['b22_average_score']}',
        '{$params['b22_rank']}',
        '{$params['c11_score']}',
        '{$params['c11_time']}',
        '{$params['c11_update_score']}',
        '{$params['c11_update_time']}',
        '{$params['c11_average_score']}',
        '{$params['c11_rank']}',
        '{$params['c12_score']}',
        '{$params['c12_time']}',
        '{$params['c12_update_score']}',
        '{$params['c12_update_time']}',
        '{$params['c12_average_score']}',
        '{$params['c12_rank']}',
        getdate(),
        '{$params['fid']}',
        '{$params['uid']}',
        getdate(),
        getdate())";

        $result = $GLOBALS['db']->query($sql);

    }

    // public function update($params = array()){

    //     $sql = "UPDATE [University] SET 
    //             University_Name = '{$params['name']}',
    //             Logo            = '{$params['logo']}',
    //             Description     = '{$params['desc']}',
    //             Updated         = '".date("Y-m-d H:i:s")."'
    //             WHERE University_ID = '{$params['id']}'";

    //     $result = $GLOBALS['db']->query($sql);

    // }


    // public function delete($params = array()){

    //     $sql = "DELETE FROM [University] WHERE University_ID = '{$params['id']}'";

    //     $result = $GLOBALS['db']->query($sql);

    // }

    // public function search($params = array()){

    //     $array = array();

    //     $sql = "SELECT * FROM University WHERE University_ID = '{$params['id']}'";

    //     $result = $GLOBALS['db']->query($sql);

    //     while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
    //         $array[] = $row;
    //     }

    //     return $array;

    // }
}
