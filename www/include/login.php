<?php
include($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (isset($_POST) && $_POST['action'] == 'login') {
    $user = $_POST['user'];
    $password = $_POST['password'];
	//$ldapConn = ldap_connect("ldap://tkds107.tkd.ntg.locl")  or die("Could not connect to LDAP server.");
$ldapConn = false;
    if ($ldapConn) {
        $ldapBind = ldap_bind($ldapConn, $user, $password);
        if ($ldapBind) {  // true authorize  in ldap
            loginCustom ($user,$password);
        } else {
            echo json_encode(['errors' => true, 'message' => 'Вас нет в корпаративной системе ']);
        }
    }else{
        loginCustom ($user,$password);
    }
}

?>