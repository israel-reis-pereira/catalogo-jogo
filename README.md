# Projeto Catálogo de Jogos (PHP + MySQL)

## Sobre

Este projeto começou como um trabalho desenvolvido durante o curso Técnico em Desenvolvimento de Sistemas da ETEC Barretos.

Atualmente ele está sendo utilizado como um projeto de estudo contínuo durante a graduação em Sistemas de Informação, servindo como laboratório para aplicar conceitos de Engenharia de Software, Programação Orientada a Objetos (POO), modelagem de banco de dados, segurança em aplicações web e boas práticas de desenvolvimento.

O objetivo não é apenas adicionar funcionalidades, mas também evoluir gradualmente a arquitetura do sistema, documentando todas as melhorias através do histórico do GitHub.

---

## Tecnologias

* Linguagem: PHP
* Banco de Dados: MySQL
* Front-end: HTML5 + W3.CSS
* Paradigma: Programação Orientada a Objetos (POO)
* Acesso ao banco: PDO

---

## Melhorias Realizadas

### Funcionalidades

* Página de detalhes totalmente dinâmica.
* Navegação por parâmetros na URL.
* Botão **Ver** funcional para qualquer jogo cadastrado.
* Listagem dinâmica dos jogos cadastrados.

### Banco de Dados

* Normalização da entidade Gênero.
* Criação da tabela `tblgenero`.
* Relacionamento N:N entre Jogos e Plataformas.
* Separação entre imagem de capa e galeria.
* Estrutura preparada para expansão do catálogo.

### Programação Orientada a Objetos

* Criação da classe `Genero`.
* Integração da classe `Genero` com a entidade `Jogo`.
* Padronização das entidades do projeto.
* Melhor organização da arquitetura utilizando encapsulamento.

### Segurança

Durante a refatoração do projeto foram implementadas melhorias focadas em aumentar a segurança da aplicação sem alterar sua simplicidade didática.

* Substituição de consultas SQL concatenadas por **Prepared Statements** utilizando PDO.
* Proteção contra ataques de **SQL Injection**.
* Validação dos parâmetros recebidos pela URL utilizando `filter_input()` e conversão para inteiros quando necessário.
* Tratamento básico de exceções nas entidades para evitar erros de índice inexistente.
* Escape de saída utilizando `htmlspecialchars()` para reduzir riscos de **Cross-Site Scripting (XSS)**.
* Isolamento das credenciais do banco de dados em arquivo de configuração (`credenciais.ini`).
* Organização da classe de conexão (`BD`) para facilitar futuras melhorias na camada de acesso ao banco.

---

## Roadmap de Desenvolvimento

### Fase 1 — Funcionalidade

- [x] Página dinâmica.
- [x] Botão Ver.
- [x] Navegação por ID.
- [x] Exibição dinâmica dos jogos.

### Fase 2 — Modelagem

- [x] Classe Genero.
- [x] Tabela tblgenero.
- [x] Integração do gênero ao sistema.
- [x] Exibição correta do gênero.
- [x] Relacionamento muitos-para-muitos entre Jogos e Plataformas.

### Fase 3 — Segurança

- [x] Prepared Statements com PDO.
- [x] Proteção contra SQL Injection.
- [x] Escape de saída com `htmlspecialchars()`.
- [x] Validação de parâmetros utilizando `filter_input()`.
- [x] Tratamento básico de exceções.
- [x] Isolamento das credenciais do banco de dados.

### Fase 4 — Banco de Dados

- [ ] Adicionar Foreign Keys.
- [ ] Adicionar restrições NOT NULL.
- [ ] Criar índices para otimização.
- [ ] Revisar normalização geral do banco.

### Fase 5 — Arquitetura

- [ ] Reaproveitar a conexão PDO (Singleton ou conexão compartilhada).
- [ ] Reduzir conexões repetidas ao banco de dados.
- [ ] Separar responsabilidades da classe `Jogo` (Single Responsibility Principle).
- [ ] Criar camada Repository/DAO.

### Fase 6 — Interface

- [ ] Refatorar a página inicial utilizando `foreach`.
- [ ] Melhorar responsividade.
- [ ] Melhorar organização da galeria.
- [ ] Melhorar layout da ficha técnica.

### Fase 7 — Funcionalidades

- [ ] CRUD completo de Jogos.
- [ ] CRUD de Plataformas.
- [ ] CRUD de Gêneros.
- [ ] Upload de imagens.
- [ ] Pesquisa.
- [ ] Paginação.
- [ ] Sistema de Login.

### Fase 8 — Arquitetura Avançada

- [ ] Refatoração completa para MVC.
- [ ] Controllers.
- [ ] Sistema de Rotas.
- [ ] Autoload.
- [ ] Composer.

---

## Objetivo Final

Transformar um projeto acadêmico desenvolvido durante o curso Técnico em Desenvolvimento de Sistemas da ETEC Barretos em uma aplicação cada vez mais próxima de sistemas utilizados profissionalmente, utilizando o projeto como laboratório para estudar arquitetura de software, refatoração, segurança em aplicações web, Programação Orientada a Objetos e boas práticas de desenvolvimento.

Toda a evolução é documentada através do histórico de commits e versões do GitHub.

---

## Lista de Controle (Issues Relacionadas)

* Issue #1: [x] Tornar a página dinâmica.
* Issue #2: [x] Criar entidade Genero.
* Issue #3: [x] Implementar Prepared Statements.
* Issue #4: [x] Proteger contra SQL Injection.
* Issue #5: [x] Implementar tratamento básico de exceções.
* Issue #6: [x] Validar parâmetros da URL.
* Issue #7: [x] Implementar `htmlspecialchars()` nas saídas HTML.
* Issue #8: [ ] Adicionar Foreign Keys ao banco.
* Issue #9: [ ] Remover conexões repetidas ao banco.
* Issue #10: [ ] Criar camada Repository/DAO.
* Issue #11: [ ] Refatorar para MVC.
* Issue #12: [ ] Desenvolver CRUD completo.
* Issue #13: [ ] Sistema de Login.
* Issue #14: [ ] Upload de imagens.
* Issue #15: [ ] Sistema de pesquisa.

---

## Configuração do Ambiente

O sistema utiliza um arquivo de configuração para armazenar as credenciais do banco de dados.

Crie o arquivo:

```ini
projeto/config/credenciais.ini
```

Utilizando a seguinte estrutura:

```ini
DB_HOST=seu_servidor_banco_dados
DB_NAME=seu_nome_banco_dados
DB_USER=seu_usuario_banco_dados
DB_PASS=sua_senha_banco_dados
```

---

## Como Executar o Projeto
Como o GitHub armazena apenas os arquivos estáticos e o código-fonte (não executando código PHP), existem algumas alternativas para executar o projeto.

### 1. Ambiente Local (Recomendado)
Utilize uma pilha de desenvolvimento como:
* XAMPP
* WAMP
* Laragon
Executando Apache + PHP + MySQL.

### 2. Docker (Objetivo Futuro)
No futuro o projeto contará com um ambiente totalmente conteinerizado.

```bash
docker compose up
```

### 3. Ambiente de Produção (Hospedagem Web)
O sistema está publicado e operacional através do serviço InfinityFree para fins de demonstração e construção de portfólio.
Link do projeto:http://catalogo-jogo.freehosting.dev
