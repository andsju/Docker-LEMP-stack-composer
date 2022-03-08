<?php
class Sample extends Database 
{

    function __construct() 
    {
        
        // call parent constructor
        parent::__construct();
    }

    public function setup() 
    {
        $schema = "CREATE TABLE IF NOT EXISTS sample (sample_id INT NOT NULL AUTO_INCREMENT, sample VARCHAR(100), PRIMARY KEY (sample_id))";
        $stmt = $this->db->prepare($schema);
        $stmt->execute();
    }

    public function selectAll() 
    {
        try {
            $sql = "SELECT * FROM sample";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function insertOne($sample) 
    {
        try {
            $sql = "INSERT INTO sample (sample) VALUES (:sample)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':sample', $sample, PDO::PARAM_STR);
            $stmt->execute();

            return $this->db->lastInsertId();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

?>