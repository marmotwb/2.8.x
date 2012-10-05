/**
 *
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.4
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 * @description
 *
 */

function mdcr(d,c){location.href=sdcr(d,c)}function sdcr(i,k){var h=i.charCodeAt(i.length-1)-97;var n="";var l;var j;for(var m=i.length-2;m>-1;m--){if(i.charCodeAt(m)<97){switch(i.charCodeAt(m)){case 70:j=64;break;case 90:j=46;break;case 88:j=95;break;case 75:j=45;break;default:j=i.charCodeAt(m);break}n+=String.fromCharCode(j)}else{l=(i.charCodeAt(m)-97-h)%26;l+=(l<0||l>25)?+26:0;n+=String.fromCharCode(l+97)}}return"mailto:"+n+k};