//:search for an image in current page. If no image is present, the image of the parent page is inherited.
//:Use: [[iParentPageIcon?type=1]] Display the page-icon(0)(default) or menu_icon_0(1) or menu_icon_1(2) if found
// @author: Werner von der Decken
// @param int $type: 0=page_icon(default) | 1=menu_icon_0 | 2=menu_icon_1
// @param string $icon: name of a default image placed in WB_PATH/TEMPLATE/
// @return: a valid image-URL or empty string
//

$oDb = WbDatabase::getInstance();
$type = !isset($type) ? 0 : (intval($type) % 3);
$icontypes = array( 0=>'page_icon', 1=>'menu_icon_0', 2=>'menu_icon_1');
$icon_url = '';
if( isset($icon) && is_readable(WB_PATH.'/templates/'.TEMPLATE.'/'.$icon) )
{
	$icon_url = WB_REL.'/templates/'.TEMPLATE.'/'.$icon;
}
$tmp_trail = array_reverse($GLOBALS['wb']->page_trail);
foreach($tmp_trail as $pid)
{
	$sql  = 'SELECT `'.$icontypes[$type].'` ';
	$sql .= 'FROM `'.$oDb->TablePrefix.'pages` ';
	$sql .= 'WHERE `page_id`='.(int)$pid;
	if( ($icon = $oDb->get_one($sql)) != false )
	{
		if( file_exists(WB_PATH.$icon) )
		{
			$icon_url = WB_REL.$icon;
			break;
		}
	}
}
return $icon_url;
