-- 1. Criação do Banco de Dados
CREATE DATABASE EmpresaDB;
USE EmpresaDB;

-- 2. Criação das Tabelas
CREATE TABLE Departamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE Funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    salario DECIMAL(10,2) NOT NULL,
    data_admissao DATE NOT NULL,
    departamento_id INT,
    FOREIGN KEY (departamento_id) REFERENCES Departamentos(id)
);

-- 3. Inserção de Dados (Departamentos)
INSERT INTO Departamentos (nome) VALUES 
('TI'), ('RH'), ('Financeiro'), ('Marketing'), ('Vendas');

-- 3. Inserção de Dados (Funcionarios)
INSERT INTO Funcionarios (nome, cargo, salario, data_admissao, departamento_id) VALUES 
('Ana Silva', 'Desenvolvedora', 6000.00, '2023-01-15', 1),
('Bruno Souza', 'Analista de Sistemas', 5500.00, '2022-05-20', 1),
('Carla Dias', 'Gerente de RH', 7000.00, '2021-03-10', 2),
('Diego Lima', 'Contador', 4800.00, '2023-06-01', 3),
('Elena Rose', 'Analista de Marketing', 4200.00, '2023-08-12', 4),
('Fabio Jr', 'Vendedor', 3200.00, '2024-01-10', 5),
('Gisele B.', 'DevOps', 8500.00, '2022-11-30', 1),
('Hugo Moss', 'Recrutador', 3800.00, '2023-02-25', 2),
('Igor Rick', 'Analista Financeiro', 5200.00, '2022-09-15', 3),
('Julia Paz', 'Social Media', 3500.00, '2023-12-05', 4);

-- 4. Consultas SQL
-- a) Todos os funcionários
SELECT * FROM Funcionarios;

-- b) Apenas funcionários de TI (ID 1)
SELECT * FROM Funcionarios WHERE departamento_id = 1;

-- c) Salário superior a R$ 5000,00
SELECT * FROM Funcionarios WHERE salario > 5000.00;

-- d) Nome do funcionário e nome do departamento (JOIN)
SELECT f.nome AS Funcionario, d.nome AS Departamento
FROM Funcionarios f
INNER JOIN Departamentos d ON f.departamento_id = d.id;

-- 5. Atualização e Remoção
-- a) Atualizar salário de um funcionário (Ex: Ana Silva ID 1)
UPDATE Funcionarios SET salario = 6500.00 WHERE id = 1;

-- b) Deletar um funcionário (Ex: Fabio Jr ID 6)
DELETE FROM Funcionarios WHERE id = 6;