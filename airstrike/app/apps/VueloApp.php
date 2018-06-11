<?php

/*OBTENER TODOS LOS VUELOS*/
$app->get('/api/vuelo', function() use ($app)
{
	$vuelos = Vuelo::getAll();
	$data = array();
	foreach ($vuelos as $vuelo)
	{
	  $data[]=array
	  (
		'codigo' => $vuelo->codigo,
		'millas_reales' => $vuelo->millas_reales,
		'millas_otorgadas' => $vuelo->millas_otorgadas,
		'origen' => $vuelo->origen,
		'destino' => $vuelo->destino,
		'linea_aerea_codigo' => $vuelo->linea_aerea_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*OBTENER VUELO POR CODIGO*/
$app->get('/api/vuelo/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$vuelos = Vuelo::getByCodigo($codigo);
	$data = array();
	foreach ($vuelos as $vuelo)
	{
	  $data[]=array
	  (
		'codigo' => $vuelo->codigo,
		'millas_reales' => $vuelo->millas_reales,
		'millas_otorgadas' => $vuelo->millas_otorgadas,
		'origen' => $vuelo->origen,
		'destino' => $vuelo->destino,
		'linea_aerea_codigo' => $vuelo->linea_aerea_codigo
	  );
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
});

/*CREAR UN NUEVO VUELO*/
$app->post('/api/vuelo', function() use ($app)
{
    $vuelo=$app->request->getJsonRawBody();
    Vuelo::addVuelo($vuelo);
});

/*ACTUALIZAR VUELO*/
$app->put('/api/vuelo/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	$vuelo=$app->request->getJsonRawBody();
	var_dump($vuelo);
	Vuelo::updateVuelo($codigo, $vuelo);
});

/*ELIMINAR VUELO*/
$app->delete('/api/vuelo/{codigo:[a-zA-Z]+}', function($codigo) use ($app)
{
	Vuelo::deleteVuelo($codigo);
});