{#
/**
 *
 * @category        modules
 * @package         MultiLingial
 * @author          WebsiteBaker Project, Luisehahne
 * @copyright       2009-2012, WebsiteBaker Org. e.V.
 * @link            http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource      $HeadURL$
 * @lastmodified    $Date$
 *
 */
#}
 
<div id="langmenu">
{% for file in lang.FILES %}
    <span style="width:{{ file.LANG_ICON_WIDTH }};vertical-align:middle;">
    <a class="{{ file.LANG_ICON_CLASS }}" href="{{ file.LANG_PAGE_URL }}" title="{{ file.TEXT_PAGE_TITLE }}">
    <span>
    	<img style="border: none;" src="{{ file.URL_ICON_FOLDER }}/{{ file.LANG_ICON }}.{{ file.LANG_ICON_EXT }}" title="{{ file.TEXT_PAGE_TITLE }}" alt="{{ file.TEXT_PAGE_TITLE }}" />
    </span>
    </a>
    </span>
{% endfor %}
</div>
