<?php

namespace Model\BannerModel;

class BannerModel 
{


	private $id;
	private $nome;
	private $url;
	private $descricao;

	public function __construct($nome,$descricao,$url,$id=null){
		$this->id = $id;
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->url = $url;

	}


	public function getId(){
		return $this->id;

	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;

	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getUrl(){
		return $this->url;

	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function getDescricao(){
		return $this->descricao;

	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

}
