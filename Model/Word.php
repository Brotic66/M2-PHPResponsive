<?php
/**
 * @author Brice VICO, Théo CHAMBON
 * @date 03/12/2015
 * @version 1.0.0
 */

namespace wordGame\Model;

class Word
{
    private $id;
    private $mot;
    private $poids;
    private $motFormate;
    private $def;

    /**
     * @var array
     */
    private $relsEntrant;

    /**
     * @var array
     */
    private $relsSortant;



    public function __construct()
    {
        $this->relsEntrant = array();
        $this->relsSortant = array();
    }


    /**
     * @return mixed
     */
    public function getMot()
    {
        return $this->mot;
    }

    /**
     * @param mixed $mot
     */
    public function setMot($mot)
    {
        $this->mot = $mot;
    }

    /**
     * @return mixed
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    /**
     * @return mixed
     */
    public function getMotFormate()
    {
        return $this->motFormate;
    }

    /**
     * @param mixed $motFormate
     */
    public function setMotFormate($motFormate)
    {
        $this->motFormate = $motFormate;
    }

    /**
     * @return mixed
     */
    public function getDef()
    {
        return $this->def;
    }

    /**
     * @param mixed $def
     */
    public function setDef($def)
    {
        $this->def = $def;
    }

    /**
     * @return mixed
     */
    public function getRelsEntrant()
    {
        return $this->relsEntrant;
    }

    /**
     * @param mixed $relsEntrant
     */
    public function setRelsEntrant($relsEntrant)
    {
        $this->relsEntrant = $relsEntrant;
    }

    /**
     * @param Relation $rel
     */
    public function addRelEntrant(Relation $rel)
    {
        $this->relsEntrant[] = $rel;
    }

    /**
     * @param Relation $rel
     */
    public function deleteRelEntrant(Relation $rel)
    {
        unset($this->relsEntrant[array_search($rel, $this->relsEntrant)]);
    }

    /**
     * @return mixed
     */
    public function getRelsSortant()
    {
        return $this->relsSortant;
    }

    /**
     * @param mixed $relsSortant
     */
    public function setRelsSortant($relsSortant)
    {
        $this->relsSortant = $relsSortant;
    }

    /**
     * @param Relation $rel
     */
    public function addRelSortant(Relation $rel)
    {
        $this->relsSortant[] = $rel;
    }

    /**
     * @param Relation $rel
     */
    public function deleteRelSortant(Relation $rel)
    {
        unset($this->relsSortant[array_search($rel, $this->relsSortant)]);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}