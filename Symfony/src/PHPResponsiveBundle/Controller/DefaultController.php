<?php

namespace PHPResponsiveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     *
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $xmlService = $this->get('php_responsive.xml_service');
            $word = null;
            //$terme = $request->request->get('terme');
            $terme = 'cat';

            /* $request = new \HttpRequest('http://www.jeuxdemots.org/rezo-xml.php');

             $request->addQueryData(array(
                 'gotermsubmit' => 'Chercher',
                 'gotermrel' => $_REQUEST['terme'],
             ));*/
            //$result = $request->send()->getBody();
            $result = file_get_contents('rezo2.html');

            if ($xmlService->isCache($request->request->get('terme'))) {
                $word = $xmlService->getCache($request->request->get('terme'));
                echo "lol";
            }
            else {
                $xmlService->buildXML($result);
                $word = $xmlService->buildWord();
            }

            $affichage = 1;

            return $this->get('brotic66_nt_angular.return')
                ->send(array('word' => $word));
        }

        return $this->get('brotic66_nt_angular.return')
            ->send(array('word' => 'test'));
    }
}
