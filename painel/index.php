<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id']) || !isset($_SESSION['nome']) || !isset($_SESSION['email'])) {
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    header('Location: ../index.html');
}

require('conecta.php');
include_once('cabecalho.php');
?>

<div class="content mt-3">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Cidade</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM Cadastro";
                        $stmt = $conexao->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($linha = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $linha["id_cliente"] . "</td>";
                            echo "<td>" . $linha["nome_cliente"] . "</td>";
                            echo "<td>" . $linha["email_cliente"] . "</td>";
                            echo "<td>" . $linha["cidade"] . "</td>";
                            echo "<td>
                                    <a href='atualiza_cliente.php?id=" . $linha["id_cliente"] . "' class='btn btn-primary'>Atualizar</a>
                                    <button class='btn btn-danger' onclick='confirmDelete(" . $linha["id_cliente"] . ")'>Deletar</button>
                                </td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.col-->
</div> <!-- .content -->
</div><!-- /#right-panel -->
<!-- Fim Painel Direito -->

<footer>
    <div class="fixed-bottom">
        <a target="_blank" class="footer" href="https://github.com/projvinipaiva"><strong>Vinícius de Paiva</strong></a>
    </div>
</footer>

<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

<!-- Função JavaScript para confirmar exclusão -->
<script>
    function confirmDelete(id) {
        var confirmDelete = confirm("Tem certeza que deseja excluir?");
        if (confirmDelete) {
            window.location.href = 'apaga_cliente.php?id=' + id;
        }
    }
</script>

</body>

</html>