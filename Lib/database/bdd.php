<?php
/**
 * Created by PhpStorm.
 * User: dafonseca
 * Date: 26/07/2016
 * Time: 09:27
 */

namespace Lib\database;
use Config\Config;
use PDO;


/**
 * Class bdd
 * @package Lib\database
 */
class bdd
{
    /**
     * @var array
     */
    private $fields = [];
    /**
     * @var array
     */
    private $conditions = [];
    /**
     * @var array
     */
    private $tab = [];
    /**
     * @var array
     */
    private $from = [];
    /**
     * @var string
     */
    private $requette = '';

    /**
     * bdd constructor.
     */
    public function __construct()
    {
        try
        {
            $this->bdd = new PDO('mysql:host='. Config::Params('host') .';dbname='. Config::Params('dbName') .';charset=utf8', Config::Params('user') , Config::Params('pass'));
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

    }

    /**
     * @return $this
     */
    public function select()
    {
        $this->fields = func_get_args();
        $this->requette = 'SELECT ' . implode(', ', $this->fields);
        return $this;
    }

    /**
     * @return $this
     */
    public function insert()
    {
        // func_get_args() == function qui recupere automatiquement les paramettre de la function est les mes dans un tableaux
        $this->fields = func_get_args();
        $this->requette = 'INSERT INTO ' . $this->fields[0] . ' (' . implode(', ', $this->fields[1]) . ')';
        return $this;
    }

    /**
     * @return $this
     */
    public function update()
    {
        $this->fields = func_get_args();
        $this->requette = 'UPDATE ' . implode(', ', $this->fields);
        return $this;
    }

    /**
     * @return $this
     */
    public function values()
    {
        $this->fields = func_get_args();
        $this->requette .= ' VALUES (' . implode(', ', $this->fields) . ')';
        return $this;
    }

    /**
     * @return $this
     */
    public function set()
    {
        $this->fields = func_get_args();
        $this->requette .= ' SET ' . implode(', ', $this->fields);
        return $this;
    }


    /**
     * @return $this
     */
    public function where()
    {
        foreach (func_get_args() as $arg) {
            $this->conditions[] = $arg;
        }

        $this->requette .= ' WHERE ' . implode(' AND ', $this->conditions);
        return $this;
    }

    /**
     * @return $this
     */
    public function tab()
    {
        $this->tab[] = func_get_args();
        return $this;
    }

    /**
     * @param $table
     * @param null $alias
     * @return $this
     */
    public function from($table, $alias = null)
    {
        if (is_null($alias)) {
            $this->from[] = $table;
            $this->requette .= ' FROM ' . implode(', ', $this->from);
        } else {
            $this->from[] = "$table AS $alias";

            $this->requette .= ' FROM ' . implode(', ', $this->from);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function send()
    {

        //return $this->requette;


        $stmt = $this->bdd->prepare($this->requette);

        if (isset($this->tab[0][0]) != true) {

            $this->tab[0][0] = null;

        }
        $stmt->execute($this->tab[0][0]);

        return $stmt->fetchAll();
    }
}