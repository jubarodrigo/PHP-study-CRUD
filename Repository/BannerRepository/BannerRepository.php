<?php

namespace Repository\BannerRepository;

use Model\BannerModel\BannerModel as Banner;
use src\Conexao as Conexao;

class BannerRepository{

	public function select($id =null){

		$con = Conexao::getInstance();

		if (!is_null($id)) {
			
			$sql = $con->query("SELECT * FROM banners WHERE id = $id");

			$banners = $sql->fetch(\PDO::FETCH_ASSOC);


		}else{
			$sql = $con->query("SELECT * FROM banners");

			$banners = $sql->fetchAll(\PDO::FETCH_ASSOC);
			

		}

		return $banners;


	}

	public static function insert($banner){
		try{
			$con = Conexao::getInstance();
			$sql = $con->prepare("INSERT INTO banners (nome,url) VALUES (:nome, :url)");
			$sql->execute(["nome" => "{$banner->getNome()}", "url" => "{$banner->getUrl()}"]);	
		}catch(\PDOException $e){
			echo $e->getMessage();
		}

		return $sql;	
	}

	public static function delete(){
		
		$id = $_POST['id'];
		$con = Conexao::getInstance();
		$sql = $con->prepare("DELETE FROM banners WHERE id = :id");
		$sql->execute(["id" => "$id"]);

	}

	public static function update($banner){
		try{

			$con = Conexao::getInstance();
			$sql = $con->prepare("UPDATE banners SET nome= :nome, url= :url, descricao= :descricao WHERE id = :id");
			$result = $sql->execute(["id" => "{$banner->getId()}", "nome" => "{$banner->getNome()}", "url" => "{$banner->getUrl()}", "descricao" => "{$banner->getDescricao()}"]);

		}catch(\PDOException $e){

			return $e;
		}

		return $result;

	}

}