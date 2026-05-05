<?php

session_start();

$host = 'localhost';
$user = 'SEU_USUARIO'; 
$pass = 'SUA_SENHA';    
$db   = 'facilita_db';

$conn = new mysqli($host, $user, $pass, $db);


