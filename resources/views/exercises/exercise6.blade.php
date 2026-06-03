<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題6 - ログを使ったデバッグ</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}
        .wrap{max-width:640px;margin:0 auto}
        .badge{background:#1e293b;color:#a78bfa;border-radius:10px;padding:20px 25px;margin-bottom:22px}
        .badge h2{font-size:1.05em;margin-bottom:10px}
        .badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2.2}
        .hint{background:rgba(251,191,36,.1);border-left:3px solid #fbbf24;padding:8px 12px;margin-top:10px;color:#fbbf24;font-size:.88em;border-radius:0 4px 4px 0}
        .log-path{background:rgba(99,179,237,.1);border-left:3px solid #63b3ed;padding:8px 12px;margin-top:8px;color:#93c5fd;font-size:.85em;border-radius:0 4px 4px 0}
        .card{background:#fff;border-radius:12px;padding:35px;box-shadow:0 4px 20px rgba(0,0,0,.08)}
        h1{font-size:1.5em;color:#1e293b;margin-bottom:22px}
        .fg{margin-bottom:18px}
        label{display:block;font-weight:600;color:#374151;margin-bottom:5px;font-size:.93em}
        input{width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:8px;font-size:1em;transition:border-color .2s}
        input:focus{outline:none;border-color:#a78bfa}
        button{width:100%;padding:12px;background:linear-gradient(135deg,#7c3aed,#a78bfa);color:#fff;border:none;border-radius:8px;font-size:1em;font-weight:700;cursor:pointer;margin-top:6px}
        .errors{background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:12px 16px;margin-bottom:18px;color:#dc2626;font-size:.9em}
        .back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}
    </style>
</head>
<body>
<div class="wrap">
    <div class="badge">
        <h2>📋 課題6: ログを使ったデバッグ ★★☆☆☆（自習用）</h2>
        <ul>
            <li>本番環境では <code>dump()</code> / <code>dd()</code> は使えない</li>
            <li>コントローラーの TODO コメントを外して <code>Log::info()</code> / <code>Log::error()</code> を有効化しよう</li>
            <li>フォームを送信して処理の流れがログに記録されるか確認しよう</li>
        </ul>
        <div class="hint">💡 ミッション: TODO コメントを外してログを有効化しよう</div>
        <div class="log-path">📄 ログファイルの場所: <code>storage/logs/laravel.log</code></div>
    </div>

    <div class="card">
        <h1>ユーザー登録（ログあり）</h1>

        @if($errors->any())
            <div class="errors">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('exercise6.store') }}">
            @csrf
            <div class="fg">
                <label>お名前</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="山田 太郎">
            </div>
            <div class="fg">
                <label>メールアドレス</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="taro@example.com">
            </div>
            <div class="fg">
                <label>パスワード（8文字以上）</label>
                <input type="password" name="password" placeholder="8文字以上">
            </div>
            <button type="submit">登録する</button>
        </form>
    </div>
    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
