<?php

/**
 *Inicio de rutas para PrecioClase
 */

$app->get('/api/precioclase', function() use ($app){

    $precioClases = PrecioClase::getAll();
    $data = array();
    foreach ($precioClases as $precioClase){
      $data[]=array(
        'id' => $precioClase->id,
        'tipo_clase_id' => $precioClase->tipo_clase_id,
        'programacion_vuelo_id' => $precioClase->programacion_vuelo_id,
        'precio' => $precioClase->precio,
        'precio_maleta'=> $precioClase->precio_maleta,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/precioclase/{id:[0-9]+}', function($id) use ($app){

    $precioClases = PrecioClase::getById($id);
    $data = array();
    foreach ($precioClases as $precioClase){
      $data[]=array(
        'id' => $precioClase->id,
        'tipo_clase_id' => $precioClase->tipo_clase_id,
        'programacion_vuelo_id' => $precioClase->programacion_vuelo_id,
        'precio' => $precioClase->precio,
        'precio_maleta'=> $precioClase->precio_maleta,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/precioclase', function() use ($app){
    $precioClase=$app->request->getJsonRawBody();
    PrecioClase::addPrecioClase($precioClase);
});

$app->put('/api/precioclase/{id:[0-9]+}', function($id) use ($app){
    $precioClase=$app->request->getJsonRawBody();
    var_dump($precioClase);
    PrecioClase::updatePrecioClase($id, $precioClase);
});

$app->delete('/api/precioclase/{id:[0-9]+}', function($id) use ($app){

    PrecioClase::deletePrecioClase($id);
});

/**
 *Fin de rutas para PrecioClase
 */
