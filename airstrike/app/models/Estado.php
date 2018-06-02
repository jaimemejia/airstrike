<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Estado extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="nombre", type="integer", length=32, nullable=false)
     */
    public $nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("estado");
        $this->hasMany('id', 'Usuario', 'id_estado', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'estado';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Estado[]|Estado|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Estado|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_estado()";
      $estado = new Estado();
      return new Resultset(null, $estado, $estado->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_estado('$id')";
      $estado = new Estado();
      return new Resultset(null, $estado, $estado->getReadConnection()->query($sql));
    }

    public static function addEstado($estado)
    {
      $sql = "SELECT * FROM create_estado('$estado->nombre')";
      $estado = new Estado();
      return new Resultset(null, $estado, $estado->getReadConnection()->query($sql));
    }

    public static function updateEstado($id, $estado )
    {
      $sql = "SELECT * FROM update_estado('$id','$estado->nombre')";
      $estado = new Estado();
      return new Resultset(null, $estado, $estado->getReadConnection()->query($sql));
    }

    public static function deleteEstado($id)
    {
      $sql = "SELECT * FROM delete_estado('$id')";
      $estado = new Estado();
      return new Resultset(null, $estado, $estado->getReadConnection()->query($sql));
    }
}
