Perfeito, Daniel 🙌. Aqui está o texto já formatado em Markdown para você usar direto no README.md, com títulos, listas e blocos de código bem organizados:
# 📚 Sistema de Cadastro de Livros

Este projeto é uma aplicação desenvolvida em **Laravel** para gerenciar livros, autores e assuntos.  
O sistema permite cadastrar, editar, listar e excluir registros, além de gerar relatórios relacionando autores, livros e seus respectivos assuntos.

---

## 🚀 Tecnologias utilizadas
- Laravel 10  
- PHP 8.1+  
- MySQL/MariaDB  
- Composer  
- Bootstrap (para o front-end)  

---

## ⚙️ Pré-requisitos
Antes de rodar o projeto, você precisa ter instalado na sua máquina:
- Docker  
- Docker Compose  

---

## 📊 Relatórios
O sistema possui uma **view SQL** (`vw_autores_livros_assuntos`) que consolida informações de autores, livros e assuntos.  
Ela é utilizada para gerar relatórios no próprio sistema e também pode ser exportada em PDF.

---

## 📂 Estrutura principal
- `app/Models` → Models da aplicação  
- `app/Http/Controllers` → Controllers com regras de negócio  
- `resources/views` → Blades (telas do sistema)  
- `database/migrations` → Estrutura do banco de dados  
- `routes/web.php` → Rotas da aplicação  

---

 ▶️ Como subir os containers

Na raiz do projeto, rode o seguinte comando:

```bash
docker compose up -d --build
```

Isso vai criar:
- Um container com PHP + Laravel (app)
- Um container com MySQL
- Um container com Nginx

## 🌐 Acesso ao sistema

Após os containers subirem, o sistema estará disponível na porta 8000.
Basta acessar no navegador:
👉 http://localhost:8000/

