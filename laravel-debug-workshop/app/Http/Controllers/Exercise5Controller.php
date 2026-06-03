<?php
namespace App\Http\Controllers;
use App\Models\Post;

/**
 * 課題5: 複雑なリレーション（上級） ★★★★☆
 *
 * 症状: 著者・カテゴリ・コメントを表示したら Queries が 500以上に！
 * ミッション:
 *   1. Debugbar でクエリ数を確認（500以上のはず）
 *   2. with() で全リレーションをまとめてロード
 *   3. クエリ数を 4以下 にしよう
 */
class Exercise5Controller extends Controller
{
    public function index()
    {
        // 🐛 N+1問題が3箇所: user / category / comments
        $posts = Post::all();

        // ✅ 修正するならここを変える:
        // $posts = Post::with(['user', 'category', 'comments'])->get();

        return view('exercises.exercise5', compact('posts'));
    }
}
