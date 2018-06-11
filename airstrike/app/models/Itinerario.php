<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;


class Itinerario extends \Phalcon\Mvc\Model
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
     * @Column(column="fecha_creacion", type="string", nullable=false)
     */
    public $fecha_creacion;

    /**
     *
     * @var integer
     * @Column(column="origen", type="integer", length=32, nullable=false)
     */
    public $origen;

    /**
     *
     * @var integer
     * @Column(column="destino", type="integer", length=32, nullable=false)
     */
    public $destino;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("itinerario");
        $this->hasMany('id', 'DetalleVuelo', 'itinerario_id', ['alias' => 'DetalleVuelo']);
        $this->hasMany('id', 'Reservacion', 'itinerario_id', ['alias' => 'Reservacion']);
        $this->belongsTo('origen', '\Ciudad', 'codigo', ['alias' => 'Ciudad']);
        $this->belongsTo('destino', '\Ciudad', 'codigo', ['alias' => 'Ciudad']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'itinerario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itinerario[]|Itinerario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itinerario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getAll()
    {
      $sql = "SELECT * FROM get_itinerario()";
      $itinerario = new Itinerario();
      return new Resultset(null, $itinerario, $itinerario->getReadConnection()->query($sql));
    }

    public static function getById($id)
    {
      $sql = "SELECT * FROM get_itinerario('$id')";
      $itinerario = new Itinerario();
      return new Resultset(null, $itinerario, $itinerario->getReadConnection()->query($sql));
    }

    public static function addItinerario($itinerario)
    {
      $sql = "SELECT * FROM create_itinerario('$itinerario->fecha_creacion','$itinerario->origen','$itinerario->destino')";
      $itinerario = new Itinerario();
      return new Resultset(null, $itinerario, $itinerario->getReadConnection()->query($sql));
    }

    public static function updateItinerario($id, $itinerario )
    {
      $sql = "SELECT * FROM update_itinerario('$id','$itinerario->fecha_creacion','$itinerario->origen','$itinerario->destino')";
      $itinerario = new Itinerario();
      return new Resultset(null, $itinerario, $itinerario->getReadConnection()->query($sql));
    }

    public static function deleteItinerario($id)
    {
      $sql = "SELECT * FROM delete_itinerario('$id')";
      $itinerario = new Itinerario();
      return new Resultset(null, $itinerario, $itinerario->getReadConnection()->query($sql));
    }

}
