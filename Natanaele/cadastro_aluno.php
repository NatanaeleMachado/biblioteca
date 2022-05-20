<html>
	<head>
		
		<title>Sistema Emprestimo de Livro</title>
		<link rel="stylesheet" href="estilo.css">
	</head>

	<body> <!-- HTML -->

		<header>
			<h3>Cadastro de Aluno</h3>
		</header>

		<div class="aluno">
			<form method="post" action="cadastro_aluno.php">

				<p>Faça o cadastro dos anulos preenchendo o formulário abaixo:</p>


				<br><label>
					Nome:
					<input type="text" name="nome" required>
				</label><br>

				<br><label>
					Email:
					<input type="email" name="email" required>
				</label><br>

				<br><label>
					CPF:
					<input type="number" name="cpf" required>
				</label><br>

				<br><label>
					Data de Nascimento:
					<input type="date" name="data_nasc" required>
				</label><br>

				<br><button type="submit" name="Post" value="1">Cadastrar Aluno</button>
				&nbsp&nbsp&nbsp<a href="index.html"><input type="button" value="Voltar"></a>

			</form>
		</div>
	</body>
</html>

<!-- Conexão php -->
<?php
    include_once("conectar.php");
    if(isset($_POST['Post'])){
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $cpf=$_POST['cpf'];
        $data_nasc=$_POST['data_nasc'];
        $sql = "INSERT INTO aluno (nome, email, cpf, data_nasc) VALUES ('$nome','$email','$cpf','$data_nasc')";
        mysqli_query($conexao,$sql);
        mysqli_close($conexao);
        header('Location: lista_aluno.php');
    }
?>
