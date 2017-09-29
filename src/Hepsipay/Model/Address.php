<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model;

class Address extends BaseModel
{
    private $name;
    private $address;
    private $country;
    private $countryCode;
    private $city;
    private $cityCode;
    private $zipCode;
    private $district;
    private $districtCode;
    private $shippingCompany;
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        
        return $this;
    }
    
    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        
        return $this;
    }
    
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        
        return $this;
    }
    
    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        
        return $this;
    }
    
    public function getCityCode()
    {
        return $this->cityCode;
    }

    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;
        
        return $this;
    }
    
    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        
        return $this;
    }
    
    public function getDistrict()
    {
        return $this->district;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
        
        return $this;
    }
    
    public function getDistrictCode()
    {
        return $this->districtCode;
    }

    public function setDistrictCode($districtCode)
    {
        $this->districtCode = $districtCode;
        
        return $this;
    }

    public function getShippingCompany()
    {
        return $this->shippingCompany;
    }

    public function setShippingCompany($shippingCompany)
    {
        $this->shippingCompany = $shippingCompany;
        
        return $this;
    }
    
    public function toArray()
    {
        return array(
                "Name" => $this->getName(),
                "Address" => $this->getAddress(),
                "Country" => $this->getCountry(),
                "CountryCode" => $this->getCountryCode(),
                "City" => $this->getCity(),
                "CityCode" => $this->getCityCode(),
                "ZipCode" => $this->getZipCode(),
                "District" => $this->getDistrict(),
                "DistrictCode" => $this->getDistrictCode(),
                "ShippingCompany" => $this->getShippingCompany()
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getName(),
                    $this->getAddress(),
                    $this->getCountry(),
                    $this->getCountryCode(),
                    $this->getCity(),
                    $this->getCityCode(),
                    $this->getZipCode(),
                    $this->getDistrict(),
                    $this->getDistrictCode(),
                    $this->getShippingCompany(),
                ));
    }
}