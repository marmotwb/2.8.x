<?php
/**
 *
 * @category        modules
 * @package         output_filter
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 *
 */

//Module Description
$module_description = 'Ce module g&egrave;re le filtrage des donn&eacute;es avant affichage &agrave; l&apos;utilisateur. Permets de filtrer les liens mailto et les adresses emails.';

// Headings and text outputs
$MOD_MAIL_FILTER['HEADING'] = 'Options: Output Filter';
$MOD_MAIL_FILTER['HOWTO'] = 'Vous pouvez configurer le filtrage des donn&eacute;es avant affichage gr&acirc;ce aux options ci-dessous.';
$MOD_MAIL_FILTER['WARNING'] = '';

// Text and captions of form elements
$MOD_MAIL_FILTER['BASIC_CONF'] = 'Configuration de base des Emails';
$MOD_MAIL_FILTER['SYS_REL'] = 'Frontendoutput with  relative Urls';
$MOD_MAIL_FILTER['EMAIL_FILTER'] = 'Filtrer le texte des Emails';
$MOD_MAIL_FILTER['MAILTO_FILTER'] = 'Filtrer les liens mailto des Emails';
$MOD_MAIL_FILTER['ENABLED'] = 'Activ&eacute;';
$MOD_MAIL_FILTER['DISABLED'] = 'D&eacute;sactiv&eacute;';

$MOD_MAIL_FILTER['REPLACEMENT_CONF']= 'Remplacements';
$MOD_MAIL_FILTER['AT_REPLACEMENT']	= 'Remplacer "@" par';
$MOD_MAIL_FILTER['DOT_REPLACEMENT']	= 'Remplacer "." par';
