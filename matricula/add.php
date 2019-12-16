<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Nova matrícula</h2>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
        <label for="campo2">Aluno</label>
        <select name="matricula['numero_matricula']" class="form-control">
            <?php foreach ($alunos as $aluno): ?>
                <?php echo "<option value=".$aluno["numero_matricula"].">".$aluno["nome"]."</option>"; ?>
            <?php endforeach; ?>
        </select>
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

	     <?php foreach ($turmas as $turma): ?>
			<tr>
				<td style="text-align:center;"><?php echo $turma['numero_turma'] ?></td>
				<td style="text-align:center;"><?php echo $turma['descricao'] ?></td>
				<td style="text-align:center;">
					<input name="matricula['numero_turma'][]" type="checkbox" value="<?php echo $turma['numero_turma']; ?>">
				</td>
			</tr>
            <?php endforeach; ?>					 
		</tbody>
	</table>
	<br />				
	<div id="actions" class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	</div>

</form>

<?php include(FOOTER_TEMPLATE); ?>