<?php
require_once('functions.php');
edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Turma</h2>

<form action="edit.php?numero_turma=<?php echo $turma['numero_turma']; ?>" method="post">
	<hr />
	<div class="row">
		<div class="form-group col-md-3">
			<label for="name">Número da turma</label>
			<input type="text" class="form-control" readonly name="turma['numero_turma']" value="<?php echo $turma['numero_turma']; ?>">
		</div>
	</div>
	<div class="row">

		<div class="form-group col-md-7">
			<label for="campo2">Descrição</label>
			<input type="text" class="form-control" name="turma['descricao']" value="<?php echo $turma['descricao']; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">Quantidade de vagas</label>
			<input type="text" class="form-control" name="turma['quantidade_vagas']" value="<?php echo $turma['quantidade_vagas']; ?>">
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-5">
			<label for="campo1">Nome do Professor</label>
			<input type="text" class="form-control" name="turma['nome_professor']" value="<?php echo $turma['nome_professor']; ?>">
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