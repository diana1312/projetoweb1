<?php require_once("../conexao/conexao.php"); ?>

<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');
    // Faz com que o cliente recebe os dados em utf8, independente de como armazenados no banco
    $conexao->exec("set names utf8");
    try{
        if(isset($_POST["titulo"])) {
            $stmt = $conexao->prepare("insert into livro(titulo,autor,editora,ano_publicacao) values('{$_POST["titulo"]}','{$_POST["autor"]}','{$_POST["editora"]}','{$_POST["ano_publicacao"]}')");
            
            $stmt->execute();
            
            if($stmt->rowcount() > 0) { ?>
                <script> alert("Adicionado a biblioteca"); </script> 
     <?php }else { ?>
                <script> alert("Problema para adicionar livro"); </script> 
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
    </head>
    <body>
        <?php include("_incluir/header.php"); ?>
        <?php include("_incluir/botoes.php"); ?>
        <main>
            <div class="rud">
                <form action="insercao.php" method="post">
                    <fieldset><h3>Fonerça os dado do livro</h3>
                        <label>Título <input type="text" name="titulo"></label>
                        <label>Autor <input type="text" name="autor"></label>
                        <label>Editora <input type="text" name="editora"></label>
                        <label>Ano Publicação <input type="text" name="ano_publicacao"></label>
                        <input type="submit" value="Salvar">
                    </fieldset>
                </form>
            </div>
        </main>
        <?php include("_incluir/footer.php"); ?>
    </body>
</html>