<?php

$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */
$app->get('/', function () {
    echo $this['view']->render('index');
});

/**
 *Inicio de rutas para TipoPermiso
 */

$app->get('/api/tipopermiso', function() use ($app){

    $tipoPermisos = TipoPermiso::getAll();
    $data = array();
    foreach ($tipoPermisos as $tipoPermiso){
      $data[]=array(
        'id' => $tipoPermiso->id,
        'nombre' => $tipoPermiso->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->get('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){

    $tipoPermisos = TipoPermiso::getById($id);
    $data = array();
    foreach ($tipoPermisos as $tipoPermiso){
      $data[]=array(
        'id' => $tipoPermiso->id,
        'nombre' => $tipoPermiso->nombre,
      );
    }
  echo json_encode($data,JSON_PRETTY_PRINT);
});

$app->post('/api/tipopermiso', function() use ($app){
    $tipoPermiso=$app->request->getJsonRawBody();
    TipoPermiso::addTipoPermiso($tipoPermiso);
});

$app->put('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){
    $tipoPermiso=$app->request->getJsonRawBody();
    var_dump($tipoPermiso);
    TipoPermiso::updateTipoPermiso($id, $tipoPermiso);
});

$app->delete('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){

    TipoPermiso::deleteTipoPermiso($id);
});
/**
 *Fin de rutas para TipoPermiso
 */

 /**
  *Inicio de rutas para Estado
  */

 $app->get('/api/estado', function() use ($app){

     $estados = Estado::getAll();
     $data = array();
     foreach ($estados as $estado){
       $data[]=array(
         'id' => $estado->id,
         'nombre' => $estado->nombre,
       );
     }
   echo json_encode($data,JSON_PRETTY_PRINT);
 });

 $app->get('/api/estado/{id:[0-9]+}', function($id) use ($app){

     $estados = Estado::getById($id);
     $data = array();
     foreach ($estados as $estado){
       $data[]=array(
         'id' => $estado->id,
         'nombre' => $estado->nombre,
       );
     }
   echo json_encode($data,JSON_PRETTY_PRINT);
 });

 $app->post('/api/estado', function() use ($app){
     $estado=$app->request->getJsonRawBody();
     Estado::addEstado($estado);
 });

 $app->put('/api/estado/{id:[0-9]+}', function($id) use ($app){
     $estado=$app->request->getJsonRawBody();
     var_dump($estado);
     Estado::updateEstado($id, $estado);
 });

 $app->delete('/api/estado/{id:[0-9]+}', function($id) use ($app){
 
     Estado::deleteEstado($id);
 });
 /**
  *Fin de rutas para TipoPermiso
  */

 /**
  *Inicio de rutas para Menu
  */
  $app->get('/api/menu', function() use ($app){

      $menus = Menu::getAll();
      $data = array();
      foreach ($menus as $menu){
        $data[]=array(
          'id' => $menu->id,
          'menu-superior-id' => $menu->menu_superior_id,
          'estado' => $menu->estado,
          'nombre' => $menu->nombre,
        );
      }
    echo json_encode($data,JSON_PRETTY_PRINT);
  });

  $app->get('/api/menu/{id:[0-9]+}', function($id) use ($app){

      $menus = Menu::getById($id);
      $data = array();
      foreach ($menus as $menu){
        $data[]=array(
          'id' => $menu->id,
          'menu-superior-id' => $menu->menu_superior_id,
          'estado' => $menu->estado,
          'nombre' => $menu->nombre,
        );
      }
    echo json_encode($data,JSON_PRETTY_PRINT);
  });

  $app->post('/api/menu', function() use ($app){
      $menu=$app->request->getJsonRawBody();
      Menu::addMenu($menu);
  });

  $app->delete('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){

      TipoPermiso::deleteTipoPermiso($id);
  });
  /**
   *Fin de rutas para Menu
   */
   
/***********************************************************************************/   
/******************************** INICIO RUTAS MIGUEL ******************************/
/***********************************************************************************/

/*OBTENER TODOS LOS PAISES*/
$app->get('/api/pais', function() use ($app)
{
	$paises = Pais::getAll();
	$data = array();
	foreach ($paises as $pais)
	{
	  $data[]=array
	  (
		'codigo' => $pais->codigo,
		'nombre' => $pais->nombre,
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER PAIS POR CODIGO*/
$app->get('/api/pais/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$paises = Pais::getByCodigo($codigo);
	$data = array();
	foreach ($paises as $pais)
	{
	  $data[]=array
	  (
		'codigo' => $pais->codigo,
		'nombre' => $pais->nombre,
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO PAIS*/
$app->post('/api/pais', function() use ($app)
{
    $pais=$app->request->getJsonRawBody();
    Pais::addPais($pais);
});

/*ACTUALIZAR PAIS*/ 
$app->put('/api/pais/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$pais=$app->request->getJsonRawBody();
	var_dump($pais);
	Pais::updatePais($codigo, $pais);
});
 
/*ELIMINAR PAIS*/
$app->delete('/api/pais/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	Pais::deletePais($codigo);
});

/***********************************************************************************/

/*OBTENER TODAS LAS CIUDADES*/
$app->get('/api/ciudad', function() use ($app)
{
	$ciudades = Ciudad::getAll();
	$data = array();
	foreach ($ciudades as $ciudad)
	{
	  $data[]=array
	  (
		'codigo' => $ciudad->codigo,
		'nombre' => $ciudad->nombre,
		'pais_codigo' => $ciudad->pais_codigo,
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER CIUDAD POR CODIGO*/
$app->get('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$ciudades = Ciudad::getByCodigo($codigo);
	$data = array();
	foreach ($ciudades as $ciudad)
	{
	  $data[]=array
	  (
		'codigo' => $ciudad->codigo,
		'nombre' => $ciudad->nombre,
		'pais_codigo' => $ciudad->pais_codigo,
	  );
	}
    echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UNA NUEVA CIUDAD*/
$app->post('/api/ciudad', function() use ($app)
{
    $ciudad=$app->request->getJsonRawBody();
    Ciudad::addCiudad($ciudad);
});

/*ACTUALIZAR CIUDAD*/ 
$app->put('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$ciudad=$app->request->getJsonRawBody();
	var_dump($ciudad);
	Ciudad::updateCiudad($codigo, $ciudad);
});

/*ELIMINAR CIUDAD*/
$app->delete('/api/ciudad/{codigo:[0-9]+}', function($codigo) use ($app)
{
	Ciudad::deleteCiudad($codigo);
});

/***********************************************************************************/

/*OBTENER TODOS LAS LINEAS AEREAS*/
$app->get('/api/lineaaerea', function() use ($app)
	{
	$lineasaereas = LineaAerea::getAll();
	$data = array();
	foreach ($lineasaereas as $lineaaerea)
	{
	  $data[]=array
	  (
		'codigo' => $lineaaerea->codigo,
		'nombre_oficial' => $lineaaerea->nombre_oficial,
		'nombre_corto' => $lineaaerea->nombre_corto,
		'representante' => $lineaaerea->representante,
		'fecha_fundacion' => $lineaaerea->codigo,
		'pais_codigo' => $lineaaerea->fecha_fundacion,
		'correo_electronico' => $lineaaerea->correo_electronico,
		'pagina_web' => $lineaaerea->pagina_web
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER LINEA AEREA POR CODIGO*/
$app->get('/api/lineaaerea/{codigo:[0-9]+}', function($codigo) use ($app)
{
	$lineasaereas = LineaAerea::getByCodigo($codigo);
	$data = array();
	foreach ($lineasaereas as $lineaaerea)
	{
	  $data[]=array
	  (
		'codigo' => $lineaaerea->codigo,
		'nombre_oficial' => $lineaaerea->nombre_oficial,
		'nombre_corto' => $lineaaerea->nombre_corto,
		'representante' => $lineaaerea->representante,
		'fecha_fundacion' => $lineaaerea->codigo,
		'pais_codigo' => $lineaaerea->fecha_fundacion,
		'correo_electronico' => $lineaaerea->correo_electronico,
		'pagina_web' => $lineaaerea->pagina_web
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UNA NUEVA LINEA AEREA*/
$app->post('/api/lineaaerea', function() use ($app)
{
    $lineaaerea=$app->request->getJsonRawBody();
    LineaAerea::addLineaAerea($lineaaerea);
});
 
/*ACTUALIZAR LINEA AEREA*/ 
$app->put('/api/lineaaerea/{codigo:[0-9]+}', function($codigo) use ($app)
{
 $lineaaerea=$app->request->getJsonRawBody();
 var_dump($lineaaerea);
 LineaAerea::updateLineaAerea($codigo, $lineaaerea);
});

/*ELIMINAR LINEA AEREA*/
$app->delete('/api/lineaaerea/{codigo:[0-9]+}', function($codigo) use ($app)
{
	LineaAerea::deleteLineaAerea($codigo);
});

/***********************************************************************************/

/*OBTENER TODOS LOS CONTACTOS*/
$app->get('/api/contacto', function() use ($app)
{
	$contactos = Contacto::getAll();
	$data = array();
	foreach ($contactos as $contacto)
	{
	  $data[]=array
	  (
		'direccion_web' => $contacto->direccion_web,
		'nombre' => $contacto->nombre,
		'linea_aerea_codigo' => $contacto->linea_aerea_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER CONTACTO POR ID*/
$app->get('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	$contactos = Contacto::getById($id);
	$data = array();
	foreach ($contactos as $contacto)
	{
	  $data[]=array
	  (
		'direccion_web' => $contacto->direccion_web,
		'nombre' => $contacto->nombre,
		'linea_aerea_codigo' => $contacto->linea_aerea_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO CONTACTO*/
$app->post('/api/contacto', function() use ($app)
{
    $contacto=$app->request->getJsonRawBody();
    Contacto::addContacto($contacto);
});
 
/*ACTUALIZAR CONTACTO*/ 
$app->put('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	$contacto=$app->request->getJsonRawBody();
	var_dump($contacto);
	Contacto::updateContacto($id, $contacto);
});

/*ELIMINAR CONTACTO*/
$app->delete('/api/contacto/{id:[0-9]+}', function($id) use ($app)
{
	Contacto::deleteContacto($id);
});

/***********************************************************************************/

/*OBTENER TODOS LOS HORARIOS*/
$app->get('/api/horario', function() use ($app)
{
	$horarios = Horario::getAll();
	$data = array();
	foreach ($horarios as $horario)
	{
	  $data[]=array
	  (
		'hora' => $horario->hora,
		'tiempo_abordaje' => $horario->tiempo_abordaje,
		'tiempo_desabordaje' => $horario->tiempo_desabordaje
	  );
	}
	 echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER HORARIO POR ID*/
$app->get('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	$horarios = Horario::getById($id);
	$data = array();
	foreach ($horarios as $horario)
	{
	  $data[]=array
	  (
		'hora' => $horario->hora,
		'tiempo_abordaje' => $horario->tiempo_abordaje,
		'tiempo_desabordaje' => $horario->tiempo_desabordaje
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO HORARIO*/
$app->post('/api/horario', function() use ($app)
{
    $horario=$app->request->getJsonRawBody();
    Horario::addHorario($horario);
});
 
/*ACTUALIZAR HORARIO*/ 
$app->put('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	$horario=$app->request->getJsonRawBody();
	var_dump($horario);
	Horario::updateHorario($id, $horario);
});
 
/*ELIMINAR HORARIO*/
$app->delete('/api/horario/{id:[0-9]+}', function($id) use ($app)
{
	Horario::deleteHorario($id);
});

/***********************************************************************************/

/*OBTENER TODOS LOS AEROPUERTOS*/
$app->get('/api/aeropuerto', function() use ($app)
{
	$aeropuertos = Aeropuerto::getAll();
	$data = array();
	foreach ($aeropuertos as $aeropuerto)
	{
	  $data[]=array
	  (
		'codigo' => $aeropuerto->codigo,
		'nombre' => $aeropuerto->nombre,
		'telefono' => $aeropuerto->telefono,
		'bahias' => $aeropuerto->bahias,
		'ciudad_codigo' => $aeropuerto->ciudad_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER AEROPUERTO POR CODIGO*/
$app->get('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$aeropuertos = Aeropuerto::getByCodigo($codigo);
	$data = array();
	foreach ($aeropuertos as $aeropuerto)
	{
	  $data[]=array
	  (
		'codigo' => $aeropuerto->codigo,
		'nombre' => $aeropuerto->nombre,
		'telefono' => $aeropuerto->telefono,
		'bahias' => $aeropuerto->bahias,
		'ciudad_codigo' => $aeropuerto->ciudad_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

 /*CREAR UN NUEVO AEROPUERTO*/
 $app->post('/api/aeropuerto', function() use ($app)
 {
    $aeropuerto=$app->request->getJsonRawBody();
    Aeropuerto::addAeropuerto($aeropuerto);
 });
 
/*ACTUALIZAR AEROPUERTO*/ 
$app->put('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$aeropuerto=$app->request->getJsonRawBody();
	var_dump($aeropuerto);
	Aeropuerto::updateAeropuerto($codigo, $aeropuerto);
});
 
 /*ELIMINAR AEROPUERTO*/
$app->delete('/api/aeropuerto/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	Aeropuerto::deleteAeropuerto($codigo);
});

/***********************************************************************************/

/*OBTENER TODOS LOS GATEWAY*/
$app->get('/api/gateway', function() use ($app)
{
	$gateways = Gateway::getAll();
	$data = array();
	foreach ($gateways as $gateway)
	{
	  $data[]=array
	  (
		'id' => $gateway->id,
		'id_horario' => $gateway->id_horario,
		'aeropuerto_codigo' => $gateway->aeropuerto_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER GATEWAY POR ID*/
$app->get('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	$gateways = Gateway::getById($id);
	$data = array();
	foreach ($gateways as $gateway)
	{
		$data[]=array
		(
			'id' => $gateway->id,
			'id_horario' => $gateway->id_horario,
			'aeropuerto_codigo' => $gateway->aeropuerto_codigo
		);
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO GATEWAY*/
$app->post('/api/gateway', function() use ($app)
{
    $gateway=$app->request->getJsonRawBody();
    Gateway::addGateway($gateway);
});

/*ACTUALIZAR GATEWAY*/ 
$app->put('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	$gateway=$app->request->getJsonRawBody();
	var_dump($gateway);
	Gateway::updateGateway($id, $gateway);
});

/*ELIMINAR GATEWAY*/
$app->delete('/api/gateway/{id:[0-9]+}', function($id) use ($app)
{
	Gateway::deleteGateway($id);
});

/***********************************************************************************/
/********************************* FIN RUTAS MIGUEL ********************************/
/***********************************************************************************/