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
                <h3>Lista Area</h3>
        </header>

        <div class="lista_area">

            <form method="post" action="editar_area.php">
            <table border="1px" cellpadding="5px" cellspacing="0">
                
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                    </tr>
                    
                <?php 
                    $sql = "SELECT * FROM area";
                    $resultado=mysqli_query($conexao,$sql);
                    while($data=mysqli_fetch_array($resultado)){
                        $id=$data['id'];
                        $nome=$data['nome'];

                        echo "<tr class='dif'><td>".$id."</td>";
                        echo "<td>".$nome."</td>";
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