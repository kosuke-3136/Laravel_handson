<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題5 - 複雑なリレーション</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; padding: 40px 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .badge {
            background: #1e293b; color: #ef4444;
            border-radius: 10px; padding: 20px 25px; margin-bottom: 25px;
        }
        .badge h2 { font-size: 1.1em; margin-bottom: 10px; }
        .badge ul  { padding-left: 20px; color: #94a3b8; font-size: 0.92em; line-height: 2; }
        .hint {
            background: rgba(251,191,36,.1); border-left: 3px solid #fbbf24;
            padding: 8px 12px; margin-top: 12px;
            color: #fbbf24; font-size: 0.9em; border-radius: 0 4px 4px 0;
        }
        h1 { font-size: 1.5em; color: #1e293b; margin-bottom: 20px; }
        .post {
            background: white; border-radius: 10px; padding: 22px 25px;
            margin-bottom: 16px; box-shadow: 0 2px 10px rgba(0,0,0,.06);
        }
        .post h3 { font-size: 1.1em; color: #1e293b; margin-bottom: 8px; }
        .meta { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 10px; }
        .meta span { font-size: 0.85em; color: #64748b; }
        .category { background: #dbeafe; color: #1d4ed8; padding: 2px 8px; border-radius: 4px; font-size: 0.8em; font-weight: 600; }
        .excerpt { color: #64748b; font-size: 0.93em; line-height: 1.6; margin-bottom: 10px; }
        .comments { background: #f8fafc; border-radius: 6px; padding: 10px 14px; }
        .comments p { font-size: 0.85em; color: #94a3b8; margin-bottom: 4px; font-weight: 600; }
        .comment { font-size: 0.85em; color: #64748b; padding: 3px 0; }
        .back { display: inline-block; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 0.9em; }
    </style>
</head>
<body>
<div class="container">

    <div class="badge">
        <h2>🐛🐛🐛 課題5: 複雑なリレーション（上級） ★★★★☆</h2>
        <ul>
            <li>Debugbar を見ると <strong>500クエリ以上</strong> 発行されている！</li>
            <li><code>user</code> / <code>category</code> / <code>comments</code> の 3つで N+1 が起きている</li>
            <li><code>with(['user', 'category', 'comments'])</code> で全部まとめてロードしよう</li>
        </ul>
        <div class="hint">
            💡 目標: 500クエリ以上 → 4クエリ（100倍以上の改善！）
        </div>
    </div>

    <h1>投稿一覧 ({{ $posts->count() }}件)</h1>

    @foreach($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <div class="meta">
                {{-- 🐛 N+1 その1: user --}}
                <span>著者: {{ $post->user->name ?? '不明' }}</span>
                {{-- 🐛 N+1 その2: category --}}
                <span class="category">{{ $post->category->name }}</span>
                <span>{{ $post->created_at->format('Y-m-d') }}</span>
            </div>
            <div class="excerpt">{{ Str::limit($post->content, 80) }}</div>

            {{-- 🐛 N+1 その3: comments --}}
            @if($post->comments->count() > 0)
                <div class="comments">
                    <p>💬 コメント {{ $post->comments->count() }}件</p>
                    @foreach($post->comments->take(2) as $comment)
                        <div class="comment">・{{ $comment->content }}</div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
