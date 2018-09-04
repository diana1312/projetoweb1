<header>
    <ul>
        <li id="home"><a href="index.php">Library</a></li>
        <?php if(isset($_SESSION["user_codigo"])) { 
            $stmt = $conexao->prepare("select nome from usuario where id_user = '{$_SESSION["user_codigo"]}'");
            $stmt->execute();
            $resultadoNome = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultadoNome as $linha) {
                $user_nome = $linha["nome"];
            }
        ?>
            <li>Bem vindo, <?php echo $user_nome; ?></li>
        
        <?php } ?>
    </ul>
</header>