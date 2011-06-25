<?php
/**
 *
 * @category        WebsiteBaker
 * @package         modules
 * @subpackage      news
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Must include code to stop this file being access directly
if(!defined('WB_URL')) { throw new Exception('illegal file access!! ['.$_SERVER['PHP_SELF'].']'); }

/* **** START UPGRADE ******************************************************* */
	function mod_news_Upgrade()
	{
		global $database, $admin, $MESSAGE;
		$callingScript = $_SERVER["SCRIPT_NAME"];
		$tmp = 'upgrade-script.php';
		$globalStarted = substr_compare($callingScript, $tmp,(0-strlen($tmp)),strlen($tmp)) === 0;

		$sPagesPath = WB_PATH.PAGES_DIRECTORY;
		$sPostsPath = $sPagesPath.'/posts';
	// create /posts/ - directory if not exists
		if(!file_exists($sPostsPath)) {
			if(is_writable($sPagesPath)) {
				make_dir(WB_PATH.PAGES_DIRECTORY.'/posts/');
			}else {
				if(!$globalStarted){
					$admin->print_error($MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE']);
				}else {
					echo $MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'].'<br />';
					return;
				}
			}
			if($globalStarted) {echo 'directory "'.PAGES_DIRECTORY.'/posts/" created.<br />'; }
		}
	// check if new fields must be added
		$doImportDate = true;
		if(!$database->field_exists(TABLE_PREFIX.'mod_news_posts', 'created_when')) {
			if(!$database->field_add(TABLE_PREFIX.'mod_news_posts', 'created_when',
			                        'INT NOT NULL DEFAULT \'0\' AFTER `commenting`')) {
				if($globalStarted){
					echo $MESSAGE['RECORD_MODIFIED_FAILED'].'<br />';
					return;
				}else {
					$admin->print_error($MESSAGE['RECORD_MODIFIED_FAILED']);
				}
			}
			if($globalStarted) { echo 'datafield `'.TABLE_PREFIX.'mod_news_posts`.`created_when` added.<br />'; }
		}else { $doImportDate = false; }
		if(!$database->field_exists(TABLE_PREFIX.'mod_news_posts', 'created_by')) {
			if(!$database->field_add(TABLE_PREFIX.'mod_news_posts', 'created_by',
			                        'INT NOT NULL DEFAULT \'0\' AFTER `created_when`')) {
				if($globalStarted){
					echo $MESSAGE['RECORD_MODIFIED_FAILED'].'<br />';
					return;
				}else {
					$admin->print_error($MESSAGE['RECORD_MODIFIED_FAILED']);
				}
			}
			if($globalStarted) {echo 'datafield `'.TABLE_PREFIX.'mod_news_posts`.`created_by` added.<br />'; }
		}
	// preset new fields `created_by` and `created_when` from existing values
		if($doImportDate) {
			$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
			$sql .= 'SET `created_by`=`posted_by`, `created_when`=`posted_when`';
			$database->query($sql);
		}
	// now iterate through all existing accessfiles,
	// write its creation date into database
		$oDir = new DirectoryIterator($sPostsPath);
		$count = 0;
		foreach ($oDir as $fileinfo)
		{
			$fileName = $fileinfo->getFilename();
			if((!$fileinfo->isDot()) &&
			   ($fileName != 'index.php') &&
			   (substr_compare($fileName,PAGE_EXTENSION,(0-strlen(PAGE_EXTENSION)),strlen(PAGE_EXTENSION)) === 0)
			  )
			{
			// save creation date from old accessfile
				if($doImportDate) {
					$link = '/posts/'.preg_replace('/'.preg_quote(PAGE_EXTENSION).'$/i', '', $fileinfo->getFilename());
					$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
					$sql .= 'SET `created_when`='.$fileinfo->getMTime().' ';
					$sql .= 'WHERE `link`=\''.$link.'\'';
					$database->query($sql);
				}
			// delete old access file
				unlink($fileinfo->getPathname());
				$count++;
			}
		}
		unset($oDir);
		if($globalStarted && $count > 0) {
			echo 'save date of creation from '.$count.' old accessfiles and delete these files.<br />';
		}
// ************************************************
	// Check the validity of 'create-file-timestamp' and balance against 'posted-timestamp'
		$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
		$sql .= 'SET `created_when`=`published_when` ';
		$sql .= 'WHERE `published_when`<`created_when`';
		$database->query($sql);
		$sql  = 'UPDATE `'.TABLE_PREFIX.'mod_news_posts` ';
		$sql .= 'SET `created_when`=`posted_when` ';
		$sql .= 'WHERE `published_when`=0 OR `published_when`>`posted_when`';
		$database->query($sql);
// ************************************************

	// rebuild all access-files
		$count = 0;
		// $backSteps = preg_replace('/^'.preg_quote(WB_PATH).'/', '', $sPostsPath);
		$backSteps = preg_replace('@^'.preg_quote(WB_PATH).'@', '', $sPostsPath);
		$backSteps = str_repeat( '../', substr_count($backSteps, '/'));
		$sql  = 'SELECT `page_id`,`post_id`,`section_id`,`link` ';
		$sql .= 'FROM `'.TABLE_PREFIX.'mod_news_posts`';
		$sql .= 'WHERE `link` != \'\'';
		if( ($resPosts = $database->query($sql)) )
		{
			while( $recPost = $resPosts->fetchRow() )
			{
				$file = $sPagesPath.$recPost['link'].PAGE_EXTENSION;
				$content =
					'<?php'."\n".
					'// *** This file is generated by WebsiteBaker Ver.'.VERSION."\n".
					'// *** Creation date: '.date('c')."\n".
					'// *** Do not modify this file manually'."\n".
					'// *** WB will rebuild this file from time to time!!'."\n".
					'// *************************************************'."\n".
					"\t".'$page_id    = '.$recPost['page_id'].';'."\n".
					"\t".'$section_id = '.$recPost['section_id'].';'."\n".
					"\t".'$post_id    = '.$recPost['post_id'].';'."\n".
					"\t".'$post_section = '.$recPost['section_id'].';'."\n".
//					"\t".'define(\'POST_SECTION\', '.$recPost['section_id'].');'."\n".
//					"\t".'define(\'POST_ID\',      '.$recPost['post_id'].');'."\n".
					"\t".'require(\''.$backSteps.'index.php\');'."\n".
					'// *************************************************'."\n";
				if( file_put_contents($file, $content) !== false ) {
				// Chmod the file
					change_mode($file);
				}else {
					if($globalStarted){
						echo $MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE'].'<br />';
						return;
					}else {
						$admin->print_error($MESSAGE['PAGES_CANNOT_CREATE_ACCESS_FILE']);
					}
				}
				$count++;
			}
		}
		if($globalStarted) { echo 'created '.$count.' new accessfiles.'; }
		if(!$globalStarted) { $admin->print_footer(); }
	}
	mod_news_Upgrade();
/* **** END UPGRADE ********************************************************* */
