<?php

class Reservacion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="asiento_reservados", type="integer", length=32, nullable=false)
     */
    public $asiento_reservados;

    /**
     *
     * @var integer
     * @Column(column="cantidad_maletas", type="integer", length=32, nullable=false)
     */
    public $cantidad_maletas;

    /**
     *
     * @var integer
     * @Column(column="id_cliente", type="integer", length=32, nullable=false)
     */
    public $id_cliente;

    /**
     *
     * @var integer
     * @Column(column="itinerario_id", type="integer", length=32, nullable=false)
     */
    public $itinerario_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("reservacion");
        $this->hasMany('id', 'RegistroPago', 'reservacion_id', ['alias' => 'RegistroPago']);
        $this->belongsTo('itinerario_id', '\Itinerario', 'id', ['alias' => 'Itinerario']);
        $this->belongsTo('id_cliente', '\Cliente', 'id_cliente', ['alias' => 'Cliente']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'reservacion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reservacion[]|Reservacion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reservacion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
