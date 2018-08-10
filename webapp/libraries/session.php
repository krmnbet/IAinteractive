<?php

	class Session 
	{

		private static function sessionExists()
		{
			if(!isset($_SESSION)) session_start();
		}

		public static function put($element, $value)
		{
			self::sessionExists();
			return $_SESSION[$element] = $value;
		}

		public static function get($element)
		{
			self::sessionExists();
			return $_SESSION[$element];
		}

	}