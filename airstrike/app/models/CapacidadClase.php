<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class CapacidadClase extends \Phalcon\Mvc\Model
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
     * @Column(column="cantidad", type="integer", length=32, nullable=false)
     */
    public $cantidad;

    /**
     *
     * @var integer
     * @Column(column="id_clases", type="integer", length=32, nullable=false)
     */
    public $id_clases;

    /**
     *
     * @var integer
     * @Column(column="modelo_avion_id", type="integer", length=32, nullable=false)
     */
    public $modelo_avion_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("capacidad_clase");
        $this->belongsTo('modelo_avion_id', '\ModeloAvion', 'id', ['alias' => 'ModeloAvion']);
        $this->belongsTo('id_clases', '\TipoClase', 'id', ['alias' => 'TipoClase']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'capacidad_clase';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CapacidadClase[]|CapacidadClase|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CapacidadClase|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_capacidad_clase()";
      $capacidadClase = new CapacidadClase();
      return new Resultset(null, $capacidadClase, $capacidadClase->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_capacidad_clase('$id')";
      $capacidadClase = new CapacidadClase();
      return new Resultset(null, $capacidadClase, $capacidadClase->getReadConnection()->query($sql));
    }

    public static function addCapacidadClase($capacidadClase)
    {
      $sql = "SELECT * FROM create_capacidad_clase(
        '$capacidadClase->cantidad',
        '$capacidadClase->id_clases',
        '$capacidadClase->modelo_avion_id')";
      $capacidadClase = new TipoPermiso();
      return new Resultset(null, $capacidadClase, $capacidadClase->getReadConnection()->query($sql));
    }

    public static function updateCapacidadClase($id, $capacidadClase)
    {
      $sql = "SELECT * FROM update_capacidad_clase(
        '$id',
        '$capacidadClase->cantidad',
        '$capacidadClase->id_clases',
        '$capacidadClase->modelo_avion_id')";
      $capacidadClase = new CapacidadClase();
      return new Resultset(null, $capacidadClase, $capacidadClase->getReadConnection()->query($sql));
    }

    public static function deleteCapacidadClase($id)
    {
      $sql = "SELECT * FROM delete_capacidad_clase('$id')";
      $capacidadClase = new CapacidadClase();
      return new Resultset(null, $capacidadClase, $capacidadClase->getReadConnection()->query($sql));
    }

}
