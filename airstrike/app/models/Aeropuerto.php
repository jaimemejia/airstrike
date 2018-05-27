<?php

class Aeropuerto extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="codigo", type="string", length=8, nullable=false)
     */
    public $codigo;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=100, nullable=true)
     */
    public $nombre;

    /**
     *
     * @var string
     * @Column(column="telefono", type="string", length=16, nullable=false)
     */
    public $telefono;

    /**
     *
     * @var integer
     * @Column(column="bahias", type="integer", length=32, nullable=false)
     */
    public $bahias;

    /**
     *
     * @var integer
     * @Column(column="ciudad_codigo", type="integer", length=32, nullable=false)
     */
    public $ciudad_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("aeropuerto");
        $this->hasMany('codigo', 'Gateway', 'aeropuerto_codigo', ['alias' => 'Gateway']);
        $this->belongsTo('ciudad_codigo', '\Ciudad', 'codigo', ['alias' => 'Ciudad']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'aeropuerto';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aeropuerto[]|Aeropuerto|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aeropuerto|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
