<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

 -----------------------------------------------------------------------------------------
  DUTCH LANGUAGE FILE FOR THE CAPTCHA-CONTROL ADMIN TOOL
 -----------------------------------------------------------------------------------------
*/

// Headings and text outputs
$MOD_CAPTCHA_CONTROL['HEADING']           = 'Captcha en ASP control';
$MOD_CAPTCHA_CONTROL['HOWTO']             = 'Hier kan je het gedrag van "CAPTCHA" en "Advanced Spam Protection" (ASP) beheren. Om ASP te laten werken met een bepaalde module, deze speciale module moet aangepast worden om gebruik te kunnen maken van ASP.';

// Text and captions of form elements
$MOD_CAPTCHA_CONTROL['CAPTCHA_CONF']      = 'CAPTCHA Configuratie';
$MOD_CAPTCHA_CONTROL['CAPTCHA_TYPE']      = 'Type van CAPTCHA';
$MOD_CAPTCHA_CONTROL['CAPTCHA_EXP']       = 'CAPTCHA settings for modules are located in the respective module settings';
$MOD_CAPTCHA_CONTROL['USE_SIGNUP_CAPTCHA']= 'Activeer CAPTCHA om aan te melden';
$MOD_CAPTCHA_CONTROL['ENABLED']           = 'Aan';
$MOD_CAPTCHA_CONTROL['DISABLED']          = 'Uit';
$MOD_CAPTCHA_CONTROL['ASP_CONF']          = 'Advanced Spam Protection Configuratie';
$MOD_CAPTCHA_CONTROL['ASP_TEXT']          = 'Activeer ASP (indien beschikbaar)';
$MOD_CAPTCHA_CONTROL['ASP_EXP']           = 'ASP zal proberen te detecteren of de invoer van een formulier ingegeven werd via een mens of een spam-bot.';
$MOD_CAPTCHA_CONTROL['CALC_TEXT']         = 'Rekensom als tekst';
$MOD_CAPTCHA_CONTROL['CALC_IMAGE']        = 'Rekensom als figuur';
$MOD_CAPTCHA_CONTROL['CALC_TTF_IMAGE']    = 'Rekensom als figuur met verschillende lettertypen en achtergronden';
$MOD_CAPTCHA_CONTROL['TTF_IMAGE']         = 'Figuur met verschillende lettertypen en achtergronden';
$MOD_CAPTCHA_CONTROL['OLD_IMAGE']         = 'Oude stijl (niet aan te raden)';
$MOD_CAPTCHA_CONTROL['TEXT']              = 'Tekst-CAPTCHA';
$MOD_CAPTCHA_CONTROL['CAPTCHA_ENTER_TEXT']= 'Vragen en antwoorden';
$MOD_CAPTCHA_CONTROL['CAPTCHA_TEXT_DESC'] = 'Wis dit om uw lijst in te geven'."\n".'of de wijzigingen zullen niet bewaard worden!'."\n".'### voorbeeld ###'."\n".'Hier kan je vragen en antwoorden ingeven.'."\n".'Gebruik:'."\n".'?Wat is de <b>voornaam</b> van <b>Claudia</b> Schiffer?'."\n".'!Claudia'."\n".'?Vraag 2'."\n".'!Antwoord 2'."\n".' ... '."\n".'indien de taal geen rol speelt.'."\n".''."\n".'Of, indien taal wel een rol speelt, gebruik:'."\n".'?EN:What\'s <b>Claudia</b> Schiffer\'s <b>first name</b>?'."\n".'!Claudia'."\n".'?EN:Question 2'."\n".'!Answer 2'."\n".'?DE:Wie ist der <b>Vorname</b> von <b>Claudia</b> Schiffer?'."\n".'!Claudia'."\n".' ... '."\n".'### voorbeeld ###'."\n".'';

$MOD_CAPTCHA['VERIFICATION']           = 'Verificatie';
$MOD_CAPTCHA['ADDITION']               = 'plus';
$MOD_CAPTCHA['SUBTRAKTION']            = 'min';
$MOD_CAPTCHA['MULTIPLIKATION']         = 'maal';
$MOD_CAPTCHA['VERIFICATION_INFO_RES']  = 'Geef het resultaat in';
$MOD_CAPTCHA['VERIFICATION_INFO_TEXT'] = 'Geef de tekst in';
$MOD_CAPTCHA['VERIFICATION_INFO_QUEST'] = 'Beantwoord de vraag';
$MOD_CAPTCHA['INCORRECT_VERIFICATION'] = 'Verificatie mislukt';

?>
