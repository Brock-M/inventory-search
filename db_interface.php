<?php 

    class Car {
        public function __construct() {
            $this->dbh = new PDO('mysql:host=localhost;dbname=DBNAME_HERE', 'USERNAME_HERE', 'PASSWORD_HERE');            
        }
        
        public function getCars() {
            $queryString = 'SELECT * from inventory WHERE DATEDIFF(NOW(), CreatedOn) <= 7;';
            $query = $this->dbh->query($queryString);
            $cars = $query->fetchAll();
            
            return $cars;
        }
        
        public function getMakes() {
            $queryString = 'SELECT MAKE from inventory';
            $query = $this->dbh->query($queryString);
            
            $makes = $query->fetchAll();

            $makesUnique = array();
            
            foreach($makes as $m) { array_push($makesUnique, $m[0]); }
            
            $makesUnique = array_unique($makesUnique);    
            
            return $makesUnique;
            
        }
        
        public function getModels($make) {
            $queryString = 'SELECT * FROM inventory WHERE MAKE = :make';
            $stmt = $this->dbh->prepare($queryString);
            $stmt->bindParam(':make', $make);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $models = $stmt->fetchAll();

            $uniqueModels = array();
            
            foreach($models as $m) { array_push($uniqueModels, $m['MODEL']); }

            $uniqueModels = array_unique($uniqueModels);
            
            return $uniqueModels;
        }

        public function getByMakeModel($make, $model) {
            $queryString = 'SELECT iYEAR, MAKE, MODEL, VEHICLE_ROW FROM inventory WHERE MAKE = :make AND MODEL = :model';
            $stmt = $this->dbh->prepare($queryString);
            $stmt->bindParam(':make', $make);
            $stmt->bindParam(':model', $model);
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $result = $stmt->fetchAll();
            
            return $result;
        }
    }

    
?>