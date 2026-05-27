<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel デバッグ勉強会</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: #e0e0e0;
        }
        .container { max-width: 960px; margin: 0 auto; }

        header { text-align: center; margin-bottom: 50px; }
        header h1 { font-size: 2.4em; color: #fff; margin-bottom: 8px; }
        header p  { font-size: 1.1em; color: #94a3b8; }

        .notice {
            background: rgba(251, 191, 36, 0.1);
            border: 1px solid rgba(251, 191, 36, 0.4);
            border-radius: 10px;
            padding: 20px 25px;
            margin-bottom: 35px;
        }
        .notice h2 { color: #fbbf24; margin-bottom: 8px; font-size: 1.1em; }
        .notice p  { color: #cbd5e1; font-size: 0.95em; line-height: 1.6; }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
            gap: 20px;
        }
        .card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 28px;
            text-decoration: none;
            display: block;
            transition: transform .2s, border-color .2s;
        }
        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(99, 179, 237, 0.6);
        }
        .card-header { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; }
        .badge {
            width: 44px; height: 44px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3em; font-weight: bold; flex-shrink: 0;
        }
        .badge-1 { background: rgba(99,179,237,.2); color: #63b3ed; }
        .badge-2 { background: rgba(154,205,154,.2); color: #9acd9a; }
        .badge-3 { background: rgba(251,191,36,.2); color: #fbbf24; }
        .badge-4 { background: rgba(249,115,22,.2); color: #f97316; }
        .badge-5 { background: rgba(239,68,68,.2); color: #ef4444; }

        .card-title { font-size: 1.15em; font-weight: bold; color: #f1f5f9; }
        .stars { font-size: 0.85em; color: #64748b; margin-bottom: 10px; }
        .stars span { color: #fbbf24; }
        .card-desc { font-size: 0.92em; color: #94a3b8; line-height: 1.6; margin-bottom: 12px; }
        .card-learn {
            background: rgba(99,179,237,.08);
            border-left: 3px solid #63b3ed;
            padding: 8px 12px;
            font-size: 0.88em;
            color: #93c5fd;
            border-radius: 0 6px 6px 0;
        }

        footer { text-align: center; margin-top: 50px; color: #475569; font-size: 0.9em; }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>🐛 Laravel デバッグ勉強会</h1>
        <p>dump() から始める実践的デバッグスキル</p>
    </header>

    <div class="notice">
        <h2>👀 始める前に確認</h2>
        <p>
            画面下部にオレンジ色の <strong>Laravel Debugbar</strong> が表示されていますか？<br>
            表示されていない場合は <code>composer require barryvdh/laravel-debugbar --dev</code> を実行し、
            <code>php artisan config:clear</code> を試してください。
        </p>
    </div>

    <div class="grid">
        <a href="/exercise1" class="card">
            <div class="card-header">
                <div class="badge badge-1">1</div>
                <div class="card-title">フォームが動かない</div>
            </div>
            <div class="stars">難易度: <span>★</span>☆☆☆☆</div>
            <p class="card-desc">
                ユーザー登録フォームを送信しても、データが保存されません。
                エラーも出ない。<strong>dump()</strong> を使って原因を見つけよう！
            </p>
            <div class="card-learn">🎯 学ぶこと: dump() の基本、リクエストデータの確認</div>
        </a>

        <a href="/exercise2/1" class="card">
            <div class="card-header">
                <div class="badge badge-2">2</div>
                <div class="card-title">リレーションがnullになる</div>
            </div>
            <div class="stars">難易度: <span>★★</span>☆☆☆</div>
            <p class="card-desc">
                投稿の詳細ページを開くと <code>Attempt to read property 'name' on null</code> エラーが出る。
                段階的に <strong>dump()</strong> して原因を探ろう！
            </p>
            <div class="card-learn">🎯 学ぶこと: 段階的デバッグ、リレーションの確認</div>
        </a>

        <a href="/exercise3" class="card">
            <div class="card-header">
                <div class="badge badge-3">3</div>
                <div class="card-title">配列のキーが見つからない</div>
            </div>
            <div class="stars">難易度: <span>★★</span>☆☆☆</div>
            <p class="card-desc">
                合計金額を計算しようとすると <code>Undefined array key 'qty'</code> エラーが出る。
                配列の中身を <strong>dump()</strong> で確認しよう！
            </p>
            <div class="card-learn">🎯 学ぶこと: 配列のデバッグ、typo の発見</div>
        </a>

        <a href="/exercise4" class="card">
            <div class="card-header">
                <div class="badge badge-4">4</div>
                <div class="card-title">ページがめちゃくちゃ遅い</div>
            </div>
            <div class="stars">難易度: <span>★★★</span>☆☆</div>
            <p class="card-desc">
                投稿一覧ページが異常に遅い。<strong>Debugbar</strong> を開くとクエリ数が…。
                <code>with()</code> を使って最適化しよう！
            </p>
            <div class="card-learn">🎯 学ぶこと: N+1問題の発見・Eager Loading</div>
        </a>

        <a href="/exercise5" class="card">
            <div class="card-header">
                <div class="badge badge-5">5</div>
                <div class="card-title">複雑なリレーション（上級）</div>
            </div>
            <div class="stars">難易度: <span>★★★★</span>☆</div>
            <p class="card-desc">
                著者・カテゴリ・コメントを表示したら 500クエリ以上に！
                全リレーションを <code>with()</code> で最適化して 4クエリ以下を目指そう！
            </p>
            <div class="card-learn">🎯 学ぶこと: 複数リレーションの同時最適化</div>
        </a>
    </div>

    <footer>
        <p>Laravel Debug Workshop 2026 | Happy Debugging! 🐛</p>
    </footer>
</div>
</body>
</html>
