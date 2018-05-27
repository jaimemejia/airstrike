<?php

class LineaAerea extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="codigo", type="integer", nullable=false)
     */
    public $codigo;

    /**
     *
     * @var string
     * @Column(column="nombre_oficial", type="string", nullable=false)
     */
    public $nombre_oficial;

    /**
     *
     * @var string
     * @Column(column="nombre_corto", type="string", nullable=false)
     */
    public $nombre_corto;

    /**
     *
     * @var string
     * @Column(column="representante", type="string", nullable=false)
     */
    public $representante;

    /**
     *
     * @var string
     * @Column(column="fecha_fundacion", type="string", nullable=false)
     */
    public $fecha_fundacion;

    /**
     *
     * @var string
     * @Column(column="pais_codigo", type="string", nullable=false)
     */
    public $pais_codigo;

    /**
     *
     * @var integer
     * @Column(column="correo_electronico", type="integer", length=32, nullable=false)
     */
    public $correo_electronico;

    /**
     *
     * @var integer
     * @Column(column="pagina_web", type="integer", length=32, nullable=false)
     */
    public $pagina_web;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("linea_aerea");
        $this->hasMany('codigo', 'Avion', 'linea_aerea_codigo', ['alias' => 'Avion']);
        $this->hasMany('codigo', 'Contacto', 'linea_aerea_codigo', ['alias' => 'Contacto']);
        $this->hasMany('codigo', 'Vuelo', 'linea_aerea_codigo', ['alias' => 'Vuelo']);
        $this->belongsTo('pais_codigo', '\Pais', 'codigo', ['alias' => 'Pais']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'linea_aerea';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LineaAerea[]|LineaAerea|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LineaAerea|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
