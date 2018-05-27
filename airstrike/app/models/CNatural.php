<?php

class CNatural extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_natural", type="integer", length=32, nullable=false)
     */
    public $id_natural;

    /**
     *
     * @var string
     * @Column(column="estado_civil", type="string", length=15, nullable=true)
     */
    public $estado_civil;

    /**
     *
     * @var string
     * @Column(column="genero", type="string", length=1, nullable=true)
     */
    public $genero;

    /**
     *
     * @var string
     * @Column(column="fecha_nacimiento", type="string", nullable=true)
     */
    public $fecha_nacimiento;

    /**
     *
     * @var string
     * @Column(column="tipo_doc", type="string", length=50, nullable=false)
     */
    public $tipo_doc;

    /**
     *
     * @var string
     * @Column(column="num_doc", type="string", length=50, nullable=false)
     */
    public $num_doc;

    /**
     *
     * @var integer
     * @Column(column="id_cliente", type="integer", length=32, nullable=false)
     */
    public $id_cliente;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("c_natural");
        $this->belongsTo('id_cliente', '\Cliente', 'id_cliente', ['alias' => 'Cliente']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'c_natural';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CNatural[]|CNatural|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CNatural|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
