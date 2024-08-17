<?php 
class DB {
    private $db;
    public function __construct(){
        $dbPath = dirname(__FILE__) . '/../db/data.db';
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

    public function getData($sql, $params = []){ 
        try{
            $stmt = $this->db->prepare($sql);
            foreach($params as $param){
                $stmt->bindParam($param['name'], $param['value'], $param['type']);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch (PDOException $e){
            die("Get data failed: " . $e->getMessage());
        }
    }
}