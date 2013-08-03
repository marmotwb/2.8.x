#
#
How to use MultiLingual
##########################################################################
The easiest way is the combination with Droplet [[iMultiLingual]]

##########################################################################
but you also can handle it in the  old manner:

insert the following PHP-code in your templates index.php in the place you want 
show the languages link bar.

<?php if(function_exists('language_menu')){ echo language_menu(); } ?>

##########################################################################
If you wish to modify the template, just open the file
 /modules/MultiLingual/tpl/lang.html.twig
and make your modifications.

