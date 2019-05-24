<?php
session_start();
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
/***************************************************************************************************************************
######################################### CHANGE OPTION STARTS  ############################################################
****************************************************************************************************************************/
/* Database Settings */
const EB_HOSTNAME = "localhost";
const EB_DB_USERNAME = "username";
const EB_DB_PASSWORD = "password";
const EB_DATABASE = "database";
/* eMails Settings */
const adminEmail = "admin@domain.com";
const contactEmail = "info@domain.com";
const billEmail = "bill@domain.com";
const CCEmail = "cc@domain.com";
/* Mobile Settings */
const adminMobile = "0000000000000";
/* Version */
const version = 9.38;
/*Salt User Password Hash*/
const salt_1= "}#f4ga~g%$%#$@!@-wi=6^7-$^R9F|GK5J#~||\E6WT;IO[JN";
const salt_2= "#$%^&*&*^%^&%$^&*:?#<--!<>";
//

/* Currency Setings */
define("usd",1);
define("bdt",83.40);
define("usd2bdtconverter",usd*bdt);
/* License */
define("license", "YourLicense");
/***************************************************************************************************************************
######################################### END OF CHANGE OPTION  ############################################################
****************************************************************************************************************************/
/* The BackEnd System */
define("eb", dirname(__FILE__));
define("docRoot", $_SERVER['DOCUMENT_ROOT']);
$eBscema = (isset($_SERVER['HTTPS']) ? "http" : "http") . "://";
define("hypertext", "$eBscema");
define("domain", "$_SERVER[HTTP_HOST]");
define("hostingName", hypertext."$_SERVER[HTTP_HOST]");
define("RootOnly", str_replace(docRoot, "", eb));
define("hostingAndRoot", hostingName.RootOnly);
define("fullUrl", hostingName."$_SERVER[REQUEST_URI]");
define("ebfromeb", eb."/ebapps/captcha");
//
define("domainForImagStore", str_replace("www.", "", parse_url(hostingName, PHP_URL_HOST)));
define("hypertextWithOrWithoutWww", str_replace(domainForImagStore, "", hostingName));
//
define("ebfromcap", hostingAndRoot."/ebapps/captcha");
define("ebbd", eb."/ebapps/dbconnection");
define("ebformkeys", eb."/ebapps/formkeys");
define("ebformmail", eb."/ebapps/formmail");
define("ebHashKey", eb."/ebapps/hashpassword");
define("eblogin", eb."/ebapps/login");
define("ebsanitization", eb."/ebapps/sanitization");
define("themeSetting", eb."/ebapps/themeSetting");
define("ebimageupload", eb."/ebapps/upload");

/*################################# Default Settings ###############################################*/
/* FrontEnd */
define("ebout", eb."/out");
define("outLink", hostingAndRoot."/out");
/* Access */
define("ebaccess", eb."/out/access");
define("outAccessLink", hostingAndRoot."/out/access");
/* Pages */
define("ebpages", eb."/out/pages");
define("outPagesLink", hostingAndRoot."/out/pages");
/* ################################ Problem Solving Blog CMS #############################################################*/
/* BacktEnd */
define("ebblog", eb."/ebapps/blog");
/* FrontEnd */
define("ebcontents", eb."/out/blog");
define("outContentsLink", hostingAndRoot."/out/blog");
//
define('ebThemesActive', "Zamzam");
/* For All Apps Theme Settings */
define("ebThemes", eb."/ebcontents/themes");
define("themeResource", hostingAndRoot."/ebcontents/themes/".ebThemesActive);
define("eblayout", eb."/ebcontents/themes/".ebThemesActive);
?>