define(function(require, exports, module) {
	window.$ = window.jQuery = require('jquery');
	require('bootstrap');
	require('typeahead');
	require('common/bootstrap-modal-hack2');
	require('matrix').run();
	//var Cookie = require('cookie');

	exports.load = function(name) {
		
		name = '/themes/sohu/assets/js/controller/' + name;
		seajs.use(name, function(module) {
			if ($.isFunction(module.run)) {
				module.run();
			}
		});

	};

	exports.loadScript = function(scripts) {
		for(var index in scripts) {
			exports.load(scripts[index]);
		}
	}

	window.app.load = exports.load;

	if (app.themeGlobalScript) {
		exports.load(app.themeGlobalScript);
	}

	if (app.controller) {
		exports.load(app.controller);
	}

	if (app.scripts) {
		exports.loadScript(app.scripts);
	}

	$( document ).ajaxSend(function(a, b, c) {
		if (c.type == 'POST') {
			c.data = typeof c.data ==  "undefined" ? '':c.data;
			c.data += '&YII_CSRF_TOKEN='+$('meta[name=YII_CSRF_TOKEN]').attr('content');
		}
	});

	$(document).ajaxError(function(event, jqxhr, settings, exception) {
		var json = jQuery.parseJSON(jqxhr.responseText);
			error = json.error;
		if (!error) {
			return ;
		}
		
		if (error.name == 'Unlogin') {
			$('.modal').modal('hide');
			$("#login-modal").modal('show');
			$.get($('#login-modal').data('url'), function(html){
				$("#login-modal").html(html);
			});
		}
	});

	if ($('html').hasClass('lt-ie8')) {
		var message = '<div class="alert alert-warning" style="margin-bottom:0;text-align:center;">';
		message += '您的浏览器版本太低，不能正常使用本站，请使用';
		message += '<a href="http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie" target="_blank">IE8浏览器</a>、';
		message += '<a href="http://www.baidu.com/s?wd=%E8%B0%B7%E6%AD%8C%E6%B5%8F%E8%A7%88%E5%99%A8" target="_blank">谷歌浏览器</a><strong>(推荐)</strong>、';
		message += '<a href="http://firefox.com.cn/download/" target="_blank">Firefox浏览器</a>，访问本站。';
		message += '</div>';

		$('body').prepend(message);
	}

});