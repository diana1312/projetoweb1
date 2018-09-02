<?php

try{
$conexao = new PDO('mysql:host=localhost; dbname=livraria', "root", "ifpe1234");
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo $e->getMessage();
}
$conexao->exec("set names utf8");
 

$stmt = $conexao->prepare(“insert into livro
values(titulo,autor,ano_publicacao,editora) values(?,?,?,?,?)”);


echo "$_POST['Titulo']";

?>
