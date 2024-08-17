<?php 
require_once dirname(__FILE__) . '/../class/db.class.php';
require_once dirname(__FILE__) . '/../models/ContactInfo.class.php';

class ContactInfoStrings {
    private $db;
    public function __construct(){
        $this->db = new DB();
    }

    public function getContactInfoStrings(){
        $sql = "SELECT * FROM contact_info";
        $result = $this->db->getData($sql)[0];
        $contactInfoString = new ContactInfo();
        $contactInfoString->setAddress($result['address']);
        $contactInfoString->setFullName($result['full_name']);
        $contactInfoString->setEmail($result['email']);
        return $contactInfoString;
    }
}