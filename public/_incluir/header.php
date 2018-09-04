<header>
    <ul>
        <li id="home" class="header_info"><a href="index.php">Library</a></li>
        <?php if(isset($_SESSION["user_codigo"])) { 
            $stmt = $conexao->prepare("select nome from usuario where id_user = '{$_SESSION["user_codigo"]}'");
            $stmt->execute();
            $resultadoNome = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultadoNome as $linha) {
                $user_nome = $linha["nome"];
            }
        ?>
            <li class="header_info">Bem vindo, <?php echo $user_nome; ?> - <a href="logout.php">Sair</a></li>
        <?php } ?>
    </ul>
</header>