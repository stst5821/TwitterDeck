やること  
ルート、backendディレクトリに入っている「DS.store」を消す  
gitignorに入れる。（たしかこれしないとgithubに上げたとき、また入っちゃう）

参考サイト： 
https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4  
  
コンテナ  
nginx 1.18  
php 7.4.16  
composer導入済み  
  
あとは以下の流れで好きなlaravelのverを入れればOK

### すでにあるプロジェクトにdocker環境を導入する場合
参考：https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4#%E7%92%B0%E5%A2%83%E3%81%AE%E5%86%8D%E6%A7%8B%E7%AF%89  
環境の再構築の章を見る。

プロジェクトのルートディレクトリに、
 - docker-compose.yml
 - infraフォルダ
をコピーする。

#### docker-compose.ymlの記述を修正する
appとwebのvolumes:のマウントするディレクトリを以下のようにルートディレクトリ上に設定する。

```
version: "3.8"
services:
  app:

    build: ./infra/php

    volumes:
      - .:/work # ← . にしてルートディレクトリ上のファイルをマウントするように変更
      
  web:
    image: nginx:1.18-alpine #コンテナを起動させるイメージを指定

    ports: # nginxへ外(ホスト側)からコンテナ内へアクセスさせるため公開用のポートを設定します。
      - 8080:80 # ホスト側:コンテナ側 と設定。 [2021/6/29]10080:80だとエラーになったので、8080に修正

    volumes:
      - .:/work # ← . ここも . にしてルートディレクトリ上のファイルをマウントするように変更
      - ./infra/nginx/default.conf:/etc/nginx/conf.d/default.conf
    working_dir: /work
```

dockerのビルドと立ち上げをする  
`docker-compose up -d --build`

アプリケーションのコンテナに入る
`docker-compose exec [コンテナ名] bash`  

コンポーザーインストール
`composer install`

以下のサイトを開き、既存プロジェクトの画面が開けばOK    
http://127.0.0.1:10080/
  
### 新規でプロジェクトを作成する場合

git clone後  
  
```
composer create-project --prefer-dist "laravel/laravel=７.*" .  
php artisan -V  // バージョン確認  
```

composer create-project --prefer-dist "laravel/laravel=７.*" .  
を実行後、エラーになる場合  
  
appコンテナに入り、
`ls -a`
を実行する  
.DS_storeというファイルがあった場合は、  
`find -name ".DS_Store" -delete`  
で削除してから、再度実行すると、インストールできる。  
  
以下のサイトを開き、laravelのトップ画面が開けばOK    
http://127.0.0.1:10080/
