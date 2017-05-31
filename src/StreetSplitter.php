<?php

namespace Inkl\AddressUtils;

class StreetSplitter
{

	/**
	 * Split single line in street and house number
	 * @param string $street
	 * @return array
	 */
	public function split($street)
	{
		$street = $this->removeSpaceFromCharStreetNumber(trim($street));

		if (preg_match('/[\d]+[a-zA-Z]{0,1}$/is', $street, $results))
		{
			$streetNumber = current($results);
			$street = trim(substr($street, 0, (strlen($streetNumber) * -1)));

			return [$street, $streetNumber];
		}

		return [$street, '-'];
	}

	private function removeSpaceFromCharStreetNumber($street)
	{
		if (preg_match('/ [a-zA-Z]{1}$/is', $street, $results))
		{
			$street = substr($street, 0, -2) . trim(current($results));
		}

		return $street;
	}

}