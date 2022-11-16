<?php

define("HOST", 'localhost'); // se define constantes
define("BD", 'gimnasio');
define("USER_BD", 'root');
define("PASS_BD", '');


function conecta() {
    $conectar = new mysqli(HOST, USER_BD, PASS_BD, BD);
        return $conectar;
}

?>
