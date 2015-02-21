<?php
require 'src/facebook.php';
$facebook = new Facebook(array(
    'appId'  => '420456898119984' ,
    'secret' => '35a526c50d72628583fefd3be2ccf965',
));

$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
print_r ($a);
?>
