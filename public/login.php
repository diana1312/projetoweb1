<?php require_once("../conexao/conexao.php"); ?>
<?php
    //CRIAR SESSÃO
    session_start();
    
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');
    // Faz com que o cliente recebe os dados em utf8, independente de como armazenados no banco
    $conexao->exec("set names utf8");
    
    if(isset($_POST["usuario"])) {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $stmt = $conexao->prepare("select * from usuario where email = '{$usuario}' and senha = '{$senha}'");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $linha) {
            $id_user = $linha["id_user"];
        }
        
        //VERIFICA SE ARRAY DA BUSCA ESTA VAZIO
        if( empty($resultado) ){
            $mensagem = "Login sem sucesso.";
        }else {
            $_SESSION["user_codigo"] = $id_user;
            header("location:index.php");
        }
    }
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Library</title>
        <link rel="shortcut icon" href="assets/icon.ico">
        
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="stylesheet" href="_css/login.css">
    </head>
    <body>
        <?php include("_incluir/header.php"); ?>
        <main>
            <div id="janela_login">
                <form action="login.php" method="post">
                    <h2>Login</h2>
                    <input type="text" name="usuario" placeholder="E-mail">
                    <input type="password" name="senha" placeholder="Senha">
                    
                    <?php if(isset($mensagem)) { ?>
                        <p> <?php echo $mensagem ?> </p>
                    <?php } ?>
                    
                    <input type="submit" value="Entrar">
                    
                    
                    
                </form>
            </div>
            
            
        </main>
        <?php include("_incluir/footer.php"); ?>
    </body>
</html>