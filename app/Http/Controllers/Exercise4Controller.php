<?php

namespace App\Http\Controllers;

use App\Models\Post;

/**
 * 課題4: N+1問題（初級）
 * 難易度: ★★★☆☆
 *
 * 症状:
 *   投稿一覧ページがめちゃくちゃ遅い。
 *   コードは普通に書いたのに…なんで？
 *
 * ミッション:
 *   1. Debugbar の Queries の数を確認しよう
 *   2. with() を使ってクエリ数を減らそう
 *   3. 何クエリ → 何クエリ に減ったか確認しよう
 *
 * 目標: 100クエリ以上 → 2クエリ
 */
class Exercise4Controller extends Controller
{
    public function index()
    {
        // 🐛 N+1問題: user にアクセスするたびに SQL が実行される
        $posts = Post::all();

        // 修正するならここを変える
        // $posts = Post::with('user')->get();

        return view('exercises.exercise4', compact('posts'));
    }
}
