<?php 
class ContactInfo {
    private $address;
    private $fullName;
    private $email;

    public function __construct(){
    }

    public function getAddress(){
        return $this->address;
    }

    public function getFullName(){
        return $this->fullName;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function setFullName($fullName){
        $this->fullName = $fullName;
    }

    public function setEmail($email){
        $this->email = $email;
    }

}