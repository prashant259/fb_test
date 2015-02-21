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

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

FacebookSession::setDefaultApplication('420456898119984','35a526c50d72628583fefd3be2ccf965');

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper('http://localhost/test.php');

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}

// see if we have a session
if ( isset($session) ) {
} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl(array('user_friends')). '">Login with facebook</a>';
}
?>
