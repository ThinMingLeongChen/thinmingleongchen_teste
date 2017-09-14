<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    include ('index.html');
    exit;
} 

class Connection {
    public function connect() {
        
        $this->hostname = 'localhost';
        $this->username = 'root';
        $this->password = 'root';
        $this->database = 'shared_races';
        $this->charset  = 'utf8';

        // dbdebug == 'development' Show erros
        // dbdebug == 'production' Not show erros
        $this->dbdebug  = 'development';

        try {
            $connect = new PDO('mysql:host='.$this->hostname.';
                                dbname='.$this->database, 
                                $this->username, 
                                $this->password,
                                array(
                                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.$this->charset
                                ));
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            if ($this->dbdebug == 'development') {
                echo $e->getMessage();
                exit;
            }
            elseif ($this->dbdebug == 'production') {
                exit;
            }
        }
        
        return $connect;
    }
}

?>