<?php

class RegistroPago extends \Phalcon\Mvc\Model
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
     * @Column(column="precio", type="integer", length=32, nullable=false)
     */
    public $precio;

    /**
     *
     * @var integer
     * @Column(column="fecha", type="integer", length=32, nullable=false)
     */
    public $fecha;

    /**
     *
     * @var integer
     * @Identity
     * @Column(column="reservacion_id", type="integer", nullable=false)
     */
    public $reservacion_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("registro_pago");
        $this->belongsTo('reservacion_id', '\Reservacion', 'id', ['alias' => 'Reservacion']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'registro_pago';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RegistroPago[]|RegistroPago|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RegistroPago|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
