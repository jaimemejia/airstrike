<?php

   /**
    *Inicio de rutas para Permiso
    */
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
      echo json_encode($data,JSON_PRETTY_PRINT);
    });

    $app->get('/api/permiso/{id:[0-9]+}', function($id) use ($app){

        $permisos = Permiso::getById($id);
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
      echo json_encode($data,JSON_PRETTY_PRINT);
    });

    $app->post('/api/permiso', function() use ($app){
        $permiso=$app->request->getJsonRawBody();
        Permiso::addPermiso($permiso);
    });
  /*
    $app->put('/api/tipopermiso/{id:[0-9]+}', function($id) use ($app){
        $tipoPermiso=$app->request->getJsonRawBody();
        var_dump($tipoPermiso);
        TipoPermiso::updateTipoPermiso($id, $tipoPermiso);
    });
  */
    $app->delete('/api/permiso/{id:[0-9]+}', function($id) use ($app){

        Permiso::deletePermiso($id);
    });
    /**
     *Fin de rutas para Menu
     */
