<?php
use Controller\BannerController\BannerController as BannerController;

$listagem = BannerController::listarBanner();
?>

	<h2>Listagem de Banners</h2>
	<table class="table table-striped">
	<a href="?route=banner/create" class="btn btn-primary" style="float: right;">Novo</a>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Descricao</th>
				<th>URL</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($listagem as $banners) : ?>
				<tr>

					<td><?= $banners->getId() ?></td>
					<td><?= $banners->getNome() ?></td>
					<td><?= substr($banners->getDescricao(),0,50)."..." ?></td>
					<td><?= $banners->getUrl() ?></td>
					<td>
						<form method="POST" action="?route=banner/delete">
							<input type="hidden" name="id" value="<?= $banners->getId() ?>">
							<button class="btn btn-danger glyphicon glyphicon-trash"></button>
						</form>
					</td>
					<td>
						<form method="POST" action="?route=banner/update">
							<input type="hidden" name="id" value="<?= $banners->getId() ?>">
							<button class="btn btn-warning glyphicon glyphicon-pencil"></button>
						</form>
					</td>					
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
