<?php
use Phalcon\Http\Response;

/*OBTENER TODOS LOS PERMISO*/
    $app->get('/api/permiso', function() use ($app){

        $permisos = Permiso::getAll();
        $data = array();
        foreach ($permisos as $permiso){
          $data[]=array(
            'id' => $permiso->id,
            'nombre' => $permiso->nombre,
            'estado' => $permiso->estado,
            'menu-id' => $permiso->menu_id,
            'tipo-permiso-id' => $permiso->tipo_permiso_id,
            'rol-tipo' => $permiso->rol_tipo,
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

    /*OBTENER permiso POR CODIGO*/
    $app->get('/api/permiso/{id:[0-9]+}', function($id) use ($app){

        $permisos = Permiso::getById($id);
        $data = array();
        foreach ($permisos as $permiso)
        {
          $data[]=array(
            'id' => $permiso->id,
            'nombre' => $permiso->nombre,
            'estado' => $permiso->estado,
            'menu-id' => $permiso->menu_id,
            'tipo-permiso-id' => $permiso->tipo_permiso_id,
            'rol-tipo' => $permiso->rol_tipo,
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
     /*CREAR UN NUEVO permiso*/

    $app->post('/api/permiso', function() use ($app){
        $permiso=$app->request->getJsonRawBody();
        //$data = array();
        $response = new Response();
	$permiso=$app->request->getJsonRawBody();
    var_dump($permiso);
    if(Permiso::addPermiso($permiso)){
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

    /*ACTUALIZAR permiso*/
    $app->put('/api/permiso/{id:[0-9]+}', function($id) use ($app){
        $permiso=$app->request->getJsonRawBody();
        var_dump($permiso);
       // Permiso::updatePermiso($id, $permiso);
       $response = new Response();
	$permiso=$app->request->getJsonRawBody();
    var_dump($permiso);
    if(Permiso::updatePermiso($id, $permiso)){
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
/*ELIMINAR permiso*/
    $app->delete('/api/permiso/{id:[0-9]+}', function($id) use ($app){

        //Permiso::deletePermiso($id);
        $response = new Response();
	$permiso=$app->request->getJsonRawBody();
    var_dump($permiso);
    if(Permiso::deletePermiso($id)){
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
     *Fin de rutas para Menu
     */
