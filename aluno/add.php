<?php
require_once('functions.php');
add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Aluno</h2>

<form action="add.php" method="post">
	<hr />
	<div class="row">
		<div class="form-group col-md-6">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" required name="aluno['nome']">
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">Data de Nascimento</label>
			<input type="date" class="form-control" required name="aluno['data_nascimento']">
		</div>

		<div class="form-group col-md-3">
			<label for="campo3">Sexo</label>
			<p>
				<input type="radio" name="aluno['sexo']" required value="1">Masculino</input>
				<input type="radio" name="aluno['sexo']" required value="2">Feminino</input>
				<input type="radio" name="aluno['sexo']" required value="3">Outro</input>
			</p>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-7">
			<label for="campo1">Rua</label>
			<input type="text" class="form-control" required name="aluno['rua']">
		</div>

		<div class="form-group col-md-3">
			<label for="campo2">Complemento</label>
			<input type="text" class="form-control" required name="aluno['complemento']">
		</div>

		<div class="form-group col-md-1">
			<label for="campo3">Número</label>
			<input type="text" class="form-control" required name="aluno['numero']">
		</div>

	</div>

	<div class="row">
		<div class="form-group col-md-5">
			<label for="campo2">Bairro</label>
			<input type="text" class="form-control" required name="aluno['bairro']">
		</div>
		<div class="form-group col-md-6">
			<label for="campo1">Cidade</label>
			<input type="text" class="form-control" required name="aluno['cidade']">
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