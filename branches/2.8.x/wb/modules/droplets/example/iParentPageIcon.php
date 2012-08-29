//:search for icon in current page and parent pages if not found
//:Use: [[iParentPageIcon?type=1]] Display the page-icon(0)(default) or menu_icon_0(1) or menu_icon_1(2) if found
// @author: Werner von der Decken
// @param int $type: 0=page_icon(default) | 1=menu_icon_0 | 2=menu_icon_1
// @param string $icon: name of a default image placed in WB_PATH/TEMPLATE/
// @return: a valid image-URL or empty string
//
global $wb, $database;
$type = !isset($type) ? 0 : (intval($type) % 3);
$icontypes = array( 0=>'page_icon', 1=>'menu_icon_0', 2=>'menu_icon_1');
$icon_url = '';
if( isset($icon) && is_readable(WB_PATH.'/templates/'.TEMPLATE.'/'.$icon) )
{
	$icon_url = WB_REL.'/templates/'.TEMPLATE.'/'.$icon;
}
$tmp_trail = $wb->page_trail;
$tmp_trail = array_reverse($tmp_trail);
foreach($tmp_trail as $pid)
{
	$sql  = 'SELECT `'.$icontypes[$type].'` ';
	$sql .= 'FROM `'.TABLE_PREFIX.'pages` ';
	$sql .= 'WHERE `page_id`='.(int)$pid;
	if( ($icon = $database->get_one($sql)) != false )
	{
		if( file_exists(WB_PATH.$icon) )
		{
			$icon_url = WB_REL.$icon;
			break;
		}
	}
}
return $icon_url;
