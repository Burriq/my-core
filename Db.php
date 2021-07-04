<?php

namespace core;

use core\Traits\TSingleton;
use Exception;

class db{

  use TSingleton;

  protected function __construct()
  {
    $db = require_once CONF. '/config_db.php';
    class_alias('\RedBeanPHP\R', '\R');
    \R::setup($db['dsn'], $db['username'],$db['pass']);
    if(!\R::testConnection()){
      throw new \Exception('Соединение с БД не установлено', 500);
    }
    \R::freeze(true);
    if(DEBUG){
      \R::debug(true, 1);
    } 
  }
}