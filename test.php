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
require( 'src/facebook.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

// define variables and set to empty values
$nameErr = "";
$name = "";

FacebookSession::setDefaultApplication('420456898119984','35a526c50d72628583fefd3be2ccf965');

$redirect_url = "http://localhost/test.php";
$helper = new FacebookRedirectLoginHelper($redirect_url);
$session = $helper->getSessionFromRedirect();

if ( isset($session) ) {
  $user_profile = (new FacebookRequest( $session, 'GET', '/me' ))->execute()->getGraphObject()->asArray();

  $request = (new FacebookRequest( $session, 'GET', '/me/friends' ))->execute()->getGraphObject()->asArray();

  $fbfullname = $user_profile['name']; // To Get Facebook full name
  $fb_fullname = $request['data'];

  echo "Friends of $fbfullname:";
  foreach ($fb_fullname as $s) {
          echo '<pre>' . print_r( current($s), 1 ) . '</pre>';
          $uid = next($s);
          $profile_pic = "http://graph.facebook.com/".$uid."/picture?type=large";
          echo "<img src=\"" . $profile_pic . "\" />";
  }
  echo '<pre>' ."Total Friends: ". '</pre>';
  echo '<pre>' . print_r( $request['summary'], 1 ) . '</pre>';

}
?>
