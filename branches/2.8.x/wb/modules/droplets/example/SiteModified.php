//:Create information on when your site was last updated.
//:Create information on when your site was last updated. Any page update counts.
$sRetval = '';
if (PAGE_ID > 0) {
    $sql = 'SELECT MAX(`modified_when`) `modified` '
         . 'FROM `'.WbDatabase::getInstance()->TablePrefix.'pages`';
	$iModified = WbDatabase::getInstance()->getOne($sql);
    $sRetval = "This site was last modified on ".date("d/m/Y",$iModified). " at ".date("H:i",$iModified).".";
}
return $sRetval;