<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php session_start(); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Alunos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Aluno</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>Matrícula</th>
		<th width="30%">Nome</th>
		<th>Data de nascimento</th>
		<th>Cidade</th>
		<th class="text-right">Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($alunos) : ?>
<?php foreach ($alunos as $aluno) : ?>
	<tr>
		<td><?php echo $aluno['numero_matricula']; ?></td>
		<td><?php echo $aluno['nome']; ?></td>
		<td><?php echo $aluno['data_nascimento']; ?></td>
		<td><?php echo $aluno['cidade']; ?></td>
		<td class="actions text-right">
			<a href="view.php?numero_matricula=<?php echo $aluno['numero_matricula']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?numero_matricula=<?php echo $aluno['numero_matricula']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $aluno['numero_matricula']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>