<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php $db = open_database(); ?>

<?php
require_once('functions.php');
index();
session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>

<body class=" h-100 d-flex justify-content-center align-items-center">

    <main class="container card-body center-block">
        <?php if (!empty($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php endif; ?>

        <br>



        <form action="index.php" method="post">
            <div class="row">
                <div class="col-md-3 ml-md-auto"></div>
                <div class="col-md-3 ml-md-auto">
                    <h2>Autenticação</h2>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-3 ml-md-auto"></div>
                <div class="form-group col-md-5">
                    <label for="campo2">Login</label>
                    <input type="text" class="form-control" required name="login['usuario']">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ml-md-auto"></div>
                <div class="form-group col-md-5">
                    <label for="campo1">Senha</label>
                    <input type="password" class="form-control" required name="login['senha']">
                </div>
            </div>

            <div id="actions" class="row">
                <div class="col-md-3 ml-md-auto"></div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">Logar</button>
                </div>
            </div>
        </form>
    </main>

    <hr>
    <footer class="container">
        <p>&copy;2019 - Nathiele Marssona</p>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo BASEURL; ?>assets/js/main.js"></script>
    <script src="<?php echo BASEURL; ?>assets/js/bootstrap.min.js"></script>
</body>

</html>