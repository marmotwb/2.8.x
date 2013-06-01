<?php
/**
 * doFilterMediaRel
 * @param string to modify
 * @return string
 * Convert the Placeholder {SYSVAR:MEDIA_REL} into the real, full qualified URL
 */
	function doFilterMediaRel($sContent) {
		return str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $sContent);
	}