<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題{{ $exercise }}クリア！</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 16px;
            padding: 50px;
            text-align: center;
            max-width: 480px;
        }
        .emoji { font-size: 4em; margin-bottom: 20px; }
        h1 { color: #4ade80; font-size: 1.8em; margin-bottom: 12px; }
        p  { color: #94a3b8; line-height: 1.7; margin-bottom: 28px; }
        a  {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="emoji">🎉</div>
        <h1>課題{{ $exercise }}クリア！</h1>
        <p>{{ $message }}</p>
        <a href="/">← 課題一覧に戻る</a>
    </div>
</body>
</html>
