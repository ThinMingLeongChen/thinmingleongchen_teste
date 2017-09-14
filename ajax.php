<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['type'])) {

    require_once ('includes/crud.class.php');
    require_once ('includes/functions.php');

    if ($_POST['type'] == 'passenger') {

        $result = $CRUD->selectPassenger(false, $_POST['search'], 'id_passenger DESC');

        if ($result) {
            foreach ($result as $passenger) {
            echo '<tr>
                      <td>'.$passenger->name_passenger.'</td>
                      <td>'.(date('d/m/Y', strtotime($passenger->birthdate_passenger))).'</td>
                      <td>'.maskCpf($passenger->cpf_passenger).'</td>
                      <td>'.($passenger->gender_passenger == 'M' ? 'Masculino' : 'Feminino').'</td>
                      <td>'.date('d/m/Y H:i:s', strtotime($passenger->date_register)).'</td>
                      <td>'.(!empty($passenger->date_changes) ? date('d/m/Y H:i:s', strtotime($passenger->date_changes)) : '').'</td>
                      <td>
                          <a href="editar_passageiro-'.$passenger->id_passenger.'" class="btn btn-xs btn-block btn-primary">Editar</a>
                          <form class="delete" action="action" method="POST">
                              <input type="hidden" name="delete_passenger" value="delete">
                              <input type="hidden" name="id" value="'.$passenger->id_passenger.'" />
                              <a class="btn btn-xs btn-block btn-danger">Excluir</a>
                          </form>
                      </td>
                  </tr>';
            }
        }
        else {
            echo '<tr><td colspan="7"><h5 class="text-center block">Nenhum resultado encontrado</h5></td></tr>';
        }
    }
    elseif ($_POST['type'] == 'driver') {

        $filter = $_POST['filter'];

        if ($filter == '1') {
            $where = 'status_driver = 1';
        }
        elseif ($filter == '0') {
            $where = 'status_driver = 0';
        }
        else {
            $where = false;
        }


        $result = $CRUD->selectDriver(false, $_POST['search'], 'id_driver DESC', $where);

        if ($result) {
            foreach ($result as $driver) {
            
            echo '<tr>
                      <td>'.$driver->name_driver.'</td>
                      <td>'.(date('d/m/Y', strtotime($driver->birthdate_driver))).'</td>
                      <td>'.maskCpf($driver->cpf_driver).'</td>
                      <td>'.$driver->carmodel_driver.'</td>
                      <td>'.($driver->status_driver == 1 ? '<p class="text-success">Ativo</p>' : '<p class="text-danger">Inativo</p>').'</td>
                      <td>'.($driver->gender_driver == 'M' ? 'Masculino' : 'Feminino').'</td>
                      <td>'.date('d/m/Y H:i:s', strtotime($driver->date_register)).'</td>
                      <td>'.(!empty($driver->date_changes) ? date('d/m/Y H:i:s', strtotime($driver->date_changes)) : '').'</td>
                      <td>
                          <a href="editar_motorista-'.$driver->id_driver.'" class="btn btn-xs btn-block btn-primary">Editar</a>
                          <form class="delete" action="action" method="POST">
                              <input type="hidden" name="delete_driver" value="delete">
                              <input type="hidden" name="id" value="'.$driver->id_driver.'" />
                              <a class="btn btn-xs btn-block btn-danger">Excluir</a>
                          </form>
                      </td>
                  </tr>';
            }
        }
        else {
            echo '<tr><td colspan="9"><h5 class="text-center block">Nenhum resultado encontrado</h5></td></tr>';
        }
    }
    elseif ($_POST['type'] == 'ride') {

        $result = $CRUD->selectRide(false, $_POST['search'], 'id_ride DESC');

        if ($result) {
            foreach ($result as $ride) {
                $passengers = explode('|', $ride->passengers);

                $passengerList = '<ol class="passengers">';
                foreach ($passengers as $passenger) {
                    $passengerList .= '<li>'.$passenger.'</li>';
                }
                $passengerList .= '</ol>';
        
            echo '<tr>
                      <td>'.$ride->name_driver.'</td>
                      <td>'.$passengerList.'</td>
                      <td>'.number_format($ride->value_ride, 2, ',', '.').'</td>
                      <td>'.date('d/m/Y H:i:s', strtotime($ride->date_ride)).'</td>
                      <td>'.(!empty($ride->date_changes) ? date('d/m/Y H:i:s', strtotime($ride->date_changes)) : '').'</td>
                      <td>
                          <a href="editar_corrida-'.$ride->id_ride.'" class="btn btn-xs btn-block btn-primary">Editar</a>
                          <form class="delete" action="action" method="POST">
                              <input type="hidden" name="delete_ride" value="delete">
                              <input type="hidden" name="id" value="'.$ride->id_ride.'" />
                              <a class="btn btn-xs btn-block btn-danger">Excluir</a>
                          </form>
                      </td>
                  </tr>';
            }
        }
        else {
            echo '<tr><td colspan="9"><h5 class="text-center block">Nenhum resultado encontrado</h5></td></tr>';
        }
    }
}

?>