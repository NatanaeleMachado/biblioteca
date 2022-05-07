    <?php
        include_once("conectar.php");
    ?>

    <html>

    <head>
    <title>Natanaele Sistema Empréstimo Livros</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body> <!-- HTML --> 

        <header>
                <h3>Cadastrar Area</h3>
        </header>

            <div class="area">

                <p>Cadastre a area do livro abaixo: </p><br>


                <br><form method="post" action="cadastra_area.php">
                    <label>
                        Nome:
                        <input type="text" name="nome" required>
                    </label>
                    <button type="submit" name="Post" value="1">Registrar Area</button><br>&nbsp


                    <br><a href="index.html"><input type="button" value="Voltar"></a>

                </form>
            </div>

    <footer>
        <br class="clearfix" />
        </footer>

    </body>
    </html>

    <!-- Conexão PHP -->
    <?php
        if(isset($_POST['Post'])){
            $nome=$_POST['nome'];
            $sql = "INSERT INTO area (nome) VALUES ('$nome')";
            mysqli_query($conexao,$sql);
            mysqli_close($conexao);
            header('Location: lista_area.php');
        }
    ?>

