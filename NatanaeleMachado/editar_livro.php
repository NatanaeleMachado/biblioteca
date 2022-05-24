<?php
    include_once("conectar.php");
    
    if (isset($_POST['Edit'])) {
        
        $title='Editar';
    }elseif(isset($_POST['Delete'])){
        
        $title='Deletar';
    }elseif(isset($_POST['Edited'])){
        
        $idUP=$_POST['Edited'];
        $tituloUP=$_POST['titulo'];
        $autorUP=$_POST['autor'];
        $areaUP=$_POST['id_area'];
        $sql="UPDATE livro SET titulo = '$tituloUP', autor = '$autorUP', id_area = '$areaUP'  WHERE id = '$idUP' ";
        mysqli_query($conexao,$sql);
    }elseif(isset($_POST['Deleted'])){
        
        $idDEL=$_POST['Deleted'];
        $sql="DELETE FROM livro WHERE id = '$idDEL'";
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
            echo "<header><h3>Editar Livro</h3><div id='content'>";
            
            if (isset($_POST['Edit'])) {
                
                $editid=$_POST['Edit'];
                $sql = "SELECT livro.id AS id, livro.titulo AS titulo, livro.autor AS autor, livro.id_area AS area FROM livro WHERE livro.id = $editid";
                $resultado=mysqli_fetch_array(mysqli_query($conexao,$sql));

                $titulo=$resultado['titulo'];
                $autor=$resultado['autor'];
                $area=$resultado['area'];
                echo "<div id='editar_livro'>";
                echo "<form action='editar_livro.php' method='post'>";
                echo "<br><label>Titulo: <input type='text' name='titulo' placeholder='$titulo' required></label><br>";
                echo "<br><label>Autor: <input type='text' name='autor' placeholder='$autor' required></label><br>";
                echo "<br><label>Area: <select name='id_area' required>";
                echo "</div>";
					$sql = "SELECT * FROM area";
					$resultado=mysqli_query($conexao,$sql);
					while($data=mysqli_fetch_array($resultado)){
						$idarea=$data['id'];
						$nomearea=$data['nome'];
						echo "<option value='$idarea'";
                        if ($idarea==$area){
                            echo" selected";
                        }
                        echo ">$nomearea</option>";
					}
                echo "</select></label>";
                echo "&nbsp&nbsp&nbsp<button type='submit' name='Edited' value='$editid'>Alterar</button>";
                echo "</form></div>";
            }elseif(isset($_POST['Delete'])){
                
                $deleteid=$_POST['Delete'];
                $sql = "SELECT livro.id AS id, livro.titulo AS titulo, livro.autor AS autor FROM livro WHERE livro.id = $deleteid";
                $resultado=mysqli_fetch_array(mysqli_query($conexao,$sql));

                $titulo=$resultado['titulo'];
                $autor=$resultado['autor'];
                echo "<div id='delete'>";
                echo "Você irá excluir o livro $titulo do autor $autor.<br><br>";
                echo "<form action='editar_livro.php' method='post'>";
                echo "<button type='submit' name='Deleted' value='$deleteid'>Sim</button>";
                echo "&nbsp&nbsp<button onClick='history.go(-1)'>Não</button><br><br>";
                echo "&nbsp&nbsp&nbsp&nbsp<a href='index.html'><input type='button' value='Voltar'></a>";
                echo "</form></div><br>";
            }else{
                
                header('Location: lista_livro.php');
            }
        ?>
    </body>
</html>
<?php
    mysqli_close($conexao);
?>