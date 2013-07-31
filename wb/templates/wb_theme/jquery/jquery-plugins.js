function include_file(filename, filetype) {
    if(!filetype){var filetype="js"}var th=document.getElementsByTagName("head")[0];var s=document.createElement((filetype=="js")?"script":"link");s.setAttribute("type",(filetype=="js")?"text/javascript":"text/css");if(filetype=="css"){s.setAttribute("rel","stylesheet")}s.setAttribute((filetype=="js")?"src":"href",filename);th.appendChild(s);
}

function redirect_to_page (url, timer) {
	setTimeout('self.location.href="'+url+'"', timer);
}

$(document).ready(function()
{
    if($(".jcalendar").length){$.insert(WB_URL+"/include/jscalendar/calendar-system.css")};
    if($(".jsadmin").length){$.insert(WB_URL+"/modules/jsadmin/backend.css")};

	//Add external link class to external links
    $('a[href^="http://"]').filter(function(){return this.hostname&&this.hostname!==location.hostname}).addClass("external").attr("target","_blank");
	// Add internal link class to external links
    $('a[href^="http://"]').filter(function(){return this.hostname&&this.hostname==location.hostname}).addClass("internal");

	$('form').attr('autocomplete', 'off');

    function include_file(filename, filetype)
    {
        if(!filetype){var filetype="js"}var th=document.getElementsByTagName("head")[0];var s=document.createElement((filetype=="js")?"script":"link");s.setAttribute("type",(filetype=="js")?"text/javascript":"text/css");if(filetype=="css"){s.setAttribute("rel","stylesheet")}s.setAttribute((filetype=="js")?"src":"href",filename);th.appendChild(s);
    }

    function redirect_to_page (url, timer) {
        setTimeout('self.location.href="'+url+'"', timer);
    }

    /* toggler for group permissions */
    if ($('form[name="group"]').length) {
		function toggleBox(a,b){var c=a;if(c.attr("checked")){$(b).removeClass("hide");return true}else{$(b).addClass("hide");return false}}var $ischecked=false;if($ischecked==false){if(!$("#pages_view").attr("checked")){toggleBox($(this),"#JQPageView")}if(!$("#media_view").attr("checked")){toggleBox($(this),"#JQMediaView")}if(!$("#modules_view").attr("checked")){toggleBox($(this),"#JQModulesView")}if(!$("#templates_view").attr("checked")){toggleBox($(this),"#JQTemplateView")}if(!$("#languages_view").attr("checked")){toggleBox($(this),"#JQLanguagesView")}if(!$("#settings_view").attr("checked")){toggleBox($(this),"#JQSettingsView")}if(!$("#admintools_view").attr("checked")){toggleBox($(this),"#JQAToolsView")}if(!$("#users_view").attr("checked")){toggleBox($(this),"#JQUsersView")}if(!$("#groups_view").attr("checked")){toggleBox($(this),"#JQGroupsView")}var $ischecked=true}$("#pages_view").click(function(){if(toggleBox($(this),"#JQPageView")){$("#pages_view_detail").attr("checked",true)}else{$.each(["#pages_view_detail","#pages_add_l0","#pages_add","#pages_settings","#pages_modify","#pages_intro","#pages_delete"],function(b,a){$(a).removeAttr("checked")})}});$("#media_view").click(function(){if(toggleBox($(this),"#JQMediaView")){$("#media_view_detail").attr("checked",true)}else{$.each(["#media_view_detail","#media_upload","#media_rename","#media_delete","#media_create"],function(b,a){$(a).removeAttr("checked")})}});$("#modules_view").click(function(){if(toggleBox($(this),"#JQModulesView")){$("#modules_view_detail").attr("checked",true)}else{$.each(["#modules_view_detail","#modules_install","#modules_uninstall","#modules_advanced"],function(b,a){$(a).removeAttr("checked")})}});$("#templates_view").click(function(){if(toggleBox($(this),"#JQTemplateView")){$("#templates_view_detail").attr("checked",true)}else{$.each(["#templates_view_detail","#templates_install","#templates_uninstall"],function(b,a){$(a).removeAttr("checked")})}});$("#languages_view").click(function(){if(toggleBox($(this),"#JQLanguagesView")){$("#languages_view_detail").attr("checked",true)}else{$.each(["#languages_view_detail","#languages_install","#languages_uninstall"],function(b,a){$(a).removeAttr("checked")})}});$("#settings_view").click(function(){if(toggleBox($(this),"#JQSettingsView")){$("#settings_view_detail").attr("checked",true)}else{$.each(["#settings_view_detail","#settings_advanced"],function(b,a){$(a).removeAttr("checked")})}});$("#admintools_view").click(function(){if(toggleBox($(this),"#JQAToolsView")){$("#admintools_view_detail").attr("checked",true)}else{$.each(["#modules_view_detail","#modules_install","#modules_uninstall","#modules_advanced"],function(b,a){$(a).removeAttr("checked")})}});$("#users_view").click(function(){if(toggleBox($(this),"#JQUsersView")){$("#users_view_detail").attr("checked",true)}else{$.each(["#users_view_detail","#users_add","#users_modify","#users_delete"],function(b,a){$(a).removeAttr("checked")})}});$("#groups_view").click(function(){if(toggleBox($(this),"#JQGroupsView")){$("#groups_view_detail").attr("checked",true)}else{$.each(["#groups_view_detail","#groups_add","#groups_modify","#groups_delete"],function(b,a){$(a).removeAttr("checked")})}});$("#preferences_view").click(function(){if(toggleBox($(this),"#JQUSettingsView")){$("#preferences_view_detail").attr("checked",true)}else{$.each(["#preferences_view_detail"],function(b,a){$(a).removeAttr("checked")})}});
    }
});