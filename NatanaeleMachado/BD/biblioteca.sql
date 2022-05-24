/*Criar banco de dados*/
CREATE DATABASE biblioteca;

/*Criar tabela aluno*/
CREATE TABLE aluno(
matricula INT AUTO_INCREMENT NOT NULL,
nome VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL,
data_nasc DATE NOT NULL,
PRIMARY KEY(matricula)
);


/*Criar tabela area*/
CREATE TABLE area(
id INT AUTO_INCREMENT NOT NULL,
nome VARCHAR(50) NOT NULL,
PRIMARY KEY(id)
);

/*Criar tabela livro*/
CREATE TABLE livro(
id INT AUTO_INCREMENT NOT NULL,
titulo VARCHAR(50) NOT NULL,
autor VARCHAR(50) NOT NULL,
status BOOLEAN NOT NULL,
id_area INT NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(id_area) REFERENCES area(id) ON DELETE RESTRICT 
);

/*Criar tabela reserva*/
CREATE TABLE reserva(
id INT AUTO_INCREMENT NOT NULL,
status BOOLEAN NOT NULL,
data_retirada DATE NOT NULL,
data_entrega DATE NOT NULL,
matricula INT NOT NULL,
id_livro INT NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(matricula) REFERENCES aluno(matricula) ON DELETE RESTRICT,
FOREIGN KEY(id_livro) REFERENCES livro(id) ON DELETE RESTRICT
);