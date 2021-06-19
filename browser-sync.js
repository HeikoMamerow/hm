#!/usr/bin/env node

var bs = require('browser-sync').create();

bs.init({
	proxy: {
		target: 'https://heikomamerow.local'
	},
	https: true,
	files: [
		'build/**/*',
		'src/**/*'
	],
	notify: false,
	open: false,
	reloadOnRestart: true,
});