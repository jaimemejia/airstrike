<?php
/**
 *Inicio de rutas para Cliente
 */

$app->get('/api/cliente', function() use ($app){

    $clientes = Cliente::getAll();
    $data = array();
    foreach ($clientes as $cliente){
      $data[]=array(
        'primer_nombre' => $cliente->primer_nombre,
        'segundo_nombre' => $cliente->segundo_nombre,
        'primer_apellido' => $cliente->primer_apellido,
        'segundo_apellido' => $cliente->segundo_apellido,
        'tel_fijo' => $cliente->tel_fijo,
        'tel_movil' => $cliente->tel_movil,
        'direccion' => $cliente->direccion,
        'num_viajero' => $cliente->num_viajero,
        'id_usuario' => $cliente->id_usuario,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/cliente/{id:[0-9]+}', function($id) use ($app){

    $clientes = Cliente::getById($id);
    $data = array();
    foreach ($clientes as $cliente){
      $data[]=array(
        'primer_nombre' => $cliente->primer_nombre,
        'segundo_nombre' => $cliente->segundo_nombre,
        'primer_apellido' => $cliente->primer_apellido,
        'segundo_apellido' => $cliente->segundo_apellido,
        'tel_fijo' => $cliente->tel_fijo,
        'tel_movil' => $cliente->tel_movil,
        'direccion' => $cliente->direccion,
        'num_viajero' => $cliente->num_viajero,
        'id_usuario' => $cliente->id_usuario,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/cliente', function() use ($app){
    $cliente=$app->request->getJsonRawBody();
    Cliente::addCliente($cliente);
});

$app->put('/api/cliente/{id:[0-9]+}', function($id) use ($app){
    $cliente=$app->request->getJsonRawBody();
    var_dump($cliente);
    Cliente::updateCliente($id, $cliente);
});

$app->delete('/api/cliente/{id:[0-9]+}', function($id) use ($app){

    CLiente::deleteCliente($id);
});
/**
 *Fin de rutas para Cliente
 */
