<?php
require_once('functions.php');
view($_GET['numero_matricula']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Aluno <?php echo $matricula['numero_matricula']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Número do Aluno:</dt>
	<dd><?php echo $matricula['numero_matricula']; ?></dd>

	<dt>Nome do Aluno:</dt>
	<dd><?php echo $matricula['nome']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<h2>Turmas</h2>

	<?php foreach ($matricula['turmas'] as $turma) : ?>
		<dt>Número da turma:</dt>
		<dd><?php echo $turma['numero_turma']; ?></dd>

		<dt>Nome da turma:</dt>
		<dd><?php echo $turma['descricao']; ?></dd>

		<hr>
	<?php endforeach; ?>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
		<a href="edit.php?numero_matricula=<?php echo $matricula['numero_matricula']; ?>" class="btn btn-primary">Editar</a>
		<a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>