<?php
require_once('functions.php');
edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Matrícula</h2>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<form action="edit.php?numero_matricula=<?php echo $matricula['numero_matricula']; ?>" method="post">
	<hr />
	<div class="row">
		<div class="form-group col-md-3">
			<label for="campo1">Número do Aluno</label>
			<input type="text" class="form-control" readonly name="matricula['numero_matricula']" value="<?php echo $matricula['numero_matricula']; ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="campo1">Nome do Aluno</label>
			<input type="text" class="form-control" readonly name="matricula['nome']" value="<?php echo $matricula['nome']; ?>">
		</div>
	</div>

	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		</div>
		<thead>
			<tr>
				<th style="text-align:center;">Número da turma</th>
				<th style="text-align:center;">Descrição da turma</th>
				<th style="text-align:center;">Matricular</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($turmas as $turma) : ?>
				<tr>
					<td style="text-align:center;"><?php echo $turma['numero_turma'] ?></td>
					<td style="text-align:center;"><?php echo $turma['descricao'] ?></td>
					<td style="text-align:center;">
						<input name="matricula['numero_turma'][]" type="checkbox" <?php if (in_array($turma['numero_turma'], $matricula['numero_turma'])) echo "checked"; ?> value="<?php echo $turma['numero_turma']; ?>">
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div id="actions" class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	</div>
</form>

<?php include(FOOTER_TEMPLATE); ?>