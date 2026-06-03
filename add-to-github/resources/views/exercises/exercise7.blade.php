<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題7 - SQLデバッグ</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}
        .wrap{max-width:820px;margin:0 auto}
        .badge{background:#1e293b;color:#34d399;border-radius:10px;padding:20px 25px;margin-bottom:22px}
        .badge h2{font-size:1.05em;margin-bottom:10px}
        .badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2.2}
        .hint{background:rgba(251,191,36,.1);border-left:3px solid #fbbf24;padding:8px 12px;margin-top:10px;color:#fbbf24;font-size:.88em;border-radius:0 4px 4px 0}
        .search-box{background:#fff;border-radius:12px;padding:20px;box-shadow:0 4px 20px rgba(0,0,0,.08);margin-bottom:22px;display:flex;gap:12px}
        .search-box input{flex:1;padding:10px 16px;border:2px solid #e2e8f0;border-radius:8px;font-size:1em}
        .search-box input:focus{outline:none;border-color:#34d399}
        .search-box button{padding:10px 24px;background:#34d399;color:#fff;border:none;border-radius:8px;font-weight:700;cursor:pointer}
        .result-count{color:#64748b;font-size:.9em;margin-bottom:14px}
        .post{background:#fff;border-radius:10px;padding:18px 22px;margin-bottom:12px;box-shadow:0 2px 8px rgba(0,0,0,.05)}
        .post h3{color:#1e293b;font-size:1.05em;margin-bottom:6px}
        .excerpt{color:#64748b;font-size:.9em;line-height:1.6}
        .no-result{text-align:center;padding:40px;color:#94a3b8}
        .back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}
    </style>
</head>
<body>
<div class="wrap">
    <div class="badge">
        <h2>🔍 課題7: SQLデバッグ ★★★☆☆（自習用）</h2>
        <ul>
            <li>「タイトル」で検索しているはずなのに、絞り込まれない</li>
            <li><code>dump($query->toSql())</code> でどのカラムを検索しているか確認しよう</li>
            <li>バグを直して正しく検索できるようにしよう</li>
        </ul>
        <div class="hint">💡 ヒント: <code>toSql()</code> でSQL文を、<code>getBindings()</code> でバインド値を確認しよう</div>
    </div>

    <form method="GET" action="{{ route('exercise7.index') }}">
        <div class="search-box">
            <input type="text" name="keyword" value="{{ $keyword }}" placeholder="タイトルで検索...">
            <button type="submit">検索</button>
        </div>
    </form>

    @if($keyword)
        <p class="result-count">「{{ $keyword }}」の検索結果: {{ $posts->count() }}件
            @if($posts->count() === \App\Models\Post::count())
                <span style="color:#ef4444;font-weight:700">（全件ヒット → 絞り込まれていない！バグです）</span>
            @endif
        </p>
    @endif

    @forelse($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <div class="excerpt">{{ Str::limit($post->content, 100) }}</div>
        </div>
    @empty
        <div class="no-result">検索結果がありません。</div>
    @endforelse

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
