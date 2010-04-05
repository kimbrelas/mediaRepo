<?php

class mediaRepo
{
	public static function getStringBetween($string, $start, $end)
	{
		$string = ' '.$string;
		$ini = strpos($string, $start);
		
		if ($ini == 0)
		{
			return ''; 
		}
		
		$ini += strlen($start); 
		$len = strpos($string, $end, $ini) - $ini; 
		
		return substr($string, $ini, $len); 
	}
	
	public static function extractXmlCredentials($xml)
	{
		$auth = self::getStringBetween($xml, '<auth>', '</auth>');
		
		$username = self::getStringBetween($auth, '<username>', '</username>');
		$password = self::getStringBetween($auth, '<password>', '</password>');
		
		return array('username' => $username, 'password' => $password);
	}
}