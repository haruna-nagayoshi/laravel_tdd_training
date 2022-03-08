# 本プロジェクトの目的
- テストコードを書く練習
- TDDの練習
- Laravelの新機能の試験的運用

# 環境構築手順
- git clone後、ルートディレクトリで下記を実行
```
docker-compose up -d --build
```

- composer install
```
docker-compose run --rm training_composer install
```

- node run dev
```
docker-compose run --rm training_node run dev
```

- PHP-FPMコンテナ内でphp artisanコマンドを実行できる
```
docker exec -it training_php-fpm bash
```


# 参考
[Laravel+TDDの基礎](https://laravel-tdd.doc.tacck.net/#%E3%81%AF%E3%81%98%E3%82%81%E3%81%AB)
