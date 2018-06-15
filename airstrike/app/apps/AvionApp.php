<?php
/**
 *Inicio de rutas para Avion
 */

$app->get('/api/avion', function() use ($app){

    $aviones = Avion::getAll();
    $data = array();
    foreach ($aviones as $avion){
      $data[]=array(
        'placa' => $avion->placa,
        'tipo_avion_id' => $avion->tipo_avion_id,
        'linea_aerea_codigo'=> $avion->linea_aerea_codigo,
        'modelo_avion_id'=> $avion->modelo_avion_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/avion/{placa:[a-z]+}', function($placa) use ($app){

    $aviones = Avion::getById($placa);
    $data = array();
    foreach ($aviones as $avion){
      $data[]=array(
        'placa' => $avion->placa,
        'tipo_avion_id' => $avion->tipo_avion_id,
        'linea_aerea_codigo'=> $avion->linea_aerea_codigo,
        'modelo_avion_id'=> $avion->modelo_avion_id,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/avion', function() use ($app){
    $avion=$app->request->getJsonRawBody();
    Avion::addAvion($avion);
});

$app->put('/api/avion/{placa:[a-z]+}', function($placa) use ($app){
    $avion=$app->request->getJsonRawBody();
    var_dump($avion);
    Avion::updateAvion($placa, $avion);
});

$app->delete('/api/avion/{placa:[a-z]+}', function($placa) use ($app){

    Avion::deleteAvion($placa);
});
/**
 *Fin de rutas para Avion
 */
