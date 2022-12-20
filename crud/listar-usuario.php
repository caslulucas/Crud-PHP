<h1>Listar usuários</h1>

<?php

        $sql = "SELECT * FROM usuarios";

        $res = $conn->query($sql);

        $qtd = $res->num_rows;

        if($qtd > 0) {
          print "<table class='table table-hover table-triped table-bordered'>";

             echo "<tr>";
                echo "<th>#</th>";
                echo  "<th>Nome</th>";
                echo  "<th>E-mail</th>";
                echo  "<th>Data de  Nascimento</th>";
                echo "<th>Ações</th>";
             echo "<tr>";

        while($row = $res->fetch_object()) {
            echo "<tr>";
                echo "<td>".$row->id."</td>";
                echo  "<td>".$row->nome."</td>";
                echo  "<td>".$row->email."</td>";
                echo  "<td>".$row->data_nasc."</td>";

                echo  "<td>
                        <button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn btn-success'>Editar</button>
                        <button onclick=\"if(confirm('Essa ação não poderá ser revertida, tem certeza que deseja exluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" class='btn btn-danger'>Excluir</button>
                      </td>";
                echo "<tr>";
            }
            print "</table>";

        } else {
            print "<p class='alert alert-danger'>não encontrou resultado!</p>";
        }
?>