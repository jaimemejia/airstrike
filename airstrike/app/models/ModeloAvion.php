<?php

class ModeloAvion extends \Phalcon\Mvc\Model
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
     * @Column(column="nombre_modelo", type="string", length=50, nullable=false)
     */
    public $nombre_modelo;

    /**
     *
     * @var string
     * @Column(column="marca", type="string", length=50, nullable=false)
     */
    public $marca;

    /**
     *
     * @var integer
     * @Column(column="cantidad_maleta", type="integer", length=32, nullable=false)
     */
    public $cantidad_maleta;

    /**
     *
     * @var integer
     * @Column(column="cantidad_asientos", type="integer", length=32, nullable=false)
     */
    public $cantidad_asientos;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("modelo_avion");
        $this->hasMany('id', 'Avion', 'modelo_avion_id', ['alias' => 'Avion']);
        $this->hasMany('id', 'CapacidadClase', 'modelo_avion_id', ['alias' => 'CapacidadClase']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'modelo_avion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ModeloAvion[]|ModeloAvion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ModeloAvion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
