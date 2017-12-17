<?php

namespace src;

trait TraitMsg {



	public function alertSalvar($text, $class){
		$texto = $text;
		$classe = $class;
		$_SESSION['msg'] = ['text' => $texto,
							'class' => $classe];

	}


	public static function verificaAlerta(){

		if(isset($_SESSION['msg'])){
			$msg=$_SESSION['msg'];
			session_unset();
			return $msg;
		}
	}


}