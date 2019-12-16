<?php
require_once('functions.php');
add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Nova Turma</h2>

<form action="add.php" method="post">
	<hr />
	<div class="row">
		<div class="form-group col-md-7">
			<label for="campo2">Descrição</label>
			<input type="text" class="form-control" required name="turma['descricao']">
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">Quantidade de vagas</label>
			<input type="text" class="form-control" required name="turma['quantidade_vagas']">
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-5">
			<label for="campo1">Nome do Professor</label>
			<input type="text" class="form-control" required name="turma['nome_professor']">
		</div>
	</div>

	<div id="actions" class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	</div>
</form>

<?php include(FOOTER_TEMPLATE); ?>