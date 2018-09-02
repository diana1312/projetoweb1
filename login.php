<?php
 
require 'init.php';
 
// resgata variáveis do formulário
$login = isset($_POST['login']) ? $_POST['login'] : 'user1@user.com';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '123mudar';
 
if (empty($login) || empty($senha))
{
    echo "Informe email e senha";
    exit;
}
 
$passwordHash = make_hash($password);
 
$PDO = db_connect();
 
$sql = "SELECT id, login FROM usuario WHERE login = :login AND senha = :senha";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $senhaHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($login) <= 0)
{
    echo "Email ou senha incorretos";
    exit;
}
 
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['login'] = $login['login'];
$_SESSION['senha'] = $senha['senha'];
 
header('Location: index.php');
?>