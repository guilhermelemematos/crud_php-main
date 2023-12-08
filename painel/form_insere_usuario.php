<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');
?>
<?php
    include_once('cabecalho.php');
?>

<div class="content mt-3">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> Você leu com sucesso esta mensagem importante de alerta.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <form action="cadastra_usuario.php" method="POST">
                <h2 class="card-header">Inserir Novo Usuário do Sistema</h2>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nome_usuario">Nome do Usuário</label>
                        <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="email_usuario">Email do Usuário</label>
                        <input type="email" class="form-control" id="email_usuario" name="email_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar Novo Usuário</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>