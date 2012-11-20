function toggle_viewers() {
	if(document.settings.visibility.value == 'private' || document.settings.visibility.value == 'registered') {
		document.getElementById('viewers').style.display = 'block';
		document.getElementById('allowed_viewers').style.display = 'block';
	} else {
		document.getElementById('viewers').style.display = 'none';
		document.getElementById('allowed_viewers').style.display = 'none';
	}
}
var lastselectedindex = new Array();

function disabled_hack_for_ie(sel) {
	return true;
}