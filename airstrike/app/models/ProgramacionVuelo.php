<?php

class ProgramacionVuelo extends \Phalcon\Mvc\Model
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
     * @Column(column="avion_placa", type="string", nullable=false)
     */
    public $avion_placa;

    /**
     *
     * @var integer
     * @Column(column="gateway_id", type="integer", nullable=false)
     */
    public $gateway_id;

    /**
     *
     * @var integer
     * @Column(column="fecha", type="integer", length=32, nullable=false)
     */
    public $fecha;

    /**
     *
     * @var string
     * @Column(column="vuelo_codigo", type="string", nullable=false)
     */
    public $vuelo_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("programacion_vuelo");
        $this->hasMany('id', 'DetalleVuelo', 'programacion_vuelo_id', ['alias' => 'DetalleVuelo']);
        $this->hasMany('id', 'PrecioClase', 'programacion_vuelo_id', ['alias' => 'PrecioClase']);
        $this->belongsTo('gateway_id', '\Gateway', 'id', ['alias' => 'Gateway']);
        $this->belongsTo('avion_placa', '\Avion', 'placa', ['alias' => 'Avion']);
        $this->belongsTo('vuelo_codigo', '\Vuelo', 'codigo', ['alias' => 'Vuelo']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'programacion_vuelo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProgramacionVuelo[]|ProgramacionVuelo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProgramacionVuelo|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
