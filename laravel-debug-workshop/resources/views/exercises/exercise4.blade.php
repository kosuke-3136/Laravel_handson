<!DOCTYPE html><html lang="ja"><head><meta charset="UTF-8"><title>課題4</title><style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}.wrap{max-width:820px;margin:0 auto}.badge{background:#1e293b;color:#f97316;border-radius:10px;padding:20px 25px;margin-bottom:22px}.badge h2{font-size:1.05em;margin-bottom:10px}.badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2.2}.hint{background:rgba(251,191,36,.1);border-left:3px solid #fbbf24;padding:8px 12px;margin-top:10px;color:#fbbf24;font-size:.88em;border-radius:0 4px 4px 0}h1{font-size:1.4em;color:#1e293b;margin-bottom:18px}.post{background:#fff;border-radius:10px;padding:18px 22px;margin-bottom:12px;box-shadow:0 2px 8px rgba(0,0,0,.06)}.post h3{color:#1e293b;font-size:1.05em;margin-bottom:4px}.meta{color:#94a3b8;font-size:.85em;margin-bottom:6px}.excerpt{color:#64748b;font-size:.9em;line-height:1.6}.back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}</style></head>
<body><div class="wrap">
<div class="badge">
<h2>🐛 課題4: ページがめちゃくちゃ遅い ★★★☆☆</h2>
<ul><li>Debugbar の <strong>Queries</strong> の数を確認しよう</li><li>コントローラーで <code>with('user')</code> を追加して最適化しよう</li><li>何クエリ → 何クエリに減ったか確認しよう</li></ul>
<div class="hint">💡 目標: 100クエリ以上 → 2クエリ</div>
</div>
<h1>投稿一覧（{{ $posts->count() }}件）</h1>
@foreach($posts as $post)
<div class="post">
<h3>{{ $post->title }}</h3>
<div class="meta">著者: {{ $post->user->name ?? '不明' }} | {{ $post->created_at->format('Y-m-d') }}</div>
<div class="excerpt">{{ Str::limit($post->content, 80) }}</div>
</div>
@endforeach
<a href="/" class="back">← 課題一覧に戻る</a>
</div></body></html>
