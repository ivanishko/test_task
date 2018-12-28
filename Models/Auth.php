<?php

namespace Models;

class Auth{
	public static function isAuth(){
		$auth = $_SESSION['auth'] ?? false;
	
		if(!$auth) {
			if(isset($_COOKIE['login']) && isset($_COOKIE['password']) &&
				$_COOKIE['login'] == self::myHash('admin') && $_COOKIE['password'] == self::myHash('12345')) {

				$_SESSION['auth'] = true;
				$auth = true;
			}
		}
		return $auth;
	}

	public static function login($login, $password, $remember){
		if($login == 'admin' && $password == '123') {
			$_SESSION['auth'] = true;

			if($remember) {
				setcookie('login', self::myHash($login), time() + 3600 * 24 * 14, '/');
				setcookie('password', self::myHash($password), time() + 3600 * 24 * 14, '/'); 
			}

			return true;
		}

		return false;
	}

	public static function logout(){
		$_SESSION['auth'] = false;
		setcookie('login', '', time() + 1, '/');
				setcookie('password', '', time() + 1, '/'); 
	}

	public static function getUser(){
		return  self::isAuth() ? 
					[
						'id_user' => '1',
						'login' => 'admin',
						'pass' => 'hash'
					] : 
					null;
	}

	public static function myHash($str) {
		$salt = 'fjklrty';
		return hash('sha256', $str . $salt);
	}
}
