<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>課題9 - 動作確認のデバッグ</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}
        .wrap{max-width:820px;margin:0 auto}
        .badge{background:#1e293b;color:#38bdf8;border-radius:10px;padding:20px 25px;margin-bottom:22px}
        .badge h2{font-size:1.05em;margin-bottom:10px}
        .badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2.2}
        .concept{background:rgba(56,189,248,.1);border-left:3px solid #38bdf8;padding:8px 12px;margin-top:10px;color:#93c5fd;font-size:.88em;border-radius:0 4px 4px 0}
        .steps{background:rgba(251,191,36,.1);border-left:3px solid #fbbf24;padding:8px 12px;margin-top:8px;color:#fbbf24;font-size:.88em;border-radius:0 4px 4px 0}
        h1{font-size:1.4em;color:#1e293b;margin-bottom:18px}
        .post{background:#fff;border-radius:10px;padding:20px;margin-bottom:14px;box-shadow:0 2px 10px rgba(0,0,0,.06);display:flex;align-items:center;justify-content:space-between}
        .post-info h3{font-size:1.05em;color:#1e293b;margin-bottom:4px}
        .post-info p{font-size:.88em;color:#64748b}
        .like-wrap{text-align:center}
        .like-btn{background:#f1f5f9;border:2px solid #e2e8f0;border-radius:8px;padding:8px 18px;cursor:pointer;font-size:.95em;color:#475569;transition:all .2s}
        .like-btn:hover,.like-btn.liked{background:#fef3c7;border-color:#fbbf24;color:#92400e}
        .like-count{font-size:.82em;color:#94a3b8;margin-top:4px}
        .back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}
    </style>
</head>
<body>
<div class="wrap">
    <div class="badge">
        <h2>✅ 課題9: 「動いているか」を確認するデバッグ ★★★☆☆（自習用）</h2>
        <ul>
            <li>エラーは出ていない。でも正しく動いているか分からない</li>
            <li>いいね機能が期待通りに動いているか <code>dump()</code> で確認しよう</li>
            <li>SQLは何回発行されているか <strong>Debugbar</strong> で確認しよう</li>
        </ul>
        <div class="concept">💡 デバッグ = エラーを直すだけじゃない。「期待通りに動いているか確認する」のもデバッグ</div>
        <div class="steps">確認すること: ① いいね数が正しいか ② 2回いいねできないか ③ SQLは何回発行されるか</div>
    </div>

    <h1>投稿一覧（いいね機能付き）</h1>

    @foreach($posts as $post)
        <div class="post">
            <div class="post-info">
                <h3>{{ $post->title }}</h3>
                <p>{{ Str::limit($post->content, 60) }}</p>
            </div>
            <div class="like-wrap">
                <button class="like-btn" onclick="like({{ $post->id }}, this)">❤️ いいね</button>
                <div class="like-count" id="count-{{ $post->id }}">{{ $post->likes->count() }}件</div>
            </div>
        </div>
    @endforeach

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
<script>
async function like(postId, btn) {
    const res = await fetch(`/exercise9/${postId}/like`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
        },
        body: JSON.stringify({ user_id: 1 })
    });
    const data = await res.json();
    document.getElementById(`count-${postId}`).textContent = `${data.count}件`;
    btn.classList.toggle('liked', data.liked);
}
</script>
</body>
</html>
