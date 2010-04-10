<?php

/**
 * a class that takes an address or partial address and returns an object with
 * detailed information on the specified address. requires a google maps api key
 */
class googleMapLocation
{
	/**
	 * setup a simple lightweight object that takes an address string and gets
	 * more information about it using the google maps api
	 * 
	 * @param string $address the address passed to google
	 * @param string $api_key the google maps api key for the current domain
	 */
	public function __construct($address, $api_key)
	{
		// set the name(address passed) and api key of our object
		$this->name = $address;
		$this->api_key = $api_key;
		
		$this->google_url = sprintf(
			'http://maps.google.com/maps/geo?q=%s&sensor=false&oe=utf8&gl=en&output=xml&key=%s',
			urlencode($this->name),
			$this->api_key
		);
		
		// get the xml and process it
		$xml = file_get_contents($this->google_url, "r");
		$this->processXml($xml);
	}
	
	/**
	 * process the xml returned by google
	 * 
	 * @param string $xml the xml string to be processed
	 */
	protected function processXml($xml)
	{
		// parse the xml using simplexml
		$data = simplexml_load_string($xml);
		
		// all the information we need is stored within the placemark obj
		$placemark = $data->Response->Placemark;
		
		// note that the simplexml objects must be cast into strings
		
		// address
		$this->address = (string) $placemark->address;
		
		// address details
		$addrDetails = $placemark->AddressDetails;
		
		// country
		$country = $addrDetails->Country;
		$this->country = (string) $country->CountryNameCode;
		$this->country_name = (string) $country->CountryName;
		
		//state
		$state = $country->AdministrativeArea;
		$this->state = (string) $state->AdministrativeAreaName;
		
		// county
		$county = $state->SubAdministrativeArea;
		$this->county = (string) $county->SubAdministrativeAreaName;
		
		// city
		$city = $county->Locality;
		$this->city = (string) $city->LocalityName;
		
		// zip
		$zip = $city->PostalCode;
		$this->zip = (string) $zip->PostalCodeNumber;
		
		// coordinates
		$coords = explode(',', $placemark->Point->coordinates);
		$this->latitude = (string) $coords[0];
		$this->longitude = (string) $coords[1];
	}
}