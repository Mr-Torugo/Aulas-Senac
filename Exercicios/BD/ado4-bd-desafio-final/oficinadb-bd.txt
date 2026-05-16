-- ==============================================================================
-- DESAFIO FINAL: BANCO DE DADOS EM SQLITE
-- PROJETO: Sistema de Gestão para Oficina Mecânica
-- AUTOR: Vitor Hugo de Jesus Silva
-- ==============================================================================


-- ==============================================================================
-- 1. DDL - CRIAÇÃO DAS TABELAS E REGRAS DE INTEGRIDADE
-- ==============================================================================
-- Tabela Cliente (NOT NULL, UNIQUE e AUTOINCREMENT)
CREATE TABLE Cliente (
    id_cliente INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    telefone TEXT NOT NULL,
    email TEXT UNIQUE
);

-- Tabela Veiculo (PRIMARY KEY textual, NOT NULL e FOREIGN KEY)
CREATE TABLE Veiculo (
    placa TEXT PRIMARY KEY,
    marca TEXT NOT NULL,
    modelo TEXT NOT NULL,
    ano INTEGER NOT NULL,
    id_cliente INTEGER,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente) ON DELETE SET NULL
);

-- Tabela Servico_Peca (CHECK constraint para validar tipo e preço positivo)
CREATE TABLE Servico_Peca (
    id_servico INTEGER PRIMARY KEY AUTOINCREMENT,
    descricao TEXT NOT NULL,
    tipo TEXT CHECK(tipo IN ('Servico', 'Peca')) NOT NULL,
    preco_unitario REAL NOT NULL CHECK(preco_unitario >= 0)
);

-- Tabela Ordem_Servico (CHECK constraint para o fluxo de status e DEFAULT)
CREATE TABLE Ordem_Servico (
    id_os INTEGER PRIMARY KEY AUTOINCREMENT,
    data_abertura DATE NOT NULL,
    status TEXT CHECK(status IN ('Aberta', 'Em Andamento', 'Concluída')) DEFAULT 'Aberta',
    placa_veiculo TEXT NOT NULL,
    FOREIGN KEY (placa_veiculo) REFERENCES Veiculo(placa) ON DELETE CASCADE
);

-- Tabela Intermediária Item_OS (Relacionamento N:N entre OS e Servico_Peca)
CREATE TABLE Item_OS (
    id_item_os INTEGER PRIMARY KEY AUTOINCREMENT,
    id_os INTEGER NOT NULL,
    id_servico INTEGER NOT NULL,
    quantidade INTEGER NOT NULL CHECK(quantidade > 0),
    FOREIGN KEY (id_os) REFERENCES Ordem_Servico(id_os) ON DELETE CASCADE,
    FOREIGN KEY (id_servico) REFERENCES Servico_Peca(id_servico)
);

-- ==============================================================================
-- 2. DML - INSERÇÃO DE DADOS (> 20 REGISTROS DISTRIBUÍDOS)
-- ==============================================================================

-- Inserindo Clientes (5 registros)
INSERT INTO Cliente (nome, telefone, email) VALUES 
('Vitor Hugo', '11999991111', 'vitor.hugo@email.com'),
('Yasmim Lopes', '11999992222', 'yasmim.lopes@email.com'),
('Carlos Souza', '11988883333', 'carlos.souza@email.com'),
('Ana Costa', '11977774444', 'ana.costa@email.com'),
('Roberto Dias', '11966665555', 'roberto.dias@email.com');

-- Inserindo Veículos (5 registros)
INSERT INTO Veiculo (placa, marca, modelo, ano, id_cliente) VALUES 
('ABC1234', 'Fiat', 'Uno', 2012, 1),
('XYZ9876', 'Honda', 'NXR 160 Bros', 2021, 1),
('QWE5555', 'Chevrolet', 'Onix', 2019, 2),
('RTY4444', 'Ford', 'Ka', 2015, 3),
('LMN2222', 'Honda', 'Civic', 2018, 4);

-- Inserindo Catálogo de Serviços e Peças (7 registros)
-- Observação: O Filtro de Ar Condicionado foi incluído para validar a Consulta 4 de itens sem saída.
INSERT INTO Servico_Peca (descricao, tipo, preco_unitario) VALUES 
('Troca de Óleo', 'Servico', 150.00),
('Kit Correia Dentada', 'Peca', 220.00),
('Jogo de Velas de Ignição', 'Peca', 180.00),
('Pneu Traseiro', 'Peca', 350.00),
('Cabo do Acelerador', 'Peca', 45.00),
('Alinhamento e Balanceamento', 'Servico', 120.00),
('Filtro de Ar Condicionado', 'Peca', 60.00); 

-- Inserindo Ordens de Serviço (5 registros)
INSERT INTO Ordem_Servico (data_abertura, status, placa_veiculo) VALUES 
('2026-04-10', 'Concluída', 'ABC1234'),
('2026-04-15', 'Concluída', 'XYZ9876'),
('2026-04-20', 'Em Andamento', 'QWE5555'),
('2026-05-01', 'Aberta', 'RTY4444'),
('2026-05-10', 'Aberta', 'LMN2222');

-- Inserindo Itens nas Ordens de Serviço (8 registros)
INSERT INTO Item_OS (id_os, id_servico, quantidade) VALUES 
(1, 2, 1), (1, 3, 1), -- OS 1: Correia e Velas (Fiat Uno)
(2, 4, 1), (2, 5, 1), -- OS 2: Pneu e Cabo (Honda Bros)
(3, 1, 1),            -- OS 3: Troca de Óleo (Chevrolet Onix)
(4, 1, 1),            -- OS 4: Troca de Óleo (Ford Ka)
(5, 2, 1), (5, 6, 1); -- OS 5: Correia e Alinhamento (Honda Civic)

-- ==============================================================================
-- 3. DML - MANIPULAÇÃO DE DADOS (UPDATE E DELETE)
-- ==============================================================================

-- UPDATE: Atualizando o status de uma Ordem de Serviço de 'Em Andamento' para 'Concluída'
UPDATE Ordem_Servico 
SET status = 'Concluída' 
WHERE id_os = 3;

-- DELETE: Cliente da OS 4 decidiu cancelar a troca de óleo antes do início do procedimento
DELETE FROM Item_OS 
WHERE id_os = 4 AND id_servico = 1;

-- ==============================================================================
-- 4. DQL - CONSULTAS SQL IMPLEMENTADAS E DOCUMENTADAS
-- ==============================================================================

-- ------------------------------------------------------------------------------
-- CONSULTA 1: INNER JOIN e ORDER BY
-- Objetivo: Emitir um relatório ordenado de clientes e seus respectivos veículos.
-- Lógica: Junta as tabelas Cliente e Veiculo através da FK comum id_cliente.
-- ------------------------------------------------------------------------------
SELECT 
    c.nome AS Cliente, 
    c.telefone AS Contato, 
    v.marca AS Marca, 
    v.modelo AS Modelo, 
    v.placa AS Placa
FROM Cliente c
INNER JOIN Veiculo v ON c.id_cliente = v.id_cliente
ORDER BY c.nome ASC;


-- ------------------------------------------------------------------------------
-- CONSULTA 2: FILTROS AVANÇADOS (WHERE, LIKE, IN, BETWEEN)
-- Objetivo: Identificar veículos específicos para campanhas de recall ou marketing.
-- Lógica: Filtra marcas por padrão textual (Fi%), lista exta (IN) e faixa de anos.
-- ------------------------------------------------------------------------------
SELECT placa, marca, modelo, ano 
FROM Veiculo 
WHERE (marca LIKE 'Fi%' OR marca IN ('Honda', 'Chevrolet'))
  AND ano BETWEEN 2010 AND 2022;


-- ------------------------------------------------------------------------------
-- CONSULTA 3: FUNÇÕES DE AGREGAÇÃO E GROUP BY (SUM, COUNT)
-- Objetivo: Totalizar o faturamento real e projetado mapeado por status de OS.
-- Lógica: Agrupa as OS e calcula o montante financeiro multiplicando preço por qtd.
-- ------------------------------------------------------------------------------
SELECT 
    os.status AS Status_OS, 
    COUNT(DISTINCT os.id_os) AS Total_Ordens, 
    SUM(sp.preco_unitario * io.quantidade) AS Faturamento_Total
FROM Ordem_Servico os
INNER JOIN Item_OS io ON os.id_os = io.id_os
INNER JOIN Servico_Peca sp ON io.id_servico = sp.id_servico
GROUP BY os.status;


-- ------------------------------------------------------------------------------
-- CONSULTA 4: LEFT JOIN E FILTRO IS NULL
-- Objetivo: Auditoria de portfólio. Localizar itens que NUNCA foram vendidos.
-- Lógica: O LEFT JOIN traz todo o catálogo; o filtro IS NULL captura os sem vínculo.
-- ------------------------------------------------------------------------------
SELECT sp.id_servico, sp.descricao AS Item_Sem_Saida, sp.tipo 
FROM Servico_Peca sp
LEFT JOIN Item_OS io ON sp.id_servico = io.id_servico
WHERE io.id_item_os IS NULL;


-- ------------------------------------------------------------------------------
-- CONSULTA 5: MÉDIAS, EXTREMOS E FILTRO HAVING (MIN, MAX, AVG)
-- Objetivo: Mapear modelos de carros que geram ticket médio alto por item (> R$ 100).
-- Lógica: Une 4 tabelas, agrupa por modelo e filtra os agregados com HAVING pós-calculo.
-- ------------------------------------------------------------------------------
SELECT 
    v.modelo AS Modelo_Veiculo, 
    MIN(sp.preco_unitario) AS Menor_Valor_Gasto, 
    MAX(sp.preco_unitario) AS Maior_Valor_Gasto, 
    AVG(sp.preco_unitario * io.quantidade) AS Ticket_Medio_Por_Item
FROM Veiculo v
INNER JOIN Ordem_Servico os ON v.placa = os.placa_veiculo
INNER JOIN Item_OS io ON os.id_os = io.id_os
INNER JOIN Servico_Peca sp ON io.id_servico = sp.id_servico
GROUP BY v.modelo
HAVING Ticket_Medio_Por_Item > 100.00;