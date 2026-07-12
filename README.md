# Projeto Catálogo de Jogos (PHP + MySQL)

## Sobre
Este projeto começou como um trabalho desenvolvido durante o curso Técnico em Desenvolvimento de Sistemas da ETEC Barretos.

O objetivo atual é utilizar esse sistema como estudo de engenharia reversa, refatoração, Programação Orientada a Objetos, modelagem de banco de dados e boas práticas de desenvolvimento, evoluindo gradualmente o projeto original.

O desenvolvimento continuará ao longo da graduação em Sistemas de Informação.

---

## Tecnologias
* Linguagem: PHP
* Banco de Dados: MySQL
* Front-end: HTML, CSS (W3.CSS)
* Paradigma: Programação Orientada a Objetos (POO)

---

## Melhorias Realizadas

### Funcionalidades
* Página de detalhes dinâmica: Exibição dinâmica de qualquer jogo cadastrado.
* Navegação inteligente: Utilização de parâmetros pela URL com o botão Ver funcional.

### Banco de Dados
* Normalização: Criação da tabela tblgenero para melhor consistência.
* Modelagem N:N: Estruturação de plataformas utilizando relacionamento muitos-para-muitos.
* Arquivos: Separação clara entre imagens de capa e galeria.
* Carga de Dados: Inserção de novos jogos utilizando o novo modelo relacional.

### Programação Orientada a Objetos
* Entidades: Criação da classe Genero.
* Abstração: Integração da classe Genero à classe Jogo.
* Exibição: Apresentação do nome textual do gênero em vez de exibir apenas o ID.
* Arquitetura: Padronização da estrutura das entidades do projeto.

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

### Fase 3 — Banco de Dados
- [ ] Adicionar Foreign Keys.
- [ ] Adicionar restrições NOT NULL.
- [ ] Criar índices para otimização.
- [ ] Revisar normalização geral do banco.

### Fase 4 — Arquitetura
- [ ] Melhorar tratamento de erros e exceções.
- [ ] Reduzir conexões repetidas ao banco de dados.
- [ ] Separar responsabilidades da classe Jogo (Single Responsibility Principle).
- [ ] Criar camada de acesso aos dados (DAO/Repository).

### Fase 5 — Interface
- [ ] Melhorar layout visual e responsividade da página inicial.
- [ ] Otimizar visualização das galerias de imagens.
- [ ] Melhor organização estrutural da ficha técnica.

### Fase 6 — Funcionalidades
- [ ] CRUD completo de Jogos, Plataformas e Gêneros.
- [ ] Upload de imagens para o servidor.
- [ ] Sistema de pesquisa avançada e paginação de resultados.

### Fase 7 — Arquitetura Avançada
- [ ] Refatoração completa para o padrão MVC (Model-View-Controller).
- [ ] Criação de sistema de Rotas e Controllers dedicado.

---

## Objetivo Final
Transformar um projeto acadêmico inicial em um sistema robusto e próximo de aplicações utilizadas profissionalmente no mercado, documentando toda a evolução de engenharia de software diretamente através do histórico do GitHub.

---

## Lista de Controle (Issues Relacionadas)
* Issue #1: [x] Tornar a página dinâmica.
* Issue #2: [x] Criar entidade Genero.
* Issue #3: [ ] Adicionar Foreign Keys ao banco.
* Issue #4: [ ] Melhorar tratamento de exceções.
* Issue #5: [ ] Remover conexões repetidas ao banco.
* Issue #6: [ ] Refatorar classe Jogo (SRP).
* Issue #7: [ ] Criar camada Repository/DAO.
* Issue #8: [ ] Refatorar para padrão MVC.
* Issue #9: [ ] Implementar CRUD completo.
* Issue #10: [ ] Desenvolver Sistema de Login.
* Issue #11: [ ] Implementar upload de imagens.
* Issue #12: [ ] Criar busca e filtros.

---

## Configuração do Ambiente

O sistema utiliza variáveis de ambiente para gerenciar as credenciais do banco de dados de forma segura. Crie um arquivo de configurações na pasta interna indicada pelo projeto utilizando a estrutura de chaves abaixo:

```ini
DB_HOST=seu_servidor_banco_dados
DB_NAME=seu_nome_banco_dados
DB_USER=seu_usuario_banco_dados
DB_PASS=sua_senha_banco_dados
```

---

## Como Executar o Projeto

Como o GitHub armazena apenas os arquivos estáticos e o código-fonte (ele não executa código PHP), existem algumas alternativas para rodar este projeto:

### 1. Ambiente Local (Recomendado para Desenvolvimento)
Para rodar em sua máquina, você precisará de uma pilha de servidores local como o XAMPP, rodando o Apache com suporte a PHP e o MySQL via localhost.

### 2. Conteinerização com Docker (Objetivo Futuro)
Ideal para executar o projeto isoladamente sem instalar dependências locais. No futuro, o projeto contará com um arquivo de configuração para inicialização rápida:
```bash
docker compose up
```

### 3. Ambiente de Produção (Hospedagem Web)
O sistema está publicado e totalmente operacional na nuvem através do serviço InfinityFree. A aplicação e sua estrutura de banco de dados relacional podem ser acessadas publicamente através do endereço:

Link do projeto: http://catalogo-jogo.freehosting.dev