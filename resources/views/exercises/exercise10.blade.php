<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題10 - 複合課題</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}
        .wrap{max-width:820px;margin:0 auto}
        .badge{background:#1e293b;color:#f472b6;border-radius:10px;padding:20px 25px;margin-bottom:22px}
        .badge h2{font-size:1.05em;margin-bottom:10px}
        .badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2}
        .steps{margin-top:12px;display:flex;flex-direction:column;gap:6px}
        .step{padding:7px 12px;font-size:.88em;border-radius:0 4px 4px 0}
        .step1{background:rgba(99,179,237,.1);border-left:3px solid #63b3ed;color:#93c5fd}
        .step2{background:rgba(251,191,36,.1);border-left:3px solid #fbbf24;color:#fbbf24}
        .step3{background:rgba(74,222,128,.1);border-left:3px solid #4ade80;color:#4ade80}
        .search-box{background:#fff;border-radius:12px;padding:18px;box-shadow:0 4px 20px rgba(0,0,0,.08);margin-bottom:18px;display:flex;gap:10px}
        .search-box input{flex:1;padding:10px 14px;border:2px solid #e2e8f0;border-radius:8px;font-size:1em}
        .search-box button{padding:10px 20px;background:#f472b6;color:#fff;border:none;border-radius:8px;font-weight:700;cursor:pointer}
        .result-note{color:#64748b;font-size:.88em;margin-bottom:14px}
        .bug-alert{color:#ef4444;font-weight:700}
        .post{background:#fff;border-radius:10px;padding:18px 22px;margin-bottom:12px;box-shadow:0 2px 8px rgba(0,0,0,.05)}
        .post h3{color:#1e293b;font-size:1.05em;margin-bottom:4px}
        .post-meta{color:#94a3b8;font-size:.85em}
        .back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}
    </style>
</head>
<body>
<div class="wrap">
    <div class="badge">
        <h2>🐛🐛🐛 課題10: 複合課題（3つの問題が同時に起きる） ★★★★☆（自習用）</h2>
        <ul>
            <li>キーワード検索が効いていない（空でも絞り込まれる）</li>
            <li>ページが遅い（Debugbarでクエリ数を確認）</li>
            <li>エラーが発生してもログに何も残らない</li>
        </ul>
        <div class="steps">
            <div class="step step1">Step1: toSql() で Bug1（検索条件が常に適用される）を確認</div>
            <div class="step step2">Step2: Debugbar で Bug2（N+1問題）を確認</div>
            <div class="step step3">Step3: try/catch + Log:: で Bug3 を修正</div>
        </div>
    </div>

    <form method="GET" action="{{ route('exercise10.index') }}">
        <div class="search-box">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="タイトルで検索...">
            <button type="submit">検索</button>
        </div>
    </form>

    @if(request('keyword'))
        <p class="result-note">
            「{{ request('keyword') }}」の検索結果: {{ $posts->count() }}件
            @if($posts->count() > 10)
                <span class="bug-alert">← キーワードを変えても件数が変わらなければバグ！</span>
            @endif
        </p>
    @endif

    @foreach($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <div class="post-meta">
                著者: {{ $post->user->name ?? '不明' }}
                | カテゴリ: {{ $post->category->name ?? '不明' }}
            </div>
        </div>
    @endforeach

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
