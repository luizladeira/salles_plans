## Instalando o Breeze
composer require laravel/breeze --dev
php artisan breeze:install vue

## Para rodar o brezee é necessário a instalação do autoprefixer
npm install autoprefixer@10.4.5 --save-exact


## Instalando o VITE
npm install --save-dev vite laravel-vite-plugin
npm install --save-dev @vitejs/plugin-vue

## Instalando o Cashier
composer require laravel/cashier

## Criar as tabelas para rodar o Cashier
rodar php artisan migrate

## Tradução do Projeto para Português

1. Instale o pacote
composer require lucascudo/laravel-pt-br-localization --dev

2. Publique as traduções
php artisan vendor:publish --tag=laravel-pt-br-localization

3. Configure o Framework para utilizar 'pt-BR' como linguagem padrão
// Altere Linha 83 do arquivo config/app.php para:
'locale' => 'pt-BR',
Caso deseje, configure o Framework para utilizar 'America/Sao_Paulo' como data hora padrão
// Altere Linha 70 do arquivo config/app.php para:
'timezone' => 'America/Sao_Paulo',

Colocando plugin de tradução para Português (Brasil)
[https://github.com/lucascudo/laravel-pt-BR-localization]