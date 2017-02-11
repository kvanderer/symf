<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class LookupController extends Controller {

	/**
	 * @Route("/lookup")
	 */
	public function LookupRoute(Request $request) {
		$domain = $request->query->get('domain');

		if ($domain) {
			return $this->redirectToRoute('domain_ip', ['domain' => $domain]);
		}

		return $this->render('lookup/index.html.twig');
	}

	/**
	 * @Route("/lookup/{domain}", name="domain_ip")
	 */
	public function LookupDomainRoute($domain) {
		$d = gethostbyname($domain);

		return $this->render('lookup/domain.html.twig', ["domain" => $d]);
	}
}