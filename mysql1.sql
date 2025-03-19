CREATE DATABASE bella
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE bella;

CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE servicos (
    id_servico INT AUTO_INCREMENT PRIMARY KEY,
    nome_servico VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2)
);

CREATE TABLE agendamentos (
    id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_servico INT,
    data_agendamento DATETIME,
    status ENUM('agendado', 'realizado', 'cancelado') DEFAULT 'agendado',
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_servico) REFERENCES servicos(id_servico)
);

CREATE TABLE funcionarias (
    id_funcionaria INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo ENUM('MANICURE', 'CABELEIREIRO') NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100)
);

-- Índices para otimizar buscas
CREATE INDEX idx_cliente_nome ON clientes(nome);
CREATE INDEX idx_servico_nome ON servicos(nome_servico);
CREATE INDEX idx_agendamento_data ON agendamentos(data_agendamento);