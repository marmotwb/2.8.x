//:Your skype status as an image
//:Commandline to use: [[skype?user=skypename]]
$user = (isset($user) && ($user!='') ? $user : '');
return '<img src="http://mystatus.skype.com/'.$user.'.png?t='.time().'" alt="My Skype status" />';