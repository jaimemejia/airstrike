<?php
use Phalcon\Http\Response;
/**
 *Inicio de rutas para Cliente
 */

$app->get('/api/cliente', function() use ($app){

    $clientes = Cliente::getAll();
    $data = array();
    foreach ($clientes as $cliente){
      $data[]=array(
        'id_usuario' => $cliente->id_usuario,
        'username' => $cliente->username,
        'millas' => $cliente->millas,
        'primer_nombre' => $cliente->primer_nombre,
        'segundo_nombre' => $cliente->segundo_nombre,
        'primer_apellido' => $cliente->primer_apellido,
        'segundo_apellido' => $cliente->segundo_apellido,
        'tel_fijo' => $cliente->tel_fijo,
        'tel_movil' => $cliente->tel_movil,
        'direccion' => $cliente->direccion,
        'num_viajero' => $cliente->num_viajero,
        'estado_civil' => $cliente->estado_civil,
        'genero' => $cliente->genero,
        'tipo_doc' => $cliente->tipo_doc,
        'num_doc' => $cliente->num_doc,
        'id_cliente' => $cliente->id_cliente,
        'nombre_empresa' => $cliente->nombre_empresa,
        'nit' => $cliente->nit,
        'nic' => $cliente->nic,
        'nombre_contacto' => $cliente->nombre_contacto,
      );
    }

    //echo json_encode($data,JSON_PRETTY_PRINT);
    $response = new Response();

      // Check if the insertion was successful
      if ( sizeof($data) >0 ) {
          // Change the HTTP status
          $response->setStatusCode(200, 'Succeed');
          $response->setJsonContent(
              [
                  'status' => 'OK',
                  'data'   => $data,
              ]
          );
      } else {
          // Change the HTTP status
          $response->setStatusCode(200, 'Succeed');

          // Send errors to the client

          $response->setJsonContent(
              [
                  'status'   => 'ERROR'
              ]
          );
      }

      $response->setHeader('Access-Control-Allow-Origin', '*');
      $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');
      return $response;
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
