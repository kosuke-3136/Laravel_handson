<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題3 - 配列のキーエラー</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; padding: 40px 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        .badge {
            background: #1e293b; color: #fbbf24;
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
        h1 { font-size: 1.5em; color: #1e293b; margin-bottom: 25px; }
        .row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f1f5f9; color: #374151; }
        .row:last-child { border-bottom: none; }
        .row strong { color: #1e293b; }
        .back { display: inline-block; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 0.9em; }
    </style>
</head>
<body>
<div class="container">

    <div class="badge">
        <h2>🐛 課題3: 配列のキーが見つからない ★★☆☆☆</h2>
        <ul>
            <li>このページを開くと <code>Undefined array key 'qty'</code> が出る</li>
            <li>配列に 'qty' というキーはあるの？</li>
        </ul>
        <div class="hint">
            💡 ヒント: コントローラーで <code>dump($item);</code> して配列の中身を確認しよう
        </div>
    </div>

    <div class="card">
        <h1>購入確認</h1>
        <div class="row">
            <span>商品名</span>
            <strong>{{ $item['name'] }}</strong>
        </div>
        <div class="row">
            <span>単価</span>
            <strong>¥{{ number_format($item['price']) }}</strong>
        </div>
        <div class="row">
            <span>数量</span>
            <strong>{{ $item['quantity'] }}個</strong>
        </div>
        <div class="row">
            <span>小計</span>
            <strong>¥{{ number_format($subtotal) }}</strong>
        </div>
        <div class="row">
            <span>消費税 (10%)</span>
            <strong>¥{{ number_format($tax) }}</strong>
        </div>
        <div class="row" style="font-size:1.2em; font-weight:bold; color:#667eea;">
            <span>合計</span>
            <strong>¥{{ number_format($total) }}</strong>
        </div>
    </div>

    <a href="/" class="back">← 課題一覧に戻る</a>
</div>
</body>
</html>
