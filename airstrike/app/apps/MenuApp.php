<?php
use Phalcon\Http\Response;

/*OBTENER TODOS LOS menu*/
 $app->get('/api/menu', function() use ($app){

     $menus = Menu::getAll();
     $data = array();
     foreach ($menus as $menu){
       $data[]=array(
         'id' => $menu->id,
         'menu_superior_id' => $menu->menu_superior_id,
         'estado' => $menu->estado,
         'nombre' => $menu->nombre,
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
/*OBTENER menu POR CODIGO*/
 $app->get('/api/menu/{id:[0-9]+}', function($id) use ($app){

     $menus = Menu::getById($id);
     $data = array();
     foreach ($menus as $menu)
     {
       $data[]=array
       (
         'id' => $menu->id,
         'menu_superior_id' => $menu->menu_superior_id,
         'estado' => $menu->estado,
         'nombre' => $menu->nombre,
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
 /*CREAR UN NUEVO menu*/
 $app->post('/api/menu', function() use ($app){
     $menu=$app->request->getJsonRawBody();
     //Menu::addMenu($menu);
     
	$response = new Response();
	$menu=$app->request->getJsonRawBody();
    var_dump($menu);
    if(Menu::addMenu($menu)){
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
/*ACTUALIZAR Menu*/
 $app->put('/api/menu/{id:[0-9]+}', function($id) use ($app)
 {
 	  $menu=$app->request->getJsonRawBody();
 	  var_dump($menu);
     //Menu::updateMenu($id, $menu);
     $response = new Response();
	$menu=$app->request->getJsonRawBody();
    var_dump($menu);
    if(Menu::updateMenu($id, $menu)){
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
/*ELIMINAR Menu*/
 $app->delete('/api/menu/{id:[0-9]+}', function($id) use ($app){

     //Menu::deleteMenu($id);
     $response = new Response();
	$menu=$app->request->getJsonRawBody();
    var_dump($menu);
    if(Menu::deleteMenu($id)){
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
