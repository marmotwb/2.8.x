$(document).ready(function()
{

        if($(".jcalendar").length) {
            $.insert(WB_URL+"/include/jscalendar/calendar-system.css");
          }

        if($(".jsadmin").length) {
            $.insert(WB_URL+"/modules/jsadmin/backend.css");
          }
/*
        if($("a[rel^='lightbox']").length) {
            $.insert(WB_URL+"/include/jquery/plugins/jquery-slimbox2.css");
            $.insert(WB_URL+"/include/jquery/plugins/jquery-slimbox2-min.js");
          }
        if($("textarea.markitup").length) {
            $.insert(WB_URL+'/modules/markitup/latest/skins/markitup/style.css');
            $.insert(WB_URL+'/modules/markitup/latest/sets/default/style.css');
            $.insert(WB_URL+'/modules/markitup/latest/jquery.markitup.pack.js');
            $.insert(WB_URL+'/modules/markitup/latest/sets/default/set.js');

        	// Add markItUp! to your textarea in one line
        	// $('textarea.markitup').markItUp( { Settings }, { OptionalExtraSettings } );
        	$('textarea.markitup').markItUp(mySettings);

         }
 */
});