<?php

namespace App\model;

use \PDO;
use \App\config\Config;

class Conexao{

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance)) 
        {
            self::$instance = new PDO(Config::DB['dns'].':host='.Config::DB['host'].';dbname='.Config::DB['name'],Config::DB['user'],Config::DB['pass']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
    
}