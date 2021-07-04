<?php

namespace core;

use RedUNIT\Blackhole\Debug;

class Router{

  protected static $routes=[];
  protected static $route = [];

  public static function get($regexp, $route =[])
  {
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
      self::$routes[$regexp] =$route;
    }
  }

  public static function post($regexp, $route =[])
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      self::$routes[$regexp] =$route;
    }
  }

  public static function getRoutes(){
    return self::$routes;
  }

  public static function getRoute(){
    return self::$route;
  }

  public static function dispatch($url){
    if(self::matchRoutes($url)){
      echo 'ok';
    }else{
      throw new \Exception('Страница не найдена', 404);
    }
  }

  public static function matchRoutes($url){
    foreach(self::$routes as $pattern => $route){
      if(preg_match("#$pattern#", $url, $matches)){
        foreach($matches as $k =>$v){
          if(is_string($k)){
            $route[$k]=$v;
          }
        }
        if (empty($route['action'])){
          $route['action'] = 'index';
        }
        self::$route = $route;
        Debug(self::$route);
        return true;
      }
    }return false;
  }

}