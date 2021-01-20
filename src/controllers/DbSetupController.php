<?php
class DbSetupController extends Controller
{
    public function index()
    {
        $dbName = 'lafermette';

        


        // create PDO connection        
        /**
         * getConnection
         *
         * @param  mixed $dbName
         * @return object 
         */
        function getConnection($dbName = null)
        {
            try {
                $bdd = new PDO("mysql:host=localhost;dbname=$dbName;charset=utf8", "root", "");
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $bdd;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        // CREATE DATABASE IF NOT EXISTS
        if ($dbName === '') {
            $bdd = getConnection();
            $query = $bdd->query("
                CREATE DATABASE IF NOT EXISTS lafermette
                CHARACTER SET = 'utf8'
                COLLATE = 'utf8_general_ci';
        ");
            $res = $query->execute();
            debug($res);
            if ($res === 1) {
                $res->closeCursor();
                $bdd = null;
            }
        } 
        else {
        // CREATE TABLES IF NOT EXISTS
            $bdd = getConnection($dbName);

            // CREATE USERS TABLE
            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS users(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    email VARCHAR(255) NOT NULL COMMENT 'email utilisateur',
                    password VARCHAR(255) NOT NULL COMMENT 'mot de passe'                   
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS farms(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    name VARCHAR(255) NOT NULL ,
                    health TINYINT(3)                  
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS farm_owners(
                   user_id INT(11) NOT NULL,
                   farm_id INT(11) NOT NULL,
                   FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
                   FOREIGN KEY (farm_id) REFERENCES farms(id) ON UPDATE CASCADE ON DELETE CASCADE,
                   PRIMARY KEY (user_id,farm_id)                
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS animal_types(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    name VARCHAR(255) NOT NULL
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS animals(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    type_id INT(11) NOT NULL,
                    name VARCHAR(255) NOT NULL,
                    hunger_level INT(11) NOT NULL,
                    thirst_level INT(11) NOT NULL,
                    global_health INT(11),
                    FOREIGN KEY (type_id) REFERENCES animal_types(id) ON UPDATE CASCADE ON DELETE RESTRICT
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS animal_owners(
                    user_id INT(11) NOT NULL,
                    animal_id INT(11) NOT NULL,
                    FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
                    FOREIGN KEY (animal_id) REFERENCES animals(id) ON UPDATE CASCADE ON DELETE RESTRICT,
                    PRIMARY KEY (user_id,animal_id)  
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS foods(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    name VARCHAR(255) NOT NULL,
                    quantity INT(11) NOT NULL,
                    energy INT(11) NOT NULL
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            $query = $bdd->query("
                CREATE TABLE IF NOT EXISTS animal_foods(
                    animal_id INT(11) NOT NULL,
                    food_id INT(11) NOT NULL,
                    consumed_at DATETIME DEFAULT NOW(),
                    FOREIGN KEY (animal_id) REFERENCES animals(id) ON UPDATE CASCADE ON DELETE CASCADE,
                    FOREIGN KEY (food_id) REFERENCES foods(id) ON UPDATE CASCADE ON DELETE CASCADE,
                    PRIMARY KEY (animal_id,food_id)                
                )ENGINE=InnoDB;
            ");
            $res = $query->execute();

            debug($res);
        }
    
    }
    
}
