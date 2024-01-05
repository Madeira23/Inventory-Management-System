<?php
require('requireLogin.php');

$fullUrl = $_SERVER['REQUEST_URI'];
$specificWord = 'gestao_funcionarios';
$urlVerify = false;
if (strpos($fullUrl, $specificWord) !== false) {
    $urlVerify = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentos Table</title>
    <?php include_once "css_imports.html"; ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="navbar-center">
            <h1>Stock Management System</h1>
            <div class="navbar-container">
                <a href="dashboard.php" class="btn btn-secondary navbar-link">Dashboard</a>
                <a href="historico.php" class="btn btn-secondary navbar-link">Histórico de Alterações</a>
                <?php if($urlVerify) { ?>
                    <a href="gestao_funcionarios.php" class="btn btn-primary navbar-link">Gestão de Funcionários</a>
                <?php } else { ?>
                    <a href="gestao_funcionarios.php" class="btn btn-secondary navbar-link">Gestão de Funcionários</a>
                <?php } ?>
            </div>
        </div>
        <div class="navbar-login">
            <a class="btn btn-success">Login</a>
        </div>
    </nav>
</header>

