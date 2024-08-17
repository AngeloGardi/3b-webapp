<?php 
class DB {
    private $db;
    public function __construct(){
        $dbPath = dirname(__FILE__) . '/../db/3dModels.db';
        $dbUrl = "sqlite:$dbPath";

        try{
            $this->db = new PDO($dbUrl, '', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        }
        catch (PDOException $e){
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getData($sql) {
        try{
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        }
        catch (PDOException $e){
            die("Get data failed: " . $e->getMessage());
        }
    }
}