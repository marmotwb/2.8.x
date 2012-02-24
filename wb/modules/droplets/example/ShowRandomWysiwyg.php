//:Randomly display one WYSIWYG section from a given list
//:Use [[ShowRandomWysiwyg?section=10,12,15,20]] possible Delimiters: [ ,;:|-+#/ ]
global $database;
	$content = '';
	if (isset($section)) {
		if( preg_match('/^[0-9]+(?:\s*\[\,\|\-\;\:\+\#\/]\s*[0-9]+\s*)*$/', $section)) {
			if (is_readable(WB_PATH.'/modules/wysiwyg/view.php')) {
			// if valid arguments given and module wysiwyg is installed
				$iOldSectionId = intval($section_id); // save old SectionId
				// split and sanitize arguments
				$aSections = preg_split('/[\s\,\|\-\;\:\+\#\/]+/', $section);
				$section_id = $sections[array_rand($sections)]; // get random element
				ob_start(); // generate output by wysiwyg module
				require(WB_PATH.'/modules/wysiwyg/view.php');
				$content = ob_get_clean();
				$section_id = $ioldSectionId; // restore old SectionId
			}
		}
	}
return $content;