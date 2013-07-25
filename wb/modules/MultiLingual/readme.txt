If you wish to modify the template, just open the file /modules/MultiLingual/tpl/lang.html.twig

##########################################################################

Simple usage:
<?php if(function_exists('language_menu')){ echo language_menu(); } ?>

##########################################################################

advanced usage:
<?php
$langFunction = '';
// check if multiligual module is installed, default is off,
if(function_exists('language_menu')){ $langFunction = language_menu(); }
$multilang_flag = intval(($langFunction)!='');
$aStart       = SM2_ROOT+$multilang_flag;
echo $langFunction;

?>
$aStart defines the start level from show_menu2

