<?php 
	require_once('functions.php'); 
	view($_GET['numero_turma']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Turma <?php echo $turma['numero_turma']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Número da turma:</dt>
	<dd><?php echo $turma['numero_turma']; ?></dd>

	<dt>Descrição:</dt>
	<dd><?php echo $turma['descricao']; ?></dd>

	<dt>Quantidade de Vagas:</dt>
	<dd><?php echo $turma['quantidade_vagas']; ?></dd>

	<dt>Nome do professor:</dt>
	<dd><?php echo $turma['nome_professor']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?numero_turma=<?php echo $turma['numero_turma']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>