<?php require_once("../conexao/conexao.php"); ?>
<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');
    // Faz com que o cliente recebe os dados em utf8, independente de como armazenados no banco
    $conexao->exec("set names utf8");
    
    try{
        //CAMPO BUSCAR
        if(isset($_GET["livro"])) {
            $stmt = $conexao->prepare("select * from livro where titulo like '%{$_GET["livro"]}%' ");
            $stmt->execute();
            $resultado = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }else {
            $resultado = $conexao->query("select id_livro, titulo, autor, editora,ano_publicacao from livro ");
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
            <div id="janela_pesquisa">
                <form action="index.php" method="get">
                    <input type="text" name="livro" placeholder="Pesquisa">
                    <input type="image" name="pesquisa" src="assets/pesquisa3.png">
                </form>
            
            </div>
            
            <!---   Lisstando livros ---->
            <div id="listagem_livros">
                <?php foreach($resultado as $linha) { ?>
                    <ul>
                        <li><h2> <?php echo $linha["titulo"] ?> </h2></li>
                        <li>Autor: <?php echo $linha["autor"] ?> </li>
                        <li>Editora: <?php echo $linha["editora"] ?> </li>
                        <li>Publicado: <?php echo $linha["ano_publicacao"] ?> </li>
                    </ul>
                <?php } ?>
            </div>
            
        </main>
        <?php include("_incluir/footer.php"); ?>
    </body>
</html>