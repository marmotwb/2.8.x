<?php
/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2010 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * This is the integration file for PHP 5.
 *
 * It defines the FCKeditor class that can be used to create editor
 * instances in PHP pages on server side.
 */


/**
 * Check if browser is compatible with FCKeditor.
 * Return true if is compatible.
 *
 * @return boolean
 */
function FCKeditor_IsCompatibleBrowser()
{
    $sAgent = 'sorry';
    if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
        $sAgent = $_SERVER['HTTP_USER_AGENT'] ;
    } else {
        if( isset( $GLOBALS['HTTP_SERVER_VARS']['HTTP_USER_AGENT'] )) {
            $sAgent = $GLOBALS['HTTP_SERVER_VARS']['HTTP_USER_AGENT'] ;
        } else {
            if( isset( $GLOBALS['HTTP_USER_AGENT'] )) {
                $sAgent = $GLOBALS['HTTP_USER_AGENT'];
            }
        }
    }

    // check for client agent
    $bRetval = false;
    if(preg_match('/ gecko\/([0-9.]+)/si', $sAgent, $aMatches)) {
        // [Gecko] Firefox, SeaMonkey and most Gecko based browsers
        if(strpos($aMatches[1], '.')) {
            // Versions from Gecko 17.0 up
            $bRetval = version_compare($aMatches[1], '4.0', '>=');
        } else {
            // versions before Gecko 17.0
            if((int)$aMatches[1] >= 20030210) { $bRetval = true; }
        }
    } elseif(preg_match('/ applewebkit\/([0-9.]+)/si', $sAgent, $aMatches)) {
        // [AppleWebKit] Crome, Safari
        $bRetval = version_compare($aMatches[1], '522', '>=');
    } elseif(preg_match('/^opera\/([0-9.]+)/si', $sAgent, $aMatches)) {
        // [Opera] Opera
        $bRetval = version_compare($aMatches[1], '9.5', '>=');
    } elseif(preg_match('/^mozilla\/[\d.]+\s\(.*?msie[^\)]*\(.*?\ msie\ ([0-9.]+);/si', $sAgent, $aMatches)) {
        // [MSIE] Internetexplorer compatibility mode
        $bRetval = version_compare($aMatches[1], '5.5', '>=');
    } elseif(preg_match('/^mozilla\/[\d.]+\s\(.*?\ msie\ ([0-9.]+);/si', $sAgent, $aMatches)) {
        // [MSIE] Internetexplorer
        $bRetval = version_compare($aMatches[1], '5.5', '>=');
    } else {
        // undefined client agent
        $bRetval = false;
    }
    return $bRetval;
}

class FCKeditor
{
	/**
	 * Name of the FCKeditor instance.
	 *
	 * @access protected
	 * @var string
	 */
	public $InstanceName ;
	/**
	 * Path to FCKeditor relative to the document root.
	 *
	 * @var string
	 */
	public $BasePath ;
	/**
	 * Width of the FCKeditor.
	 * Examples: 100%, 600
	 *
	 * @var mixed
	 */
	public $Width ;
	/**
	 * Height of the FCKeditor.
	 * Examples: 400, 50%
	 *
	 * @var mixed
	 */
	public $Height ;
	/**
	 * Name of the toolbar to load.
	 *
	 * @var string
	 */
	public $ToolbarSet ;
	/**
	 * Initial value.
	 *
	 * @var string
	 */
	public $Value ;
	/**
	 * This is where additional configuration can be passed.
	 * Example:
	 * $oFCKeditor->Config['EnterMode'] = 'br';
	 *
	 * @var array
	 */
	public $Config ;

	/**
	 * Main Constructor.
	 * Refer to the _samples/php directory for examples.
	 *
	 * @param string $instanceName
	 */
	public function __construct( $instanceName )
 	{
		$this->InstanceName	= $instanceName ;
		$this->BasePath		= '/fckeditor/' ;
		$this->Width		= '100%' ;
		$this->Height		= '200' ;
		$this->ToolbarSet	= 'Default' ;
		$this->Value		= '' ;

		$this->Config		= array() ;
	}

	/**
	 * Display FCKeditor.
	 *
	 */
	public function Create()
	{
		echo $this->CreateHtml() ;
	}

	/**
	 * Return the HTML code required to run FCKeditor.
	 *
	 * @return string
	 */
	public function CreateHtml()
	{
		$HtmlValue = htmlspecialchars( $this->Value ) ;

		$Html = '' ;

		if ( $this->IsCompatible() )
		{
			if ( isset( $_GET['fcksource'] ) && $_GET['fcksource'] == "true" )
				$File = 'fckeditor.original.html' ;
			else
				$File = 'fckeditor.html' ;

			$Link = "{$this->BasePath}editor/{$File}?InstanceName={$this->InstanceName}" ;

			if ( $this->ToolbarSet != '' )
				$Link .= "&amp;Toolbar={$this->ToolbarSet}" ;

			// Render the linked hidden field.
			$Html .= "<input type=\"hidden\" id=\"{$this->InstanceName}\" name=\"{$this->InstanceName}\" value=\"{$HtmlValue}\" style=\"display:none\" />" ;

			// Render the configurations hidden field.
			$Html .= "<input type=\"hidden\" id=\"{$this->InstanceName}___Config\" value=\"" . $this->GetConfigFieldString() . "\" style=\"display:none\" />" ;

			// Render the editor IFRAME.
			$Html .= "<iframe id=\"{$this->InstanceName}___Frame\" src=\"{$Link}\" width=\"{$this->Width}\" height=\"{$this->Height}\" frameborder=\"0\" scrolling=\"no\"></iframe>" ;
		}
		else
		{
			if ( strpos( $this->Width, '%' ) === false )
				$WidthCSS = $this->Width . 'px' ;
			else
				$WidthCSS = $this->Width ;

			if ( strpos( $this->Height, '%' ) === false )
				$HeightCSS = $this->Height . 'px' ;
			else
				$HeightCSS = $this->Height ;

			$Html .= "<textarea name=\"{$this->InstanceName}\" rows=\"4\" cols=\"40\" style=\"width: {$WidthCSS}; height: {$HeightCSS}\">{$HtmlValue}</textarea>" ;
		}

		return $Html ;
	}

	/**
	 * Returns true if browser is compatible with FCKeditor.
	 *
	 * @return boolean
	 */
	public function IsCompatible()
	{
		return FCKeditor_IsCompatibleBrowser() ;
	}

	/**
	 * Get settings from Config array as a single string.
	 *
	 * @access protected
	 * @return string
	 */
	public function GetConfigFieldString()
	{
		$sParams = '' ;
		$bFirst = true ;

		foreach ( $this->Config as $sKey => $sValue )
		{
			if ( $bFirst == false )
				$sParams .= '&amp;' ;
			else
				$bFirst = false ;

			if ( $sValue === true )
				$sParams .= $this->EncodeConfig( $sKey ) . '=true' ;
			else if ( $sValue === false )
				$sParams .= $this->EncodeConfig( $sKey ) . '=false' ;
			else
				$sParams .= $this->EncodeConfig( $sKey ) . '=' . $this->EncodeConfig( $sValue ) ;
		}

		return $sParams ;
	}

	/**
	 * Encode characters that may break the configuration string
	 * generated by GetConfigFieldString().
	 *
	 * @access protected
	 * @param string $valueToEncode
	 * @return string
	 */
	public function EncodeConfig( $valueToEncode )
	{
		$chars = array(
			'&' => '%26',
			'=' => '%3D',
			'"' => '%22' ) ;

		return strtr( $valueToEncode,  $chars ) ;
	}
}
