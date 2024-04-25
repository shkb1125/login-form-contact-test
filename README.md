# お問い合わせフォーム

## 環境構築

### Dockerビルド
1. git clone git@github.com:shkb1125/login-form-contact-test.git
2. docker-compose up -d --build  
※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて「docker-compose.yml」ファイルを編集してください。

### Laeavel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術(実行環境)
・PHP 7.4.9  
・Laravel 8  
・MySQL 8.0.26  

## ER図
![contact drawio](https://github.com/shkb1125/login-form-contact-test/assets/158729607/81256fcb-c32c-4da5-9dbd-c484fd90339f)

## URL
・開発環境：http://localhost/  
・phpmyadmin：http://localhost:8080/  

## 未実装
1. ユーザー登録画面バリデーション(メールアドレスのドメイン形式)
2. ログイン画面バリデーション(メールアドレスのドメイン形式)
3. モーダルウィンドウ内の詳細表示
4. 管理画面での検索後ページネーション
5. エクスポート機能
