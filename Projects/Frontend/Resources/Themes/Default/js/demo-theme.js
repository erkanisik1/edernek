/*!
* Tabler v1.0.0-beta16 (https://tabler.io)
* @version 1.0.0-beta16
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
*/
(function (factory) {
	typeof define === 'function' && define.amd ? define(factory) :
	factory();
})((function () { 'use strict';
		
	$('.theme2').click(function(){
		//var params = $(this).attr('data-theme');

	})
	var themeStorageKey = 'tablerTheme';
	var defaultTheme = 'light';
	var selectedTheme;
	
/*
	var params = new Proxy(new URLSearchParams(window.location.search), {
	  get: function get(searchParams, prop) {
	    return searchParams.get(prop);
	  }
	});
*/	
	if (!!params) {
	  localStorage.setItem(themeStorageKey, params.theme);
	  selectedTheme = params.theme;
	} else {
	  var storedTheme = localStorage.getItem(themeStorageKey);
	  selectedTheme = storedTheme ? storedTheme : defaultTheme;
	}
	document.body.classList.remove('theme-dark', 'theme-light');
	document.body.classList.add("theme-".concat(selectedTheme));

}));
