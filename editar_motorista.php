<?php include ('includes/header.php'); ?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a>Motoristas</a></li>
            <li><a href="gerenciar_motorista">Gerenciar</a></li>
            <li class="active">Editar</li>
        </ol>

        <?php
        echo $FlashData->flashData('change_driver');

        if (!empty($_GET['id'])) {
            $driver = $CRUD->selectDriver($_GET['id']);
        }
        
        if (!empty($driver)) :
            $driver = $driver[0];
        ?>

        <form id="validate" action="action" method="POST">  

            <div class="col-md-12 row">

                <div class="col-md-2">
                    <label for="name">Nome:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control required" name="name" maxlength="80" value="<?=$driver->name_driver; ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="birthdate">Data nascimento:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="birthdate" class="form-control required mask-date" name="birthdate" maxlength="10" value="<?=date('d/m/Y', strtotime($driver->birthdate_driver)); ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="cpf">CPF:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="cpf" class="form-control required mask-cpf" name="cpf" maxlength="14" value="<?=maskCpf($driver->cpf_driver); ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="carmodel">Modelo do carro:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="carmodel" class="form-control required" name="carmodel" maxlength="80" value="<?=$driver->carmodel_driver; ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label>Ativo:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" class="required" name="status" value="1" <?=($driver->status_driver == 1 ? 'checked' : ''); ?>>Sim </label>
                        <label class="radio-inline"><input type="radio" class="required" name="status" value="0" <?=($driver->status_driver == 0 ? 'checked' : ''); ?>>Não </label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label>Sexo:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" class="required" name="gender" value="F" <?=($driver->gender_driver == 'F' ? 'checked' : ''); ?>>Feminino </label>
                        <label class="radio-inline"><input type="radio" class="required" name="gender" value="M" <?=($driver->gender_driver == 'M' ? 'checked' : ''); ?>>Masculino </label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <br/>
                    <input type="hidden" class="btn btn-success" name="id" value="<?=$_GET['id']; ?>" />
                    <input type="submit" class="btn btn-success" name="change_driver" value="Editar" />
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