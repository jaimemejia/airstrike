<?php

use Phalcon\Http\Response;

/*OBTENER TODAS LAS PROGRAMACIONES*/
$app->get('/api/programacion_vuelo', function() use ($app)
{
	$programaciones_vuelos = ProgramacionVuelo::getAll();
	$data = array();
	foreach ($programaciones_vuelos as $programacion_vuelo)
	{
	  $data[]=array
	  (
		'id' => $programacion_vuelo->id,
		'avion_placa' => $programacion_vuelo->avion_placa,
		'gateway_id' => $programacion_vuelo->gateway_id,
		'fecha' => $programacion_vuelo->fecha,
		'vuelo_codigo' => $programacion_vuelo->vuelo_codigo
	  );
	}
	//echo json_encode($data,JSON_PRETTY_PRINT);
	// Create a response
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

$app->get('/api/programacion_vuelo/search', function() use ($app)
{
	// Create a response
	$response = new Response();
	$fecha_ida=$app->request->getQuery('fecha_ida');
	$fecha_regreso=$app->request->getQuery('fecha_regreso');
	$destino_ida=$app->request->getQuery('destino');
	$origen_regreso=$app->request->getQuery('destino');


	$programaciones_vuelos_destino_ida = ProgramacionVuelo::getProgramacionVueloIda($destino_ida,$fecha_ida);
	$data_destinos_ida = array();
	foreach ($programaciones_vuelos_destino_ida as $programacion_vuelo_destino_ida)
	{
		$data_destinos_ida[]=array
		(
					'nombre_clase' => $programacion_vuelo_destino_ida->nombre_clase,
					'precio_clase' => $programacion_vuelo_destino_ida->precio_clase,
					'precio_clase_maleta' => $programacion_vuelo_destino_ida->precio_clase_maleta,
					'avion_placa' => $programacion_vuelo_destino_ida->avion_placa,
					'fecha' => $programacion_vuelo_destino_ida->fecha,
					'vuelo_codigo' => $programacion_vuelo_destino_ida->vuelo_codigo,
					'vuelo_millas_reales' => $programacion_vuelo_destino_ida->vuelo_millas_reales,
					'vuelo_millas_otorgadas' => $programacion_vuelo_destino_ida->vuelo_millas_otorgadas,
					'vuelo_destino' => $programacion_vuelo_destino_ida->vuelo_destino,
					'linea_aerea_nombre_oficial' => $programacion_vuelo_destino_ida->linea_aerea_nombre_oficial,
					'linea_aerea_nombre_corto' => $programacion_vuelo_destino_ida->linea_aerea_nombre_corto,
					'linea_aerea_correo' => $programacion_vuelo_destino_ida->linea_aerea_correo,
					'linea_aerea_pagina' => $programacion_vuelo_destino_ida->linea_aerea_pagina,
					'pais_nombre' => $programacion_vuelo_destino_ida->pais_nombre,
					'pais_codigo' => $programacion_vuelo_destino_ida->pais_codigo,
					'ciudad_codigo' => $programacion_vuelo_destino_ida->ciudad_codigo,
					'ciudad_nombre' => $programacion_vuelo_destino_ida->ciudad_nombre,
					'aeropuerto_codigo' => $programacion_vuelo_destino_ida->aeropuerto_codigo,
					'aeropuerto_nombre' => $programacion_vuelo_destino_ida->aeropuerto_nombre,
					'aeropuerto_telefono' => $programacion_vuelo_destino_ida->aeropuerto_telefono,
					'horario_hora' => $programacion_vuelo_destino_ida->horario_hora,
					'horario_tiempo_abordaje' => $programacion_vuelo_destino_ida->horario_tiempo_abordaje,
					'horario_tiempo_desabordaje' => $programacion_vuelo_destino_ida->horario_tiempo_desabordaje,

		);
	}

	$programaciones_vuelos_destino_regreso = ProgramacionVuelo::getProgramacionVueloRegreso($origen_regreso,$fecha_regreso);
	$data_destinos_regreso = array();
	foreach ($programaciones_vuelos_destino_regreso as $programacion_vuelo_destino_regreso)
	{
		$data_destinos_regreso[]=array
		(
			'nombre_clase' => $programacion_vuelo_destino_regreso->nombre_clase,
			'precio_clase' => $programacion_vuelo_destino_regreso->precio_clase,
			'precio_clase_maleta' => $programacion_vuelo_destino_regreso->precio_clase_maleta,
			'avion_placa' => $programacion_vuelo_destino_regreso->avion_placa,
			'fecha' => $programacion_vuelo_destino_regreso->fecha,
			'vuelo_codigo' => $programacion_vuelo_destino_regreso->vuelo_codigo,
			'vuelo_millas_reales' => $programacion_vuelo_destino_regreso->vuelo_millas_reales,
			'vuelo_millas_otorgadas' => $programacion_vuelo_destino_regreso->vuelo_millas_otorgadas,
			'vuelo_destino' => $programacion_vuelo_destino_regreso->vuelo_destino,
			'linea_aerea_nombre_oficial' => $programacion_vuelo_destino_regreso->linea_aerea_nombre_oficial,
			'linea_aerea_nombre_corto' => $programacion_vuelo_destino_regreso->linea_aerea_nombre_corto,
			'linea_aerea_correo' => $programacion_vuelo_destino_regreso->linea_aerea_correo,
			'linea_aerea_pagina' => $programacion_vuelo_destino_regreso->linea_aerea_pagina,
			'pais_nombre' => $programacion_vuelo_destino_regreso->pais_nombre,
			'pais_codigo' => $programacion_vuelo_destino_regreso->pais_codigo,
			'ciudad_codigo' => $programacion_vuelo_destino_regreso->ciudad_codigo,
			'ciudad_nombre' => $programacion_vuelo_destino_regreso->ciudad_nombre,
			'aeropuerto_codigo' => $programacion_vuelo_destino_regreso->aeropuerto_codigo,
			'aeropuerto_nombre' => $programacion_vuelo_destino_regreso->aeropuerto_nombre,
			'aeropuerto_telefono' => $programacion_vuelo_destino_regreso->aeropuerto_telefono,
			'horario_hora' => $programacion_vuelo_destino_regreso->horario_hora,
			'horario_tiempo_abordaje' => $programacion_vuelo_destino_regreso->horario_tiempo_abordaje,
			'horario_tiempo_desabordaje' => $programacion_vuelo_destino_regreso->horario_tiempo_desabordaje,
		);
	}


	$resultado_destinos = array(
		'ida' => $data_destinos_ida,
		'regreso'=>$data_destinos_regreso
	);

	// Check if the insertion was successful
	if ( sizeof($resultado_destinos) >0 ) {
			// Change the HTTP status
			$response->setStatusCode(200, 'Succeed');
			$response->setJsonContent(
					[
							'status' => 'OK',
							'data'   => $resultado_destinos,
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


/*OBTENER PROGRAMACION POR ID*/
$app->get('/api/programacion_vuelo/{id:[0-9]+}', function($id) use ($app)
{
	$programaciones_vuelos = ProgramacionVuelo::getById($id);
	$data = array();
	foreach ($programaciones_vuelos as $programacion_vuelo)
	{
	  $data[]=array
	  (
		'id' => $programacion_vuelo->id,
		'avion_placa' => $programacion_vuelo->avion_placa,
		'gateway_id' => $programacion_vuelo->gateway_id,
		'fecha' => $programacion_vuelo->fecha,
		'vuelo_codigo' => $programacion_vuelo->vuelo_codigo
	  );
	}
	//echo json_encode($data,JSON_PRETTY_PRINT);
	// Create a response
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

/*CREAR UNA NUEVA PROGRAMACION*/
$app->post('/api/programacion_vuelo', function() use ($app)
{
    $programacion_vuelo=$app->request->getJsonRawBody();
    //ProgramacionVuelo::addProgramacion($programacion_vuelo);
	$response = new Response();
	$programacion_vuelo=$app->request->getJsonRawBody();
    var_dump($programacion_vuelo);
    if(ProgramacionVuelo::addProgramacion($programacion_vuelo)){
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

/*ACTUALIZAR PROGRAMACION*/
$app->put('/api/programacion_vuelo/{id:[0-9]+}', function($id) use ($app)
{
	$programacion_vuelo=$app->request->getJsonRawBody();
	var_dump($programacion_vuelo);
	//ProgramacionVuelo::updateProgramacion($id, $programacion_vuelo);

	$response = new Response();
	$programacion_vuelo=$app->request->getJsonRawBody();
    var_dump($programacion_vuelo);
    if(ProgramacionVuelo::updateProgramacion($id, $programacion_vuelo)){
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

/*ELIMINAR PROGRAMACION*/
$app->delete('/api/programacion_vuelo/{id:[0-9]+}', function($id) use ($app)
{
	//ProgramacionVuelo::deleteProgramacion($id);
	$response = new Response();
	$programacion_vuelo=$app->request->getJsonRawBody();
    var_dump($programacion_vuelo);
    if(ProgramacionVuelo::deleteProgramacion($id)){
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
