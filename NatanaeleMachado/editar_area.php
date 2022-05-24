<?php
    include_once("conectar.php");
    
    if (isset($_POST['Edit'])) {
       
        $title='Editar';
    }elseif(isset($_POST['Delete'])){
        
        $title='Deletar';
    }elseif(isset($_POST['Edited'])){
        
        $idUP=$_POST['Edited'];
        $nomeUP=$_POST['nome'];
        $sql="UPDATE area SET nome = '$nomeUP' WHERE id = '$idUP' ";
        mysqli_query($conexao,$sql);
    }elseif(isset($_POST['Deleted'])){
        
        $idDEL=$_POST['Deleted'];
        $sql="DELETE FROM area WHERE id = '$idDEL'";
        mysqli_query($conexao,$sql);
    }else{
        
        $title='Erro';
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="estilo.css">
        <title>Sistema Empréstimo Livros</title>
    </head>
    <body>
        <?php
            echo "<header><h3>Editar Area</h3></header>";
            
            if (isset($_POST['Edit'])) {
                
                $editid=$_POST['Edit'];
                $sql = "SELECT * FROM area WHERE id = $editid";
                $resultado=mysqli_fetch_array(mysqli_query($conexao,$sql));

                $id=$resultado['id'];
                $nome=$resultado['nome'];
                echo "<div id='editar_area'>";
                echo "<p>Edite a area, basta preencher o campo abaixo: </p>";
                echo "<form action'editar_area.php' method='post'>";
                echo "<label>Area: <input type='text' name='nome' placeholder='$nome' required></label><br>";
                echo "<br><button type='submit' name='Edited' value='$id'>Editar Area</button>";
                echo "&nbsp&nbsp&nbsp<a href='index.html'><input type='button' value='Voltar'></a>";
                echo "</form></div>";
            }elseif(isset($_POST['Delete'])){
                
                $deleteid=$_POST['Delete'];
                $sql = "SELECT * FROM area WHERE id = $deleteid";
                $resultado=mysqli_fetch_array(mysqli_query($conexao,$sql));

                $id=$resultado['id'];
                $nome=$resultado['nome'];
                echo "<div id='delete'>";
                echo "Você irá excluir a area: $nome.<br>";
                echo "<form action='editar_area.php' method='post'>";
                echo "<br><button type='submit' name='Deleted' value='$deleteid'>Sim</button>";
                echo "&nbsp&nbsp<button onClick='history.go(-1)'>Não</button><br>";
                echo "<br><br>&nbsp&nbsp&nbsp&nbsp<a href='index.html'><input type='button' value='Voltar'></a>";
                echo "</form></div><br>";
            }else{
                
                header('Location: lista_area.php');
            }
        ?>
    </body>
</html>

<?php
    mysqli_close($conexao);
?>