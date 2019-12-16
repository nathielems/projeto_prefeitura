<?php
require_once('functions.php');
index();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php session_start(); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Listagem de matrículas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
			<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova matrícula</a>
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
			<th>Número de matrícula do aluno</th>
			<th>Nome do aluno</th>
			<th class="text-right"> Opções</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($matriculas) : ?>
			<?php foreach ($matriculas as $matricula) : ?>
				<tr>
					<td><?php echo $matricula['numero_matricula']; ?></td>
					<td><?php echo $matricula['nome']; ?></td>
					<td class="actions text-right">
						<a href="view.php?numero_matricula=<?php echo $matricula['numero_matricula']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
						<a href="edit.php?numero_matricula=<?php echo $matricula['numero_matricula']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
						<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $matricula['numero_matricula']; ?>">
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