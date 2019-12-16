<?php

require_once('../config.php');
require_once(DBAPI);

$matriculas = null;
$matricula = null;
$alunos = null;
$turmas = null;

function clear_messages()
{
	$_SESSION['message'] = "";
	$_SESSION['type'] = '';
}

function index()
{
	global $matriculas;
	$alunos_matriculados = find_all('aluno_turma');

	if ($alunos_matriculados == null) {
		return;
	}

	$codigos = array_column($alunos_matriculados, 'numero_matricula');
	$matriculas = find_all_in("aluno", "numero_matricula", $codigos);
}

function add()
{
	global $alunos;
	global $turmas;
	global $alunos_matriculados_numero_matricula;

	$alunos = find_all('aluno');
	$turmas = find_all('turma');

	$alunos_matriculados = find_all('aluno_turma');

	if ($alunos_matriculados != null) {
		$alunos_matriculados_numero_matricula = array_column($alunos_matriculados, 'numero_matricula');

		$filtrar_aluno_matricula = function ($value) use ($alunos_matriculados_numero_matricula) {
			return !in_array($value['numero_matricula'], $alunos_matriculados_numero_matricula);
		};

		$alunos = array_filter($alunos, $filtrar_aluno_matricula);
	}

	if (!empty($_POST['matricula'])) {

		$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

		$matricula = $_POST['matricula'];

		$aluno_selecionado = $matricula["'numero_matricula'"];

		$turmas_selecionadas = [];
		
		if (array_key_exists("'numero_turma'", $matricula) != null) {
			$turmas_selecionadas = $matricula["'numero_turma'"];
		}

		if ($turmas_selecionadas == null){
			session_start();

			$_SESSION['message'] = "Ao menos uma turma deve ser selecionada";
			$_SESSION['type'] = 'danger';
			
			global $matricula;

			return;
		}

		foreach ($turmas_selecionadas as $turma_selecionada) {
			$matricula = array(
				"numero_matricula" => $aluno_selecionado,
				"numero_turma" => $turma_selecionada,
				'created' => $today->format("Y-m-d H:i:s"),
				'modified' => $today->format("Y-m-d H:i:s")
			);

			save('aluno_turma', $matricula);
		}

		header('location: index.php');
	}
}

function edit()
{
	$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

	if (isset($_GET['numero_matricula'])) {

		global $turmas;

		$id = $_GET['numero_matricula'];

		$turmas = find_all('turma');

		if (isset($_POST['matricula'])) {

			$registros = find('aluno_turma', 'numero_matricula', $id, true);

			$turmas_banco = array_column($registros, 'numero_turma');

			$matricula = $_POST['matricula'];

			$turmas_selecionadas = [];

			if (array_key_exists("'numero_turma'", $matricula) != null) {
				$turmas_selecionadas = $matricula["'numero_turma'"];
			}

			if ($turmas_selecionadas == null){
				session_start();

				$_SESSION['message'] = "Ao menos uma turma deve ser selecionada";
				$_SESSION['type'] = 'danger';
				
				global $matricula;

				$aluno = find('aluno', 'numero_matricula', $id);

				$matricula = array(
					"numero_matricula" => $aluno['numero_matricula'],
					"nome" => $aluno['nome'],
					"numero_turma" => $turmas_selecionadas
				);

				return;
			}

			foreach ($turmas_selecionadas as $turma_selecionada) {
				if (!in_array($turma_selecionada, $turmas_banco)) {

					$matricula = array(
						"numero_matricula" => $id,
						"numero_turma" => $turma_selecionada,
						'created' => $today->format("Y-m-d H:i:s"),
						'modified' => $today->format("Y-m-d H:i:s")
					);

					save('aluno_turma', $matricula);
				}
			}

			foreach ($registros as $turma_banco) {
				if (!in_array($turma_banco['numero_turma'], $turmas_selecionadas)) {
					remove('aluno_turma', 'numero_aluno_turma', $turma_banco['numero_aluno_turma']);
				}
			}

			header('location: index.php');
		} else {

			global $matricula;

			$aluno = find('aluno', 'numero_matricula', $id);
			$matricula_aluno = find('aluno_turma', 'numero_matricula', $id, true);

			$matricula_aluno_turmas = array_column($matricula_aluno, 'numero_turma');

			$matricula = array(
				"numero_matricula" => $aluno['numero_matricula'],
				"nome" => $aluno['nome'],
				"numero_turma" => $matricula_aluno_turmas
			);
		}
	} else {
		header('location: index.php');
	}
}

function view($id = null)
{
	global $matricula;

	$aluno = find('aluno', 'numero_matricula', $id);

	$matricula_aluno = find('aluno_turma', 'numero_matricula', $id, true);

	$turmas_numero_turma = array_column($matricula_aluno, 'numero_turma');

	$turmas = find_all_in('turma', 'numero_turma', $turmas_numero_turma);

	$matricula = array(
		"numero_matricula" => $aluno['numero_matricula'],
		"nome" => $aluno['nome'],
		"turmas" => $turmas
	);
}

function delete($id = null)
{
	global $matricula;

	$matricula = remove('aluno_turma', 'numero_matricula', $id);

	header('location: index.php');
}
