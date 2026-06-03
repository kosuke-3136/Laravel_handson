<!DOCTYPE html><html lang="ja"><head><meta charset="UTF-8"><title>課題5</title><style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}.wrap{max-width:820px;margin:0 auto}.badge{background:#1e293b;color:#ef4444;border-radius:10px;padding:20px 25px;margin-bottom:22px}.badge h2{font-size:1.05em;margin-bottom:10px}.badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2}.hint{background:rgba(251,191,36,.1);border-left:3px solid #fbbf24;padding:8px 12px;margin-top:10px;color:#fbbf24;font-size:.88em;border-radius:0 4px 4px 0}h1{font-size:1.4em;color:#1e293b;margin-bottom:18px}.post{background:#fff;border-radius:10px;padding:20px;margin-bottom:14px;box-shadow:0 2px 8px rgba(0,0,0,.06)}.post h3{color:#1e293b;margin-bottom:6px}.meta{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:8px;font-size:.85em;color:#64748b}.cat{background:#dbeafe;color:#1d4ed8;padding:2px 8px;border-radius:4px;font-size:.8em;font-weight:600}.excerpt{color:#64748b;font-size:.9em;line-height:1.6;margin-bottom:8px}.comments{background:#f8fafc;border-radius:6px;padding:8px 12px}.comments p{font-size:.82em;color:#94a3b8;margin-bottom:3px;font-weight:600}.comment{font-size:.82em;color:#64748b;padding:2px 0}.back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}</style></head>
<body><div class="wrap">
<div class="badge">
<h2>🐛🐛🐛 課題5: 複雑なリレーション（上級） ★★★★☆</h2>
<ul><li>Debugbar を見ると <strong>500クエリ以上</strong> 発行されている！</li><li>user / category / comments の 3つで N+1 が起きている</li></ul>
<div class="hint">💡 目標: 500クエリ以上 → 4クエリ（with(['user','category','comments'])）</div>
</div>
<h1>投稿一覧（{{ $posts->count() }}件）</h1>
@foreach($posts as $post)
<div class="post">
<h3>{{ $post->title }}</h3>
<div class="meta">
<span>著者: {{ $post->user->name ?? '不明' }}</span>
<span class="cat">{{ $post->category->name }}</span>
<span>{{ $post->created_at->format('Y-m-d') }}</span>
</div>
<div class="excerpt">{{ Str::limit($post->content, 80) }}</div>
@if($post->comments->count() > 0)
<div class="comments">
<p>💬 コメント {{ $post->comments->count() }}件</p>
@foreach($post->comments->take(2) as $c)<div class="comment">・{{ $c->content }}</div>@endforeach
</div>
@endif
</div>
@endforeach
<a href="/" class="back">← 課題一覧に戻る</a>
</div></body></html>
