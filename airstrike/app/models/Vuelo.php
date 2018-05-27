<?php

class Vuelo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="codigo", type="string", nullable=false)
     */
    public $codigo;

    /**
     *
     * @var double
     * @Column(column="millas_reales", type="double", length=10, nullable=false)
     */
    public $millas_reales;

    /**
     *
     * @var double
     * @Column(column="millas_otorgadas", type="double", length=10, nullable=false)
     */
    public $millas_otorgadas;

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
     *
     * @var integer
     * @Column(column="linea_aerea_codigo", type="integer", nullable=false)
     */
    public $linea_aerea_codigo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("vuelo");
        $this->hasMany('codigo', 'ProgramacionVuelo', 'vuelo_codigo', ['alias' => 'ProgramacionVuelo']);
        $this->belongsTo('origen', '\Ciudad', 'codigo', ['alias' => 'Ciudad']);
        $this->belongsTo('linea_aerea_codigo', '\LineaAerea', 'codigo', ['alias' => 'LineaAerea']);
        $this->belongsTo('destino', '\Ciudad', 'codigo', ['alias' => 'Ciudad']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vuelo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vuelo[]|Vuelo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vuelo|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
