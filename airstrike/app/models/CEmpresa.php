<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class CEmpresa extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_c_empresa", type="integer", length=32, nullable=false)
     */
    public $id_c_empresa;

    /**
     *
     * @var string
     * @Column(column="nombre_empresa", type="string", length=100, nullable=true)
     */
    public $nombre_empresa;

    /**
     *
     * @var string
     * @Column(column="nit", type="string", length=17, nullable=true)
     */
    public $nit;

    /**
     *
     * @var string
     * @Column(column="nic", type="string", length=25, nullable=true)
     */
    public $nic;

    /**
     *
     * @var string
     * @Column(column="nombre_contacto", type="string", length=150, nullable=true)
     */
    public $nombre_contacto;

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
        $this->setSource("c_empresa");
        $this->belongsTo('id_cliente', '\Cliente', 'id_cliente', ['alias' => 'Cliente']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'c_empresa';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CEmpresa[]|CEmpresa|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CEmpresa|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

     public static function getAll()
        {
          $sql = "SELECT * FROM get_c_empresa()";
          $cempresa = new CEmpresa();
          return new Resultset(null, $cempresa, $cempresa->getReadConnection()->query($sql));
        }

      public static function getById($id)
        {
          $sql = "SELECT * FROM get_c_empresa('$id')";
          $cempresa = new CEmpresa();
          return new Resultset(null, $cempresa, $cempresa->getReadConnection()->query($sql));
        }

        public static function addCEmpresa($cempresa)
        {
          $sql = "SELECT * FROM create_c_empresa(
           '$cempresa->nombre_empresa',
            '$cempresa->nit',
            '$cempresa->nic',
            '$cempresa->nombre_contacto',
            '$cempresa->id_cliente')";
            $cempresa = new CEmpresa();
          return new Resultset(null, $cempresa, $cempresa->getReadConnection()->query($sql));
        }

        public static function updateCEmpresa($id, $cempresa )
        {
          $sql = "SELECT * FROM update_c_empresa(
            '$id',
            '$cempresa->nombre_empresa',
            '$cempresa->nit',
            '$cempresa->nic',
            '$cempresa->nombre_contacto',
            '$cempresa->id_cliente')";
          $cempresa = new CEmpresa();
          return new Resultset(null, $cempresa, $cempresa->getReadConnection()->query($sql));
        }

        public static function deleteCEmpresa($id)
        {
          $sql = "SELECT * FROM delete_c_empresa('$id')";
          $cempresa = new CEmpresa();
          return new Resultset(null, $cempresa, $cempresa->getReadConnection()->query($sql));
        }



}
