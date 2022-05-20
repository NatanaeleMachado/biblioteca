<?php
include_once("conectar.php");
?>

<html>
    <head>
        
        <link rel="stylesheet" href="estilo.css">
        <title>Sistema Empréstimo Livros</title>
    </head>
    <body>
        <header>
            <h3>Lista de Alunos</h3>
        </header>

        <div class="lista_aluno">
            <form action="editar_aluno.php" method="post">
                
            <table border="1px" cellpadding="5px" cellspacing="0">
                    <tr>
                        <th>Matricula</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th></th>
                        <th></th>
                    </tr>

                <?php 
                    $sql = "SELECT * FROM aluno";
                    $resultado=mysqli_query($conexao,$sql);
                    while($data=mysqli_fetch_array($resultado)){
                        $matricula=$data['matricula'];
                        $nome=$data['nome'];
                        $email=$data['email'];
                        $cpf=$data['cpf'];
                        $data_nasc=$data['data_nasc'];
                        
                        echo "<tr class='dif'><td>".$matricula."</td>";
                        echo "<td>".$nome."</td>";
                        echo "<td>".$email."</td>";
                        echo "<td>".$cpf."</td>";
                        echo "<td>".$data_nasc."</td>";
                        echo "&nbsp&nbsp<td><button name='Edit' value='$matricula'>EDITAR</button></td>";
                        echo "&nbsp&nbsp<td><button name='Delete' value='$matricula'>EXCLUIR</button></td></tr>";
                    }
                    mysqli_close($conexao)
                ?>

                </table>
            </form>
        </div>
    </body>
</html>