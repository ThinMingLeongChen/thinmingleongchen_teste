<?php include ('includes/header.php'); ?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a>Corrida</a></li>
            <li><a href="gerenciar_corrida">Gerenciar</a></li>
            <li class="active">Editar</li>
        </ol>

        <?php
        echo $FlashData->flashData('change_ride');

        if (!empty($_GET['id'])) {
            $ride = $CRUD->selectRide($_GET['id']);
        }

        if (!empty($ride)) :
            $ride = $ride[0];
        ?>

        <form id="validate" action="action" method="POST">

            <div class="col-md-12 row">

                <div class="col-md-2">
                    <label>Motorista:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <select class="form-control required" name="driver">
                            <option disabled selected>Selecione...</option>
                            <?php
                            $drivers = $CRUD->selectDriver(false, false, 'name_driver ASC', 'status_driver = 1');

                            foreach ($drivers as $driver) {
                                echo '<option value="'.$driver->id_driver.'" '.($ride->id_driver == $driver->id_driver ? 'selected' : '').'>'.$driver->name_driver.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">

                <div class="col-md-2">
                    <label>Passageiros:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <select class="form-control required" name="passenger[]" multiple>
                            <?php
                            $passengers = $CRUD->selectPassenger(false, false, 'name_passenger ASC');

                            $id_passengers = explode('|', $ride->id_passengers);
                            foreach ($passengers as $passenger) {
                                echo '<option value="'.$passenger->id_passenger.'" '.(in_array($passenger->id_passenger, $id_passengers) ? 'selected' : '').'>'.$passenger->name_passenger.'</option>';
                            }
                            ?> 
                        </select>
                        <p class="text-warning no-margin">Mantém o CTRL pressionado para selecionar mais de um.  </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="value">Valor:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="value" class="form-control required mask-money" name="value" maxlength="10" value="<?=number_format($ride->value_ride, 2, ',', '.'); ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <br/>
                    <input type="hidden" class="btn btn-success" name="id" value="<?=$_GET['id']; ?>" />
                    <input type="submit" class="btn btn-success" name="change_ride" value="Editar" />
                </div>
            </div>
            

        </form>

        <?php
        else:
            echo '<h3 class="text-center">Página não encontrada</h3>';
        endif;
        ?>

    </div>

<?php include ('includes/footer.php'); ?>