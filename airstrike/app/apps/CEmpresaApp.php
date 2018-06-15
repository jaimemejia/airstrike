<?php
/**
 *Inicio de rutas para CEmpresa
 */

$app->get('/api/cempresa', function() use ($app){

    $cempresas = CEmpresa::getAll();
    $data = array();
    foreach ($cempresas as $cempresa){
      $data[]=array(
        'id_c_empresa' => $cempresa->id_c_empresa,
        'nombre_empresa' => $cempresa->nombre_empresa,
        'nit' => $cempresa->nit,
        'nic' => $cempresa->nic,
        'nombre_contacto' => $cempresa->nombre_contacto,
        'id_cliente' => $cempresa->id_cliente,  
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/cempresa/{id:[0-9]+}', function($id) use ($app){

    $cempresas = CEmpresa::getById($id);
    $data = array();
    foreach ($cempresas as $cempresa){
      $data[]=array(
        'id_c_empresa' => $cempresa->id_c_empresa,
        'nombre_empresa' => $cempresa->nombre_empresa,
        'nit' => $cempresa->nit,
        'nic' => $cempresa->nic,
        'nombre_contacto' => $cempresa->nombre_contacto,
        'id_cliente' => $cempresa->id_cliente
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/cempresa', function() use ($app){
    $cempresa=$app->request->getJsonRawBody();
    CEmpresa::addCEmpresa($cempresa);
});

$app->put('/api/cempresa/{id:[0-9]+}', function($id) use ($app){
    $cempresa=$app->request->getJsonRawBody();
    var_dump($cempresa);
    CEmpresa::updateCEmpresa($id, $cempresa);
});

$app->delete('/api/cempresa/{id:[0-9]+}', function($id) use ($app){

    CEmpresa::deleteCEmpresa($id);
});
/**
 *Fin de rutas para CEmpresa
 */
