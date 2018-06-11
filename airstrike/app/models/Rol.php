<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Rol extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="tipo", type="integer", length=32, nullable=false)
     */
    public $tipo;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", nullable=false)
     */
    public $nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("rol");
        $this->hasMany('tipo', 'Permiso', 'rol_tipo', ['alias' => 'Permiso']);
        $this->hasMany('tipo', 'Usuario', 'id_rol', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'rol';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rol[]|Rol|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rol|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_rol()";
      $rol = new Rol();
      return new Resultset(null, $rol, $rol->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_rol('$id')";
      $rol = new Rol();
      return new Resultset(null, $rol, $rol->getReadConnection()->query($sql));
    }

    public static function addRol($rol)
    {
      $sql = "SELECT * FROM create_rol('$rol->tipo','$rol->nombre')";
      $rol = new Rol();
      return new Resultset(null, $rol, $rol->getReadConnection()->query($sql));
    }

    public static function updateRol($id, $rol )
    {
      if(empty($rol->tipo))
      {
        $sql = "SELECT * FROM update_rol('$id',null,'$rol->nombre')";
      }
      elseif (empty($rol->nombre)) {
        $sql = "SELECT * FROM update_rol('$id','$rol->tipo',null)";
      }
      else {
        $sql = "SELECT * FROM update_rol('$id','$rol->tipo','$rol->nombre')";
      }

      $rol = new Rol();
      return new Resultset(null, $rol, $rol->getReadConnection()->query($sql));
    }

    public static function deleteRol($id)
    {
      $sql = "SELECT * FROM delete_rol('$id')";
      $rol = new Rol();
      return new Resultset(null, $rol, $rol->getReadConnection()->query($sql));
    }

}
