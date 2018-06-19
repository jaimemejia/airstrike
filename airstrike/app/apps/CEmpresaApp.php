<?php
/**
 *Inicio de rutas para CEmpresa
 */
use Phalcon\Http\Response;
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
 // echo json_encode($data,JSON_PRETTY_PRINT);
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
 // echo json_encode($data,JSON_PRETTY_PRINT);
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

$app->post('/api/cempresa', function() use ($app){
    $cempresa=$app->request->getJsonRawBody();
   // CEmpresa::addCEmpresa($cempresa);
    $response = new Response();
    $cempresa=$app->request->getJsonRawBody();
    //var_dump($cempresa);
    if(CEmpresa::addCEmpresa($cempresa)){
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
          [
              'status' => 'OK',
          ]
      );
    }else{
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

$app->put('/api/cempresa/{id:[0-9]+}', function($id) use ($app){
    $cempresa=$app->request->getJsonRawBody();
    //var_dump($cempresa);
    //CEmpresa::updateCEmpresa($id, $cempresa);


    $response = new Response();
    $cempresa=$app->request->getJsonRawBody();
    //var_dump($cempresa);
    if(CEmpresa::updateCEmpresa($id, $cempresa)){
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
          [
              'status' => 'OK',
          ]
      );
    }else{
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

$app->delete('/api/cempresa/{id:[0-9]+}', function($id) use ($app){

   // CEmpresa::deleteCEmpresa($id);

    $response = new Response();
    $cempresa=$app->request->getJsonRawBody();
    //var_dump($cempresa);
    if(CEmpresa::deleteCEmpresa($id)){
        $response->setStatusCode(200, 'Succeed');
        $response->setJsonContent(
          [
              'status' => 'OK',
          ]
      );
    }else{
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
/**
 *Fin de rutas para CEmpresa
 */
