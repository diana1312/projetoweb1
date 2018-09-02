<?php
session_start();
 
require_once 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Painel | Sistema de Login</title>
    </head>
 
    <body>
         
        <h1>Painel dos Livros</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['login']; ?> | <a href="logout.php">Sair</a></p>
        <br>
        <h2>Escolhas suas Opções:</h2><br>

        <form action="consultar.php" method="POST">
            <label for="search">Consultar: </label>
            <input type="text" name="Consultar" id="consultar" placeholder="Consultar...">
            <input type="submit" value="Buscar"><br>
           </form>
           <br>

           <form action="insercao.php" method="POST">
            <label for="inserir">Inserir: </label><br>
            <label for="inserir">Título: </label>
            <input type="text" name="Titulo" id="titulo" placeholder="Título..."><br><br>
            <label for="inserir">Autor: </label>
            <input type="text" name="Autor" id="autor" placeholder="Autor..."><br><br>
            <label for="inserir">Ano de Publicação: </label>
            <input type="text" name="Ano de Publicação" id="ano_publicacao" placeholder="Ano de Publicação..."><br><br>
            <label for="inserir">Editora: </label>
            <input type="text" name="Editora" id="editora" placeholder="Editora..."><br><br>
            <input type="submit" value="Inserir">
        </form>
        <br>
 
        <form action="deletar.php" method="POST">
            <label for="delete">Deletar: </label>
            <input type="text" name="delete" id="delete" placeholder="Deletar...">
 
            <input type="submit" value="Deletar">
        </form>
         <br>
        <form action="atualizar.php" method="POST">
        <label for="atualizar">Atualizar: </label>
            <input type="text" name="atualizar" id="atualizar" placeholder="Atualizar...">
       <input type="submit" value="Atualizar">
       

    </body>
</html>