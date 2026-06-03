<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel デバッグ勉強会</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',sans-serif;background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460);min-height:100vh;padding:40px 20px}
        .wrap{max-width:980px;margin:0 auto}
        header{text-align:center;margin-bottom:40px}
        header h1{font-size:2.2em;color:#fff;margin-bottom:8px}
        header p{font-size:1.05em;color:#94a3b8}
        .section-label{color:#64748b;font-size:.75em;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin:28px 0 10px 4px;display:flex;align-items:center;gap:8px}
        .section-label span{background:#1e293b;padding:3px 8px;border-radius:4px;font-size:.85em}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(440px,1fr));gap:14px;margin-bottom:6px}
        .card{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:10px;padding:20px;text-decoration:none;display:block;transition:transform .2s,border-color .2s}
        .card:hover{transform:translateY(-3px);border-color:rgba(99,179,237,.5)}
        .card-head{display:flex;align-items:center;gap:12px;margin-bottom:8px}
        .num{width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.1em;font-weight:700;flex-shrink:0}
        .n1{background:rgba(2,128,144,.25);color:#02C39A}
        .n2{background:rgba(0,168,150,.25);color:#00A896}
        .n3{background:rgba(245,158,11,.25);color:#fbbf24}
        .n4{background:rgba(249,115,22,.25);color:#f97316}
        .n5{background:rgba(239,68,68,.25);color:#ef4444}
        .n6{background:rgba(139,92,246,.25);color:#a78bfa}
        .n7{background:rgba(52,211,153,.25);color:#34d399}
        .n8{background:rgba(251,146,60,.25);color:#fb923c}
        .n9{background:rgba(56,189,248,.25);color:#38bdf8}
        .n10{background:rgba(244,114,182,.25);color:#f472b6}
        .n11{background:rgba(250,204,21,.25);color:#facc15}
        .title{font-size:1.05em;font-weight:700;color:#f1f5f9}
        .stars{font-size:.82em;color:#64748b;margin-bottom:8px}
        .stars span{color:#fbbf24}
        .desc{font-size:.88em;color:#94a3b8;line-height:1.6;margin-bottom:9px}
        .learn{background:rgba(2,128,144,.1);border-left:3px solid #028090;padding:6px 10px;font-size:.82em;color:#93c5fd;border-radius:0 4px 4px 0}
        .new{display:inline-block;background:#ef4444;color:#fff;font-size:.68em;font-weight:700;padding:2px 5px;border-radius:3px;margin-left:6px;vertical-align:middle}
        footer{text-align:center;margin-top:50px;color:#475569;font-size:.85em}
    </style>
</head>
<body>
<div class="wrap">
    <header>
        <h1>🐛 Laravel デバッグ勉強会</h1>
        <p>dump() / Debugbar / Log:: を使って実践的なデバッグスキルを身につけよう</p>
    </header>

    <div class="section-label">✅ イベント内（必須） <span>課題1〜3</span></div>
    <div class="grid">
        <a href="/exercise1" class="card">
            <div class="card-head"><div class="num n1">1</div><div class="title">フォームが動かない</div></div>
            <div class="stars">難易度: <span>★</span>☆☆☆☆</div>
            <p class="desc">送信してもデータが保存されない。エラーも出ない。dump() で何が起きているか確認しよう。</p>
            <div class="learn">🎯 dump() の基本 / リクエストデータの確認</div>
        </a>
        <a href="/exercise2/1" class="card">
            <div class="card-head"><div class="num n2">2</div><div class="title">リレーションがnullになる</div></div>
            <div class="stars">難易度: <span>★★</span>☆☆☆</div>
            <p class="desc">エラーが出るが原因がわからない。dump() で段階的に絞り込んで特定しよう。</p>
            <div class="learn">🎯 段階的デバッグ / リレーションの確認</div>
        </a>
        <a href="/exercise3" class="card">
            <div class="card-head"><div class="num n3">3</div><div class="title">配列のキーが見つからない</div></div>
            <div class="stars">難易度: <span>★★</span>☆☆☆</div>
            <p class="desc">計算処理でエラーが出る。dump() で配列の中身を確認して typo を見つけよう。</p>
            <div class="learn">🎯 配列のデバッグ / typo の発見</div>
        </a>
    </div>

    <div class="section-label">⏱ イベント内（時間があれば） <span>課題4〜5</span></div>
    <div class="grid">
        <a href="/exercise4" class="card">
            <div class="card-head"><div class="num n4">4</div><div class="title">ページがめちゃくちゃ遅い</div></div>
            <div class="stars">難易度: <span>★★★</span>☆☆</div>
            <p class="desc">Debugbar を開くとクエリ数が 100以上。N+1問題を発見して with() で修正しよう。</p>
            <div class="learn">🎯 N+1問題の発見 / Eager Loading</div>
        </a>
        <a href="/exercise5" class="card">
            <div class="card-head"><div class="num n5">5</div><div class="title">複雑なリレーション（上級）</div></div>
            <div class="stars">難易度: <span>★★★★</span>☆</div>
            <p class="desc">3つのリレーションで N+1 が発生。Debugbar で500クエリ以上を確認して 4以下に。</p>
            <div class="learn">🎯 複数リレーションの最適化</div>
        </a>
    </div>

    <div class="section-label">📚 自習用（発展・持ち帰り） <span class="new">NEW</span> <span>課題6〜11</span></div>
    <div class="grid">
        <a href="/exercise6" class="card">
            <div class="card-head"><div class="num n6">6</div><div class="title">ログを使ったデバッグ</div></div>
            <div class="stars">難易度: <span>★★</span>☆☆☆</div>
            <p class="desc">本番では dump() は使えない。Log::info() / Log::error() で処理を記録しよう。</p>
            <div class="learn">🎯 Log:: の使い方 / storage/logs/laravel.log</div>
        </a>
        <a href="/exercise7" class="card">
            <div class="card-head"><div class="num n7">7</div><div class="title">SQLデバッグ</div></div>
            <div class="stars">難易度: <span>★★★</span>☆☆</div>
            <p class="desc">検索が期待通りに動かない。toSql() / getQueryLog() で実際のSQLを確認しよう。</p>
            <div class="learn">🎯 toSql() / getQueryLog()</div>
        </a>
        <a href="/exercise8" class="card">
            <div class="card-head"><div class="num n8">8</div><div class="title">本番環境でのデバッグ</div></div>
            <div class="stars">難易度: <span>★★★★</span>☆</div>
            <p class="desc">本番でクレームが来た。dd() は絶対使えない。ログ設計で原因特定できるようにしよう。</p>
            <div class="learn">🎯 本番対応のログ設計</div>
        </a>
        <a href="/exercise9" class="card">
            <div class="card-head"><div class="num n9">9</div><div class="title">「動いているか」を確認する</div></div>
            <div class="stars">難易度: <span>★★★</span>☆☆</div>
            <p class="desc">エラーは出ていないが、正しく動いているか分からない。dump() と Debugbar で確認しよう。</p>
            <div class="learn">🎯 動作確認のデバッグ</div>
        </a>
        <a href="/exercise10" class="card">
            <div class="card-head"><div class="num n10">10</div><div class="title">3つの問題が同時に起きる</div></div>
            <div class="stars">難易度: <span>★★★★</span>☆</div>
            <p class="desc">検索バグ・N+1・ログなし、3つが絡み合っている。1つずつ順番に解決しよう。</p>
            <div class="learn">🎯 toSql() → Debugbar → Log:: の順で解く</div>
        </a>
        <a href="/exercise11" class="card">
            <div class="card-head"><div class="num n11">11</div><div class="title">ツールを組み合わせて解く</div></div>
            <div class="stars">難易度: <span>★★★★★</span></div>
            <p class="desc">エラーなし・4つの問題が絡む最終課題。全ツールを使って解こう。</p>
            <div class="learn">🎯 dump() + Debugbar + toSql() + Log:: 全部使う</div>
        </a>
    </div>

    <footer>Laravel Debug Workshop 2026 | Happy Debugging! 🐛</footer>
</div>
</body>
</html>
