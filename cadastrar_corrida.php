<?php include ('includes/header.php'); ?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a>Corrida</a></li>
            <li class="active">Cadastrar</li>
        </ol>

        <?=$FlashData->flashData('register_ride'); ?>

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
                                echo '<option value="'.$driver->id_driver.'">'.$driver->name_driver.'</option>';
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

                            foreach ($passengers as $passenger) {
                                echo '<option value="'.$passenger->id_passenger.'">'.$passenger->name_passenger.'</option>';
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
                        <input type="text" id="value" class="form-control required mask-money" name="value" maxlength="10" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <br/>
                    <input type="submit" class="btn btn-success" name="register_ride" value="Cadastrar" />
                </div>
            </div>
            

        </form>

    </div>

<?php include ('includes/footer.php'); ?>