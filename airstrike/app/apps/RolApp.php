<?php

use Phalcon\Http\Response;

/*OBTENER TODOS LOS rol*/
     $app->get('/api/rol', function() use ($app){

         $roles = Rol::getAll();
         $data = array();
         foreach ($roles as $rol){
           $data[]=array(
             'id' => $rol->id,
             'tipo' => $rol->tipo,
             'nombre' => $rol->nombre,
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
/*OBTENER rol POR CODIGO*/
     $app->get('/api/rol/{id:[0-9]+}', function($id) use ($app){

         $roles = Rol::getById($id);
         $data = array();
         foreach ($roles as $rol){
           $data[]=array(
             'id' => $rol->id,
             'tipo' => $rol->tipo,
             'nombre' => $rol->nombre,
           );
         }
      //* echo json_encode($data,JSON_PRETTY_PRINT);
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
/*CREAR UN NUEVO rol*/
     $app->post('/api/rol', function() use ($app){
         $rol=$app->request->getJsonRawBody();
         //Rol::addRol($rol);
         $response = new Response();
	$rol=$app->request->getJsonRawBody();
    var_dump($rol);
    if(Rol::addRol($rol)){
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
   /*ACTUALIZAR ROL*/
     $app->put('/api/rol/{id:[0-9]+}', function($id) use ($app){
         $rol=$app->request->getJsonRawBody();
         var_dump($rol);
        // Rol::updatePermiso($id, $rol);
        if(Rol::updateRol($id, $rol)){
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
 /*ELIMINAR ROL*/
     $app->delete('/api/rol/{id:[0-9]+}', function($id) use ($app){

        // Rol::deleteRol($id);
        $response = new Response();
	$rol=$app->request->getJsonRawBody();
    var_dump($rol);
    if(Rol::deleteRol($id)){
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
      *Fin de rutas para Rol
     */
