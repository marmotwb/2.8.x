//:Randomly display one WYSIWYG section from a given list
//:Use [[iShowRandomWysiwyg?section=10,12,15,20]] possible Delimiters: [ ,;:|-+#/ ]
global $database, $section_id,$module;
$content = '';
if (isset($section)) {
	if( preg_match('/^[0-9]+(?:\s*[\,\|\-\;\:\+\#\/]\s*[0-9]+\s*)*$/', $section)) {
		if (is_readable(WB_PATH.'/modules/wysiwyg/view.php')) {
		// if valid arguments given and module wysiwyg is installed
		// split and sanitize arguments
		$aSections = preg_split('/[\s\,\|\-\;\:\+\#\/]+/', $section);
		$iOldSectionId = intval($section_id); // save old SectionID
		$section_id = $aSections[array_rand($aSections)]; // get random element
		ob_start(); // generate output by wysiwyg module
		$sectionAnchor = (defined('SEC_ANCHOR') && SEC_ANCHOR!='') ? SEC_ANCHOR : 'Sec';
		echo PHP_EOL.'<div id="'.$sectionAnchor.$sSectionIdPrefix.'" class="section m_'.$module.'" >'.PHP_EOL;
		require(WB_PATH.'/modules/wysiwyg/view.php');
		echo PHP_EOL.'</div><!-- '.$module.$section_id.' -->'.PHP_EOL;
		$content = ob_get_clean();
		$section_id = $iOldSectionId; // restore old SectionId
		}
	}
}
return $content;
