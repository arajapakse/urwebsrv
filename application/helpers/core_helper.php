<?php
function public_dir_url() {
	$url = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://'.PUBLIC_BASE_URL;
	return $url;
}

function image_dir_url() {
	if (defined('IMAGE_URL')) {
		$url = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://'.IMAGE_URL;
	}
	else {
		$url = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://'.PUBLIC_BASE_URL .'images/';
	}
	
	return $url;
}

function js_dir_url() {
	if (defined('JS_URL')) {
		$url = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://'.JS_URL;
	}
	else {
		$url = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://'.PUBLIC_BASE_URL .'js/';
	}
	
	return $url;
}

function css_dir_url() {
	if (defined('CSS_URL')) {
		$url = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://'.CSS_URL;
	}
	else {
		$url = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . '://'.PUBLIC_BASE_URL .'css/';
	}
	
	return $url;
}