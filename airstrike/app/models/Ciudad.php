<?php

class Ciudad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="codigo", type="integer", length=32, nullable=false)
     */
    public $codigo;

    /**
     *
     * @var integer
     * @Column(column="nombre", type="integer", length=32, nullable=false)
     */
    public $nombre;

    /**
     *
     * @var string
     * @Column(column="pais_codigo", type="string", nullable=false)
     */
    public $pais_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("ciudad");
        $this->hasMany('codigo', 'Aeropuerto', 'ciudad_codigo', ['alias' => 'Aeropuerto']);
        $this->hasMany('codigo', 'Itinerario', 'origen', ['alias' => 'Itinerario']);
        $this->hasMany('codigo', 'Itinerario', 'destino', ['alias' => 'Itinerario']);
        $this->hasMany('codigo', 'Vuelo', 'origen', ['alias' => 'Vuelo']);
        $this->hasMany('codigo', 'Vuelo', 'destino', ['alias' => 'Vuelo']);
        $this->belongsTo('pais_codigo', '\Pais', 'codigo', ['alias' => 'Pais']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ciudad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ciudad[]|Ciudad|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ciudad|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
