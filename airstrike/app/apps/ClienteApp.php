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
        'id_natural' => $cliente->id_natural,
        'estado_civil' => $cliente->estado_civil,
        'genero' => $cliente->genero,
        'fecha_nacimiento' => $cliente->fecha_nacimiento,
        'tipo_doc' => $cliente->tipo_doc,
        'num_doc' => $cliente->num_doc,
        'id_c_empresa' => $cliente->id_c_empresa,
        'nombre_empresa' => $cliente->nombre_empresa,
        'nit' => $cliente->nit,
        'nic' => $cliente->nic,
        'nombre_contacto' => $cliente->nombre_contacto,
        'id_usuario' => $cliente->id_usuario,
        'username'=> $cliente->username,
        'id_rol' => $cliente->id_rol,
        'id_estado'=> $cliente->id_estado,
        'millas'=> $cliente->millas,
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

$app->post('/api/cliente', function() use ($app){
    //Declaraciones
    $response=new Response();
    $usuario=new \stdClass();
    $cliente=new \stdClass();
    $cliente_juridico=new \stdClass();
    $cliente_natural=new \stdClass();

    $cliente_json=$app->request->getJsonRawBody();
    $usuario->id_estado=1;
    $usuario->id_rol=$cliente_json->usuario->id_rol;
    $usuario->millas=0;
    $usuario->username=$cliente_json->usuario->username;
    $usuario->password=hash('sha512',$cliente_json->usuario->password);
    $usuario->id_usuario=Usuario::addUsuario($usuario)[0]->create_usuario;

    if($usuario->id_usuario){
      $cliente->id_usuario=$usuario->id_usuario;
      $cliente->primer_nombre=$cliente_json->primer_nombre;
      $cliente->segundo_nombre=$cliente_json->segundo_nombre;
      $cliente->primer_apellido=$cliente_json->primer_apellido;
      $cliente->segundo_apellido=$cliente_json->segundo_apellido;
      $cliente->tel_fijo=$cliente_json->tel_fijo;
      $cliente->tel_movil=$cliente_json->tel_movil;
      $cliente->direccion=$cliente_json->direccion;
      $cliente->id_cliente=Cliente::addCliente($cliente)[0]->create_cliente;

      if($cliente->id_cliente and strcasecmp($cliente_json->tipo_cliente,'juridico')==0){
        $cliente_juridico->id_cliente=$cliente->id_cliente;
        $cliente_juridico->nombre_empresa=$cliente_json->detalle_empresa->nombre_empresa;
        $cliente_juridico->nit=$cliente_json->detalle_empresa->nit;
        $cliente_juridico->nic=$cliente_json->detalle_empresa->nic;
        $cliente_juridico->nombre_contacto=$cliente_json->detalle_empresa->nombre_contacto;
        if(CEmpresa::addCEmpresa($cliente_juridico)){
          $response->setStatusCode(200, 'Succeed');
          $response->setJsonContent([
            'status' => 'OK',
          ]);
        }

      }
      elseif ($cliente->id_cliente and strcasecmp($cliente_json->tipo_cliente,'natural')==0){
        $cliente_natural->id_cliente=$cliente->id_cliente;
        $cliente_natural->estado_civil=$cliente_json->detalle_natural->estado_civil;
        $cliente_natural->genero=$cliente_json->detalle_natural->genero;
        $cliente_natural->fecha_nacimiento=$cliente_json->detalle_natural->fecha_nacimiento;
        $cliente_natural->tipo_doc=$cliente_json->detalle_natural->tipo_doc;
        $cliente_natural->num_doc=$cliente_json->detalle_natural->num_doc;
        if(CNatural::addCNatural($cliente_natural)){
          $response->setStatusCode(200, 'Succeed');
          $response->setJsonContent([
            'status' => 'OK',
          ]);
        }

      }

    }
    else{
      $response->setStatusCode(200, 'Succeed');
      // Send errors to the client
      $response->setJsonContent([
        'status'   => 'ERROR'
      ]);
    }
    $response->setHeader('Access-Control-Allow-Origin', '*');
    $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');
    return $response;
});

$app->put('/api/cliente/{id:[0-9]+}', function($id) use ($app){
    $cliente=$app->request->getJsonRawBody();
    //var_dump($cliente);

    if(Cliente::updateCliente($id, $cliente)){
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

$app->delete('/api/cliente/{id:[0-9]+}', function($id) use ($app){

    if(CLiente::deleteCliente($id)){
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
 *Fin de rutas para Cliente
 */
