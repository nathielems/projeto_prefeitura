<?php
require_once('functions.php');
edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Aluno</h2>

<form action="edit.php?numero_matricula=<?php echo $aluno['numero_matricula']; ?>" method="post">
	<hr />
	<div class="row">
		<div class="form-group col-md-3">
			<label for="name">Número matrícula</label>
			<input type="text" class="form-control" readonly name="aluno['numero_matricula']" value="<?php echo $aluno['numero_matricula']; ?>">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6">
			<label for="name">Nome</label>
			<input type="text" class="form-control" name="aluno['nome']" value="<?php echo $aluno['nome']; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">Data de Nascimento</label>
			<input type="date" class="form-control" required name="aluno['data_nascimento']" value="<?php echo $aluno['data_nascimento']; ?>">
		</div>

		<div class="form-group col-md-3">
			<label for="campo3">Sexo</label>
			<p>
				<input type="radio" name="aluno['sexo']" required value="1" <?php if ($aluno['sexo'] == "1") echo "checked"; ?>>Masculino</input>
				<input type="radio" name="aluno['sexo']" required value="2" <?php if ($aluno['sexo'] == "2") echo "checked"; ?>>Feminino</input>
				<input type="radio" name="aluno['sexo']" required value="3" <?php if ($aluno['sexo'] == "3") echo "checked"; ?>>Outro</input>
			</p>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-7">
			<label for="campo1">Rua</label>
			<input type="text" class="form-control" required name="aluno['rua']" value="<?php echo $aluno['rua']; ?>">
		</div>

		<div class="form-group col-md-3">
			<label for="campo2">Complemento</label>
			<input type="text" class="form-control" required name="aluno['complemento']" value="<?php echo $aluno['complemento']; ?>">
		</div>

		<div class="form-group col-md-1">
			<label for="campo3">Número</label>
			<input type="text" class="form-control" required name="aluno['numero']" value="<?php echo $aluno['numero']; ?>">
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-5">
			<label for="campo2">Bairro</label>
			<input type="text" class="form-control" required name="aluno['bairro']" value="<?php echo $aluno['bairro']; ?>">
		</div>

		<div class="form-group col-md-6">
			<label for="campo1">Cidade</label>
			<input type="text" class="form-control" required name="aluno['cidade']" value="<?php echo $aluno['cidade']; ?>">
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