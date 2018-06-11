<?php

/**
 *Inicio de rutas para Usuario
 */

$app->get('/api/usuario', function() use ($app){

    $usuarios = Usuario::getAll();
    $data = array();
    foreach ($usuarios as $usuario){
      $data[]=array(
        'id_usuario' => $usuario->id_usuario,
        'id_rol' => $usuario->id_rol,
        'id_estado'=> $usuario->id_estado,
        'millas'=> $usuario->milas,
        'username'=> $usuario->username,
        'password'=> $usuario->password,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/usuario/{id:[0-9]+}', function($id) use ($app){

    $usuarios = Usuario::getById($id);
    $data = array();
    foreach ($usuarios as $usuario){
      $data[]=array(
        'id_usuario' => $usuario->id_usuario,
        'id_rol' => $usuario->id_rol,
        'id_estado'=> $usuario->id_estado,
        'millas'=> $usuario->milas,
        'username'=> $usuario->username,
        'password'=> $usuario->password,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/usuario', function() use ($app){
    $usuario=$app->request->getJsonRawBody();
    Usuario::addUsuario($usuario);
});

$app->put('/api/usuario/{id:[0-9]+}', function($id) use ($app){
    $usuario=$app->request->getJsonRawBody();
    var_dump($usuario);
    Usuario::updateUsuario($id, $usuario);
});

$app->delete('/api/usuario/{id:[0-9]+}', function($id) use ($app){

    Usuario::deleteUsuario($id);
});

/**
 *Fin de rutas para Usuario
 */
