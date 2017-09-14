<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once ('includes/flash_data.class.php');
    require_once ('includes/crud.class.php');

    if (!empty($_POST['register_driver'])) {

        $name      = trim($_POST['name']);
        $birthdate = $_POST['birthdate'];
        $cpf       = $_POST['cpf'];
        $carmodel  = trim($_POST['carmodel']);
        $status    = $_POST['status'];
        $gender    = $_POST['gender'];

        // Validate 
        if (empty($name)) {
            $FlashData->setFlashData('register_driver', 'Campo nome obrigatório!!', 'alert-danger');
            header('Location: cadastrar_motorista');
        }
        elseif (empty($birthdate)) {
            $FlashData->setFlashData('register_driver', 'Campo data nascimento obrigatório!!', 'alert-danger');
            header('Location: cadastrar_motorista');
        }
        elseif (empty($cpf)) {
            $FlashData->setFlashData('register_driver', 'Campo CPF obrigatório!!', 'alert-danger');
            header('Location: cadastrar_motorista');
        }
        elseif (empty($carmodel)) {
            $FlashData->setFlashData('register_driver', 'Campo modelo do carro obrigatório!!', 'alert-danger');
            header('Location: cadastrar_motorista');
        }
        elseif (!($status == 0 || $status == 1)) {
            $FlashData->setFlashData('register_driver', 'Campo ativo obrigatório!!', 'alert-danger');
            header('Location: cadastrar_motorista');
        }
        elseif (empty($gender)) {
            $FlashData->setFlashData('register_driver', 'Campo sexo obrigatório!!', 'alert-danger');
            header('Location: cadastrar_motorista');
        }

        $result = $CRUD->insertDriver(array($name, date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), preg_replace('/[^0-9]/', '', $cpf), $carmodel, $status, $gender));

        if ($result) {
            $FlashData->setFlashData('register_driver', 'Cadastro efetuado com sucesso!!', 'alert-success');
            header('Location: cadastrar_motorista');
        }
        else {
            $FlashData->setFlashData('register_driver', 'Erro no cadastro, favor tente novamente!!', 'alert-danger');
            header('Location: cadastrar_motorista');
        }
    }
    elseif (!empty($_POST['change_driver'])) {

        $name      = trim($_POST['name']);
        $birthdate = $_POST['birthdate'];
        $cpf       = $_POST['cpf'];
        $carmodel  = trim($_POST['carmodel']);
        $status    = $_POST['status'];
        $gender    = $_POST['gender'];
        $id        = $_POST['id'];

        // Validate 
        if (empty($id)) {
            $FlashData->setFlashData('change_driver', 'Ocorreu um erro tente novamente!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }
        elseif (empty($name)) {
            $FlashData->setFlashData('change_driver', 'Campo nome obrigatório!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }
        elseif (empty($birthdate)) {
            $FlashData->setFlashData('change_driver', 'Campo data nascimento obrigatório!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }
        elseif (empty($cpf)) {
            $FlashData->setFlashData('change_driver', 'Campo CPF obrigatório!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }
        elseif (empty($carmodel)) {
            $FlashData->setFlashData('change_driver', 'Campo modelo do carro obrigatório!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }
        elseif (!($status == 0 || $status == 1)) {
            $FlashData->setFlashData('change_driver', 'Campo ativo obrigatório!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }
        elseif (empty($gender)) {
            $FlashData->setFlashData('change_driver', 'Campo sexo obrigatório!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }

        $result = $CRUD->updateDriver(array($name, date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), preg_replace('/[^0-9]/', '', $cpf), $carmodel, $status, $gender), $id);

        if ($result) {
            $FlashData->setFlashData('change_driver', 'Edição efetuado com sucesso!!', 'alert-success');
            header('Location: editar_motorista-'.$id);
        }
        else {
            $FlashData->setFlashData('change_driver', 'Erro na edição, favor tente novamente!!', 'alert-danger');
            header('Location: editar_motorista-'.$id);
        }
    }
    elseif (!empty($_POST['delete_driver'])) {
        
        $id = $_POST['id'];

        if (empty($id)) {
            $FlashData->setFlashData('manage_driver', 'Erro na exclusão, favor tente novamente!!', 'alert-danger');
            header('Location: gerenciar_motorista');
        }

        $result = $CRUD->deleteDriver($id);

        if ($result) {
            $FlashData->setFlashData('manage_driver', 'Exclusão efetuado com sucesso!!', 'alert-success');
            header('Location: gerenciar_motorista');
        }
        else {
            $FlashData->setFlashData('manage_driver', 'Erro na exclusão, favor tente novamente!!', 'alert-danger');
            header('Location: gerenciar_motorista');
        }
    }
    elseif (!empty($_POST['register_passenger'])) {
        
        $name      = trim($_POST['name']);
        $birthdate = $_POST['birthdate'];
        $cpf       = $_POST['cpf'];
        $gender    = $_POST['gender'];

        // Validate 
        if (empty($name)) {
            $FlashData->setFlashData('register_passenger', 'Campo nome obrigatório!!', 'alert-danger');
            header('Location: cadastrar_passageiro');
        }
        elseif (empty($birthdate)) {
            $FlashData->setFlashData('register_passenger', 'Campo data nascimento obrigatório!!', 'alert-danger');
            header('Location: cadastrar_passageiro');
        }
        elseif (empty($cpf)) {
            $FlashData->setFlashData('register_passenger', 'Campo CPF obrigatório!!', 'alert-danger');
            header('Location: cadastrar_passageiro');
        }
        elseif (empty($gender)) {
            $FlashData->setFlashData('register_passenger', 'Campo sexo obrigatório!!', 'alert-danger');
            header('Location: cadastrar_passageiro');
        }

        $result = $CRUD->insertPassenger(array($name, date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), preg_replace('/[^0-9]/', '', $cpf), $gender));

        if ($result) {
            $FlashData->setFlashData('register_passenger', 'Cadastro efetuado com sucesso!!', 'alert-success');
            header('Location: cadastrar_passageiro');
        }
        else {
            $FlashData->setFlashData('register_passenger', 'Erro no cadastro, favor tente novamente!!', 'alert-danger');
            header('Location: cadastrar_passageiro');
        }
    }
    elseif (!empty($_POST['change_passenger'])) {

        $name      = trim($_POST['name']);
        $birthdate = $_POST['birthdate'];
        $cpf       = $_POST['cpf'];
        $gender    = $_POST['gender'];
        $id        = $_POST['id'];

        // Validate 
        if (empty($id)) {
            $FlashData->setFlashData('change_passenger', 'Ocorreu um erro tente novamente!!', 'alert-danger');
            header('Location: editar_passageiro-'.$id);
        }
        elseif (empty($name)) {
            $FlashData->setFlashData('change_passenger', 'Campo nome obrigatório!!', 'alert-danger');
            header('Location: editar_passageiro-'.$id);
        }
        elseif (empty($birthdate)) {
            $FlashData->setFlashData('change_passenger', 'Campo data nascimento obrigatório!!', 'alert-danger');
            header('Location: editar_passageiro-'.$id);
        }
        elseif (empty($cpf)) {
            $FlashData->setFlashData('change_passenger', 'Campo CPF obrigatório!!', 'alert-danger');
            header('Location: editar_passageiro-'.$id);
        }
        elseif (empty($gender)) {
            $FlashData->setFlashData('change_passenger', 'Campo sexo obrigatório!!', 'alert-danger');
            header('Location: editar_passageiro-'.$id);
        }

        $result = $CRUD->updatePassenger(array($name, date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), preg_replace('/[^0-9]/', '', $cpf), $gender), $id);

        if ($result) {
            $FlashData->setFlashData('change_passenger', 'Edição efetuado com sucesso!!', 'alert-success');
            header('Location: editar_passageiro-'.$id);
        }
        else {
            $FlashData->setFlashData('change_passenger', 'Erro na edição, favor tente novamente!!', 'alert-danger');
            header('Location: editar_passageiro-'.$id);
        }
    }
    elseif (!empty($_POST['delete_passenger'])) {
        
        $id = $_POST['id'];

        if (empty($id)) {
            $FlashData->setFlashData('manage_passenger', 'Erro na exclusão, favor tente novamente!!', 'alert-danger');
            header('Location: gerenciar_passageiro');
        }

        $result = $CRUD->deletePassenger($id);

        if ($result) {
            $FlashData->setFlashData('manage_passenger', 'Exclusão efetuado com sucesso!!', 'alert-success');
            header('Location: gerenciar_passageiro');
        }
        else {
            $FlashData->setFlashData('manage_passenger', 'Erro na exclusão, favor tente novamente!!', 'alert-danger');
            header('Location: gerenciar_passageiro');
        }
    }
    else if (!empty($_POST['register_ride'])) {

        $driver     = $_POST['driver'];
        $passengers = $_POST['passenger'];
        $value      = $_POST['value'];

        // Validate 
        if (empty($driver)) {
            $FlashData->setFlashData('register_ride', 'Campo motorista obrigatório!!', 'alert-danger');
            header('Location: cadastrar_corrida');
        }
        elseif (empty($passengers)) {
            $FlashData->setFlashData('register_ride', 'Campo passageiro obrigatório!!', 'alert-danger');
            header('Location: cadastrar_corrida');
        }
        elseif (empty($value)) {
            $FlashData->setFlashData('register_ride', 'Campo valor obrigatório!!', 'alert-danger');
            header('Location: cadastrar_corrida');
        }

        $id_ride = $CRUD->insertRide(array(str_replace(array('.', ','), array('', '.'), $value), $driver));

        foreach ($passengers as $passenger) {
            $result = $CRUD->insertRidePassenger(array($id_ride, $passenger));
        }

        if ($result && $id_ride) {
            $FlashData->setFlashData('register_ride', 'Cadastro efetuado com sucesso!!', 'alert-success');
            header('Location: cadastrar_corrida');
        }
        else {
            $FlashData->setFlashData('register_ride', 'Erro no cadastro, favor tente novamente!!', 'alert-danger');
            header('Location: cadastrar_corrida');
        }
    }
    elseif (!empty($_POST['change_ride'])) {
        
        $driver     = $_POST['driver'];
        $passengers = $_POST['passenger'];
        $value      = $_POST['value'];
        $id         = $_POST['id'];

        // Validate 
        if (empty($id)) {
            $FlashData->setFlashData('change_ride', 'Ocorreu um erro tente novamente!!', 'alert-danger');
            header('Location: editar_corrida-'.$id);
        }
        elseif (empty($driver)) {
            $FlashData->setFlashData('change_ride', 'Campo motorista obrigatório!!', 'alert-danger');
            header('Location: editar_corrida-'.$id);
        }
        elseif (empty($passengers)) {
            $FlashData->setFlashData('change_ride', 'Campo passageiro obrigatório!!', 'alert-danger');
            header('Location: editar_corrida-'.$id);
        }
        elseif (empty($value)) {
            $FlashData->setFlashData('change_ride', 'Campo valor obrigatório!!', 'alert-danger');
            header('Location: editar_corrida-'.$id);
        }

        $result = $CRUD->updateRide(array(str_replace(array('.', ','), array('', '.'), $value), $driver), $id);

        $CRUD->deleteRidePassenger($id);

        foreach ($passengers as $passenger) {
            $results = $CRUD->insertRidePassenger(array($id, $passenger));
        }

        if ($result && $results) {
            $FlashData->setFlashData('change_ride', 'Edição efetuado com sucesso!!', 'alert-success');
            header('Location: editar_corrida-'.$id);
        }
        else {
            $FlashData->setFlashData('change_ride', 'Erro na edição, favor tente novamente!!', 'alert-danger');
            header('Location: editar_corrida-'.$id);
        }
    }
    elseif (!empty($_POST['delete_ride'])) {

        $id = $_POST['id'];

        if (empty($id)) {
            $FlashData->setFlashData('manage_ride', 'Erro na exclusão, favor tente novamente!!', 'alert-danger');
            header('Location: gerenciar_corrida');
        }

        $result = $CRUD->deleteRide($id);

        if ($result) {
            $FlashData->setFlashData('manage_ride', 'Exclusão efetuado com sucesso!!', 'alert-success');
            header('Location: gerenciar_corrida');
        }
        else {
            $FlashData->setFlashData('manage_ride', 'Erro na exclusão, favor tente novamente!!', 'alert-danger');
            header('Location: gerenciar_corrida');
        }
    }
}

?>