<?php
/**
 * @author Brice VICO & Theo CHAMBON
 * @date 03/12/2015
 * @version 1.0.0
 */

namespace wordGame;

include_once 'Service/XMLServiceBuilder.php';
include_once 'Model/Word.php';
include_once 'Model/Relation.php';

use wordGame\Model\Relation;
use wordGame\Model\Word;
use wordGame\Service\XMLServiceBuilder;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$affichage = 0;

if (isset($_REQUEST['terme'])) {
    $word = null;
    /* $request = new \HttpRequest('http://www.jeuxdemots.org/rezo-xml.php');

     $request->addQueryData(array(
         'gotermsubmit' => 'Chercher',
         'gotermrel' => $_REQUEST['terme'],
     ));*/
    //$result = $request->send()->getBody();
    $result = file_get_contents('rezo2.html');

    if (XMLServiceBuilder::isCache($_REQUEST['terme'])) {
        $word = XMLServiceBuilder::getCache($_REQUEST['terme']);
        echo "lol";
    }
    else {
        $service = new XMLServiceBuilder($result);
        $service->buildXML();
        $word = $service->buildWord();
    }

    $affichage = 1;
}