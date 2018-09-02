<?php

try{
$conexao = new PDO('mysql:host=localhost; dbname=livraria', "root", "ifpe1234");
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo $e->getMessage();
}
$conexao->exec("set names utf8");

$resultado = $conexao->query("select titulo, autor,
ano_publicacao, editora from livro");
foreach($resultado as $linha){
echo $linha["titulo"]." - ".$linha["autor"]." - ".
$linha["ano_publicacao"]. " - " . $linha["editora"]. "<br>";

}

?>