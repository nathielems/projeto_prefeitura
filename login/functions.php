<?php

require_once('../config.php');
require_once(DBAPI);

$login = null;

function clear_messages()
{
	$_SESSION['message'] = "";
	$_SESSION['type'] = '';
}

function index()
{
    if (isset($_POST['login'])) {

        $login = $_POST['login'];
        $table = 'usuario';
        $coluna1 = 'usuario';
        $coluna2 = 'senha';

        $usuario = $login["'usuario'"];
        $senha = $login["'senha'"];

        $database = open_database();
        $found = null;

        $sql = "SELECT * FROM " . $table . " WHERE " . $coluna1 . " = '" . $usuario . "' AND " . $coluna2 . " = '" . $senha . "'";

        $result = $database->query($sql);

        session_start();

        if ($result->num_rows > 0) {
            $_SESSION['logado'] = true;

            clear_messages();
            
            header('location: ../index.php');
        } else {
            $_SESSION['message'] = "Usuário não encontrado";
            $_SESSION['type'] = 'danger';

            header('location: index.php');

            return;
        }
    }
}
