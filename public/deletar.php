<?php

try{
$conexao = new PDO('mysql:host=localhost; dbname=livraria', "root", "ifpe1234");
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo $e->getMessage();
}
$conexao->exec("set names utf8");

$stmt = $conexao->prepare("delete from livro where titulo =?");
$titulo = 1;
$stmt->bindParam(1,$titulo);
$stmt->execute();
if($stmt->rowCount() > 0)
echo "Livro Excluído com sucesso.";
else
echo "Problemas ao excluir o livro.";

?>
