<?php 

$username = $_POST["username"];
$password = $_POST["password"];

// server setting
$server = "192.168.11.22"; //dc1-nu
//$server = "10.2.1.4"; //dc1-nu

// ldap domain setiing
$ldap_base_dn = 'OU=Staffs,OU=Users,OU=Organization,DC=lanna,DC=co,DC=th';

// connect to active directory
$ldap = ldap_connect($server) or die("Could not connect to {$server}");

if($ldap) {

    $b = @ldap_bind($ldap,$username,$password);
    if(!$b) {
        $myObj->status = false;
        $myObj->text = "Wrong username and password. Login failed! Please try again"; 
    } 
    else {  

        session_start();

        $_SESSION['timeout'] = time();

        $user = strstr($username, '@', true);

        $search_filter = "(&(sAMAccountName=".$user."))";

        $result = ldap_search($ldap, $ldap_base_dn, $search_filter);

        if (FALSE !== $result){
            $entries = ldap_get_entries($ldap, $result);
            if ($entries['count'] > 0){
                $_SESSION['userNameID'] = $entries[0]["pager"][0];
                $_SESSION['userAccount'] = $entries[0]["samaccountname"][0];
                $_SESSION['firstName'] = $entries[0]["givenname"][0];
                $_SESSION['sureName'] = $entries[0]["sn"][0];
                $_SESSION['fullName'] = $entries[0]["displayname"][0];
                $_SESSION['eMail'] = $entries[0]["mail"][0];
                $_SESSION['position'] = $entries[0]["title"][0];
                $_SESSION["location"] = $entries[0]["physicaldeliveryofficename"][0];
                $_SESSION["tel"] = $entries[0]["telephonenumber"][0];
                $_SESSION["photo"] = $entries[0]["thumbnailphoto"][0];

                $myObj->status = true;
                $myObj->text = "Welcome {$_SESSION['firstName']} {$_SESSION['sureName']}"; 
            }
        }
        else {
            $myObj->status = false;
            $myObj->text = "Cannot find the user '{$username}', because it does not exist or you do not have permission"; 
        }
    }  
}

ldap_unbind($ldap); // Clean up after ourselves.

$myJSON = json_encode($myObj);

echo $myJSON;