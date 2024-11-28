<?php

namespace App\config;

class Config{

    //const EMPRESA = 'On SOluções';
    //public $nome = Config::EMAIL;

    const EMAIL = [
        'email'          => 'jorge.fernando3l@hotmail.com',
        'assuntoEmpresa' => 'OnSoluções',
        'assuntoCliente' => 'Sua mensagem foi recebida'
    ];
    
    
    const DB = [
        'dns'   => 'mysql',
        'host'  => 'localhost',
        'name'  => 'banco',
        'user'  => 'root',
        'pass'  => ''
    ]; 

}