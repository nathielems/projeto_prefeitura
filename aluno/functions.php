<?php

require_once('../config.php');
require_once(DBAPI);

$alunos = null;
$aluno = null;

function clear_messages()
{
	$_SESSION['message'] = "";
	$_SESSION['type'] = '';
}

function index()
{
	global $alunos;
	$alunos = find_all('aluno');
}

function add()
{
	if (!empty($_POST['aluno'])) {

		$today =
			date_create('now', new DateTimeZone('America/Sao_Paulo'));

		$aluno = $_POST['aluno'];
		$aluno['modified'] = $aluno['created'] = $today->format("Y-m-d H:i:s");

		save('aluno', $aluno);
		header('location: index.php');
	}
}

function edit()
{
	$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

	if (isset($_GET['numero_matricula'])) {

		$id = $_GET['numero_matricula'];

		if (isset($_POST['aluno'])) {

			$aluno = $_POST['aluno'];
			$aluno['modified'] = $now->format("Y-m-d H:i:s");

			update('aluno', 'numero_matricula', $id, $aluno);
			header('location: index.php');
		} else {

			global $aluno;
			$aluno = find('aluno', 'numero_matricula', $id);
		}
	} else {
		header('location: index.php');
	}
}

function view($id = null)
{
	global $aluno;

	$aluno = find('aluno', 'numero_matricula', $id);
}

function delete($id = null)
{
	global $aluno;

	$matricula = find('aluno_turma', 'numero_matricula', $id);

	if ($matricula != null) {
		session_start();

		$_SESSION['message'] = "Aluno não pode ser excluído, pois possui uma matrícula em andamento";
		$_SESSION['type'] = 'danger';

		header('location: index.php');

		return;
	}

	$aluno = remove('aluno', 'numero_matricula', $id);
	
	header('location: index.php');
}
