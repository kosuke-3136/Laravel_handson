<?php
namespace App\Http\Controllers;
use App\Models\Post;

/**
 * 課題2: リレーションがnullになる ★★☆☆☆
 *
 * 症状: "Attempt to read property 'name' on null" エラーが出る
 * ミッション: 段階的に dump() して、どこで null になっているか特定しよう！
 *
 * ヒント（段階的に確認）:
 *   1. dump($post);           // ポストは取得できているか？
 *   2. dump($post->user);     // user が null か？
 *   3. dump($post->user_id);  // user_id の値は？
 */
class Exercise2Controller extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);

        // TODO: 段階的に dump() して確認しよう
        // dump($post);
        // dump($post->user);
        // dump($post->user_id);

        return view('exercises.exercise2', [
            'post'   => $post,
            'author' => $post->user->name, // ← ここでエラー！
        ]);
    }
}
