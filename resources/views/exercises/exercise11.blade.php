<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題11 - ツール組み合わせ</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}
        .wrap{max-width:820px;margin:0 auto}
        .badge{background:#1e293b;color:#facc15;border-radius:10px;padding:20px 25px;margin-bottom:22px}
        .badge h2{font-size:1.05em;margin-bottom:10px}
        .badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2}
        .tools{display:flex;gap:8px;flex-wrap:wrap;margin-top:12px}
        .tool{padding:4px 10px;border-radius:4px;font-size:.82em;font-weight:700}
        .t1{background:rgba(99,179,237,.2);color:#93c5fd}
        .t2{background:rgba(251,191,36,.2);color:#fbbf24}
        .t3{background:rgba(74,222,128,.2);color:#4ade80}
        .t4{background:rgba(167,139,250,.2);color:#c4b5fd}
        .warning{background:#fef3c7;border:1px solid #fbbf24;border-radius:8px;padding:12px 16px;margin-bottom:18px;font-size:.9em;color:#92400e}
        h1{font-size:1.4em;color:#1e293b;margin-bottom:18px}
        .user-card{background:#fff;border-radius:10px;padding:18px 22px;margin-bottom:12px;box-shadow:0 2px 8px rgba(0,0,0,.05);display:flex;justify-content:space-between;align-items:center}
        .user-info h3{color:#1e293b;font-size:1.05em}
        .user-info p{color:#94a3b8;font-size:.85em;margin-top:4px}
        .count{font-size:1.8em;font-weight:700;color:#1e293b}
        .count.zero{color:#ef4444}
        .count-label{font-size:.72em;color:#94a3b8;text-align:center}
        .back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}
    </style>
</head>
<body>
<div class="wrap">
    <div class="badge">
        <h2>🏆 課題11: ツールを組み合わせて解く ★★★★★（自習用）</h2>
        <ul>
            <li>特定のユーザーだけ投稿数が <strong style="color:#ef4444">0</strong> になっている（エラーなし）</li>
            <li>ページ全体が遅い</li>
        </ul>
        <div class="tools">
            <span class="tool t1">Step1: dump() でデータ確認</span>
            <span class="tool t2">Step2: Debugbar でクエリ確認</span>
            <span class="tool t3">Step3: toSql() でSQL確認</span>
            <span class="tool t4">Step4: Log:: で本番対応</span>
        </div>
    </div>

    <div class="warning">
        ⚠️ 投稿数が 0 のユーザーがいますが、本当に投稿がないのか、バグでそう見えているのかどちらですか？
        dump() で確認してみましょう。
    </div>

    <h1>ユーザー一覧（投稿数付き）</h1>

    @foreach($result as $user)
        <div class="user-card">
            <div class="user-info">
                <h3>{{ $user['name'] }}</h3>
                <p>ID: {{ $user['id'] }}</p>
            </div>
            <div style="text-align:center">
                <div class="count {{ $user['post_count'] === 0 ? 'zero' : '' }}">{{ $user['post_count'] }}</div>
                <div class="count-label">投稿数</div>
            </div>
        </div>
    @endforeach

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
