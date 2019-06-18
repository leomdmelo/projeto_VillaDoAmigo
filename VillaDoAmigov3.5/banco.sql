CREATE TABLE usuario (
    idUsuario int AUTO_INCREMENT primary key not null,
    login varchar(300) not null,
    senha varchar(300) not null,
    tipo int(1) not null,
    nome varchar(30) not null,
    sobrenome varchar(200) not null,
    cpf varchar(12) not null,
    telefone varchar(15),
    celular varchar(15),
    email varchar(300) not null,
    cep int(8) not null,
    bairro varchar(100),
    cidade varchar(100),
    estado varchar(100)
);

CREATE TABLE animal (
    idanimal int AUTO_INCREMENT PRIMARY KEY not null,
    doador varchar(300) not null,
    adotante varchar(300),
    nome varchar (50) not null,
    especie varchar(100) not null,
    sexo varchar(10) not null,
    raca varchar(50) not null,
    porte varchar(50) not null,
    docil varchar(15) not null,
    vacinado varchar(100) not null,
    peso varchar(25) not null,
    idade varchar(50) not null,
    pelagem varchar (50) not null,
    castrado varchar(10) not null,
    foto varchar(300) not null
);

CREATE TABLE solicitacoes (
    id_solic int AUTO_INCREMENT PRIMARY KEY not null,
    id_animal int(11) not null,
    login_doador varchar(100) not null,
    solicitante varchar(100) not null
);

CREATE TABLE parceiro (
    id_parceiro int AUTO_INCREMENT PRIMARY KEY not null,
    nome_parceiro varchar(300) not null,
    email_parceiro varchar(300) not null
)