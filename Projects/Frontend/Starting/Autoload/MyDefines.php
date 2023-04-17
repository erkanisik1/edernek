<?php  
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	if(isset($_COOKIE['country'])) {
		$lang = $_COOKIE['country'];
	}else{
		$lang = $lang;
	}
	Lang::set($lang);
	define('LANG', $lang);

	if(Cookie::select('username')){
		define('USERNAME',Cookie::select('username'));
	}else{
		define('USERNAME',Session::select('username'));
	}

	if(Cookie::select('USERID')){
		define('USERID',Cookie::select('USERID'));
	}else{
		define('USERID',Session::select('USERID'));
}