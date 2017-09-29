<?php

/**
 * Hepsipay and Contributers licenses this file to you under the MIT license.
 * See the LICENSE file in the project root for more information.
 */
namespace Hepsipay\Model;

class Customer extends BaseModel
{
    private $name;
    private $surName;
    private $email;
    private $ipAddress;
    private $phoneNumber;
    private $code;
    private $tckn;
    private $vatNumber;
    private $memberSince;
    private $membershipDate;
    private $birthDate;
    private $gender;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    public function getSurName()
    {
        return $this->surName;
    }

    public function setSurName($surName)
    {
        $this->surName = $surName;
        
        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }
    
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        
        return $this;
    }
    
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        
        return $this;
    }
    
    public function getTckn()
    {
        return $this->tckn;
    }

    public function setTckn($tckn)
    {
        $this->tckn = $tckn;
        
        return $this;
    }
    
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;
        
        return $this;
    }
    
    public function getMemberSince()
    {
        return $this->memberSince;
    }

    public function setMemberSince($memberSince)
    {
        $this->memberSince = $memberSince;
        
        return $this;
    }
    
    public function getMembershipDate()
    {
        return $this->membershipDate;
    }

    public function setMembershipDate($membershipDate)
    {
        $this->membershipDate = $membershipDate;
        
        return $this;
    }
    
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        
        return $this;
    }
    
    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        
        return $this;
    }
    
    public function toArray()
    {
        return array(
                "Name" => $this->getName(),
                "SurName" => $this->getSurName(),
                "Email" => $this->getEmail(),
                "PhoneNumber" => $this->getPhoneNumber(),
                "Code" => $this->getCode(),
                "Tckn" => $this->getTckn(),
                "VatNumber" => $this->getVatNumber(),
                "MemberSince" => $this->getMemberSince(),
                "MembershipDate" => $this->getMembershipDate(),
                "BirthDate" => $this->getBirthDate(),
                "IpAddress" => $this->getIpAddress(),
                "Gender" => $this->getGender()
            );
    }
    
    public function toString()
    {
        return implode('', array(
                    $this->getName(),
                    $this->getSurName(),
                    $this->getEmail(),
                    $this->getPhoneNumber(),
                    $this->getCode(),
                    $this->getTckn(),
                    $this->getVatNumber(),
                    $this->getMemberSince(),
                    $this->getMembershipDate(),
                    $this->getBirthDate(),
                    $this->getIpAddress(),
                    $this->getGender(),
                ));
    }
}