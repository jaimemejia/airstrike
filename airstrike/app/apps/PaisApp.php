<?php

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
