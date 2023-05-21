# EC サイト

## 使用技術、開発環境

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

## 機能一覧

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

## 環境構築

### 1. GitHub よりダウンロード

```
git clone https://github.com/yuuhei-koutoku/laravel-ecsite.git
```

### 2. マイグレーション及びシーダの実行

```
php artisan migrate --seed
```

### 3. 画像ダミーデータの設定

画像のダミーデータは public/images フォルダ内に sample1.jpg 〜 sample6.jpg として保存しています。`php artisan storage:link` で storage フォルダにリンク後、storage/app/public/products フォルダ内に保存すると表示されます。（products フォルダがない場合は作成してください。）

ショップの画像も表示する場合は、storage/app/public/shops フォルダを作成し、画像を保存してください。

### 3. 簡易サーバーを起動

-   バックエンド

```
php artisan serve
```

-   フロントエンド

```
npm run dev
```
