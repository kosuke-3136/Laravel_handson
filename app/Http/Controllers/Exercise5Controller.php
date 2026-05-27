<?php

namespace App\Http\Controllers;

use App\Models\Post;

/**
 * 課題5: N+1問題（上級）
 * 難易度: ★★★★☆
 *
 * 症状:
 *   著者・カテゴリ・コメントを表示したら
 *   さらにページが遅くなった。
 *   Debugbar を見ると… 500クエリ以上！
 *
 * ミッション:
 *   with() で全てのリレーションをまとめてロードし
 *   クエリ数を 4 以下にしよう！
 *
 * 目標: 500クエリ以上 → 4クエリ
 */
class Exercise5Controller extends Controller
{
    public function index()
    {
        // 🐛 N+1問題が3つある
        // user, category, comments それぞれで SQL が大量発行される
        $posts = Post::all();

        // 修正するならここを変える
        // $posts = Post::with(['user', 'category', 'comments'])->get();

        return view('exercises.exercise5', compact('posts'));
    }
}
