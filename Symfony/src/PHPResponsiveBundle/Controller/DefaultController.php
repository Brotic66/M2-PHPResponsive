<?php

namespace PHPResponsiveBundle\Controller;

use Brotic66\NTAngularBundle\Controller\NTAngularController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends NTAngularController
{
    /**
     * @Route("/{terme}")
     *
     * @param Request $requestPost
     * @return Response
     * @internal param Request $request
     */
    public function indexAction(Request $requestPost, $terme)
    {
        //if ($requestPost->getMethod() == 'POST') {
            $xmlService = $this->get('php_responsive.xml_service');
            $word = null;
            //$terme = $requestPost->request->get('terme');
            //$terme = 'chat';

            /* $request = new \HttpRequest('http://www.jeuxdemots.org/rezo-xml.php');

             $request->addQueryData(array(
                 'gotermsubmit' => 'Chercher',
                 'gotermrel' => $terme,
             )); */

            //$result = $request->send()->getBody();
            //$result = file_get_contents('rezo2.html');

            if ($xmlService->isCache($terme)) {
                $word = $xmlService->getCache($terme);
                //echo "lol";
            }
            else {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'http://www.jeuxdemots.org/rezo-xml.php?gotermsubmit=Chercher&gotermrel=' . $terme );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_HEADER, 1);
                $result = curl_exec($ch);
                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $result = substr($result, $header_size);

                $xmlService->buildXML($result);
                $word = $xmlService->buildWord();
            }

            return $this->NTRender(array('word' => $word));
      /*  }

        return $this->NTRender(array('word' => null));*/
    }
}
