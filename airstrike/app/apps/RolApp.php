<?php

     /**
      *Inicio de rutas para Rol
     */
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
       echo json_encode($data,JSON_PRETTY_PRINT);
     });

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
       echo json_encode($data,JSON_PRETTY_PRINT);
     });

     $app->post('/api/rol', function() use ($app){
         $rol=$app->request->getJsonRawBody();
         Rol::addRol($rol);
     });
   /*
     $app->put('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){
         $tipoPermiso=$app->request->getJsonRawBody();
         var_dump($tipoPermiso);
         TipoPermiso::updateTipoPermiso($id, $tipoPermiso);
     });
   */
     $app->delete('/api/rol/{id:[0-9]+}', function($id) use ($app){

         Rol::deleteRol($id);
     });
     /**
      *Fin de rutas para Rol
     */
