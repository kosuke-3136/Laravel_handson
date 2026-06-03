# 🐛 Laravel デバッグ勉強会
## Laravel入門 〜デバッグについて知ろう！〜

> 📅 2026年6月24日（水）19:00〜21:30
> 🎯 対象: Laravelを学び始めた方 / PHPの基本を知っている方

---

## 📋 目次

- [課題一覧](#課題一覧)
- [事前準備（参加者向け）](#事前準備参加者向け)
- [セットアップ手順](#セットアップ手順)
- [トラブルシューティング](#トラブルシューティング)
- [課題の解説](#課題の解説)
- [ファシリテーター向けガイド](#ファシリテーター向けガイド)

---

## 課題一覧

### ✅ イベント内（必須）

| # | タイトル | 難易度 | 使うツール | URL |
|---|---------|--------|-----------|-----|
| 1 | フォームが動かない | ★☆☆☆☆ | dump() | /exercise1 |
| 2 | リレーションがnullになる | ★★☆☆☆ | dump() 段階的 | /exercise2/1 |
| 3 | 配列のキーが見つからない | ★★☆☆☆ | dump() | /exercise3 |

### ⏱ イベント内（時間があれば）

| # | タイトル | 難易度 | 使うツール | URL |
|---|---------|--------|-----------|-----|
| 4 | ページがめちゃくちゃ遅い | ★★★☆☆ | Debugbar | /exercise4 |
| 5 | 複雑なリレーション | ★★★★☆ | Debugbar | /exercise5 |

### 📚 自習用（発展・持ち帰り）

| # | タイトル | 難易度 | 使うツール | URL |
|---|---------|--------|-----------|-----|
| 6 | ログを使ったデバッグ | ★★☆☆☆ | Log:: | /exercise6 |
| 7 | SQLデバッグ | ★★★☆☆ | toSql() / getQueryLog() | /exercise7 |
| 8 | 本番環境でのデバッグ | ★★★★☆ | Log:: 設計 | /exercise8 |
| 9 | 「動いているか」を確認する | ★★★☆☆ | dump() + Debugbar | /exercise9 |
| 10 | 3つの問題が同時に起きる | ★★★★☆ | 全ツール | /exercise10 |
| 11 | ツールを組み合わせて解く | ★★★★★ | 全ツール統合 | /exercise11 |

---

## 事前準備（参加者向け）

### 必要なもの

| ツール | 確認コマンド | 必要バージョン |
|--------|------------|--------------|
| PHP | `php -v` | 8.1 以上 |
| Composer | `composer -V` | 2.x |
| Git | `git --version` | 任意 |

> 💡 **Laravel Herd を使うと一番簡単です**（Windows / Mac 両対応）
> https://herd.laravel.com/

### 事前にやっておくこと

```bash
# 1. このリポジトリをクローン
git clone https://github.com/your-username/laravel-debug-workshop.git

# 2. 中に入る
cd laravel-debug-workshop

# 3. 依存関係をインストール（5〜10分かかることがあります）
composer install
```

> ⚠️ `composer install` でエラーが出た場合は、イベント当日の **18:30〜** にヘルプデスクを開いています。お気軽にご参加ください。

---

## セットアップ手順

### Step 1: リポジトリをクローン

```bash
git clone https://github.com/your-username/laravel-debug-workshop.git
cd laravel-debug-workshop
```

### Step 2: 依存関係をインストール

```bash
composer install
```

### Step 3: 環境ファイルを作成

```bash
cp .env.example .env
php artisan key:generate
```

### Step 4: データベースの設定

**SQLite（推奨・一番簡単）:**

```bash
# Mac / Linux
touch database/database.sqlite

# Windows（コマンドプロンプト）
type nul > database\database.sqlite
```

`.env` ファイルを開いて以下を確認：

```env
DB_CONNECTION=sqlite
# 以下の行はコメントアウトされていること
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

**MySQL を使いたい場合:**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_debug_workshop
DB_USERNAME=root
DB_PASSWORD=your_password
```

```sql
-- MySQL でデータベースを作成
CREATE DATABASE laravel_debug_workshop;
```

### Step 5: マイグレーションの重複ファイルを削除

> ⚠️ Laravel のデフォルトと重複するファイルを削除します

**Mac / Linux:**
```bash
rm database/migrations/2024_01_01_000001_create_users_table.php
```

**Windows:**
```cmd
del database\migrations\2024_01_01_000001_create_users_table.php
```

### Step 6: テーブル作成 & ダミーデータ生成

```bash
php artisan migrate --seed
```

以下のダミーデータが作成されます：

| データ | 件数 | 備考 |
|--------|------|------|
| ユーザー | 20人 | パスワードはすべて `password` |
| カテゴリ | 10個 | PHP, Laravel, Vue.js など |
| 投稿 | 100件 | 課題2のため user_id = 0 のデータあり |
| コメント | 500件 | 正常なデータ |

### Step 7: Debugbar をインストール

```bash
composer require barryvdh/laravel-debugbar --dev
```

### Step 8: サーバーを起動

```bash
php artisan serve
```

### Step 9: 動作確認

ブラウザで http://localhost:8000 にアクセス

✅ 課題一覧ページが表示される  
✅ 画面下部にオレンジ色のバー（Debugbar）が表示される  
✅ 各課題ページにアクセスできる

---

## トラブルシューティング

### ❌ `No application encryption key has been specified`

```bash
php artisan key:generate
```

---

### ❌ `table "users" already exists`

重複マイグレーションが残っています：

```bash
# Mac / Linux
rm database/migrations/2024_01_01_000001_create_users_table.php

# Windows
del database\migrations\2024_01_01_000001_create_users_table.php

# その後リセット
php artisan migrate:fresh --seed
```

---

### ❌ Debugbar が表示されない

```bash
# 1. .env を確認
cat .env | grep APP_DEBUG
# → APP_DEBUG=true になっているか確認

# 2. キャッシュをクリア
php artisan config:clear
php artisan cache:clear

# 3. サーバーを再起動
php artisan serve
```

---

### ❌ `composer install` が失敗する

```bash
# PHP バージョンを確認
php -v
# → 8.1 以上であること

# Composer バージョンを確認
composer -V

# メモリ不足の場合
php -d memory_limit=-1 /usr/local/bin/composer install
```

---

### ❌ ポート 8000 が使えない

```bash
php artisan serve --port=8001
# → http://localhost:8001 にアクセス
```

---

### ❌ マイグレーションをやり直したい

```bash
php artisan migrate:fresh --seed
```

---

### ❌ `Class "App\Models\Like" not found`

```bash
composer dump-autoload
php artisan migrate:fresh --seed
```

---

## 課題の解説

### 課題1: フォームが動かない ★☆☆☆☆

**症状:** フォームを送信してもユーザーが作成されない。エラーも出ない。

**デバッグ手順:**
```php
// コントローラーに追加
dump($request->all());
// → [] 空っぽ！ → データが送られていない
```

**原因:** `resources/views/exercises/exercise1.blade.php` の `<input>` タグに `name` 属性がない

```html
<!-- ❌ バグ -->
<input type="text" placeholder="山田 太郎">

<!-- ✅ 修正 -->
<input type="text" name="name" placeholder="山田 太郎">
<input type="email" name="email" placeholder="taro@example.com">
<input type="password" name="password">
```

---

### 課題2: リレーションがnullになる ★★☆☆☆

**症状:** `Attempt to read property 'name' on null` エラー

**デバッグ手順（段階的に）:**
```php
dump($post);          // → OK: Postが取得できている
dump($post->user);    // → null!
dump($post->user_id); // → 0 ← これが原因
```

**原因:** `database/seeders/DatabaseSeeder.php` で `user_id = 0`（存在しないID）

```php
// ❌ バグ
'user_id' => 0,

// ✅ 修正
'user_id' => $userIds[array_rand($userIds)],
```

---

### 課題3: 配列のキーが見つからない ★★☆☆☆

**症状:** `Undefined array key 'qty'` エラー

**デバッグ手順:**
```php
dump($item);
// → 'quantity' はあるが 'qty' はない（typo）
```

**原因:** `app/Http/Controllers/Exercise3Controller.php` でキー名を間違えている

```php
// ❌ バグ
$subtotal = $item['price'] * $item['qty'];

// ✅ 修正
$subtotal = $item['price'] * $item['quantity'];
```

---

### 課題4: ページが遅い ★★★☆☆

**症状:** Debugbar を見ると Queries が 100 以上

**原因と修正:**
```php
// ❌ N+1問題（101クエリ）
$posts = Post::all();

// ✅ Eager Loading（2クエリ）
$posts = Post::with('user')->get();
```

---

### 課題5: 複雑なリレーション ★★★★☆

**症状:** Queries が 500 以上

**修正:**
```php
// ❌ N+1が3箇所
$posts = Post::all();

// ✅ 全リレーションをまとめてロード
$posts = Post::with(['user', 'category', 'comments'])->get();
```

---

## ファシリテーター向けガイド

> このセクションはイベントを進行する方向けです。

### 当日の準備チェックリスト

**1週間前**
- [ ] このリポジトリを fork して自分のアカウントに作成
- [ ] README の GitHub URL を自分のものに書き換えてプッシュ
- [ ] 参加者に事前準備のメールを送信（セットアップ手順を共有）
- [ ] Slack / Discord チャンネルを作成

**前日**
- [ ] スライドの最終確認（22枚）
- [ ] デモ環境の動作確認
- [ ] ターミナル × 2 を準備（サーバー用 / デモ用）
- [ ] ブラウザのタブを整理

**当日（開始1時間前）**
- [ ] Zoom / Google Meet を起動、画面共有を設定
- [ ] `php artisan serve` を起動
- [ ] Debugbar が表示されることを確認
- [ ] 全課題ページにアクセスできることを確認
- [ ] タイマーアプリを準備（各課題の時間管理用）

**開始30分前（ヘルプデスク）**
- [ ] 早めに入室した参加者の環境確認
- [ ] `composer install` で詰まっている人のサポート
- [ ] 雑談で場を温める

---

### タイムライン詳細

#### 19:00〜19:10（10分）オープニング

**やること:**
1. 挨拶・自己紹介（2分）
2. 今日のゴールを共有（3分）
3. 環境確認「http://localhost:8000 にアクセスできますか？」（3分）
4. チャットで ✅ をもらう（2分）

**確認トーク例:**
```
「画面下部にオレンジ色のバーが出ていますか？
 それが Debugbar です。後で使います。
 出ていない方はチャットで教えてください」
```

**詰まっている人への対処:**
- チャットで個別に確認
- 解決しない場合は「後でサポートします」として進める
- サブチャンネルに誘導してもOK

---

#### 19:10〜19:25（15分）エラーページの読み方

**スライド:** 04〜09（6枚）

**デモのやり方:**

```php
// routes/web.php に一時的に追加してデモ
Route::get('/error-demo', function () {
    $user = App\Models\User::findOrFail(99999);
});
```

```bash
# ブラウザで http://localhost:8000/error-demo にアクセス
# → ModelNotFoundException が出る
# → 画面を見ながら解説
```

**解説ポイント:**
- 「エラー名」を音読する → 「Model Not Found Exception = モデルが見つからなかった例外」
- 「➜ マークの行」を指さす → 「ここがバグのある場所です」
- `vendor/` の行は「Laravelの内部処理なので無視でOK」と伝える

**よくある質問:**
- Q: スタックトレースは全部読む必要がある？
  - A: `app/` で始まる行だけ読めばOKです
- Q: エラーページは英語で怖い
  - A: エラー名だけ読めれば十分です。今日は TOP5 を覚えましょう

---

#### 19:25〜19:40（15分）dump() と dd() の基本

**スライド:** 10〜14（5枚）

**ライブデモの手順:**

```php
// Exercise1Controller.php のstoreメソッドを開いて
public function store(Request $request)
{
    // ここでdump()を追加してデモ
    dump($request->all()); // 追加
    // ...
}
```

1. VSCode でファイルを開いて `dump()` を追加（参加者に見せる）
2. フォームを送信
3. ブラウザに `[]` が表示されることを確認
4. 「空っぽです！これがデバッグの出発点です」

**強調ポイント:**
- `dd()` は必ず削除すること → 「コミット前に Ctrl+Shift+F で `dd(` を検索してください」
- ラベル付き dump → `dump('確認:', $data)` で複数あっても区別できる

---

#### 19:40〜20:15（35分）ハンズオン① 課題1〜3

**進め方:**

| 課題 | 時間 | ヒントタイミング |
|------|------|----------------|
| 課題1 | 8分 | 4分後: 「dump($request->all()) を書いてみよう」 |
| 課題2 | 12分 | 5分後: 「dump($post->user_id) も確認してみよう」 |
| 課題3 | 10分 | 4分後: 「dump($item) で配列の中身を見よう」 |
| 解説まとめ | 5分 | - |

**課題開始時のアナウンス例:**
```
「課題1を開きましょう。http://localhost:8000/exercise1
 フォームを送信してみてください。
 保存されないはずです。
 dump() を使って原因を探してください。
 8分で解けた人はチャットに 🎉 を送ってください！」
```

**解けない人へのヒント（チャットに投稿）:**
```
【ヒント1】Exercise1Controller.php の store メソッドに
dump($request->all()); を追加してみよう

【ヒント2】ブラウザに [] が表示されたら
フォームのHTMLを確認してみよう

【ヒント3】resources/views/exercises/exercise1.blade.php を開いて
input タグを見てみよう
```

**解説後の確認:**
```
「全員解決できましたか？
 解けなくても大丈夫です。
 考え方（dump で確認 → 原因を特定）が身につけばOKです」
```

---

#### 20:15〜20:20（5分）休憩

```
「5分休憩します。
 トイレ・水分補給などどうぞ。
 環境で詰まっている方はこの間にサポートします。
 後半は Debugbar を使ったデバッグです！」
```

---

#### 20:20〜20:35（15分）デバッグの思考プロセス

**スライド:** 17（1枚）

**説明のポイント:**
- 5ステップを声に出して読む
- 「推測より確認」を何度も言う
- 課題1〜3がまさにこの流れだったことを振り返る

**実演:**
```
「課題2を例に振り返りましょう。
 
 Step1: 症状 → Bladeでエラーが出た
 Step2: 最初に見る場所 → エラーページの発生場所
 Step3: 絞り込む → $post->user が null
 Step4: dump で確認 → dump($post->user_id) → 0
 Step5: 修正 → Seeder を直す

 この流れが身につくと、どんなバグでも対処できます」
```

---

#### 20:35〜21:05（30分）Debugbar / N+1（時間があれば）

**スライド:** 20〜23（4枚）

> ⚠️ 時間が足りない場合は課題の実施を省略してOK。解説だけでも価値があります。

**ライブデモの手順:**

1. http://localhost:8000/exercise4 にアクセス
2. Debugbar を開いて Queries の数を見せる（101回以上）
3. `Exercise4Controller.php` を開いて `with('user')` を追加
4. 再度アクセスして Queries が 2 になることを見せる

**Numbers で盛り上げる:**
```
「今、101クエリ実行されています。
 with() を1行追加します...
 
 はい、2クエリになりました！
 50倍以上の改善です。
 たった1行でこんなに変わります。」
```

**課題4・5のアナウンス（時間があれば）:**
```
「では課題4に取り組んでみましょう。
 Debugbar のクエリ数を確認して
 with() を使って減らしてみてください。
 何クエリから何クエリになったか
 チャットに書いてください！」
```

---

#### 21:05〜21:25（20分）まとめ・質疑応答

**スライド:** 24〜25（2枚）

**まとめトーク:**
```
「今日学んだことは3つです。

① エラーページを怖がらない
  エラー名と発生場所の2つだけ見ればOK

② dump() で現実を確認する
  「〜のはず」という思い込みを捨てて
  実際の値を確認する

③ 段階的に絞り込む
  一気に全部調べない。
  Input → Process → Output の順に確認する

この3つは明日から使えます。
ぜひ実際の開発で試してみてください。」
```

**発展内容の案内:**
```
「課題6〜11と、Log:: や toSql() の使い方は
 Notion と GitHub に入っています。
 今日の内容が身についたら
 ぜひ取り組んでみてください。」
```

**質疑応答でよく出る質問:**

| 質問 | 回答 |
|------|------|
| dd() を本番に残したらどうなる？ | ユーザーの画面が真っ白になって止まります。コミット前に検索して確認してください |
| Debugbar は本番でも使える？ | インストールは --dev でしてください。本番では表示されないようにします |
| dump() を消し忘れないようにするには？ | IDE のプラグインや Git の pre-commit hook で検知できます |
| 次は何を学べばいい？ | ルーティング → Eloquent → バリデーション → 認証 の順がおすすめです |

---

#### 21:25〜21:30（5分）クロージング

```
「本日はありがとうございました！

アンケートにご協力いただけると助かります。
（URL を貼る）

質問は Slack の #laravel-debug-workshop にいつでも！

次回の勉強会も企画中です。
お楽しみに！」
```

---

### 緊急時の対処法

#### 参加者の環境が動かない場合

```
「環境が整っていない方は、画面共有を見ながら
 一緒にデバッグの考え方を学んでいただければOKです。
 後でこのリポジトリをクローンして
 自分のペースで取り組んでみてください」
```

#### 時間が足りない場合

| 状況 | 対処 |
|------|------|
| 課題2で詰まっている人が多い | 課題3をスキップして解説に進む |
| 休憩が遅くなった | Debugbar の解説を短縮する |
| 課題4・5まで来ない | スライドだけ見せてデモなしで解説 |

#### Zoom / 配信が落ちた場合

```bash
# 手元で Zoom を再起動
# 参加者に Slack で連絡
「接続が切れました。少々お待ちください」
```

---

### 参加者へのフォローアップ（翌日）

```
【件名】昨日の Laravel 勉強会 お疲れ様でした！

昨日はご参加ありがとうございました。

■ 資料
スライド: （リンク）
Notion:  （リンク）
GitHub:  https://github.com/your-username/laravel-debug-workshop

■ 次のステップ
課題6〜11に取り組んでみてください（自習用）
Notion にロードマップも入っています

■ 質問
Slack #laravel-debug-workshop にいつでも！

次回の勉強会もお楽しみに！
```

---

## ファイル構成

```
laravel-debug-workshop/
│
├── app/
│   ├── Http/Controllers/
│   │   ├── Exercise1Controller.php   # 課題1: フォームが動かない
│   │   ├── Exercise2Controller.php   # 課題2: リレーションがnull
│   │   ├── Exercise3Controller.php   # 課題3: 配列のキーエラー
│   │   ├── Exercise4Controller.php   # 課題4: N+1問題（初級）
│   │   ├── Exercise5Controller.php   # 課題5: N+1問題（上級）
│   │   ├── Exercise6Controller.php   # 課題6: ログデバッグ
│   │   ├── Exercise7Controller.php   # 課題7: SQLデバッグ
│   │   ├── Exercise8Controller.php   # 課題8: 本番環境想定
│   │   ├── Exercise9Controller.php   # 課題9: 動作確認
│   │   ├── Exercise10Controller.php  # 課題10: 複合課題
│   │   └── Exercise11Controller.php  # 課題11: ツール統合
│   │
│   └── Models/
│       ├── User.php
│       ├── Post.php
│       ├── Category.php
│       ├── Comment.php
│       └── Like.php
│
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000001_create_users_table.php
│   │   ├── 2024_01_01_000002_create_categories_table.php
│   │   ├── 2024_01_01_000003_create_posts_table.php
│   │   ├── 2024_01_01_000004_create_comments_table.php
│   │   └── 2024_01_01_000005_create_likes_table.php
│   │
│   └── seeders/
│       └── DatabaseSeeder.php
│
├── resources/views/
│   ├── welcome.blade.php             # トップページ（課題一覧）
│   └── exercises/
│       ├── exercise1.blade.php 〜 exercise11.blade.php
│       └── success.blade.php
│
├── routes/
│   └── web.php
│
├── .env.example
└── README.md                         # このファイル
```

---

**Happy Debugging! 🐛**
