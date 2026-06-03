<?php
namespace App\Http\Controllers;
use App\Models\Post;

/**
 * 課題4: ページがめちゃくちゃ遅い ★★★☆☆
 *
 * 症状: 投稿一覧ページが遅い（Queries: 100以上）
 * ミッション:
 *   1. Debugbar の Queries 数を確認しよう
 *   2. with() を使ってクエリ数を減らそう
 *   3. 何クエリ → 何クエリに減ったか確認しよう
 */
class Exercise4Controller extends Controller
{
    public function index()
    {
        // 🐛 N+1問題: user にアクセスするたびに SQL が実行される
        $posts = Post::all();

        // ✅ 修正するならここを変える:
        // $posts = Post::with('user')->get();

        return view('exercises.exercise4', compact('posts'));
    }
}
