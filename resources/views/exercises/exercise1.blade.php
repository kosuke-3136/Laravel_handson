<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題1 - フォームが動かない</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; padding: 40px 20px; }
        .container { max-width: 600px; margin: 0 auto; }

        .badge {
            background: #1e293b;
            color: #63b3ed;
            border-radius: 10px;
            padding: 20px 25px;
            margin-bottom: 25px;
        }
        .badge h2 { font-size: 1.1em; margin-bottom: 10px; }
        .badge ul  { padding-left: 20px; color: #94a3b8; font-size: 0.92em; line-height: 2; }
        .badge .hint {
            background: rgba(251,191,36,.1);
            border-left: 3px solid #fbbf24;
            padding: 8px 12px;
            margin-top: 12px;
            color: #fbbf24;
            font-size: 0.9em;
            border-radius: 0 4px 4px 0;
        }

        .card { background: white; border-radius: 12px; padding: 35px; box-shadow: 0 4px 20px rgba(0,0,0,.08); }
        h1 { font-size: 1.6em; color: #1e293b; margin-bottom: 25px; }

        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; color: #374151; margin-bottom: 6px; font-size: 0.95em; }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color .2s;
        }
        input:focus { outline: none; border-color: #63b3ed; }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .back { display: inline-block; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 0.9em; }
        .back:hover { color: #475569; }
    </style>
</head>
<body>
<div class="container">

    <div class="badge">
        <h2>🐛 課題1: フォームデータが保存されない ★☆☆☆☆</h2>
        <ul>
            <li>フォームを送信してもユーザーが作成されない</li>
            <li>エラーも出ない。なぜ？</li>
        </ul>
        <div class="hint">
            💡 ヒント: コントローラーに <code>dump($request->all());</code> を追加して確認しよう
        </div>
    </div>

    <div class="card">
        <h1>ユーザー登録</h1>

        {{-- 🐛 バグ: input タグに name 属性がない！ --}}
        {{-- サーバーにデータが送られないので $request->all() が空になる --}}
        <form method="POST" action="{{ route('exercise1.store') }}">
            @csrf

            <div class="form-group">
                <label>お名前</label>
                {{-- ↓ name 属性がない！ --}}
                <input type="text" placeholder="山田 太郎">
            </div>

            <div class="form-group">
                <label>メールアドレス</label>
                {{-- ↓ name 属性がない！ --}}
                <input type="email" placeholder="taro@example.com">
            </div>

            <div class="form-group">
                <label>パスワード</label>
                {{-- ↓ name 属性がない！ --}}
                <input type="password" placeholder="8文字以上">
            </div>

            <button type="submit">登録する</button>
        </form>
    </div>

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
