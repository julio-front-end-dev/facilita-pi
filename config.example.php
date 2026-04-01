<?php
/**
 * MODELO DE CONFIGURAÇÃO - FACILITA!
 * Renomeie para config.php e preencha os dados abaixo.
 */
session_start();

$host = 'localhost';
$user = 'SEU_USUARIO'; 
$pass = 'SUA_SENHA';    
$db   = 'facilita_db';

$conn = new mysqli($host, $user, $pass, $db);

// [Repetir aqui a mesma lógica de Cadastro e Login do config.php]
