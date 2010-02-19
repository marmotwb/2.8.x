<?php
/**
 *
 * @category        modules
 * @package         wysiwyg
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2010, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 4.4.9 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

// Get content
$get_content = $database->query("SELECT content FROM ".TABLE_PREFIX."mod_wysiwyg WHERE section_id = '$section_id'");
$fetch_content = $get_content->fetchRow();
$content = ($fetch_content['content']);

echo $content;

?>