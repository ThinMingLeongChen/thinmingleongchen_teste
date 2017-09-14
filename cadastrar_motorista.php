<?php include ('includes/header.php'); ?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a>Motorista</a></li>
            <li class="active">Cadastrar</li>
        </ol>

        <?=$FlashData->flashData('register_driver'); ?>

        <form id="validate" action="action" method="POST">

            <div class="col-md-12 row">

                <div class="col-md-2">
                    <label for="name">Nome:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control required" name="name" maxlength="80" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="birthdate">Data nascimento:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="birthdate" class="form-control required mask-date" name="birthdate" maxlength="10" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="cpf">CPF:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="cpf" class="form-control required mask-cpf" name="cpf" maxlength="14" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label for="carmodel">Modelo do carro:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" id="carmodel" class="form-control required" name="carmodel" maxlength="80" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label>Ativo:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" class="required" name="status" value="1">Sim </label>
                        <label class="radio-inline"><input type="radio" class="required" name="status" value="0">Não </label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2">
                    <label>Sexo:</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" class="required" name="gender" value="F">Feminino </label>
                        <label class="radio-inline"><input type="radio" class="required" name="gender" value="M">Masculino </label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <br/>
                    <input type="submit" class="btn btn-success" name="register_driver" value="Cadastrar" />
                </div>
            </div>
            

        </form>

    </div>

<?php include ('includes/footer.php'); ?>