<?php include ('includes/header.php'); ?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a>Corrida</a></li>
            <li class="active">Gerenciar</li>
        </ol>

        <?=$FlashData->flashData('manage_ride'); ?>

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

        <div class="table-responsive">

            <div class="col-md-3 pull-right">
                <div class="form-group row">
                    <input type="text" class="form-control search" maxlength="80" placeholder="Pesquisar: motorista / passageiro / valor"/>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Motorista:</th>
                        <th>Passageiro(s):</th>
                        <th>Valor:</th>
                        <th>Data da corrida:</th>
                        <th>Editado em:</th>
                        <th>Opções:</th>
                    </tr>
                </thead>
                <tbody id="ride">
                </tbody>
            </table>
        </div>

    </div>

<?php include ('includes/footer.php'); ?>