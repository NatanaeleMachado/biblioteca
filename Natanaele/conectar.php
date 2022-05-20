<?php
      $servername = "localhost";
      $database = "biblioteca";
      $username = "root";
      $password = "";

      // conexão com o banco de dado
      $conexao = mysqli_connect($servername, $username, $password, $database);

      // Verifica a conexão com banco de dados
      if (!$conexao) {
      die("A conexão falhou! Tente novamente. " . mysqli_connect_error());
}
 
