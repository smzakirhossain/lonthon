<?php
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(eblogin.'/login.php'); 
$user = new ebapps\login\login();
$user -> getsession();
if (empty($_SESSION['username']))
{
include (ebaccess.'/access_login.php');
}
?>