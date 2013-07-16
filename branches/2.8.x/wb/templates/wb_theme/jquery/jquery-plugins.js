function include_file(filename, filetype) {

	if(!filetype)
		var filetype = 'js'; //js default filetype

	var th = document.getElementsByTagName('head')[0];
	var s = document.createElement((filetype == "js") ? 'script' : 'link');

	s.setAttribute('type',(filetype == "js") ? 'text/javascript' : 'text/css');

	if (filetype == "css")
		s.setAttribute('rel','stylesheet');

	s.setAttribute((filetype == "js") ? 'src' : 'href', filename);
	th.appendChild(s);

}

function redirect_to_page (url, timer) {
	setTimeout('self.location.href="'+url+'"', timer);
}

$(document).ready(function()
{

        if($(".jcalendar").length) {
            $.insert(WB_URL+"/include/jscalendar/calendar-system.css");
          }

        if($(".jsadmin").length) {
            $.insert(WB_URL+"/modules/jsadmin/backend.css");
          }

	//Add external link class to external links -
	$('a[href^="http://"]').filter(function() {
		//Compare the anchor tag's host name with location's host name
	    return this.hostname && this.hostname !== location.hostname;
	  }).addClass("external").attr("target", "_blank");

	/* Add internal link class to external links -   */
	$('a[href^="http://"]').filter(function() {
		//Compare the anchor tag's host name with location's host name
	    return this.hostname && this.hostname == location.hostname;
	  }).addClass("internal");

	$('form').attr('autocomplete', 'off');
function include_file(filename, filetype) {

	if(!filetype)
		var filetype = 'js'; //js default filetype

	var th = document.getElementsByTagName('head')[0];
	var s = document.createElement((filetype == "js") ? 'script' : 'link');

	s.setAttribute('type',(filetype == "js") ? 'text/javascript' : 'text/css');

	if (filetype == "css")
		s.setAttribute('rel','stylesheet');

	s.setAttribute((filetype == "js") ? 'src' : 'href', filename);
	th.appendChild(s);

}

function redirect_to_page (url, timer) {
	setTimeout('self.location.href="'+url+'"', timer);
}

$(document).ready(function()
{

        if($(".jcalendar").length) {
            $.insert(WB_URL+"/include/jscalendar/calendar-system.css");
          }

        if($(".jsadmin").length) {
            $.insert(WB_URL+"/modules/jsadmin/backend.css");
          }

	//Add external link class to external links -
	$('a[href^="http://"]').filter(function() {
		//Compare the anchor tag's host name with location's host name
	    return this.hostname && this.hostname !== location.hostname;
	  }).addClass("external").attr("target", "_blank");

	/* Add internal link class to external links -   */
	$('a[href^="http://"]').filter(function() {
		//Compare the anchor tag's host name with location's host name
	    return this.hostname && this.hostname == location.hostname;
	  }).addClass("internal");

	$('form').attr('autocomplete', 'off');

/* toggler for group permissions */
    if($('form[name="group"]').length) {

		function toggleBox(checkbox, toggleID){
			var $checkbox = checkbox;
			if( $checkbox.attr('checked')){
				$(toggleID).removeClass("hide");
			} else {
				$(toggleID).addClass("hide");
			}
		}


		var $ischecked = false;
		/* check toggler on pageload */
		if($ischecked == false) {
			if(!$('#pages_view').attr('checked')){
				toggleBox($(this), "#JQPageView");
			}
			if(!$('#media_view').attr('checked')){
				toggleBox($(this), "#JQMediaView");
			}
			if(!$('#modules_view').attr('checked')){
				toggleBox($(this), "#JQModulesView");
			}
			if(!$('#templates_view').attr('checked')){
				toggleBox($(this), "#JQTemplateView");
			}
			if(!$('#languages_view').attr('checked')){
				toggleBox($(this), "#JQLanguagesView");
			}
			if(!$('#settings_view').attr('checked')){
				toggleBox($(this), "#JQSettingsView");
			}
			if(!$('#admintools_view').attr('checked')){
				toggleBox($(this), "#JQAToolsView");
			}
			if(!$('#users_view').attr('checked')){
				toggleBox($(this), "#JQUsersView");
			}
			if(!$('#groups_view').attr('checked')){
				toggleBox($(this), "#JQGroupsView");
			}
			var $ischecked = true;
		}


        $('#pages_view').click(function(){
            toggleBox($(this), "#JQPageView");
        });
        $('#media_view').click(function(){
            toggleBox($(this), "#JQMediaView");
        });
        $('#modules_view').click(function(){
            toggleBox($(this), "#JQModulesView");
        });
        $('#templates_view').click(function(){
            toggleBox($(this), "#JQTemplateView");
        });
        $('#languages_view').click(function(){
            toggleBox($(this), "#JQLanguagesView");
        });
        $('#settings_view').click(function(){
            toggleBox($(this), "#JQSettingsView");
        });
        $('#admintools_view').click(function(){
            toggleBox($(this), "#JQAToolsView");
        });
        $('#users_view').click(function(){
            toggleBox($(this), "#JQUsersView");
        });
        $('#groups_view').click(function(){
            toggleBox($(this), "#JQGroupsView");
        });
        $('#preferences_view').click(function(){
            toggleBox($(this), "#JQUSettingsView");
        });
      }


});
});