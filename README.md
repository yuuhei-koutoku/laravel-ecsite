# EC サイト

# 使用技術、開発環境

-   フロントエンド
    -   HTML
    -   CSS
        -   Tailwind CSS 3.1.0
-   バックエンド
    -   PHP 8.2.0
        -   Laravel 9.52.5
-   その他
    -   MAMP
        -   MySQL 5.7.39
        -   Apache
    -   Visual Studio Code
    -   Git / GitHub / SourceTree

# 機能一覧

-   通常ユーザー
    -   ホーム（商品一覧）
    -   カートを表示
    -   購入
-   オーナー
    -   店舗情報
    -   画像管理
    -   商品管理
-   管理者
    -   オーナー管理
        -   一覧
        -   新規登録
        -   編集
        -   論理削除
    -   期限切れオーナー管理
        -   一覧
        -   物理削除

# 環境構築

## 1. ダウンロード方法

main ブランチをダウンロードする場合

```
git clone https://github.com/yuuhei-koutoku/laravel-ecsite.git
```

ブランチ名を指定してダウンロードする場合

```
git clone -b ブランチ名 https://github.com/yuuhei-koutoku/laravel-ecsite.git
```

もしくは zip ファイルでダウンロードしてください。

## 2. インストール方法

-   `cd laravel_ecsite`
-   `composer install` または `composer update`
-   `npm install`
-   `npm run dev`

`.env.example` をコピーして `.env` ファイルを作成します。

`.env` ファイルの中の下記をご利用の環境に合わせて変更してください。

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=laravel-ecsite-db
DB_USERNAME=laravel-ecsite-user
DB_PASSWORD=laravel-ecsite-pass
```

XAMPP/MAMP または他の開発環境で DB を起動した後に`php artisan migrate:fresh --seed`と実行してください。(データベーステーブルとダミーデータが追加されれば OK です。)

最後に`php artisan key:generate`と入力してキーを生成後、`php artisan serve`と`npm run dev`で簡易サーバーを立ち上げ、表示確認してください。

## 3. インストール後の実施事項

### 画像ダミーデータの設定

画像のダミーデータは `public/images` フォルダ内に `sample1.jpg` 〜 `sample6.jpg` として保存しています。

`php artisan storage:link` で `storage` フォルダにリンク後、`storage/app/public/products` フォルダ内に保存すると表示されます。（`products` フォルダがない場合は作成してください。）

ショップの画像も表示する場合は、`storage/app/public/shops` フォルダを作成し、画像を保存してください。
