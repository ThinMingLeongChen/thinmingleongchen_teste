<?php include ('includes/header.php'); ?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a>Motoristas</a></li>
            <li class="active">Gerenciar</li>
        </ol>

        <?=$FlashData->flashData('manage_driver'); ?>

        <div class="modal fade" id="confirm" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="text-danger">Deseja excluir ?</h4>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sim</button>
                        <button type="button" class="btn btn-success" data-Success="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group pull-left">
                <label>Exibir por: &nbsp;&nbsp;</label>
                <label class="radio-inline"><input type="radio" class="filter" name="filter" value="" checked>Todos </label>
                <label class="radio-inline"><input type="radio" class="filter" name="filter" value="1">Ativos </label>
                <label class="radio-inline"><input type="radio" class="filter" name="filter" value="0">Inativos </label>
            </div>
           
            <div class="form-group pull-right">
                <input type="text" class="form-control search" maxlength="80" placeholder="Pesquisar: nome / CPF"/>
            </div>
           
        </div>

        <div class="col-md-12  col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome:</th>
                            <th>Data nascimento:</th>
                            <th>CPF:</th>
                            <th>Modelo do carro:</th>
                            <th>Status:</th>
                            <th>Sexo:</th>
                            <th>Cadastrado em:</th>
                            <th>Editado em:</th>
                            <th>Opções:</th>
                        </tr>
                    </thead>
                    <tbody id="driver">
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<?php include ('includes/footer.php'); ?>