# Galeria Pedra Branca

Site web da **Galeria Casa Pedra Branca**, com apresentação da história do espaço, exposições, acervo de obras à venda, carrinho de compras e área administrativa para gerenciar as obras.

> Projeto desenvolvido em **PHP + MySQL**, pensado para rodar localmente com **XAMPP**.
>

## 📑 Sumário
- [Funcionalidades](#-funcionalidades)
- [Tecnologias](#-tecnologias)
- [Pré-requisitos](#-pré-requisitos)
- [Instalação e execução](#-instalação-e-execução)
- [Configuração](#-configuração)
- [Acesso e usuários de teste](#-acesso-e-usuários-de-teste)
- [Estrutura do projeto](#-estrutura-do-projeto)
- [Banco de dados](#-banco-de-dados)
- [Solução de problemas](#-solução-de-problemas)
- [Melhorias futuras](#-melhorias-futuras)
- [Autores](#-autores)
- [Licença](#-licença)


## ✨ Funcionalidades

**Para visitantes**
- Página inicial e página com a **história da Galeria Casa Pedra Branca**
- Páginas de **exposições**: *Ceci*, *Ilha*, *Medusas* e *Jungle City 3022*
- **Acervo** com listagem de obras (nome, autor, data, técnica/dimensões e valor)
- Página de **detalhes** de cada obra
- **Cadastro** e **login** de usuários (senhas armazenadas com hash, via `password_hash` / `password_verify`)

**Para usuários logados**
- **Carrinho de compras**: adicionar obras, visualizar e ver detalhes dos itens
- Redirecionamento ao login quando tenta acessar o carrinho sem estar autenticado

**Para administradores**
- **Cadastro de obras** com upload de imagem
- **Edição** e **exclusão** de obras
- Controle de acesso pelo campo `is_admin` (usuários comuns são redirecionados para a listagem)

---

## 🛠 Tecnologias

- **PHP** (testado com 8.2)
- **MySQL / MariaDB** (testado com MariaDB 10.4)
- **HTML5**, **CSS3** e **JavaScript** (`script.js`, `script2.js`)
- **XAMPP** (Apache + MySQL + phpMyAdmin) como ambiente local

---

## ✅ Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) instalado (ou outra stack Apache + PHP + MySQL equivalente)
- Navegador atualizado
- (Opcional) [Git](https://git-scm.com/) para clonar o repositório

---

## 🚀 Instalação e execução

### 1. Obtenha o projeto

```bash
git clone https://github.com/ditoslv/Galeria-Pedra-Branca.git
```

Ou baixe o `.zip` pelo botão **Code → Download ZIP** e extraia.

### 2. Coloque a pasta no `htdocs`

Copie a pasta `Galeria-Pedra-Branca` para o diretório `htdocs` do XAMPP:

| Sistema | Caminho |
|---|---|
| Windows | `C:\xampp\htdocs\Galeria-Pedra-Branca` |
| Linux | `/opt/lampp/htdocs/Galeria-Pedra-Branca` |
| macOS | `/Applications/XAMPP/htdocs/Galeria-Pedra-Branca` |

### 3. Inicie os serviços

Abra o **XAMPP Control Panel** e clique em **Start** em:
- **Apache**
- **MySQL**

### 4. Crie o banco de dados

1. Acesse <http://localhost/phpmyadmin>
2. Clique em **Novo**
3. Nome do banco: **`galeria2`** (exatamente assim, em minúsculas)
4. Collation: `utf8mb4_general_ci` → **Criar**

### 5. Importe o script SQL

1. Selecione o banco `galeria2`
2. Aba **Importar** → **Escolher arquivo**
3. Selecione `banco de dados/galeria2.sql`
4. Clique em **Importar**

### 6. Acesse o site

<http://localhost/Galeria-Pedra-Branca/index.php>

---

## ⚙ Configuração

A conexão com o banco fica em [`conexao.php`](conexao.php):

```php
$servername = "localhost";
$username   = "root";
$password   = "";          // senha padrão do XAMPP é vazia
$dbname     = "galeria2";
```

Se o seu MySQL tiver senha no `root` (ou outro usuário/porta), ajuste esses valores.

> ⚠️ Estas são as credenciais padrão do XAMPP, indicadas **apenas para desenvolvimento local**. Nunca use `root` sem senha em um servidor público.

---

## 🔐 Acesso e usuários de teste

Para criar uma conta, acesse `registro.php`.

Para tornar um usuário **administrador**:

1. Cadastre-se normalmente pelo site
2. No phpMyAdmin, abra o banco `galeria2` → tabela `usuarios`
3. Edite o registro desejado e altere `is_admin` para `1`

<!-- Se criar um usuário de demonstração, documente aqui:
| E-mail | Senha | Perfil |
|---|---|---|
| admin@exemplo.com | ******** | Administrador |
-->

---

## 📁 Estrutura do projeto

```
Galeria-Pedra-Branca/
├── banco de dados/
│   └── galeria2.sql          # Script de criação e carga do banco
├── img/
│   ├── capas/                # Imagens de capa das páginas e exposições
│   ├── fotosexp/             # Fotos das exposições
│   ├── fotos_historia/       # Fotos da página de história
│   └── logos/                # Logos e ícones
├── uploads/                  # Imagens das obras (enviadas pelo admin)
├── conexao.php               # Conexão com o MySQL
├── index.php                 # Página inicial
├── historia.php              # História da galeria
├── exposicoes.php            # Lista de exposições
├── ceci.php                  # Exposição: Ceci
├── ilha.php                  # Exposição: Ilha
├── medusa.php                # Exposição: Medusas
├── junglecity3022.php        # Exposição: Jungle City 3022
├── listagem.php              # Acervo / listagem de obras
├── detalhes.php              # Detalhes de uma obra
├── carrinho.php              # Carrinho de compras
├── detalharcarrinho.php      # Detalhes de um item do carrinho
├── registro.php              # Formulário de cadastro de usuário
├── cadastrar.php             # Processa o cadastro
├── login.php                 # Login
├── logout.php                # Logout
├── cadastro_obras.php        # (admin) Cadastro de obras
├── editar.php                # (admin) Edição de obras
├── excluir.php               # (admin) Exclusão de obras
├── edits.css                 # Estilos
├── script.js / script2.js    # Scripts do front-end
└── README.md
```

---

## 🗄 Banco de dados

Banco: **`galeria2`**

| Tabela | Descrição | Principais colunas |
|---|---|---|
| `usuarios` | Usuários do sistema | `id`, `nome`, `email`, `senha` (hash), `is_admin` |
| `obras` | Acervo de obras | `id`, `nome`, `autor`, `data_obra`, `valor`, `descricao`, `foto` |
| `carrinho` | Itens no carrinho de cada usuário | `user_id`, `obra_id` |

Relacionamento: `carrinho.user_id` → `usuarios.id` e `carrinho.obra_id` → `obras.id`.

---

## 🧰 Solução de problemas

| Problema | Possível causa / solução |
|---|---|
| `Conexão falhou` ou `Unknown database 'galeria2'` | O banco não foi criado com o nome exato `galeria2`, ou o MySQL não está rodando. |
| `Access denied for user 'root'` | O `root` do seu MySQL tem senha: ajuste `$password` em `conexao.php`. |
| Apache não inicia | Porta 80 ocupada (Skype, IIS etc.). Altere `Listen` no `httpd.conf` (ex.: `8080`) e acesse `http://localhost:8080/...`. |
| Upload de obra falha | Verifique se a pasta `uploads/` existe e tem permissão de escrita (Linux/macOS: `chmod -R 775 uploads`). |
| Imagens não aparecem | Confirme que a pasta do projeto se chama `Galeria-Pedra-Branca` e está dentro do `htdocs`. |
| Acentos quebrados | Garanta que o banco e as tabelas usam `utf8mb4`. |

---

## 🔮 Melhorias futuras

- Migrar todas as consultas SQL para *prepared statements* (parte já usa)
- Validação e restrição de tipo/tamanho no upload de imagens
- Finalização de compra / integração com meio de pagamento
- Paginação e busca no acervo
- Layout totalmente responsivo
- Separar configuração sensível em arquivo de ambiente (`.env`)

---

## 👥 Autores

<!-- Ajuste nomes e links -->
- **Seu Nome** — [@seu-usuario](https://github.com/seu-usuario)

Orientação / instituição: <!-- ex.: Prof. Fulano — UFAPE -->

### Créditos

As obras, fotografias e textos exibidos pertencem aos respectivos artistas e à Galeria Casa Pedra Branca, sendo usados aqui apenas para fins demonstrativos/acadêmicos.

---

## 📄 Licença

O **código-fonte** deste projeto está sob a licença [MIT](LICENSE).

As **imagens e conteúdos artísticos** não estão cobertos por esta licença e permanecem sob os direitos de seus autores.
