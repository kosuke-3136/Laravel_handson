# 🐛 Laravel デバッグ勉強会

**Laravel入門 〜デバッグ技術を身につけよう！〜** の課題用プロジェクトです。

5つの「バグを仕込んだコード」を用意しています。
`dump()` や `Laravel Debugbar` を使って、バグを見つけて直しましょう！

---

## 📋 課題一覧

| # | タイトル | 難易度 | 使うツール |
|---|---------|--------|-----------|
| 1 | フォームが動かない | ★☆☆☆☆ | dump() |
| 2 | リレーションがnullになる | ★★☆☆☆ | dump() |
| 3 | 配列のキーが見つからない | ★★☆☆☆ | dump() |
| 4 | ページがめちゃくちゃ遅い | ★★★☆☆ | Debugbar |
| 5 | 複雑なリレーション（上級） | ★★★★☆ | Debugbar |

---

## 🚀 セットアップ

### 1. クローン

```bash
git clone https://github.com/your-username/laravel-debug-workshop.git
cd laravel-debug-workshop
```

### 2. 依存関係をインストール

```bash
composer install
```

### 3. 環境設定

```bash
cp .env.example .env
php artisan key:generate
```

### 4. データベース設定

```bash
# SQLite ファイルを作成（推奨・一番簡単）
touch database/database.sqlite
```

> MySQL を使う場合は `.env` の `DB_CONNECTION` を `mysql` に変更し、
> データベース情報を設定してください。

### 5. マイグレーション & ダミーデータ作成

```bash
php artisan migrate --seed
```

以下のダミーデータが作成されます：
- ユーザー 20人
- カテゴリ 10個
- 投稿 100件
- コメント 500件

### 6. Debugbar をインストール

```bash
composer require barryvdh/laravel-debugbar --dev
```

### 7. サーバー起動

```bash
php artisan serve
```

### 8. ブラウザで確認

http://localhost:8000 にアクセス

✅ 課題一覧ページが表示される  
✅ 画面下部にオレンジ色のバー（Debugbar）が表示される

---

## 📁 課題コードの場所

```
app/Http/Controllers/
├── Exercise1Controller.php   # 課題1
├── Exercise2Controller.php   # 課題2
├── Exercise3Controller.php   # 課題3
├── Exercise4Controller.php   # 課題4
└── Exercise5Controller.php   # 課題5

resources/views/exercises/
├── exercise1.blade.php
├── exercise2.blade.php
├── exercise3.blade.php
├── exercise4.blade.php
└── exercise5.blade.php
```

バグは各コントローラーの `🐛` コメントがついている箇所です。

---

## 🔧 トラブルシューティング

### Debugbar が表示されない

```bash
# APP_DEBUG=true になっているか確認
cat .env | grep APP_DEBUG

# キャッシュクリア
php artisan config:clear
php artisan cache:clear
```

### マイグレーションエラー

```bash
php artisan migrate:fresh --seed
```

### ポート 8000 が使えない

```bash
php artisan serve --port=8001
```

---

## ✅ 解答の確認方法

各コントローラーのコメントに `TODO:` と書いてある箇所が作業ポイントです。  
解決したら `dump()` を削除して、コードをクリーンにしましょう。

Happy Debugging! 🐛
"# Laravel_handson" 
