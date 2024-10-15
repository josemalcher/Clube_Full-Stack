<?php

require "../../../bootstrap.php";

$validate = validate([
    'nome'=> 's',
    'email' => 'e',
    'assunto' => 's',
    'mensagem' => 's',

]);

var_dump($validate);