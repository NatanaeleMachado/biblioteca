<?php
    include_once("conectar.php");
    
    if (isset($_POST['Edit'])) {
        
        $title='Editar';
    }elseif(isset($_POST['Delete'])){
        
        $title='Deletar';
    }elseif(isset($_POST['Edited'])){
        
        $matriculaUP=$_POST['Edited'];
        $nomeUP=$_POST['nome'];
        $emailUP=$_POST['email'];
        $cpfUP=$_POST['cpf'];
        $nascUP=$_POST['nasc'];
        $sql="UPDATE aluno SET nome = '$nomeUP', email = '$emailUP', cpf = '$cpfUP', data_nasc = '$nascUP'  WHERE matricula = '$matriculaUP' ";
        mysqli_query($conexao,$sql);
    }elseif(isset($_POST['Deleted'])){
        
        $matriculaDEL=$_POST['Deleted'];
        $sql="DELETE FROM aluno WHERE matricula = '$matriculaDEL'";
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
                echo "<header><h3>Editar Informações do Aluno</h3>";

                if (isset($_POST['Edit'])) {
                
                $editid=$_POST['Edit'];
                $sql = "SELECT * FROM aluno WHERE matricula = $editid";
                $resultado=mysqli_fetch_array(mysqli_query($conexao,$sql));

                $nome=$resultado['nome'];
                $email=$resultado['email'];
                $cpf=$resultado['cpf'];
                $data_nasc=$resultado['data_nasc'];
                
                echo "<div id='editar_aluno'>";
                echo "<p>Edite as informações do aluno abaixo: </p>";
                echo "<form action'editar_aluno.php' method='post'>";
                echo "<br><label>Nome:<input type='text' name='nome' placeholder='$nome' required></label><br>";
                echo "<br><label>Email:<input type='email' name='email' placeholder='$email' required></label><br>";
                echo "<br><label>CPF:<input type='number' name='cpf' placeholder='$cpf' required></label><br>";
                echo "<br><label>Nascimento: <input type='date' name='nasc' required>$data_nasc</label><br>";
                echo "<br><button type='submit' name='Edited' value='$editid'>Alterar</button>";
                echo "&nbsp&nbsp&nbsp<a href='index.html'><input type='button' value='Voltar'></a>";
                echo "</form></div>";

            }elseif(isset($_POST['Delete'])){
                $deleteid=$_POST['Delete'];
                $sql = "SELECT * FROM aluno WHERE matricula = $deleteid";
                $resultado=mysqli_fetch_array(mysqli_query($conexao,$sql));

                $nome=$resultado['nome'];
                echo "<div id='delete'>";
                echo "Você irá excluir o aluno ($nome).<br><br>";
                echo "<form action='editar_aluno.php' method='post'>";
                echo "<button type='submit' name='Deleted' value='$deleteid'>Sim</button>";
                echo "&nbsp&nbsp<button onClick='history.go(-1)'>Não</button><br><br>";
                echo "&nbsp&nbsp&nbsp&nbsp<a href='index.html'><input type='button' value='Voltar'></a>";
                echo "</form><br>";
                
            }else{
                
                header('Location: lista_aluno.php');
            }
        ?>
        </div>
    </body>
</html>

<?php
    mysqli_close($conexao);
?>