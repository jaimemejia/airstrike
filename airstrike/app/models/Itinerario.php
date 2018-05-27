<?php

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

}
