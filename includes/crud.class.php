<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    include('index.html');
    exit;
} 

require_once ('includes/connection.class.php');

class CRUD extends Connection {
    public function __construct() {
        $this->database = $this->connect();
    }

    public function insertDriver($values) {

        $insert = $this->database->prepare('INSERT INTO driver (name_driver, birthdate_driver, cpf_driver, carmodel_driver, status_driver, gender_driver) VALUES (?, ?, ?, ?, ?, ?)');
        $insert->execute($values);

        if ($insert->rowCount() > 0) {
            return $this->database->lastInsertId();
        }
        else {
            return false;
        }
    }

    public function updateDriver($values, $id) {

        $update = $this->database->prepare('UPDATE driver SET name_driver = ?, birthdate_driver = ?, cpf_driver = ?, carmodel_driver = ?, status_driver = ?, gender_driver = ?, date_changes = NOW() WHERE id_driver = '.$id);
        $update->execute($values);

        if ($update->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function deleteDriver($id) {

        $delete = $this->database->prepare('DELETE FROM driver WHERE id_driver = ?');
        $delete->execute(array($id));

        if ($delete->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function selectDriver($id = false, $search = false, $order = '', $whereField = false) {

        if ($id != false && $search == false) {
            $where = 'WHERE id_driver = ?';
            $values = array($id);
        }
        elseif ($id == false && $search != false) {
            $where = 'WHERE (name_driver LIKE ? OR cpf_driver LIKE ?)';
            $values = array('%'.$search.'%', '%'.preg_replace('/[^0-9]/', '', $search).'%');
        }
        else {
            $where = '';
            $values = array(null);
        }

        if (!empty($order)) {
            $orderby = 'ORDER BY '.$order;
        }
        else {
            $orderby = '';
        }

        if ($whereField && ($id != false || $search != false)) {
            $where = $where.' AND '.$whereField;
        }
        else if ($whereField) {
            $where = 'WHERE '.$whereField;
        }
    
        $select = $this->database->prepare('SELECT * FROM driver '.$where.' '.$orderby); 
        $select->execute($values);

        if ($select->rowCount() > 0) {
            $result = array();
            while($row = $select->fetch(PDO::FETCH_OBJ)) {
                $result[] = $row;
            }
            return $result;
        }
        else {
            return false;
        }
    }

    public function insertPassenger($values) {

        $insert = $this->database->prepare('INSERT INTO passenger (name_passenger, birthdate_passenger, cpf_passenger, gender_passenger) VALUES (?, ?, ?, ?)');
        $insert->execute($values);

        if ($insert->rowCount() > 0) {
            return $this->database->lastInsertId();
        }
        else {
            return false;
        }
    }

    public function updatePassenger($values, $id) {

        $update = $this->database->prepare('UPDATE passenger SET name_passenger = ?, birthdate_passenger = ?, cpf_passenger = ?, gender_passenger = ?, date_changes = NOW() WHERE id_passenger = '.$id);
        $update->execute($values);

        if ($update->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function deletePassenger($id) {

        $delete = $this->database->prepare('DELETE FROM passenger WHERE id_passenger = ?');
        $delete->execute(array($id));

        if ($delete->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function selectPassenger($id = false, $search = false, $order = '') {

        if ($id != false && $search == false) {
            $where = 'WHERE id_passenger = ?';
            $values = array($id);
        }
        elseif ($id == false && $search != false) {
            $where = 'WHERE name_passenger LIKE ? OR cpf_passenger LIKE ?';
            $values = array('%'.$search.'%', '%'.preg_replace('/[^0-9]/', '', $search).'%');
        }
        else {
            $where = '';
            $values = array(null);
        }

        if (!empty($order)) {
            $orderby = 'ORDER BY '.$order;
        }
        else {
            $orderby = '';
        }

        $select = $this->database->prepare('SELECT * FROM passenger '.$where.' '.$orderby); 
        $select->execute($values);

        if ($select->rowCount() > 0) {
            $result = array();
            while($row = $select->fetch(PDO::FETCH_OBJ)) {
                $result[] = $row;
            }
            return $result;
        }
        else {
            return false;
        }
    }

    public function insertRide($values) {

        $insert = $this->database->prepare('INSERT INTO ride (value_ride, id_driver) VALUES (?, ?)');
        $insert->execute($values);

        if ($insert->rowCount() > 0) {
            return $this->database->lastInsertId();
        }
        else {
            return false;
        }
    }

    public function updateRide($values, $id) {

        $update = $this->database->prepare('UPDATE ride SET value_ride = ?, id_driver = ?, date_changes = NOW() WHERE id_ride = '.$id);
        $update->execute($values);

        if ($update->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function insertRidePassenger($values) {

        $insert = $this->database->prepare('INSERT INTO ride_passenger (id_ride, id_passenger) VALUES (?, ?)');
        $insert->execute($values);

        if ($insert->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function deleteRide($id) {

        $delete = $this->database->prepare('DELETE FROM ride WHERE id_ride = ?');
        $delete->execute(array($id));

        if ($delete->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function deleteRidePassenger($id) {

        $delete = $this->database->prepare('DELETE FROM ride_passenger WHERE id_ride = ?');
        $delete->execute(array($id));

        if ($delete->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function selectRide($id = false, $search = false, $order = '') {

        if ($id != false && $search == false) {
            $where = 'WHERE ride.id_ride = ?';
            $values = array($id);
        }
        elseif ($id == false && $search != false) {
            $where = 'WHERE (passenger.name_passenger LIKE ? OR driver.name_driver LIKE ? OR value_ride LIKE ?)';
            $values = array('%'.$search.'%', '%'.$search.'%', '%'.str_replace(array('.', ','), array('', '.'), $search).'%');
        }
        else {
            $where = '';
            $values = array(null);
        }

        if (!empty($order)) {
            $orderby = 'ORDER BY '.$order;
        }
        else {
            $orderby = '';
        }

        $select = $this->database->prepare('SELECT ride.*,  driver.name_driver, driver.id_driver, GROUP_CONCAT(passenger.name_passenger SEPARATOR "|") AS passengers, GROUP_CONCAT(passenger.id_passenger SEPARATOR "|") AS id_passengers
                                            FROM ride
                                            INNER JOIN driver ON ride.id_driver = driver.id_driver
                                            INNER JOIN ride_passenger ON ride.id_ride = ride_passenger.id_ride
                                            INNER JOIN passenger ON ride_passenger.id_passenger = passenger.id_passenger
                                            '.$where.' GROUP BY ride.id_ride '.$orderby); 
        $select->execute($values);

        if ($select->rowCount() > 0) {
            $result = array();
            while($row = $select->fetch(PDO::FETCH_OBJ)) {
                $result[] = $row;
            }
            return $result;
        }
        else {
            return false;
        }
    }
}

$CRUD = new CRUD;

?>