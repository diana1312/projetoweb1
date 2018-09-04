<?php require_once("../conexao/conexao.php"); ?>

<?php
    //CRIAR SESSÃO
    session_start();
    
    //PROTEGE PÁGINAS INTERNAS CASO NÃO ESTEJA LOGADO
    if(!isset($_SESSION["user_codigo"])) {
        header("location:login.php");
    }

    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');
    // Faz com que o cliente recebe os dados em utf8, independente de como armazenados no banco
    $conexao->exec("set names utf8");

    try{
        //ATUALIZANDO DADOS
        if(isset($_POST["titulo"])) {
            
            $stmt = $conexao->prepare("update livro set titulo='{$_POST["titulo"]}', autor='{$_POST["autor"]}', editora='{$_POST["editora"]}', ano_publicacao='{$_POST["ano_publicacao"]}' where titulo = '{$_POST["localiza"]}'");

            $stmt->execute();
            
            if($stmt->rowcount() > 0) { ?>
                <script> alert("Alterado com sucesso"); </script> 
     <?php }else { ?>
                <script> alert("Problema na atualização"); </script> 
     <?php
            }
        }
    }catch (PDOEception $e){
        echo $e->getMessage();
        echo $e->getCode();
    }
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Library</title>
        <link rel="shortcut icon" href="assets/icon.ico">
        
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="stylesheet" href="_css/rud.css">
    </head>
    <body>
        <?php include("_incluir/header.php"); ?>
        <?php include("_incluir/botoes.php"); ?>
        <main>
            <div class="rud">
                <form action="atualizar.php" method="post" class="localizar_titulo">
                    <fieldset class="part1"><h3>Atualizar</h3>
                        <input type="text" name="localiza" placeholder="Titulo"> 
                        <input type="submit" value="Confirmar" class="botao" id="nextAtualizar">
                    </fieldset>
                    <div action="atualizar.php" method="post">
                        <fieldset class="part2"><h3>Alterar informações do livro</h3>
                            <input type="text" name="titulo" placeholder="Titulo">
                            <input type="text" name="autor" placeholder="Autor">
                            <input type="text" name="editora" placeholder="Editora">
                            <input type="text" name="ano_publicacao" placeholder="Ano de Publicação">
                            <input type="submit" value="Atualizar" class="confirmar">
                        </fieldset>
                    </div>
                </form>
            </div>
        </main>
        <?php include("_incluir/footer.php"); ?>
        
        <script src="js/jquery.js"></script>
        
        <script>
            $(function() {
                $("#nextAtualizar").click(function(){
                    $(".part1").hide();
                    $(".part2").show();
                    return false;
                })
                
            });
        </script>
    </body>
</html>