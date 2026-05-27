<?php

namespace App\Http\Controllers;

use App\Models\Post;

/**
 * 課題2: リレーションがnullになる
 * 難易度: ★★☆☆☆
 *
 * 症状:
 *   投稿の詳細ページを開くと
 *   "Attempt to read property 'name' on null" エラーが出る。
 *
 * ミッション:
 *   dump() を使って段階的に確認し、どこで null になっているか突き止めよう！
 *
 * ヒント:
 *   以下の順番で確認してみよう：
 *   1. $post は取得できている？
 *   2. $post->user は？
 *   3. $post->user_id の値は？
 */
class Exercise2Controller extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);

        // TODO: ここで dump() して確認してみよう
        // dump($post);
        // dump($post->user);
        // dump($post->user_id);

        return view('exercises.exercise2', [
            'post'   => $post,
            'author' => $post->user->name, // ← ここでエラー！
        ]);
    }
}
