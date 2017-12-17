<?php

namespace src;

class View 
{
	

	public static function render(
		$data,
		$arquivo,
		$cabecalho = 'View/Base/privateCabecalho.php')
	{
		require $cabecalho;
		require $arquivo;

	}


}