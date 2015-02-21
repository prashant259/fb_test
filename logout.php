<?php
session_start();

require_once( 'fb1/src/Facebook/FacebookSession.php' );
require_once( 'fb1/src/Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'fb1/src/Facebook/FacebookRequest.php' );
require_once( 'fb1/src/Facebook/FacebookResponse.php' );
require_once( 'fb1/src/Facebook/FacebookSDKException.php' );
require_once( 'fb1/src/Facebook/FacebookRequestException.php' );
require_once( 'fb1/src/Facebook/FacebookAuthorizationException.php' );
require_once( 'fb1/src/Facebook/GraphObject.php' );
require_once( 'fb1/vendor/autoload.php' );
require '/src/facebook.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '420456898119984',
  'secret' => '35a526c50d72628583fefd3be2ccf965',
));
 
//on logout page
setcookie('fbs_'.$facebook->getAppId(), '', time()-100, '/', 'localhost');
session_destroy();
header('Location: http://localhost/index.php');

?>
