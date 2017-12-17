<?php
namespace Controller\BannerController;

use Model\BannerModel\BannerModel as Banner;
use src\Conexao as Conexao;
use src\TraitMsg as Msg;
use Repository\BannerRepository\ BannerRepository as Repository;

class BannerController
{
	use Msg;

	public static function listarBanner($id = null){

		$con = Conexao::getInstance();

		if (!is_null($id)) {
			
			$banners = Repository::select($id);


		}else{

			$result = Repository::select($id);
			
			$banners = [];
			foreach ($result as $banner) {

				$banners[] = new Banner($banner['nome'],$banner['descricao'], $banner['url'], $banner['id']); 
			}

		}

		return $banners;
	}


	public function alterarBanner(){

		if(isset($_POST['id']) && isset($_POST['nome'])){
			$id= 		$_POST['id'];
			$nome= 		$_POST['nome'];
			$url= 		$_POST['url'];
			$descricao= $_POST['descricao'];
			
			$banner = new Banner($nome,$descricao,$url,$id);

			$result = Repository::update($banner);

			if ( is_object($result)) {
				$this->alertSalvar("Erro ao Alterar<br>".$result->getMessage(), "danger");
			}else{
				$this->alertSalvar("Alterado com Sucesso", "success");
			}
		}

	}

	public function salvarBanner(){

		if(isset($_POST['nome']) || isset($_POST['url'])){

			$banner = new Banner($_POST['nome'],null,$_POST['url']);
			
			$result = Repository::insert($banner);

			if ($result) {
				$this->alertSalvar("Alterado com Sucesso", "success");
			}else{
				$this->alertSalvar("Erro ao Alterar", "danger");
			}			           
		}

	}

	public function exclueBanner(){

		if(isset($_POST['id'])){

			Repository::delete();
		}
	}

}