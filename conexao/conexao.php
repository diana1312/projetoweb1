<?php
    try {
        $conexao=new PDO('mysql:host=localhost;dbname=udemy',"root","");
        $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
         $e->getMessage();
         $e->getCode();
    }
?>