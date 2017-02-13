<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WhoIsController extends Controller {
	/**
	 * @Route("/whois")
	 */
	public function WhoisRoute(Request $request) {
		$ip = $request->query->get('ip');

		if ($ip) {
			return $this->redirectToRoute('ip_domain', ['ip' => $ip]);
		}

		return $this->render('whois/index.html.twig');
	}

	/**
	 * @Route("/whois/{ip}", name="ip_domain")
	 */
	public function WhoisIPRoute($ip) {
		$scontainer = $this->get('scontainer');
		$ip = $scontainer->hostByAddr($ip);

		if (filter_var($ip, FILTER_VALIDATE_IP)) {
			$ip = 'Failed to find domain name';
		}

		return $this->render('whois/ip.html.twig', ["ip" => $ip]);
	}
}