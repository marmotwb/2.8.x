//:Puts a EditThisPage link on your page, if you have the rights
//:Use [[EditThisPage]]

global $page_id, $HEADING;
$retVal = '';
$wb = new admin ('Start', 'start', false, false);
if (FRONTEND_LOGIN == true && is_numeric($wb->get_session('USER_ID')))
{

	if( $wb->get_permission('pages_modify') && $wb->get_page_permission( PAGE_ID ) )
	{
		$retVal .= '<div class="page-modify">'."\n";
		$retVal .= '<a target="_blank" href="'.ADMIN_URL.'/pages/modify.php?page_id='.PAGE_ID.'" title="'.$HEADING['MODIFY_PAGE'].'" class="blank_target">';
		$retVal .= '<img src="'.ADMIN_URL . '/images/modify_16.png" alt="'.$HEADING['MODIFY_PAGE'].'" />';
		$retVal .= '<span>'.$HEADING['MODIFY_PAGE'].'</span>';
		$retVal .= '</a>';
		$retVal .= '</div>'."\n";
	}
}
return $retVal;