<?php
include_once("inc/facebook.php"); //include facebook SDK

######### edit details ##########
$appId = '507863555984054'; //Facebook App ID
$appSecret = '549263b23a1f4b998953cf6e36ce6aa2'; // Facebook App Secret
$return_url = 'http://gt-thrift-shop-test.herokuapp.com/process.php';  //return url (url to script)
$homeurl = 'http://gt-thrift-shop-test.herokuapp.com/KathyIndexTest.php';  //return to home
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));

$fbuser = $facebook->getUser();
?>

<script type="text/javascript">
console.log($fbuser);
</script>