    <?php 
        include_once("conectar.php");
    ?>

    <html> <!-- HTML -->

    <head>
    <title>Sistema Empréstimo Livros</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body>

        <header>
                <h3>Cadastrar Livro</h3>
        </header>

        <div class="livro">

                <p>Cadastre o livro na sua biblioteca: </p>

                <form method="post" action="cadastro_livro.php">

                    <br><label>
                        Titulo:
                        <input type="text" name="titulo" required>
                    </label><br>

                    <br><label>
                        Autor:
                        <input type="text" name="autor" required>
                    </label><br>

                    <br><label>
                        Area:

                        <select name="id_area" required>
                        <?php
                            $sql = "SELECT * FROM area";
                            $resultado=mysqli_query($conexao,$sql);
                            while($data=mysqli_fetch_array($resultado)){
                                $id=$data['id'];
                                $nome=$data['nome'];
                                echo "<option value='$id'>$nome</option>";
                            }
                        ?>
                        </select>
                    </label><br>

                    <br><br><button type="submit" name="Post" value="1">Cadastrar Livro</button>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.html"><input type="button" value="Voltar"></a>

                </form>
            </div>

        <footer>
            <br class="clearfix" />
        </footer>

    </body>
    </html>

    <?php
        if(isset($_POST['Post'])){
            $titulo=$_POST['titulo'];
            $autor=$_POST['autor'];
            $idarea=$_POST['id_area'];
            $sql = "INSERT INTO livro (titulo, autor, status, id_area) VALUES ('$titulo','$autor','1','$idarea')";
            mysqli_query($conexao,$sql);
            mysqli_close($conexao);
            header('Location: lista_livro.php'); 
        }
    ?>
