<?php

namespace AppBundle;


class SContainer {

	/**
	 * @param string $addr
	 * @return string
	 */
	public function hostByAddr($addr) {
		return gethostbyaddr($addr);
	}

	/**
	 * @param string $name
	 * @return string
	 */
	public function hostByName($name) {
		return gethostbyName($name);
	}
}