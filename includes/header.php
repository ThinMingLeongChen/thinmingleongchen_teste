<?php
require_once ('includes/flash_data.class.php');
require_once ('includes/crud.class.php');
require_once ('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Corridas compartilhadas</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Corridas compartilhadas</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Motoristas
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="cadastrar_motorista">Cadastro</a></li>
                        <li><a href="gerenciar_motorista">Gerenciamento</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Passageiro
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="cadastrar_passageiro">Cadastro</a></li>
                        <li><a href="gerenciar_passageiro">Gerenciamento</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Corrida
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="cadastrar_corrida">Cadastro</a></li>
                        <li><a href="gerenciar_corrida">Gerenciamento</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>