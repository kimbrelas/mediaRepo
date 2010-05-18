<?php

/**
 * a class that takes an address or partial address and returns an object with
 * detailed information on the specified address. requires a google maps api key
 */
class googleMapLocation
{
  // all available properties
  protected $_data = array(
    'name'         => null,
    'api_key'      => null,
    'google_url'   => null,
    'address'      => null,
    'country'      => null,
    'country_name' => null,
    'state'        => null,
    'county'       => null,
    'city'         => null,
    'zip'          => null,
    'latitude'     => null,
    'longitude'    => null
  );
  
  /**
   * return properties from data array
   * 
   * @param string $name the name of the property
  */
  public function __get($name)
  {
    return isset($this->_data[$name]) ? $this->_data[$name] : null;
  }
  
  /**
   * setup a simple lightweight object that takes an address string and gets
   * more information about it using the google maps api
   * 
   * @param string $address the address passed to google
   * @param string $api_key the google maps api key for the current domain
   */
  public function __construct($address, $api_key)
  {
    // name(address) and api_key
    $this->_data['name'] = $address;
    $this->_data['api_key'] = $api_key;
    
    // generate the google_url to call
    $this->_data['google_url'] = sprintf('http://maps.google.com/maps/geo?q=%s&sensor=false&oe=utf8&gl=en&output=xml&key=%s', $address, $api_key);
    
    // get the xml and process it
    $xml = $this->getXml();
    $this->processXml($xml);
  }
  
  /*
   * post to google and return the xml it sends us back
   * 
   * @param string $url the base google url
   * @param string $params the configuration parameters
   */
  protected function getXml()
  {
    // use curl to retrieve the google maps xml data
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $this->google_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_POST, 1);
    $xml = curl_exec($curl);
    
    return $xml;
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
    $this->_data['address'] = (string) $placemark->address;
    
    // country
    $country = $placemark->AddressDetails->Country;
    $this->_data['country'] = (string) $country->CountryNameCode;
    $this->_data['country_name'] = (string) $country->CountryName;
    
    //state
    $state = $country->AdministrativeArea;
    $this->_data['state'] = (string) $state->AdministrativeAreaName;
    
    // county
    $county = $state->SubAdministrativeArea;
    $this->_data['county'] = (string) $county->SubAdministrativeAreaName;
    
    // city
    $city = $county->Locality;
    $this->_data['city'] = (string) $city->LocalityName;
    
    // zip
    $zip = $city->PostalCode;
    $this->_data['zip'] = (string) $zip->PostalCodeNumber;
    
    // coordinates
    $coords = explode(',', $placemark->Point->coordinates);
    $this->_data['latitude'] = (string) $coords[0];
    $this->_data['longitude'] = (string) $coords[1];
  }
}