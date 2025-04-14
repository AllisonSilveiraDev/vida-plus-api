# 💚 Vida+ API

A instituição **VidaPlus**, responsável por administrar hospitais, clínicas, laboratórios e equipes de home care, está implementando um **Sistema de Gestão Hospitalar e de Serviços de Saúde (SGHSS)** com o objetivo de centralizar e otimizar suas operações. Esta API, desenvolvida em **Laravel**, é o núcleo dessa solução, fornecendo recursos para o gerenciamento de pacientes, agendamentos, profissionais de saúde, unidades e muito mais.

---

 ### 🚀 Guia de Inicialização

### 1. Pré-requisitos

Antes de tudo, é necessário ter o [Docker](https://www.docker.com/) instalado em sua máquina.

### 2. Clonando o Projeto

Clone o repositório ou faça o download como `.zip`:

```
git clone https://github.com/AllisonSilveiraDev/vida-plus-api
```

### 3. ⚙️ Inicializando o Projeto
1. Acesse a pasta do projeto com sua IDE de preferência.
2. Abra o terminal na raiz do projeto.
3. Inicie os containers com o comando:
```
docker compose up -d
```
4. Acesse o container da aplicação para executar comandos do Artisan:
```
docker compose exec app bash
```
5. Instale as dependências PHP do projeto:
```
composer install
```
6. Rode as migrations e os seeders para preparar o banco de dados:
```
php artisan migrate:fresh --seed
```
7. Pronto! A API está em execução.

### 4. 🧪 Testando as Rotas no Postman
 1. Navegue até a pasta Testes-das-rotas/.
 2. Importe o arquivo .json no Postman — ele contém todas as rotas implementadas e seus testes.
 3. Nessa mesma pasta, você encontrará prints dos testes realizados.

🌐 Endpoints Úteis
- API: http://localhost:8989/api/
- phpMyAdmin: http://localhost:8080/
