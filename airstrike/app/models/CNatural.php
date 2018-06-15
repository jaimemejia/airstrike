<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
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

     public static function getAll()
        {
          $sql = "SELECT * FROM get_c_natural()";
          $cnatural = new CNatural();
          return new Resultset(null, $cnatural, $cnatural->getReadConnection()->query($sql));
        }

      public static function getById($id)
        {
          $sql = "SELECT * FROM get_c_natural('$id')";
          $cnatural = new CNatural();
          return new Resultset(null, $cnatural, $cnatural->getReadConnection()->query($sql));
        }

        public static function addCNatural($cnatural)
        {
          $sql = "SELECT * FROM create_c_natural('$cnatural->estado_civil','$cnatural->genero','$cnatural->fecha_nacimiento', '$cnatural->tipo_doc','$cnatural->num_doc','$cnatural->id_cliente')";
            $cnatural = new CNatural();
          return new Resultset(null, $cnatural, $cnatural->getReadConnection()->query($sql));
        }

        public static function updateCNatural($id, $cnatural )
        {
          $sql = "SELECT * FROM update_c_natural('$id','$cnatural->estado_civil','$cnatural->genero','$cnatural->fecha_nacimiento', '$cnatural->tipo_doc','$cnatural->num_doc','$cnatural->id_cliente')";
          $cnatural = new CNatural();
          return new Resultset(null, $cnatural, $cnatural->getReadConnection()->query($sql));
        }

        public static function deleteCNatural($id)
        {
          $sql = "SELECT * FROM delete_c_natural('$id')";
          $cnatural = new CNatural();
          return new Resultset(null, $cnatural, $cnatural->getReadConnection()->query($sql));
        }

}
