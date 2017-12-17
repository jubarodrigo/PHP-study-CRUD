<?php

namespace src;

class Conexao {

	private static $instance = null;

	private function __construct(){}

	public static function getInstance(){
		if (self::$instance == null){
			self::$instance = new \PDO("pgsql:host=localhost;dbname=dexter_lite","juba2","123");
			self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

			return self::$instance;
		} else{
			return self::$instance;
		}

	}
}
