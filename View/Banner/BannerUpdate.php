
<?php
use Controller\BannerController\BannerController as BannerController;
use src\TraitMsg as Msg;
	$id = $_POST['id'] ?? null;
	$listagem = BannerController::listarBanner($id);
	$msg = Msg::verificaAlerta();
?>

<h2>Alterar Banner</h2>
	<?php if($msg) { ?>
	<p class="alert alert-<?=  $msg['class'] ?>"><?= $msg['text'] ?></p>
	<?php }?>

	<form action="?route=banner/update" method="POST">
		<input type="hidden" name="id" id="id" value="<?= $listagem['id'] ?>">
		<label>Nome</label>
		<input type="text" name="nome" id="nome" class="form-control"
			value="<?= $listagem['nome'] ?>">
		</br>			
		<label>URL</label>
		<input type="text" name="url" id="url" class="form-control"
			value="<?= $listagem['url'] ?>">
		</br>
		<label>Descrição</label>
		<textarea name="descricao" id="descricao" class="form-control"><?= $listagem['descricao'] ?>	
		</textarea>

		</br>
		<button type="submit" class="btn btn-primary">Salvar</button>

	</form>
