<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題2 - リレーションがnull</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; padding: 40px 20px; }
        .container { max-width: 700px; margin: 0 auto; }
        .badge {
            background: #1e293b; color: #9acd9a;
            border-radius: 10px; padding: 20px 25px; margin-bottom: 25px;
        }
        .badge h2 { font-size: 1.1em; margin-bottom: 10px; }
        .badge ul  { padding-left: 20px; color: #94a3b8; font-size: 0.92em; line-height: 2; }
        .hint {
            background: rgba(251,191,36,.1); border-left: 3px solid #fbbf24;
            padding: 8px 12px; margin-top: 12px;
            color: #fbbf24; font-size: 0.9em; border-radius: 0 4px 4px 0;
        }
        .card { background: white; border-radius: 12px; padding: 35px; box-shadow: 0 4px 20px rgba(0,0,0,.08); }
        h1 { font-size: 1.5em; color: #1e293b; margin-bottom: 6px; }
        .meta { color: #64748b; font-size: 0.9em; margin-bottom: 20px; }
        .content { color: #374151; line-height: 1.8; }
        .back { display: inline-block; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 0.9em; }
    </style>
</head>
<body>
<div class="container">

    <div class="badge">
        <h2>🐛 課題2: リレーションがnullになる ★★☆☆☆</h2>
        <ul>
            <li>このページを開くと <code>Attempt to read property 'name' on null</code> が出る</li>
            <li>$post は取得できているのに、なぜ null になるのか？</li>
        </ul>
        <div class="hint">
            💡 ヒント: コントローラーで <code>dump($post->user_id);</code> を確認してみよう
        </div>
    </div>

    <div class="card">
        <h1>{{ $post->title }}</h1>
        <p class="meta">著者: {{ $author }} | {{ $post->created_at->format('Y年m月d日') }}</p>
        <div class="content">{{ $post->content }}</div>
    </div>

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
