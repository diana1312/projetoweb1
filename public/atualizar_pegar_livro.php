<?php require_once("../conexao/conexao.php"); ?>

<?php
    try{
        //PROCURAR LIVRO
        if(isset($_GET["localiza"])) {
            $stmt = $conexao->prepare("select * from livro where titulo like '%{$_GET["localiza"]}%' ");
            $stmt->execute();
            $resultado = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resultado as $linha) {
                $codigo = $linha["id_livro"];
                $titulo = $linha["titulo"];
                $autor = $linha["autor"];
                $editora = $linha["editora"];
                $ano_publicacao = $linha["ano_publicacao"];
            }
            
             Header("Location: atualizar.php");
        }
    }catch (PDOEception $e){
        echo $e->getMessage();
        echo $e->getCode();
    }
?>