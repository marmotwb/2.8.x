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

 -----------------------------------------------------------------------------------------------------------
  FCKEditor module for Website Baker v2.8.x
  Authors: P. Widlund, S. Braunewell, M. Gallas (ruebenwurzel), Wouldlouper, C. Sommer (doc)
	Started to track applied changes in info.php from 27.03.2007 onwards (cs)
 -----------------------------------------------------------------------------------------------------------
	v2.9.3 (Luishahne Oct 21, 2009)
		+	add linkfeature to mediabrowser
        +   update flvplayer plugin
	v2.9.2 (Luishahne Sep 28, 2009)
		+	add linkfeature to imagebrowser
        +   add flvplayer plugin
	v2.9.1 (Luishahne Sep 28, 2009)
		+	change to new FCKeditor version 2.6.5
	v2.89 (Aldus, Luishahne Sep 16, 2009)
		+	fix pagetree order in WB-Link
        +   fix not shown ok button in WB-Link
	v2.89 (ruebenwurzel.. Matthias Gallas; Jul 6, 2009)
		+	update to FCKEditor release v2.6.4.1
		+	added WB Droplet Plugin
		+	added Advisory Relation to Links (thanks to Luisehahne)

	v2.88 (ruebenwurzel.. Matthias Gallas; Feb 1, 2009)
		+	update to FCKEditor release v2.64
	
	v2.87 (ruebenwurzel.. Matthias Gallas; Aug 19, 2008)
		+	update to FCKEditor release v2.63
	
	v2.86 (doc.. Christian Sommer; Jul 2, 2008)
		+	update to FCKEditor release v2.62

	v2.85 (doc.. Christian Sommer; Apr 10, 2008)
		+	fixed WB-Link Plugin to work with WB versions below 2.7 ($admin->page_is_visible() only available in WB 2.7)

	v2.84 (doc.. Christian Sommer; Apr 7, 2008)
		+ update to FCKEditor release v2.6
	
	v2.83 (doc.. Christian Sommer; Mar 12, 2008)
		+ added the WB home folder fix found by the forum member spawnferkel
			(see forum thread: http://forum.websitebaker2.org/index.php/topic,8978.msg53107.html#msg53107)
		+ defined <strong> and <em> instead of <b> and <i> per default
	
	v2.82 (doc.. Christian Sommer; Feb 20, 2008)
		+ added the connector fix found by the forum member Luisehahne
		(see forum thread: http://forum.websitebaker2.org/index.php/topic,8240.msg51675.html#msg51675)

	v2.81 (ruebenwurzel.. Matthias Gallas; Dez 24, 2007)
		+ update to FCKEditor release v2.51
	
	v2.80 (doc.. Christian Sommer; Dec 05, 2007)
		+ update to FCKEditor release v2.50 (according to the developers, the most important release since v2.0)
		+ entire PHP connector stuff rewritten from scratch
		+ permissions to view media, upload files and to create folders are now controlled by WB group access rights 
		+ included WBLinkPlugin fix from melisa (http://forum.websitebaker.org/index.php/topic,1670.msg45948.html#msg45948)
		  (Note: removed text field to specify the link title; function creates errors in IE and seems not to work in FF either)
		+ added text file "CHANGELOG" which contains all changes since Mar 27, 2007

	v2.77 (doc.. Christian Sommer; Oct 30, 2007)
		+ re-introduced fix from v2.74a to solve issues with wb_fcktemplates.xml
		
	v2.76 (doc.. Christian Sommer; Oct 29, 2007)
		+ v2.75 was released as hotfix to prevent major damage to WB hosted sites using FCKEditor
		  (users loged in the WB backend can upload files and create folders regardless of their WB permissions)
		+ the following additional security measures were applied with the v2.76 release:
			o possibility to upload files / create folders via FCKEditor disabled by default
			o PHP connector only active for users authentificated via WB backend and permissions to view the MEDIA folder
			o buttons to search the server (e.g. image/flash/link browser) only enabled if user has permission to view MEDIA folder
			o buttons to upload files from FCKEditor always disabled (users settings will be overwritten)
		+ it is no longer possible to upload files or to create folder by the FCKEditor dialogues
		+ file uploads and creation of folders needs to be done via the WB MEDIA center

	v2.75 (doc.. Christian Sommer; Oct 20, 2007) HOTFIX TO PREVENT THE WORST CASE SCENARIOUS
		+ implemented the slightly modified security patch provided by the forum member sogua (thanks man)
			Note: all older versions of the FCKEditor module allow file uploads and creation of folders from any
			browser, no matter if you have access to the Website Baker backend or not!!!
			Upload of PHP files is and was not possible with earlier version. However, images, textfiles, movies...
			could be uploaded and overwritten within the WB /MEDIA folder.

   v2.7.4a (ruebenwurzel; 05.07.2007)
		+ fixed issue in include.php with wb_fcktemplates.xml
   
   v2.7.4 (ruebenwurzel; 14.06.2007)
		+ update to FCKEditor release v2.4.3
   
   v2.7.3 (ruebenwurzel; 10.04.2007)
		+ update to FCKEditor release v2.4.2
   
   v2.7.2 (ruebenwurzel, doc; 29.03.2007)
		+ update to FCKEditor release v2.4.1 (added UTF8-BOM fix from http://dev.fckeditor.net/ticket/279)
		+ removed two test.html files from fckeditor/editor/filemanager/browser and .../upload which could be used
		  to upload any files from outside to the WB media directory if the exact URL is known (thanks to Funky_MF)
		+ changed the following default settings in the wb_fckconfig.js files:
			FCKConfig.EnterMode 		= 'p';
   		FCKConfig.ShiftEnterMode 	= 'br';
   		FCKConfig.FlashBrowser = true;

   v2.7.1 (doc; 06.02.2007)
		+ fixed issues with CSS and XML handling
		+ moved FCK Javascript settings to external file: /wb_config/wb_fckconfig.js

   v2.7.0 (ruebenwurzel; 05.02.2007)
		+ update to FCKEditor release v2.4.0

	 CREDITS: 
	  o Thanks to tallyce for the php-connector patch which enables file upload to WB media folder
	  o all other members who contributed to the FCKEditor module and are not mentioned here
 -----------------------------------------------------------------------------------------------------------

*/

$module_directory		= 'fckeditor';
$module_name			= 'FCKeditor';
$module_function		= 'WYSIWYG';
$module_version			= '2.9.3';
$module_guid            = 'ED3B82C1-DB1E-447A-A0FD-E952AFC5F3B9';
$module_status          = 'Beta';
$module_platform		= '2.7';
$module_requirements    = 'PHP 4.3.11 or higher, WB 2.7 or higher';
$module_author 			= 'Christian Sommer, P. Widlund, S. Braunewell, M. Gallas, Wouldlouper, Aldus, Luisehahne';
$module_license 		= 'GNU General Public License';
$module_description 	= 'This module allows you to edit the contents of a page using <a href="http://www.fckeditor.net/" target="_blank">FCKeditor v2.6.5</a>.';

?>