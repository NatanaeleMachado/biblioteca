<?php
include_once("conectar.php");
?>

<html> 

    <head>
    <title>Sistema Empréstimo Livros</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body>

        <header>
                <h3>Lista de Livro</h3>
        </header>

        <div class="lista_livro">

            <form method="post" action="editar_livro.php">
            <table border="1px" cellpadding="5px" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Area</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                    
                <?php 
                    $sql = "SELECT livro.id AS id, livro.titulo AS titulo, livro.autor AS autor, livro.status AS 'status', area.nome AS area FROM livro INNER JOIN area ON livro.id_area=area.id;";
                    $resultado=mysqli_query($conexao,$sql);
                    while($data=mysqli_fetch_array($resultado)){
                        $id=$data['id'];
                        $titulo=$data['titulo'];
                        $autor=$data['autor'];
                        $area=$data['area'];
                        $status=$data['status'];
                        echo "<tr class='dif'><td>".$id."</td>";
                        echo "<td>".$titulo."</td>";
                        echo "<td>".$autor."</td>";
                        echo "<td>".$area."</td>";
                        if ($status) {
                            echo "<td>Livre</td>";
                        }else{
                            echo "<td>Emprestado</td>";
                        }
                        echo "<td><button name='Edit' value='$id'>EDITAR</button></td>";
                        echo "<td><button name='Delete' value='$id'>EXCLUIR</button></td></tr>";
                    }
                    mysqli_close($conexao)
                ?>
                </table>
            </form>
        </div>
    </body>
</html>
