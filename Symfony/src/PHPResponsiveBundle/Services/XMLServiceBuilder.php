<?php
/**
 * @author Brice VICO, Théo CHAMBON
 * @date 03/12/2015
 * @version 1.0.0
 */

namespace PHPResponsiveBundle\Services;

use PHPResponsiveBundle\Word\Relation;
use PHPResponsiveBundle\Word\Word;

class XMLServiceBuilder
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var \DOMDocument
     */
    private $dom;

    /**
     * @var Word
     */
    private $word;

    /**
     * XMLService constructor.
     */
    public function __construct()
    {
        $this->dom = new \DOMDocument();
        $this->word = new Word();
    }

    /**
     * @param $body
     */
    public function buildXML($body)
    {
        $this->body = $body;

        $utf8Body = utf8_encode($this->body);
        $afterJdm = explode('<code>', $utf8Body);
        $xml = explode('</code>', $afterJdm[1]);

        //echo '<textarea>' . $xml[0] . '</textarea>';
        $this->dom->loadXML(str_replace('<br>', '<br />', $xml[0]));
    }

    /**
     * @return Word
     */
    public function buildWord()
    {
        $mot = $this->dom->getElementsByTagName('mot')->item(0);
        //print_r($this->dom);
        $motFormate = $this->dom->getElementsByTagName('mot-formate')->item(0);
        $sortants = $this->dom->getElementsByTagName('sortant')->item(0);
        $entrants = $this->dom->getElementsByTagName('entrant')->item(0);

        $this->word->setMot($mot->nodeValue);
        $this->word->setMotFormate($motFormate->nodeValue);
        $this->word->setPoids($mot->attributes->getNamedItem('poids')->nodeValue);
        $this->word->setId($mot->attributes->getNamedItem('id')->nodeValue);

        $this->buildEntrants($entrants);
        $this->buildSortants($sortants);

        $this->createCache();

        return $this->word;
    }

    /**
     * @param \DOMNode $entrants
     */
    private function buildEntrants(\DOMNode $entrants)
    {
        foreach ($entrants->childNodes as $entrant) {
            if ($entrant->nodeName == 'rel') {
                $rel = new Relation();

                $rel->setNom($entrant->nodeValue);
                $rel->setType($entrant->attributes->getNamedItem('type')->nodeValue);
                $rel->setPoids($entrant->attributes->getNamedItem('poids')->nodeValue);
                $rel->setTid($entrant->attributes->getNamedItem('tid')->nodeValue);
                
                $this->word->addRelEntrant($rel);
            }
        }
    }

    /**
     * @param \DOMNode $sortants
     */
    private function buildSortants(\DOMNode $sortants)
    {
        foreach ($sortants->childNodes as $sortant) {
            if ($sortant->nodeName == 'rel') {
                $rel = new Relation();

                $rel->setNom($sortant->nodeValue);
                $rel->setType($sortant->attributes->getNamedItem('type'));
                $rel->setPoids($sortant->attributes->getNamedItem('poids'));
                $rel->setTid($sortant->attributes->getNamedItem('tid'));

                $this->word->addRelEntrant($rel);
            }
        }
    }

    private function getWord()
    {
        return $this->word;
    }

    public function createCache()
    {
        $s = serialize($this->word);
        //file_put_contents(__DIR__ . '/../Cache/' . $this->word->getMot() . '.cache', $s);
        file_put_contents('Cache/' . $this->word->getMot() . '.cache', $s);
    }

    public function isCache($terme)
    {
        //if (file_exists(__DIR__ . 'Cache/' . $terme . '.cache'))
        if (file_exists('Cache/' . $terme . '.cache'))
            return true;
        else
            return false;
    }

    public function getCache($terme)
    {
        //return unserialize(file_get_contents(__DIR__ . '/../Cache/' . $terme . '.cache'));
        return unserialize(file_get_contents('Cache/' . $terme . '.cache'));
    }
}
