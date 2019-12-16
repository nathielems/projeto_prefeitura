<?php
require_once('functions.php');
view($_GET['numero_matricula']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Aluno <?php echo $aluno['numero_matricula']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $aluno['nome']; ?></dd>

	<dt>Matrícula:</dt>
	<dd><?php echo $aluno['numero_matricula']; ?></dd>

	<dt>Data de Nascimento:</dt>
	<dd><?php echo $aluno['data_nascimento']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<h2>Endereço</h2>

	<dt>Rua:</dt>
	<dd><?php echo $aluno['rua']; ?></dd>

	<dt>Número:</dt>
	<dd><?php echo $aluno['numero']; ?></dd>

	<dt>Complemento:</dt>
	<dd><?php echo $aluno['complemento']; ?></dd>

	<dt>Bairro:</dt>
	<dd><?php echo $aluno['bairro']; ?></dd>

	<dt>Cidade:</dt>
	<dd><?php echo $aluno['cidade']; ?></dd>

	<dt>Data de Cadastro:</dt>
	<dd><?php echo $aluno['created']; ?></dd>
</dl>


<div id="actions" class="row">
	<div class="col-md-12">
		<a href="edit.php?numero_matricula=<?php echo $aluno['numero_matricula']; ?>" class="btn btn-primary">Editar</a>
		<a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>