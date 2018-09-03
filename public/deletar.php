<?php require_once("../conexao/conexao.php"); ?>

<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');
    // Faz com que o cliente recebe os dados em utf8, independente de como armazenados no banco
    $conexao->exec("set names utf8");

    try{
        if(isset($_POST["titulo"])) {
            $stmt = $conexao->prepare("delete from livro where titulo = '{$_POST["titulo"]}'");
            
            $stmt->execute();
            
            if($stmt->rowcount() > 0) { ?>
                <script> alert("O livro foi retirado de nossa biblioteca"); </script> 
     <?php }else { ?>
                <script> alert("Digite o nome do titulo correto"); </script> 
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
                <form action="deletar.php" method="post">
                    <fieldset><h3>Retirar da biblioteca</h3>
                        <input type="text" name="titulo" placeholder="Titulo">
                        <input type="submit" value="Confirmar">
                    </fieldset>
                </form>
            </div>
        </main>
        <?php include("_incluir/footer.php"); ?>
    </body>
</html>