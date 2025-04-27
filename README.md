# Melody Market

個人開発で「音楽イベントのグッズを販売するECサイト」を作ってたので、紹介します。

![melody-market_top-movie](/public/readme/melody-market_top-movie.gif)

このREADMEに書かれている内容は、下記の記事でもご覧いただけます。

[音楽イベントのグッズを販売するECサイトを作ってみた](https://qiita.com/Yuhei_K/items/e3abb3cc7c2c03d540b8)

# 概要

音楽のライブイベントに足を運ぶと、Tシャツや帽子、ステッカーなど様々なグッズが販売されています。それらのグッズをオンラインで販売しているECサイトを作成しました。

運用は考えておらず、あくまで自分の練習・スキルアップとして作ったものです。

使用技術については後ほど詳細を記載しますが、主にPHP, Laravelを用いており、MPAのWebアプリケーションとなっています。

# URL
## デプロイ先

システムの利用者の種別は、ユーザー（一般の利用者）、オーナー（店舗を運営）、管理者（システムを管理）の3つがあります。

> [!WARNING]
> 起動に数秒時間がかかります。

- ユーザー：https://melody-market.fly.dev （ゲストログイン機能でログイン可）
- オーナー：https://melody-market.fly.dev/owner/login （入力フォームの初期値でログイン可）
- 管理者　：https://melody-market.fly.dev/admin/login （入力フォームの初期値でログイン可）


# 制作背景

音楽のライブイベントに参加することが、私の趣味の1つだからです。イベント会場ではグッズ販売が行われている場所があり、長蛇の列ができています。混雑していると待ち時間で30分以上かかることもあり、待ち時間なしで購入できるECサイトがあったら便利だと思い、作成しました。

<details><summary>【余談】筆者が好きなアーティストは......</summary>

MY FIRST STORYです。I'm a messや夢幻（鬼滅の刃 オープニング）が有名ですかね。
![S__66936888.jpg](https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/935364/b8b49abb-38ef-c79d-504f-215dd6a5817a.jpeg)
個人的にはREVIVERが好きです。

↓テンション上げたい時に聞いてみてください。

[MY FIRST STORY - REVIVER - Official Music Video](https://youtu.be/VvShHLo88_c)
</details>

ただし、初めから音楽イベントグッズのECサイトを作ろうと思っていたわけではないです。最初は何のコンセプトもありませんでした。というのも、このアプリケーションは下記のUdemy教材をベースに作成しているからです。

[【Laravel】マルチログイン機能を構築し本格的なECサイトをつくってみよう【Breeze/tailwindcss】](https://www.udemy.com/course/laravel-multi-ec)
<br>
このUdemy教材で学習を終えた後、何か自分なりにアレンジ出来ないかと考え、コンセプトやオリジナル機能などを追加しました。かなりざっくりではありますが、Udemyでの実装が5割、オリジナルの実装が5割くらいです。

# 画面イメージ

ユーザーの画面イメージのみ紹介します。オーナーと管理者の画面イメージもご覧になりたい方は、下記のリンクからご確認ください。

[音楽イベントのグッズを販売するECサイトを作ってみた/画面イメージ](https://qiita.com/Yuhei_K/items/e3abb3cc7c2c03d540b8#%E7%94%BB%E9%9D%A2%E3%82%A4%E3%83%A1%E3%83%BC%E3%82%B8)

## トップページ
商品の一覧を閲覧できます。カテゴリー検索、キーワード検索、CSVダウンロード、並び替え、表示件数切替など、多数の機能を実装しています。
![screenshot-toppage](/public/readme/screenshot-toppage.png)

## 商品詳細
商品や店舗の詳細を閲覧できます。認証時は表示されている商品の数量を選択し、その商品をカートに入れることができます。
![screenshot-product-detail](/public/readme/screenshot-product-detail.png)

## カートを表示
認証済みユーザーがカートに入れた商品を閲覧できます。
![screenshot-cart](/public/readme/screenshot-cart.png)

## 決済ページ
Stripeの決済ページです。購入手続きが完了すると、ユーザーとオーナーにメールが送信される仕組みです。ただし、StripeとMailtrapはテストモードで実装しているため、実際に請求や決済、メール送信は行われません。
![screenshot-stripe](/public/readme/screenshot-stripe.png)

## お問い合わせ
管理者へ問い合わせを送ることができます。
![screenshot-inquiry](/public/readme/screenshot-inquiry.png)

## プロフィール
商品の購入履歴やプロフィール情報更新ができます。
![screenshot-profile](/public/readme/screenshot-profile.png)

# 技術スタック、開発環境

-   フロントエンド
    -   HTML
    -   CSS
        -   Tailwind CSS 3.4.9
    -   JavaScript
        -   Micromodal.js 0.4.10
        -   Swiper.js 6.8.4
-   バックエンド
    -   PHP 8.2.17
        -   Laravel 9.52.16
        -   PHPUnit 9.6.20
-   その他
    -   MAMP
        -   MySQL 5.7.39
        -   Apache
    -   Visual Studio Code
    -   Git / GitHub / SourceTree（バージョン管理）
    -   GitHub Actions（Laravel Pint実行とデプロイを自動化）
    -   Stripe（決済機能）
    -   Mailtrap（メール送信機能）
    -   AWS S3（画像保存）
    -   Fly.io（`main`ブランチプッシュ時に自動デプロイ）

# 機能一覧

システムの利用者の種別ごとに記載します。

## ユーザー

-   アカウント新規作成、ログイン、ログアウト
-   商品一覧
    -   商品画像、カテゴリー、商品名、単価を表示
    -   カテゴリ検索
    -   キーワード検索
    -   CSVダウンロード（全てのページ または 現在のページのみ）
    -   並び替え（おすすめ順、料金が高い順、料金が安い順、新しい順、古い順）
    -   ページネーション（表示件数切り替え（20 件、50 件、100 件））
-   商品詳細
    -   商品画像切り替え（Swiper.js）
    -   詳細情報表示（カテゴリ、商品名、商品の説明、単価）
    -   カートに入れる
    -   ショップの詳細を表示（Micromodal.js）
-   カートを表示
    -   カートに入れた商品を表示（商品画像、商品名、数量、小計、合計金額）
    -   カートに入れた商品を削除
    -   カートに入れた商品の合計金額を表示
-   購入（Stripe）
    -   カートに入れた商品を表示（商品名、数量、単価、小計、合計金額）
    -   支払いに必要な情報を入力（メールアドレス、カード情報、カード所有者名、国または地域）
    -   購入確定後、ユーザーとオーナーにメール送信を行う（Mailtrap）
-   お問い合わせ
    -   運営へ問い合わせ内容を送信
    -   メッセージの送信を取り消し（論理削除）
-   プロフィール
    -   購入履歴を表示
    -   プロフィール情報（名前、メールアドレス）を更新
    -   パスワード更新
    -   アカウント退会

> [!TIP]
> ユーザーのみレスポンシブデザインにしています。

## オーナー

-   ログイン、ログアウト
-   店舗情報
    -   店名及び店舗画像を表示
    -   詳細
        -   更新（店名、店舗情報、店舗画像をS3へアップロード、販売中 or 停止中）
-   画像管理
    -   商品画像一覧
    -   新規登録（商品画像をS3へアップロード）
    -   詳細
        -   商品画像タイトル更新
        -   商品画像削除
-   商品管理
    -   商品一覧
    -   新規登録（商品名、商品情報、価格、表示順、初期在庫、販売する店舗、カテゴリー、複数画像アップロード、販売中 or 停止中）
    -   詳細
        -   更新（商品名、商品情報、価格、表示順、初期在庫、販売する店舗、カテゴリー、複数画像アップロード、販売中 or 停止中）
        -   商品削除

## 管理者

-   ログイン、ログアウト
-   オーナー管理
    -   オーナー管理
        -   名前、メールアドレス、作成日を表示
        -   ページネーション
    -   新規登録（オーナー名、メールアドレス、パスワード、パスワード確認）
    -   更新（オーナー名、メールアドレス、店名、パスワード、パスワード確認）
    -   削除（論理削除）
-   期限切れオーナー管理
    -   期限切れオーナー管理
        -   名前、メールアドレス、期限が切れた日を表示
    -   完全に削除（物理削除）
-   お問い合わせ管理
    -   お問い合わせ管理
        -   問い合わせが送られたユーザーの一覧を表示
    -   お問い合わせ詳細
        -   利用者へお問い合わせの返答を送信
        -   メッセージの送信を取り消し（論理削除）

# ER図

![ER-diagram-laravel_ecsite.drawio](/public/readme/ER-diagram-laravel_ecsite.drawio.png)

# 苦労した点

## Laravel Pintの実行をGitHub Actionsで自動化

Laravel Pint（コードスタイル自動整形ツール）をGitHub Actionsで自動実行する仕組みを導入しました。GitHub Actionsを初めて触ったため、当初はかなり苦戦しました。インターネット上の記事やChatGPT、公式リファレンスなどを参照しつつ、トライアンドエラーを繰り返し、最終的に自動化に成功しました。

導入前は、毎回プッシュ前に`./vendor/bin/pint`コマンドを手動で実行していましたが、自動化することで手動実行が不要になり、作業が大幅に効率化されました。費用対効果は大きいので、導入して正解だったと感じています。詳しくは下記の記事をご覧ください。

[Laravel Pintの実行をGitHub Actionsで自動化](https://qiita.com/Yuhei_K/items/685f1d832c4b4f30e36c)

## 機能追加に伴うデグレを発生させない

スキルアップを目的に多数の機能を実装していたため、後半での追加機能実装時にはデグレが発生しやすく、既存のテーブル定義では対応できない状況が生じました。

既存のコードやテーブル構造を踏まえ、デグレを防ぎつつ新機能を追加する方法を考えながら取り組んだ結果、期待通りに機能を追加することができました。

（ただし、最初に精度の高い設計を行なっていれば、こうした問題は防げたはずなので、反省しています......）

# 環境構築

## ダウンロード方法

`main`ブランチをダウンロードする場合

```
git clone https://github.com/yuuhei-koutoku/laravel-ecsite.git
```

ブランチ名を指定してダウンロードする場合

```
git clone -b ブランチ名 https://github.com/yuuhei-koutoku/laravel-ecsite.git
```

もしくはzipファイルでダウンロードしてください。

## インストール方法

-   `cd laravel_ecsite`
-   `composer install` または `composer update`
-   `npm install`
-   `npm run dev`

`.env.example`をコピーして`.env`ファイルを作成します。

`.env`ファイルの中の下記の内容をご利用の環境に合わせて変更してください。

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=laravel-ecsite-db
DB_USERNAME=laravel-ecsite-user
DB_PASSWORD=laravel-ecsite-pass
```

XAMPP/MAMPまたは他の開発環境でDBを起動した後に`php artisan migrate:fresh --seed`と実行してください。（データベーステーブルとダミーデータが追加されればOKです。）

最後に`php artisan key:generate`と入力してキーを生成後、`php artisan serve`と`npm run dev`で簡易サーバーを立ち上げ、表示確認してください。

## インストール後の実施事項

### 決済のテスト

決済のテストとしてStripeを利用しています。必要な場合は`.env`に Stripe の情報を追記してください。

### メールのテスト

メールのテストとしてMailtrapを利用しています。必要な場合は`.env`にMailtrapの情報を追記してください。

メール処理には時間がかかるので、キューを使用しています。必要な場合は`php artisan queue:work`でワーカーを立ち上げて動作確認するようにしてください。

### S3の画像

画像はAWS S3にて管理します。S3バケットを作成し、`.env`にS3の情報を追記してください。

S3バケットの配下に`shops`と`products`のプレフィックス（バケット内のS3フォルダ）を作成し、それぞれのプレフィックスにデモ画像を配置してください。

S3に格納したファイルに合わせて、ImageSeederやProductSeeder、ShopSeederなども修正してください。
