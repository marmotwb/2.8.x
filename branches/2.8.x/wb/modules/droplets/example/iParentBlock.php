//:search for blockcontent in current page and parent pages if not found
//:Use: [[iParentBlock?block=2]] Display the content of a defined block
// Select all WYSIWYG-sections from a defined block on this page or it's parent pages
// @author: Werner von der Decken
global $wb, $database;
	$oDb = WbDatabase::getInstance();
	$rt_content = '';
	$block = !isset($block) ? 1 : intval($block);
	$tmp_trail = $wb->page_trail;
	while( ($pid = array_pop($tmp_trail)) != null )
	{
		$sql  = 'SELECT `w`.`content`, `s`.`section_id`, `p`.`page_id`, `p`.`visibility`, ';
		$sql .=        '`p`.`viewing_groups`, `p`.`viewing_users` ';
		$sql .= 'FROM `'.$oDb->TablePrefix.'mod_wysiwyg` `w` ';
		$sql .=   'LEFT JOIN `'.$oDb->TablePrefix.'sections` `s` ON `w`.`section_id`= `s`.`section_id` ';
		$sql .=   'LEFT JOIN `'.$oDb->TablePrefix.'pages` `p` ON `s`.`page_id`=`p`.`page_id` ';
		$sql .= 'WHERE `s`.`block`='.$block.' AND `s`.`page_id`='.$pid.' ';
		$sql .= 'ORDER BY `s`.`position` ASC';
		if( $rs_pages = $oDb->doQuery($sql) )
		{
			while( $rec_page = $rs_pages->fetchRow(MYSQL_ASSOC) )
			{
				if( $wb->page_is_visible($rec_page) )
				{
					if( $wb->section_is_active($rec_page['section_id']) )
					{
						$rt_content .= trim($rec_page['content']);
					}
				}
			}
		}
		if($rt_content != '') { break; }
	}
return $rt_content;
