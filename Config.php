<?php
include_once("inc/facebook.php"); //include facebook SDK

######### edit details ##########
$appId = '507863555984054'; //Facebook App ID
$appSecret = '●●●●●●●●'; // Facebook App Secret
$return_url = 'http://gt-thrift-shop-test.herokuapp.com/process.php';  //return url (url to script)
$homeurl = 'http://gt-thrift-shop-test.herokuapp.com/';  //return to home
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));

$fbuser = $facebook->getUser();
?>