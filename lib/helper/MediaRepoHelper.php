<?php

function get_breadcrumb_str($module)
{
	$arr = array(
		'account' => 'profile',
		'mrBook'  => 'books',
		'mrGame'  => 'games',
		'mrMovie' => 'movies',
		'mrMusic' => 'music'
	);
	
	return $arr[$module];
}