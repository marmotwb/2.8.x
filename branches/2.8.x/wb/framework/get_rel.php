<?php
function debug_info ($var, $title='')
{
print '<pre><strong>function '.__FUNCTION__.'('.$title.');</strong> line: '.__LINE__.' -> ';
print_r( $var ); print '</pre>'; // die();
}

function getBaseUrl()
{
	global $mod_path;
	// identify Server Document_Root
/*
	define('PATH_thisScript', str_replace('//', '/', str_replace('\\', '/', (PHP_SAPI == 'fpm-fcgi' || PHP_SAPI == 'cgi' || PHP_SAPI == 'isapi' || PHP_SAPI == 'cgi-fcgi') &&
		($_SERVER['ORIG_PATH_TRANSLATED'] ? $_SERVER['ORIG_PATH_TRANSLATED'] : $_SERVER['PATH_TRANSLATED']) ?
		($_SERVER['ORIG_PATH_TRANSLATED'] ? $_SERVER['ORIG_PATH_TRANSLATED'] : $_SERVER['PATH_TRANSLATED']) :
		($_SERVER['ORIG_SCRIPT_FILENAME'] ? $_SERVER['ORIG_SCRIPT_FILENAME'] : $_SERVER['SCRIPT_FILENAME']))));
	define('PATH_site', dirname(PATH_thisScript) . '/');
*/
	// on WIN/IIS create this entry
    $script_name = str_replace('\\', '/',dirname(dirname(__FILE__)));
	$sys_root = ( !isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] == '' ) ? (str_replace('\\', '/', $script_name)) : str_replace('\\', '/',$_SERVER['DOCUMENT_ROOT']);

    $_SERVER['DOCUMENT_ROOT'] = $sys_root;

	$wb_rel = str_replace( $sys_root, '' ,($script_name));

	$mod_path = (!empty($mod_path)) ? $mod_path : '/' ;
	$regex = '/(?=\\'.$mod_path.').*/i';
	$replace = '';
	$wb_rel = preg_replace ($regex, $replace, $wb_rel, -1 );
	$wb_rel = str_replace('//', '/', $wb_rel );
	if(!defined('WB_REL')) {define('WB_REL', $wb_rel);}
	if(!defined('ADMIN_REL')) {define('ADMIN_REL', $wb_rel.'/admin');}

}

getBaseUrl( );

