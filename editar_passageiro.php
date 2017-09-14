<?php include ('includes/header.php'); ?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a>Passageiro</a></li>
            <li><a href="gerenciar_passageiro">Gerenciar</a></li>
            <li class="active">Editar</li>
        </ol>

        <?php
        echo $FlashData->flashData('change_passenger');

        if (!empty($_GET['id'])) {
            $passenger = $CRUD->selectPassenger($_GET['id']);
        }
        
        if (!empty($passenger)) :
            $passenger = $passenger[0];
        ?>

        <form id="validate" action="action" method="POST">  

            <div class="col-md-12 row">

                <div class="col-md-2">
                    <label for="name">Nome:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control required" name="name" maxlength="80" value="<?=$passenger->name_passenger; ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="birthdate">Data nascimento:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="birthdate" class="form-control required mask-date" name="birthdate" maxlength="10" value="<?=date('d/m/Y', strtotime($passenger->birthdate_passenger)); ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="cpf">CPF:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="cpf" class="form-control required mask-cpf" name="cpf" maxlength="14" value="<?=maskCpf($passenger->cpf_passenger); ?>" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label>Sexo:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" class="required" name="gender" value="F" <?=($passenger->gender_passenger == 'F' ? 'checked' : ''); ?>>Feminino </label>
                        <label class="radio-inline"><input type="radio" class="required" name="gender" value="M" <?=($passenger->gender_passenger == 'M' ? 'checked' : ''); ?>>Masculino </label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <br/>
                    <input type="hidden" class="btn btn-success" name="id" value="<?=$_GET['id']; ?>" />
                    <input type="submit" class="btn btn-success" name="change_passenger" value="Editar" />
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