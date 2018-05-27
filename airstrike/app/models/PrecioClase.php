<?php

class PrecioClase extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="tipo_clase_id", type="integer", length=32, nullable=false)
     */
    public $tipo_clase_id;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="programacion_vuelo_id", type="integer", length=32, nullable=false)
     */
    public $programacion_vuelo_id;

    /**
     *
     * @var double
     * @Column(column="precio", type="double", length=10, nullable=false)
     */
    public $precio;

    /**
     *
     * @var double
     * @Column(column="precio_maleta", type="double", length=10, nullable=false)
     */
    public $precio_maleta;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("precio_clase");
        $this->belongsTo('tipo_clase_id', '\TipoClase', 'id', ['alias' => 'TipoClase']);
        $this->belongsTo('programacion_vuelo_id', '\ProgramacionVuelo', 'id', ['alias' => 'ProgramacionVuelo']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'precio_clase';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PrecioClase[]|PrecioClase|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PrecioClase|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
