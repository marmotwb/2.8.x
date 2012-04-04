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

// Headings and text outputs
$MOD_MAIL_FILTER['HEADING']	= 'Valg: Filtrering av ut data';
$MOD_MAIL_FILTER['HOWTO']	= 'Du kan gj&oslash;re innstillinger for utdatafitreringen i valgene nedenfor.<p style="line-height:1.5em;"><strong>Tips: </strong>Mailto linker kan krypteres av en Javascript funksjon. For &aring; f&aring; benyttet denne funksjonen, m&aring; det legges til f&oslash;lgende PHP kode <code style="background:#FFA;color:#900;">&lt;?php register_frontend_modfiles(\'js\');?&gt;</code> inn i &lt;head&gt; seksjonen i index.php p&aring; design malen din. Uten denne modifikasjonen, vil kun @ karakterer i mailto linker bli erstattet.';
$MOD_MAIL_FILTER['WARNING']	= '';

// Text and captions of form elements
$MOD_MAIL_FILTER['BASIC_CONF']	= 'Enkel Epost konfigurasjon';
$MOD_MAIL_FILTER['SYS_REL'] = 'Frontendoutput with relative Urls';
$MOD_MAIL_FILTER['EMAIL_FILTER']	= 'Filtrer Epost adresser i tekst';
$MOD_MAIL_FILTER['MAILTO_FILTER']	= 'Filtrer Epost adresser i mailto linker';
$MOD_MAIL_FILTER['ENABLED']	= 'P&aring;sl&aring;tt';
$MOD_MAIL_FILTER['DISABLED']	= 'Avsl&aring;tt';

$MOD_MAIL_FILTER['REPLACEMENT_CONF']= 'Endringe i Epost adresser';
$MOD_MAIL_FILTER['AT_REPLACEMENT']	= 'Bytt "@" med';
$MOD_MAIL_FILTER['DOT_REPLACEMENT']	= 'Bytt "." med';
