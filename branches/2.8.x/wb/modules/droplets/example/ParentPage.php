//:Create a parent link to your page
//:Display a link to the parent page of the current page
$info = show_menu2(0, SM2_CURR, SM2_START, SM2_ALL|SM2_BUFFER, '[if(class==menu-current){[level] [sib] [sibCount] [parent]}]', '', '', '');