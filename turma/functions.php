<?php

require_once('../config.php');
require_once(DBAPI);

$turmas = null;
$turma = null;

function clear_messages()
{
	$_SESSION['message'] = "";
	$_SESSION['type'] = '';
}

function index()
{
	global $turmas;
	$turmas = find_all('turma');
}

function add()
{
	if (!empty($_POST['turma'])) {
		$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

		$turma = $_POST['turma'];

		$turma['modified'] = $turma['created'] = $today->format("Y-m-d H:i:s");

		save('turma', $turma);

		header('location: index.php');
	}
}

function edit()
{
	$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

	if (isset($_GET['numero_turma'])) {

		$id = $_GET['numero_turma'];

		if (isset($_POST['turma'])) {

			$turma = $_POST['turma'];
			$turma['modified'] = $now->format("Y-m-d H:i:s");

			update('turma', 'numero_turma', $id, $turma);
			header('location: index.php');
		} else {

			global $turma;
			$turma = find('turma', 'numero_turma', $id);
		}
	} else {
		header('location: index.php');
	}
}

function view($id = null)
{

	global $turma;

	$turma = find('turma', 'numero_turma', $id);
}

function delete($id = null)
{
	global $turma;

	$matricula = find('aluno_turma', 'numero_turma', $id);

	if ($matricula != null) {
		session_start();

		$_SESSION['message'] = "Turma não pode ser excluída, pois possui matrículas";
		$_SESSION['type'] = 'danger';

		header('location: index.php');

		return;
	}

	header('location: index.php');
}
