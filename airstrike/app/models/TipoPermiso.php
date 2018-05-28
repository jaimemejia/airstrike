<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class TipoPermiso extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=32, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=50, nullable=false)
     */
    public $nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("tipo_permiso");
        $this->hasMany('id', 'Permiso', 'tipo_permiso_id', ['alias' => 'Permiso']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipo_permiso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoPermiso[]|TipoPermiso|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipoPermiso|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_tipo_permiso()";
      $tipoPermiso = new TipoPermiso();
      return new Resultset(null, $tipoPermiso, $tipoPermiso->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_tipo_permiso('$id')";
      $tipoPermiso = new TipoPermiso();
      return new Resultset(null, $tipoPermiso, $tipoPermiso->getReadConnection()->query($sql));
    }

    public static function addTipoPermiso($tipoPermiso)
    {
      $sql = "SELECT * FROM create_tipo_permiso('$tipoPermiso->nombre')";
      $tipoPermiso = new TipoPermiso();
      return new Resultset(null, $tipoPermiso, $tipoPermiso->getReadConnection()->query($sql));
    }

    public static function updateTipoPermiso($id, $tipoPermiso )
    {
      $sql = "SELECT * FROM update_tipo_permiso('$id','$tipoPermiso->nombre')";
      $tipoPermiso = new TipoPermiso();
      return new Resultset(null, $tipoPermiso, $tipoPermiso->getReadConnection()->query($sql));
    }

    public static function deleteTipoPermiso($id)
    {
      $sql = "SELECT * FROM delete_tipo_permiso('$id')";
      $tipoPermiso = new TipoPermiso();
      return new Resultset(null, $tipoPermiso, $tipoPermiso->getReadConnection()->query($sql));
    }

}
