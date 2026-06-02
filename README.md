🚀 Gerenciador de Materiais com Laravel Blade

Um sistema completo para controle de materiais desenvolvido com Laravel, Blade e Tailwind CSS. O projeto segue boas práticas do padrão MVC, proporcionando uma experiência simples e eficiente para operações de CRUD, além de recursos como filtragem por categorias, alertas de estoque baixo em tempo real e gerenciamento avançado de imagens.

🛠️ Tecnologias Utilizadas

Backend: Laravel 12 (PHP 8.2+)
Frontend: Blade + Tailwind CSS
Banco de Dados: MySQL
Datas: Carbon (integrado ao Eloquent)

✨ Principais Funcionalidades

CRUD de Materiais:
Permite criar, visualizar, editar e remover itens de forma dinâmica.

Filtro por Categorias:
Busca e organização dos materiais diretamente na listagem principal usando requisições GET.

Aviso de Estoque Baixo:
Sistema visual com destaque animado (pulse) para alertar quando um item estiver com menos de 5 unidades.

Formatação de Datas:
Conversão automática das datas do banco para o formato brasileiro (dd/mm/aaaa).

Upload de Imagens:
Envio de arquivos com pré-visualização em tempo real na tela de edição.

Exibição Inteligente de Mídia:
Layout responsivo com Grid/Flex e uso de object-contain para evitar cortes ou distorções nas imagens.

Gerenciamento de Arquivos:
O sistema remove automaticamente imagens antigas do armazenamento ao atualizar ou excluir um material, evitando arquivos desnecessários no servidor.

🚀 Passo a Passo de Instalação (Windows)
📋 Requisitos

Antes de iniciar, garanta que você tenha instalado:

Git
PHP (8.2 ou superior) + Composer
Node.js e NPM
MySQL ativo
⚙️ Instalação
# 1. Clonar o repositório
git clone https://github.com/GustavoDiniz6263/construcao-app

# 2. Entrar na pasta do projeto
cd materiais-app

# 3. Instalar dependências do backend (Laravel)
composer install

# 4. Instalar dependências do frontend
npm install

# 5. Criar arquivo de ambiente
copy .env.example .env

# 6. Configurar o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=materiais-app
DB_USERNAME=root
DB_PASSWORD=

# 7. Gerar chave da aplicação
php artisan key:generate

# 8. Executar migrations e seeds
php artisan migrate --seed

# 9. Criar link do storage (necessário para imagens)
php artisan storage:link

# 10. Compilar assets do frontend
npm run build

# 11. Iniciar servidor local
php artisan serve
