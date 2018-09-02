<?php

try{
$conexao = new PDO('mysql:host=localhost; dbname=livraria', "root", "ifpe1234");
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo $e->getMessage();
}
$conexao->exec("set names utf8");

$update = $_POST["update"];
$result = $conexao->query("update livro set titulo=? where ano_publicacao=?");

$titulo = "Luluzinha"; $ano_publicacao="27/07/07";
$stmt->bindParam(1,$titulo);
$stmt->bindParam(2,$ano_publicacao);
$stmt->execute();
if($stmt->rowCount() > 0)
echo "Livro atualizado com sucesso.";
else
echo "O livro não foi atualizado.";

?>
