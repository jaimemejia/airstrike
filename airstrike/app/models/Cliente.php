<?php

class Cliente extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_cliente", type="integer", length=32, nullable=false)
     */
    public $id_cliente;

    /**
     *
     * @var string
     * @Column(column="primer_nombre", type="string", length=50, nullable=true)
     */
    public $primer_nombre;

    /**
     *
     * @var string
     * @Column(column="segudo_nombre", type="string", length=50, nullable=false)
     */
    public $segudo_nombre;

    /**
     *
     * @var string
     * @Column(column="primer_apellido", type="string", length=50, nullable=true)
     */
    public $primer_apellido;

    /**
     *
     * @var string
     * @Column(column="segundo_apellido", type="string", length=50, nullable=false)
     */
    public $segundo_apellido;

    /**
     *
     * @var string
     * @Column(column="tel_fijo", type="string", length=20, nullable=false)
     */
    public $tel_fijo;

    /**
     *
     * @var string
     * @Column(column="tel_movil", type="string", length=20, nullable=true)
     */
    public $tel_movil;

    /**
     *
     * @var string
     * @Column(column="direccion", type="string", length=200, nullable=true)
     */
    public $direccion;

    /**
     *
     * @var integer
     * @Column(column="num_viajero", type="integer", length=32, nullable=true)
     */
    public $num_viajero;

    /**
     *
     * @var integer
     * @Column(column="id_usuario", type="integer", nullable=false)
     */
    public $id_usuario;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("cliente");
        $this->hasMany('id_cliente', 'CEmpresa', 'id_cliente', ['alias' => 'CEmpresa']);
        $this->hasMany('id_cliente', 'CNatural', 'id_cliente', ['alias' => 'CNatural']);
        $this->hasMany('id_cliente', 'Reservacion', 'id_cliente', ['alias' => 'Reservacion']);
        $this->belongsTo('id_usuario', '\Usuario', 'id_usuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cliente';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cliente[]|Cliente|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cliente|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
