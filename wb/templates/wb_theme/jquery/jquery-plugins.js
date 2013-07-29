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
    if($('form[name="group"]').length) {

        function toggleBox(checkbox, toggleID)
        {
            var $checkbox = checkbox;
            if( $checkbox.attr('checked'))
            {
                $(toggleID).removeClass("hide");
                return true;
            } else {
                $(toggleID).addClass("hide");
                return false;
            }
        }

        function proveCheckbox(checkbox)
        {
            if($(checkbox).attr('checked'))
            {
                $(checkbox).prop('checked', false);
            } else {
                $(checkbox).prop('checked', true);
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
            if(toggleBox($(this),"#JQPageView")){proveCheckbox("#pages_view_detail")}else{proveCheckbox("#pages_view_detail");proveCheckbox("#pages_add_l0");proveCheckbox("#pages_add");proveCheckbox("#pages_settings");proveCheckbox("#pages_modify");proveCheckbox("#pages_intro");proveCheckbox("#pages_delete")};
        });
        $('#media_view').click(function(){
            if(toggleBox($(this),"#JQMediaView")){proveCheckbox("#media_view_detail")}else{proveCheckbox("#media_view_detail");proveCheckbox("#media_upload");proveCheckbox("#media_rename");proveCheckbox("#media_delete");proveCheckbox("#media_create")};
        });
        $('#modules_view').click(function(){
            if(toggleBox($(this),"#JQModulesView")){proveCheckbox("#modules_view_detail")}else{proveCheckbox("#modules_view_detail");proveCheckbox("#modules_install");proveCheckbox("#modules_uninstall");proveCheckbox("#modules_advanced")};
        });
        $('#templates_view').click(function(){
            if(toggleBox($(this),"#JQTemplateView")){proveCheckbox("#templates_view_detail")}else{proveCheckbox("#templates_view_detail");proveCheckbox("#templates_install");proveCheckbox("#templates_uninstall")};
        });
        $('#languages_view').click(function(){
            if(toggleBox($(this),"#JQLanguagesView")){proveCheckbox("#languages_view_detail")}else{proveCheckbox("#languages_view_detail");proveCheckbox("#languages_install");proveCheckbox("#languages_uninstall")};
        });
        $('#settings_view').click(function(){
            if(toggleBox($(this),"#JQSettingsView")){proveCheckbox("#settings_view_detail")}else{proveCheckbox("#settings_view_detail");proveCheckbox("#settings_advanced")};
        });
        $('#admintools_view').click(function(){
            if(toggleBox($(this),"#JQAToolsView")){proveCheckbox("#admintools_view_detail")}else{proveCheckbox("#admintools_view_detail")};
        });
        $('#users_view').click(function(){
            if(toggleBox($(this),"#JQUsersView")){proveCheckbox("#users_view_detail")}else{proveCheckbox("#users_view_detail");proveCheckbox("#users_add");proveCheckbox("#users_modify");proveCheckbox("#users_delete")};
        });
        $('#groups_view').click(function(){
            if(toggleBox($(this),"#JQGroupsView")){proveCheckbox("#groups_view_detail")}else{proveCheckbox("#groups_view_detail");proveCheckbox("#groups_add");proveCheckbox("#groups_modify");proveCheckbox("#groups_delete")};
        });
        $('#preferences_view').click(function(){
            if(toggleBox($(this),"#JQUSettingsView")){proveCheckbox("#preferences_view_detail")}else{proveCheckbox("#preferences_view_detail")};
        });
    }
});