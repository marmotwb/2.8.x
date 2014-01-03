// Copyright 2006 Stepan Riha
// www.nonplus.net
// $Id$

JsAdmin.init_tool = function() {
	var instruction = YAHOO.util.Dom.get('jsadmin_install');
	if(instruction) {
		instruction.style.display = 'none';
	}
	var form = YAHOO.util.Dom.get('jsadmin_form');
	if(form) {
		form.style.display = '';
	}
};
