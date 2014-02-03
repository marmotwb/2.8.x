//:Displays the last modification time of the current page
//:Use [[ModifiedWhen]]

$sRetval = '';
if (($aPageDate = (($GLOBALS['wb']->page_id) ? $GLOBALS['wb']->page['modified_when'] : 0))) {
    $sRetval = 'This page was last modified on '.date('d/m/Y', $aPageDate).' at '.date('H:i', $aPageDate);
}
return $sRetval;
