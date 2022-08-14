## 参考サイト
Laravel6.xとVue Routerでvue.jsのSPA構築  
https://reffect.co.jp/laravel/laravel-vue-router-single-page-application#routerjs

## コンテナ  
nginx nginx:1.20-alpine
php php:8.1-fpm-buster
mysql mysql/mysql-server:8.0

## 導入手順

dockerのビルドと立ち上げをする  
`docker-compose up -d --build`

以下のコマンドでコンテナ内に入りlaravelのインストールを行う。  
`$ docker compose exec app bash`  
`$ composer create-project --prefer-dist "laravel/laravel=9.*" .`  
`$ chmod -R 777 storage bootstrap/cache`  

インストールされたか確認する  
`$ php artisan -V`  

以下のサイトを開き、Laravelの画面が開けばOK  
http://localhost:8080/
