<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

// Setup admin object
require('../../config.php');
require_once(WB_PATH.'/framework/class.admin.php');
$admin = new admin('Addons', 'languages_uninstall', false);
if( !$admin->checkFTAN() )
{
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS']);
}
// After check print the header
$admin->print_header();

// Check if user selected language
if(!isset($_POST['code']) OR $_POST['code'] == "") {
	header("Location: index.php");
	exit(0);
}

// Extra protection
if(trim($_POST['code']) == '') {
	header("Location: index.php");
	exit(0);
}

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');

// Check if the language exists
if(!file_exists(WB_PATH.'/languages/'.$_POST['code'].'.php')) {
	$admin->print_error($MESSAGE['GENERIC']['NOT_INSTALLED']);
}

// Check if the language is in use
if($_POST['code'] == DEFAULT_LANGUAGE OR $_POST['code'] == LANGUAGE) {
	$admin->print_error($MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE']);
} else {
	$query_users = $database->query("SELECT user_id FROM ".TABLE_PREFIX."users WHERE language = '".$admin->add_slashes($_POST['code'])."' LIMIT 1");
	if($query_users->numRows() > 0) {
		$admin->print_error($MESSAGE['GENERIC']['CANNOT_UNINSTALL_IN_USE']);
	}
}

// Try to delete the language code
if(!unlink(WB_PATH.'/languages/'.$_POST['code'].'.php')) {
	$admin->print_error($MESSAGE['GENERIC']['CANNOT_UNINSTALL']);
} else {
	// Remove entry from DB
	$database->query("DELETE FROM ".TABLE_PREFIX."addons WHERE directory = '".$_POST['code']."' AND type = 'language'");
}

// Print success message
$admin->print_success($MESSAGE['GENERIC']['UNINSTALLED']);

// Print admin footer
$admin->print_footer();

?>