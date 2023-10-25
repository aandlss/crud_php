CREATE DATABASE db_medicamentos;
use db_medicamentos;

CREATE TABLE usuario (
    IdUsuario INT AUTO_INCREMENT,
    UsuarioNome VARCHAR(255),
    UsuarioLogin VARCHAR(255),
    UsuarioSenha VARCHAR(255),
    PRIMARY KEY(IdUsuario)
);

INSERT INTO usuario(UsuarioNome, UsuarioLogin, UsuarioSenha) values 
('André Luiz da Silva Santos','andre.santos',MD5('123456')),('Jivago','professor.jivago',MD5('159357')),('Bruce Wayne','bruce.wayne',MD5('batman'));

CREATE TABLE tipoMedicamento(
    IdTipoMedicamento INT AUTO_INCREMENT,
    tipoMedicamentoNome VARCHAR(200) NOT NULL,
    tipoMedicamentoDescricao VARCHAR(1000),
    PRIMARY KEY(IdTipoMedicamento)
);

INSERT INTO tipoMedicamento (tipoMedicamentoNome, tipoMedicamentoDescricao) VALUES
('Alopáticos',''),
('Referência', ''),
('Genéricos', ''),
('Similares', ''),
('Fitoterápicos', ''),
('Homeopáticos', ''),
('Manipulados', ''),
('Biológicos', ''),
('Fracionados', '');

CREATE TABLE medicamento (
    IdMedicamento INT AUTO_INCREMENT,
    IdTipoMedicamento INT NOT NULL,
    MedicamentoNome VARCHAR(255) NOT NULL,
    MedicamentoDescricao VARCHAR(1000),
    RegistroMS VARCHAR(13) NOT NULL,
    Fabricante VARCHAR(1000),
    QuantidadePerEmbalagem INT,
    UnidadeMedida VARCHAR(3),
    Concentracao VARCHAR(200),
    Bula TEXT,
    DataInclusao DATETIME,
    UsuarioInclusao INT,
    PRIMARY KEY(IdMedicamento),
    FOREIGN KEY(IdTipoMedicamento) REFERENCES tipoMedicamento(IdTipoMedicamento),
    FOREIGN KEY(UsuarioInclusao) REFERENCES usuario(IdUsuario)
);

