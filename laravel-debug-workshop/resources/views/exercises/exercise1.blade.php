<!DOCTYPE html><html lang="ja"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>課題1</title><style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:'Segoe UI',sans-serif;background:#f1f5f9;padding:40px 20px}.wrap{max-width:620px;margin:0 auto}.badge{background:#1e293b;color:#ef4444;border-radius:10px;padding:20px 25px;margin-bottom:22px}.badge h2{font-size:1.05em;margin-bottom:10px}.badge ul{padding-left:18px;color:#94a3b8;font-size:.9em;line-height:2}.hint{background:rgba(251,191,36,.1);border-left:3px solid #fbbf24;padding:8px 12px;margin-top:10px;color:#fbbf24;font-size:.88em;border-radius:0 4px 4px 0}.card{background:#fff;border-radius:12px;padding:35px;box-shadow:0 4px 20px rgba(0,0,0,.08)}h1{font-size:1.5em;color:#1e293b;margin-bottom:22px}.fg{margin-bottom:18px}label{display:block;font-weight:600;color:#374151;margin-bottom:5px;font-size:.93em}input{width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:8px;font-size:1em}input:focus{outline:none;border-color:#028090}button{width:100%;padding:12px;background:#028090;color:#fff;border:none;border-radius:8px;font-size:1em;font-weight:700;cursor:pointer;margin-top:6px}.back{display:inline-block;margin-top:18px;color:#64748b;text-decoration:none;font-size:.9em}@if($errors->any()).errors{background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:12px 16px;margin-bottom:18px;color:#dc2626;font-size:.9em}@endif</style></head>
<body><div class="wrap">
<div class="badge">
<h2>🐛 課題1: フォームが動かない ★☆☆☆☆</h2>
<ul><li>フォームを送信してもユーザーが作成されない</li><li>エラーも出ない。なぜ？</li></ul>
<div class="hint">💡 ヒント: コントローラーに <code>dump($request->all());</code> を追加して確認しよう</div>
</div>
<div class="card">
<h1>ユーザー登録</h1>
@if($errors->any())<div class="errors">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>@endif
<form method="POST" action="{{ route('exercise1.store') }}">@csrf
{{-- 🐛 バグ: input タグに name 属性がない！ --}}
<div class="fg"><label>お名前</label><input type="text" placeholder="山田 太郎">{{-- ← name属性がない！ --}}</div>
<div class="fg"><label>メールアドレス</label><input type="email" placeholder="taro@example.com">{{-- ← name属性がない！ --}}</div>
<div class="fg"><label>パスワード（8文字以上）</label><input type="password" placeholder="8文字以上">{{-- ← name属性がない！ --}}</div>
<button type="submit">登録する</button>
</form>
</div>
<a href="/" class="back">← 課題一覧に戻る</a>
</div></body></html>
