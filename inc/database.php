<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database()
{
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn)
{
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

function find($table = null, $coluna = '', $valor = null, $return_all = false)
{
	$database = open_database();
	$found = null;

	try {
		if ($valor) {
			$sql = "SELECT * FROM " . $table . " WHERE " . $coluna . " = " . $valor;
			$result = $database->query($sql);

			if ($result->num_rows > 0) {
				if (!$return_all) {
					$found = $result->fetch_assoc();
				} else {
					$found = $result->fetch_all(MYSQLI_ASSOC);
				}
			}
		} else {

			$sql = "SELECT * FROM " . $table;
			$result = $database->query($sql);

			if ($result->num_rows > 0) {
				$found = $result->fetch_all(MYSQLI_ASSOC);
			}
		}
	} catch (Exception $e) {
		$_SESSION['message'] = $e->GetMessage();
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
	return $found;
}

function find_all($table)
{
	return find($table);
}

function find_all_in($table, $coluna, $values){
	$database = open_database();
	$found = null;

	$valor = implode(",", $values);

	try {
		$sql = "SELECT * FROM " . $table . " WHERE " . $coluna . " IN(" . $valor. ")";
		$result = $database->query($sql);

		if ($result->num_rows > 0) {
			$found = $result->fetch_all(MYSQLI_ASSOC);
		}
	}
	catch (Exception $e) {
		$_SESSION['message'] = $e->GetMessage();
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
	return $found;
}

function save($table = null, $data = null)
{
	$database = open_database();

	$columns = null;
	$values = null;

	foreach ($data as $key => $value) {
		$columns .= trim($key, "'") . ",";
		$values .= "'$value',";
	}

	$columns = rtrim($columns, ',');
	$values = rtrim($values, ',');

	$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

	try {
		$database->query($sql);

		$_SESSION['message'] = 'Registro cadastrado com sucesso.';
		$_SESSION['type'] = 'success';
	} catch (Exception $e) {

		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
}

function update($table = null, $column = '', $id = 0, $data = null)
{
	$database = open_database();

	$items = null;

	foreach ($data as $key => $value) {
		$items .= trim($key, "'") . "='$value',";
	}

	$items = rtrim($items, ',');

	$sql  = "UPDATE " . $table;
	$sql .= " SET $items";
	$sql .= " WHERE " . $column . "=" . $id . ";";

	try {
		$database->query($sql);

		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';
	} catch (Exception $e) {

		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
}

function remove($table = null, $coluna = '', $id = null)
{
	$database = open_database();

	try {
		if ($id) {

			$sql = "DELETE FROM " . $table . " WHERE " . $coluna . " = " . $id;
			$result = $database->query($sql);

			if ($result = $database->query($sql)) {
				$_SESSION['message'] = "Registro Removido com Sucesso.";
				$_SESSION['type'] = 'success';
			}
		}
	} catch (Exception $e) {

		$_SESSION['message'] = $e->GetMessage();
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
}
