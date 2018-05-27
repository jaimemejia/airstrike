<?php

class PgStatStatements extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="userid", type="string", nullable=true)
     */
    public $userid;

    /**
     *
     * @var string
     * @Column(column="dbid", type="string", nullable=true)
     */
    public $dbid;

    /**
     *
     * @var integer
     * @Column(column="queryid", type="integer", nullable=true)
     */
    public $queryid;

    /**
     *
     * @var string
     * @Column(column="query", type="string", nullable=true)
     */
    public $query;

    /**
     *
     * @var integer
     * @Column(column="calls", type="integer", nullable=true)
     */
    public $calls;

    /**
     *
     * @var string
     * @Column(column="total_time", type="string", length=53, nullable=true)
     */
    public $total_time;

    /**
     *
     * @var string
     * @Column(column="min_time", type="string", length=53, nullable=true)
     */
    public $min_time;

    /**
     *
     * @var string
     * @Column(column="max_time", type="string", length=53, nullable=true)
     */
    public $max_time;

    /**
     *
     * @var string
     * @Column(column="mean_time", type="string", length=53, nullable=true)
     */
    public $mean_time;

    /**
     *
     * @var string
     * @Column(column="stddev_time", type="string", length=53, nullable=true)
     */
    public $stddev_time;

    /**
     *
     * @var integer
     * @Column(column="rows", type="integer", nullable=true)
     */
    public $rows;

    /**
     *
     * @var integer
     * @Column(column="shared_blks_hit", type="integer", nullable=true)
     */
    public $shared_blks_hit;

    /**
     *
     * @var integer
     * @Column(column="shared_blks_read", type="integer", nullable=true)
     */
    public $shared_blks_read;

    /**
     *
     * @var integer
     * @Column(column="shared_blks_dirtied", type="integer", nullable=true)
     */
    public $shared_blks_dirtied;

    /**
     *
     * @var integer
     * @Column(column="shared_blks_written", type="integer", nullable=true)
     */
    public $shared_blks_written;

    /**
     *
     * @var integer
     * @Column(column="local_blks_hit", type="integer", nullable=true)
     */
    public $local_blks_hit;

    /**
     *
     * @var integer
     * @Column(column="local_blks_read", type="integer", nullable=true)
     */
    public $local_blks_read;

    /**
     *
     * @var integer
     * @Column(column="local_blks_dirtied", type="integer", nullable=true)
     */
    public $local_blks_dirtied;

    /**
     *
     * @var integer
     * @Column(column="local_blks_written", type="integer", nullable=true)
     */
    public $local_blks_written;

    /**
     *
     * @var integer
     * @Column(column="temp_blks_read", type="integer", nullable=true)
     */
    public $temp_blks_read;

    /**
     *
     * @var integer
     * @Column(column="temp_blks_written", type="integer", nullable=true)
     */
    public $temp_blks_written;

    /**
     *
     * @var string
     * @Column(column="blk_read_time", type="string", length=53, nullable=true)
     */
    public $blk_read_time;

    /**
     *
     * @var string
     * @Column(column="blk_write_time", type="string", length=53, nullable=true)
     */
    public $blk_write_time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("pg_stat_statements");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pg_stat_statements';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PgStatStatements[]|PgStatStatements|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PgStatStatements|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
