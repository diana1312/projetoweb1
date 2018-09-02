<?php

// FUNÇÃO DE CRIPTOGRAFIA MD5
function make_hash($str) {
    return sha1(md5($str));
}
 

//VERIFICA SE USUÁRIO ESTÁ LOGADDO
function isLoggedIn() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        return false;
    }
    return true;
}

?>