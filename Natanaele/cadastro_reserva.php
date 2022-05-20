<?php
    include_once("conectar.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="estilo.css">
        <title>Sistema Empréstimo Livros</title>
	</head>

	<body> <!-- HTML -->

        <header>
            <h3>Reservar Livros</h3>
            
        </header>

        <div class="livro">

            <form method="post" action="cadastro_reserva.php">

                <p>Faça a reserva dos alunos preenchendo os seguintes dados: </p>

                <br><label>
                    Aluno:
                    <select name="matricula" required>

                        <!-- Conexão PHP -->
                        <?php
                            $sql = "SELECT * FROM aluno";
                            $resultado=mysqli_query($conexao,$sql);
                            while($data=mysqli_fetch_array($resultado)){
                                $matricula=$data['matricula'];
                                $nome=$data['nome'];
                                echo "<option value='$matricula'>$nome</option>";
                            }
                        ?>

                    </select>
                </label>
                <br> 

                <!-- Conexão PHP -->
                <br><?php
                    $sql = "SELECT * FROM livro WHERE status=1";
                    $resultado=mysqli_query($conexao,$sql);
                    $notempty=false;
                    echo "Livro:";
                    while($data=mysqli_fetch_array($resultado)){
                        $id=$data['id'];
                        $titulo=$data['titulo'];
                        echo "<label><input type='radio' name='id_livro' value='$id'>$titulo</label><br>";
                        $notempty=true;
                    }
                    if(!$notempty){
                        echo "<h1>Sem livros disponiveis</h1>";
                    }
                ?>

                <br><label>
                    Data Entrega:
                    <input type="date" name="data_entrega" require>
                </label>
                <button type="submit" name="Post" value="1">Retirar Livro</button><br>
                <br><br><a href="index.html"><input type="button" value="Voltar"></a>
                
            </form>
        </div>
	</body>
</html>


<!-- Conexão PHP -->
<?php
    if (isset($_POST['Post'])) {
        $aluno=$_POST['matricula'];
        $livro=$_POST['id_livro'];
        $entrega=$_POST['data_entrega'];

            $sql="INSERT INTO reserva(status, data_retirada, data_entrega, matricula, id_livro) VALUES('1', NOW(),'$entrega','$aluno','$livro')";
            mysqli_query($conexao,$sql);
            $sql="UPDATE livro SET status=0 WHERE id=$livro";
            mysqli_query($conexao,$sql);
            header('Location: reserva.php');
    }

    mysqli_close($conexao)
?>